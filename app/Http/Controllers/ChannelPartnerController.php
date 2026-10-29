<?php

namespace App\Http\Controllers;

use App\Models\ChannelPartner;
use App\Models\User;
use App\Support\PartnerTerms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class ChannelPartnerController extends Controller
{
    public function create()
    {
        return view('partners.register', ['termsDocument' => PartnerTerms::document()]);
    }

    public function store(Request $request)
    {
        $request->merge(['email' => strtolower(trim((string) $request->input('email')))]);
        $details = $request->validate([
            'partner_type' => ['required', Rule::in(array_keys(ChannelPartner::TYPES))],
            'name' => ['required', 'string', 'max:100'],
            'agency_name' => ['exclude_unless:partner_type,agency', 'required', 'string', 'max:150'],
            'mobile' => ['required', 'regex:/^[0-9]{10}$/', 'unique:channel_partners,mobile'],
            'email' => ['required', 'email', 'max:254', 'unique:users,email'],
            'city' => ['required', 'string', 'max:100'],
            'experience' => ['required', Rule::in(array_keys(ChannelPartner::EXPERIENCE))],
            'rera_number' => ['nullable', 'string', 'max:100'],
            'password' => ['required', 'string', 'max:128', 'confirmed', Password::min(8)->letters()->numbers()],
            'terms' => ['accepted'],
            'terms_version' => ['required', Rule::in([PartnerTerms::version()])],
        ], ['terms_version.in' => 'The terms have been updated. Please review and accept the current terms.', 'terms_version.required' => 'Please review and accept the current terms.']);

        DB::transaction(function () use ($details) {
            $user = User::create(collect($details)->only(['name', 'email', 'password'])->all());
            $user->channelPartner()->create(collect($details)->only([
                'partner_type', 'agency_name', 'mobile', 'city', 'experience', 'rera_number',
            ])->all() + ['terms_accepted_at' => now(), 'terms_version' => PartnerTerms::version()]);
        });

        return redirect()->route('partners.login')->with('success', 'Registration received. Your account is awaiting admin approval. Once approved, log in using your email and password.');
    }

    public function login()
    {
        return view('partners.login');
    }

    public function authenticate(Request $request)
    {
        $request->merge(['email' => strtolower(trim((string) $request->input('email')))]);
        $details = $request->validate(['email' => ['required', 'email'], 'password' => ['required', 'string']]);
        $user = User::where('email', $details['email'])->where('is_admin', false)->whereHas('channelPartner')->first();
        if (! $user || ! Auth::validate($details + ['id' => $user->id])) {
            throw ValidationException::withMessages(['email' => 'These details do not match a partner account.']);
        }
        if ($user->channelPartner->status !== 'approved') {
            throw ValidationException::withMessages(['email' => 'Your account is '.strtolower(ChannelPartner::STATUSES[$user->channelPartner->status]).'. Please contact the Foothills team.']);
        }
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('partners.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('partners.login');
    }

    public function terms()
    {
        return view('partners.terms', ['termsDocument' => PartnerTerms::document()]);
    }

    public function updatePassword(Request $request)
    {
        abort_unless($request->user()->channelPartner && ! $request->user()->is_admin, 403);
        $details = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'max:128', 'confirmed', Password::min(8)->letters()->numbers()],
        ]);
        $request->user()->update(['password' => $details['password']]);
        $request->session()->regenerate();

        return redirect()->route('partners.security')->with('success', 'Your password has been updated.');
    }

    public function index()
    {
        return view('admin.partners.index', ['partners' => ChannelPartner::with('user')->latest()->paginate(20)]);
    }
}

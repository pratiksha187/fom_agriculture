<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CreateAdmin extends Command
{
    protected $signature = 'admin:create {email} {--name=Administrator} {--generate-password : Generate and display a secure initial password}';

    protected $description = 'Create an administrator account for the enquiry panel';

    public function handle(): int
    {
        $email = strtolower(trim($this->argument('email')));
        $password = $this->option('generate-password') ? Str::password(20, symbols: false) : $this->secret('Choose a password (at least 12 characters)');
        $details = ['email' => $email, 'name' => $this->option('name'), 'password' => $password];
        $validator = Validator::make($details, [
            'email' => ['required', 'email', 'max:254', 'unique:users,email'],
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:12', 'max:128'],
        ]);
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return self::FAILURE;
        }
        $user = new User($details);
        $user->is_admin = true;
        $user->save();
        $this->info('Administrator created: '.$email);
        if ($this->option('generate-password')) {
            $this->line('Initial password: '.$password);
        }
        $this->line('Sign in at /admin/login. You can change your password under Account.');

        return self::SUCCESS;
    }
}

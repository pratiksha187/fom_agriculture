<?php

require __DIR__.'/../vendor/autoload.php';
$app = require __DIR__.'/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
config(['session.driver' => 'array']);
$request = Illuminate\Http\Request::create('http://localhost/partners/commissions');
$app->instance('request', $request);
$request->setLaravelSession(app('session')->driver());
$request->session()->start();
$route = app('router')->getRoutes()->match($request);
$request->setRouteResolver(fn () => $route);
view()->share('errors', new Illuminate\Support\ViewErrorBag);
$user = new App\Models\User(['name' => 'Pratiksha Misal']);
$partner = new App\Models\ChannelPartner;
$partner->id = 7;
$partner->setRelation('user', $user);
$rows = [];
foreach (['eligible', 'processing', 'paid', 'on_hold', 'not_eligible'] as $index => $status) {
    $lead = new App\Models\PartnerLead(['buyer_name' => $index === 0 ? 'SWARAJYA CONSTRUCTION PRIVATE LIMITED' : ['Anita Patil', 'Rahul Deshmukh', 'Priya Shah', 'Vikram More'][($index - 1) % 4]]);
    $lead->id = $index + 1;
    $booking = new App\Models\PartnerBooking;
    $booking->forceFill(['id' => $index + 1, 'reference' => 'FOM-2026-00'.($index + 1), 'plot' => 'A-'.($index + 1), 'status' => 'reserved', 'commission_status' => $status, 'commission_amount' => $status === 'not_eligible' ? null : ($index + 1) * 2000, 'created_at' => now(), 'paid_at' => now(), 'payment_reference' => 'BANK-REF-1001']);
    $booking->setRelation('lead', $lead);
    $rows[] = $booking;
}
$bookings = new Illuminate\Pagination\LengthAwarePaginator($rows, count($rows), 10);
$html = view('partners.commissions', ['partner' => $partner, 'project' => config('project'), 'bookings' => $bookings, 'totals' => ['pending' => 6000, 'paid' => 6000, 'bookings' => 5]])->render();
$html = str_replace('http://localhost/', 'file:///C:/xampp/htdocs/fom_agriculture/public/', $html);
file_put_contents(__DIR__.'/commission-preview.html', $html);

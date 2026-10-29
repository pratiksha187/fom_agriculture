<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
@switch($name)
@case('dashboard')<rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>@break
@case('people')<circle cx="9" cy="8" r="3"/><path d="M3 21v-3a6 6 0 0 1 12 0v3M16 5a3 3 0 0 1 0 6M21 21v-3a6 6 0 0 0-4-5"/>@break
@case('calendar')<rect x="3" y="5" width="18" height="16" rx="2"/><path d="M7 3v5m10-5v5M3 11h18M7 15h2m4 0h2m-8 3h2"/>@break
@case('check')<circle cx="12" cy="12" r="9"/><path d="m8 12 3 3 5-6"/>@break
@case('home')<path d="m3 11 9-8 9 8M5 10v11h14V10M9 21v-7h6v7"/>@break
@case('wallet')<rect x="3" y="5" width="18" height="15" rx="2"/><path d="M3 8h18m-5 5h5v4h-5zM5 5V3h12"/>@break
@endswitch
</svg>

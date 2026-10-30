# Partner lead progress

Approved partners can open **My Leads → Update Status & Details** after login and choose New Lead, Visit Scheduled, Visit Completed, Booked, or Rejected. The dashboard and lead list show current progress and provide status filters. Each partner can view and update only their own leads.

Visit Scheduled requires a future date and time in Asia/Kolkata (IST). Dates are stored in UTC. Scheduling creates an appointment; rescheduling an active appointment updates it and records the new time in history. Visit Completed requires an existing elapsed appointment. A partner's completion update does not grant site-team verification. Moving away from an active scheduled visit cancels that appointment.

New submissions start at New Lead and receive a history entry. Changes record the previous and new progress, actor, timestamp, appointment time when relevant, and optional remarks. Repeated identical saves do not add an entry unless remarks are supplied. History is paginated, with newest updates first. Existing lead records keep their derived progress; their history begins with the first update after deployment. Earlier events are not reconstructed.

Admin review remains separate from sales progress. Admin rejection, visit updates, visit requests, and official booking changes also update progress history. Marking a lead Booked does not create an official booking, commission, payment, or site-team verification. The Booked Leads dashboard total includes partner-marked leads. The Bookings tab includes those leads immediately, with a note when project-team booking details are pending. Each lead appears once, with its official booking details when available; cancelled official records remain visible. The Commissions page continues to show the team's records.

## Deployment

Deploy the changed application, model, route, view, CSS, JS, and migration files together. From the application directory run:

```sh
php artisan migrate --force
php artisan optimize:clear
```

The migration adds nullable `partner_leads.progress_status` and the `partner_lead_status_histories` table. Existing leads are preserved. Resolve any older pending migration errors before enabling the updated portal. Do not use `migrate:fresh` on a populated database.

## Verification

Run `php vendor/phpunit/phpunit/phpunit`. Tests use the isolated in-memory SQLite database. Progress tests cover all five statuses, IST date validation, visit rescheduling, no-op saves, initial and subsequent history entries, ownership and approval checks, admin synchronization, and the separation from official bookings and verification.

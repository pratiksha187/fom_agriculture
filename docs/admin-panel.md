# Enquiry admin panel

The admin panel is available at `/admin`. Enquiries are saved to the configured database before the existing WhatsApp redirect. A saved submission does not confirm WhatsApp delivery or a site visit. Submissions made before database storage was added cannot be reconstructed from the old uploads.

## Initial setup

Use the normal project database configuration, then run:

```sh
php artisan migrate
php artisan admin:create your-email@example.com
```

The command prompts for a password with at least 12 characters. For an automatically generated initial password, add `--generate-password`. Passwords are hashed in the database. The command refuses to overwrite existing accounts. There is no public admin registration endpoint. Set the administrator's name with `--name="Your name"` if desired.

Sign in at `/admin/login`. Use **Account** to change the initial password and **Sign out** to end the session.

## Inbox

The inbox provides totals, search by name/phone/email/land location/survey number, type and status filters, and pagination. Open an enquiry to view its complete contact details, message, land information and document list. Statuses are New, Contacted and Closed.

To attach documents to a particular enquiry, open it and use **Upload documents** below the document list. All ten land-document categories are available for any enquiry type. Select one or more files and click **Add documents to enquiry**. Accepted formats are PDF, JPG and PNG, up to 2 MB per file and 6 MB per batch. Upload another batch to add more files later. New uploads append to the selected enquiry and keep existing documents, including earlier files in the same category. Uploads do not change the enquiry status or send a WhatsApp message.

Uploads stay on the private local disk. Admin downloads require an authenticated administrator and are scoped to their enquiry. The public links included in WhatsApp retain their existing seven-day expiry; admin downloads remain available after those links expire. Keep the database and `storage/app/private` together in backups. The panel does not automatically delete submissions or uploads.

## Validation

Run `php artisan test`. The tests use an isolated in-memory SQLite database and fake storage; they do not migrate or reset the configured live MySQL database.

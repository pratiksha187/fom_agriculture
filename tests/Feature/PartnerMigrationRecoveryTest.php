<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class PartnerMigrationRecoveryTest extends TestCase
{
    use RefreshDatabase;

    public function test_unrecorded_creation_migration_preserves_existing_partners(): void
    {
        $user = User::factory()->create();
        $partner = $user->channelPartner()->create([
            'partner_type' => 'individual', 'mobile' => '9876543210',
            'city' => 'Mumbai', 'experience' => '1_to_3', 'terms_accepted_at' => now(),
        ]);
        foreach ([
            '2026_10_29_000004_add_preferred_partner_visit_date',
            '2026_10_29_000003_create_partner_workspace_tables',
            '2026_10_29_000002_add_partner_terms_version',
        ] as $name) {
            if ($name === '2026_10_29_000003_create_partner_workspace_tables') {
                Schema::table('channel_partners', fn ($table) => $table->dropIndex(['status']));
            }
            $migration = require database_path('migrations/'.$name.'.php');
            $migration->down();
            DB::table('migrations')->where('migration', $name)->delete();
        }
        DB::table('migrations')->where('migration', '2026_10_29_000001_create_channel_partners_table')->delete();

        $this->artisan('migrate', ['--force' => true])->assertSuccessful();

        $this->assertDatabaseHas('channel_partners', ['id' => $partner->id, 'user_id' => $user->id, 'mobile' => '9876543210']);
        $this->assertDatabaseHas('migrations', ['migration' => '2026_10_29_000001_create_channel_partners_table']);
        $this->assertDatabaseHas('channel_partners', ['id' => $partner->id, 'status' => 'pending']);
        $this->assertTrue(Schema::hasColumn('channel_partners', 'terms_version'));
        $this->assertTrue(Schema::hasColumn('partner_leads', 'preferred_visit_date'));
    }

    public function test_incomplete_existing_table_is_not_silently_accepted(): void
    {
        Schema::table('channel_partners', fn ($table) => $table->dropColumn('rera_number'));
        $migration = require database_path('migrations/2026_10_29_000001_create_channel_partners_table.php');

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('missing required columns');
        $migration->up();
    }
}

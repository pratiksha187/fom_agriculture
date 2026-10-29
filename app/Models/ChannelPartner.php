<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChannelPartner extends Model
{
    public const STATUSES = ['pending' => 'Awaiting approval', 'approved' => 'Approved', 'rejected' => 'Rejected', 'suspended' => 'Suspended'];

    public function leads(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PartnerLead::class);
    }
    public const TYPES = ['individual' => 'Individual Broker', 'agency' => 'Real Estate Agency'];

    public const EXPERIENCE = ['new' => 'New to real estate', 'less_than_1' => 'Less than 1 year', '1_to_3' => '1–3 years', '3_to_5' => '3–5 years', '5_plus' => '5+ years'];

    protected $fillable = ['partner_type', 'agency_name', 'mobile', 'city', 'experience', 'rera_number', 'terms_accepted_at', 'terms_version'];

    public function getPartnerCodeAttribute(): string
    {
        return 'FOM-CP-'.str_pad((string) $this->id, 6, '0', STR_PAD_LEFT);
    }

    protected function casts(): array
    {
        return ['terms_accepted_at' => 'datetime', 'approved_at' => 'datetime'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

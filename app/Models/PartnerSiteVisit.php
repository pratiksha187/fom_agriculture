<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerSiteVisit extends Model
{
    public const STATUSES = ['requested' => 'Requested', 'scheduled' => 'Confirmed', 'completed' => 'Completed', 'cancelled' => 'Cancelled', 'missed' => 'Missed'];

    protected $fillable = ['scheduled_at', 'notes'];

    protected function casts(): array
    {
        return ['scheduled_at' => 'datetime'];
    }

    public function lead(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PartnerLead::class, 'partner_lead_id');
    }
}

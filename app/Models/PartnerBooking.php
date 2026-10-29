<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerBooking extends Model
{
    public const STATUSES = ['reserved' => 'Reserved', 'confirmed' => 'Confirmed', 'completed' => 'Completed', 'cancelled' => 'Cancelled'];
    public const COMMISSION_STATUSES = ['not_eligible' => 'Not yet eligible', 'eligible' => 'Eligible', 'processing' => 'Processing', 'paid' => 'Paid', 'on_hold' => 'On hold'];

    protected $guarded = ['id', 'partner_lead_id'];

    protected function casts(): array
    {
        return ['sale_amount' => 'decimal:2', 'commission_amount' => 'decimal:2', 'paid_at' => 'datetime'];
    }

    public function lead(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PartnerLead::class, 'partner_lead_id');
    }
}

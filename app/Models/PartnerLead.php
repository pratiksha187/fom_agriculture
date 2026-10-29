<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerLead extends Model
{
    public const STATUSES = ['new' => 'Awaiting review', 'accepted' => 'Accepted', 'contacted' => 'Contacted', 'duplicate_review' => 'Duplicate review', 'rejected' => 'Rejected', 'closed' => 'Closed'];

    protected $fillable = ['buyer_name', 'phone', 'email', 'city', 'requirements', 'buyer_consent_at', 'preferred_visit_date'];

    protected function casts(): array
    {
        return ['buyer_consent_at' => 'datetime', 'preferred_visit_date' => 'date'];
    }

    public function latestVisit(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(PartnerSiteVisit::class)->latestOfMany();
    }

    public function getLeadCodeAttribute(): string
    {
        return 'FOM-L-'.str_pad((string) $this->id, 5, '0', STR_PAD_LEFT);
    }

    public function getPipelineStatusAttribute(): string
    {
        if ($this->booking && $this->booking->status !== 'cancelled') {
            return 'booked';
        }
        return match ($this->latestVisit?->status) {
            'scheduled', 'requested' => 'scheduled',
            'completed' => 'completed',
            'missed' => 'missed',
            default => $this->status,
        };
    }

    public function getPipelineLabelAttribute(): string
    {
        return ['booked' => 'Booked', 'scheduled' => $this->latestVisit?->status === 'requested' ? 'Visit Requested' : 'Visit Scheduled', 'completed' => 'Visit Completed', 'missed' => 'No Show'][$this->pipeline_status] ?? self::STATUSES[$this->status];
    }

    public function partner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ChannelPartner::class, 'channel_partner_id');
    }

    public function visits(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PartnerSiteVisit::class);
    }

    public function booking(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(PartnerBooking::class);
    }
}

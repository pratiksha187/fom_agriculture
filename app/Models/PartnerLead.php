<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerLead extends Model
{
    public const PROGRESS_STATUSES = ['new' => 'New Lead', 'scheduled' => 'Visit Scheduled', 'completed' => 'Visit Completed', 'booked' => 'Booked', 'rejected' => 'Rejected'];

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
        if ($this->progress_status) {
            return $this->progress_status;
        }
        if ($this->booking && $this->booking->status !== 'cancelled') {
            return 'booked';
        }
        if ($this->status === 'rejected') {
            return 'rejected';
        }
        return match ($this->latestVisit?->status) {
            'scheduled', 'requested' => 'scheduled',
            'completed' => 'completed',
            'missed' => 'missed',
            default => 'new',
        };
    }

    public function getPipelineLabelAttribute(): string
    {
        return self::PROGRESS_STATUSES[$this->pipeline_status] ?? 'No Show';
    }

    public function statusHistory(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PartnerLeadStatusHistory::class);
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

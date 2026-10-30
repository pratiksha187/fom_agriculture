<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerLeadStatusHistory extends Model
{
    protected $fillable = ['changed_by', 'from_status', 'to_status', 'visit_at', 'notes'];

    protected function casts(): array
    {
        return ['visit_at' => 'datetime'];
    }

    public function actor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}

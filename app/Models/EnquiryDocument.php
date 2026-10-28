<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EnquiryDocument extends Model
{
    protected $fillable = ['category', 'label', 'path', 'original_name', 'size'];

    public function enquiry(): BelongsTo
    {
        return $this->belongsTo(Enquiry::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Enquiry extends Model
{
    public const TYPES = ['site_visit' => 'Site visit', 'land_registration' => 'Land registration'];

    public const STATUSES = ['new' => 'New', 'contacted' => 'Contacted', 'closed' => 'Closed'];

    protected $fillable = ['enquiry_type', 'full_name', 'phone', 'email', 'message', 'land_location', 'survey_number'];

    public function documents(): HasMany
    {
        return $this->hasMany(EnquiryDocument::class);
    }
}

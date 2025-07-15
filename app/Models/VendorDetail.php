<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VendorDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'company_name',
        'phone_number',
        'tax_identification_number',
        'cac_registration_number',
        'business_type',
        'terms_accepted',
        'agreed_terms_at',
        'certificate_of_incorporation',
        'tin_certificate',
        'company_profile',
        'past_project_evidence',
        'other_document',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'terms_accepted' => 'boolean',
        'agreed_terms_at' => 'datetime',
    ];

    /**
     * Get the user that owns the vendor details.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
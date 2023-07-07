<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;


    protected $fillable = [
        'company_type', 'company_name', 'company_number', 'email', 'first_name', 'last_name', 'country', 'phone', 'website', 'twitter', 'linkedin', 'facebook', 'organization_status', 'organization_description'
    ];

    protected $casts = [
        'oraganization_status' => 'array',
        
];

    protected function organizationStatus(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value),
            set: fn ($value) => json_encode($value),
        );
    }
}

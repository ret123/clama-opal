<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

   
    protected $fillable = [
        'item_description','cost'
    ];

    public function company() {
        return $this->belongsTo(Company::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['project_category','title','project_description','project_objective','project_outcome','jobs','sme','product_utilized','social_impact','beneficiaries','beneficiaries_description','target_group','capacity','governate','town','project_image','company_id'];

    public function company() {
        return $this->belongsTo(Company::class);
    }
}

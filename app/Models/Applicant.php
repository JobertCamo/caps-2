<?php

namespace App\Models;

use App\Models\Interview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Applicant extends Model
{
    /** @use HasFactory<\Database\Factories\ApplicantFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function interviews()
    {
        return $this->hasMany(Interview::class);
    }
}

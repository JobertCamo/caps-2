<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resignation extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'schedule' => 'datetime',
    ];

    public function user(){
        return $this->belongsTo(Resignation::class);
    }
}

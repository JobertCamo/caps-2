<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTask extends Model
{

    protected $guarded = ['id'];
    protected $table = 'completed_tasks';
    protected $casts = [
        'date_completed' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

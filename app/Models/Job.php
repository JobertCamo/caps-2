<?php

namespace App\Models;

use App\Models\User;
// use Illuminate\Datsabase\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Job extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // protected $keyType = 'string';
    // public $incrementing = false;

    public function tag(string $name): void
    {
        $tag = Tag::firstOrCreate(['name' => $name]);

        $this->tags()->attach($tag);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

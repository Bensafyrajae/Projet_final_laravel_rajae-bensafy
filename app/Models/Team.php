<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations as Relation;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        "image"
    ];

    public function owner(): Relation\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function members(): Relation\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'team_members');
    }


    public function invitations(){
        return $this->hasMany(Invite::class);
    }


    public function tasks(){
        return $this->hasMany(Task::class);
    }
}

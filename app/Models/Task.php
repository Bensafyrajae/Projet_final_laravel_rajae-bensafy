<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'name',
        'description',
        "status",
        "priority",
        'start',
        'end',
        'creator_id',
        'team_id',
    ];


    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
     public function team()
    {
        return $this->belongsTo(Team::class , 'team_id');
    }
}

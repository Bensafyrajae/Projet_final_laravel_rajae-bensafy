<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations as Relation;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verification_code',
        'double_auth',
    ];
    public function hasActiveSubscription(): bool
    {
        return $this->stripe_status === 'active';
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    

    public function tasks(): Relation\MorphMany
    {
        return $this->morphMany(Task::class, 'taskable');
    }

   
    public function ownedTeams()
    {
        return $this->hasMany(Team::class, 'user_id');
    }
   
}
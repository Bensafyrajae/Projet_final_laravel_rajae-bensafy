<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'recipient_id',
        'message',
        'seen',
    ];

    // Relation with sender
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // Relation with recipient
    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $guarded = [];

    // Define the relationships
    public function chats()
    {
        return $this->hasManyThrough(Chat::class, Message::class, 'session_id', 'message_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    // Methods for blocking and unblocking
    public function block()
    {
        $this->update([
            'block' => true,
            'blocked_by' => auth()->id()
        ]);
    }

    public function unblock()
    {
        $this->update([
            'block' => false,
            'blocked_by' => null
        ]);
    }

    // Methods to delete chats and messages
    public function deleteChats()
    {
        $this->chats()->where('user_id', auth()->id())->delete();
    }

    public function deleteMessages()
    {
        $this->messages()->delete();
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function event()
    {
        $this->belongsTo(Event::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}

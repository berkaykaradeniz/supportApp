<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketAnswers extends Model
{
    use HasFactory;

    protected $table = 'ticket_answers';

    protected $fillable =[
        'ticket_id', 'user_id', 'answer'
    ];

        /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'updated_at'
    ];
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Event_list extends Authenticatable
{
    protected $table = 'event_list';
    
}

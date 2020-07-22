<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
class Newsletter extends Model

{ use Notifiable;

  protected $table = 'newsletters';    //
}

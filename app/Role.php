<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//modelos

use App\User;

class Role extends Model
{
  public function users(){
    return $this->belongsToMany(User::class, 'roles_users')->withTimestamps();
  }
}

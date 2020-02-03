<?php

namespace UserM;


use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public function users(){
      return $this->belongsToMany('UserM\User');
    }

  public function hasAnyRoles($users){
        if($this->users()->whereIn('name', $users)->first()){
            return true;
        }

        return false;
    }

    public function hasRole($user){
        if($this->users()->where('name', $user)->first()){
            return true;
        }
        return false;
    }
}

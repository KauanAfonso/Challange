<?php

use App\Models\User;
use Illuminate\Database\Eloquent\Model;


class Agua extends Model{

    public function user(){
        return $this->belongsTo(User::Class);
    }

}

<?php
namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;


class Agua extends Model{
    protected $guarded = [];

    protected $table = "Agua";
    protected $filetable = ['user_id', 'quantidade'];
    public function user(){
        return $this->belongsTo(User::Class);
    }

}

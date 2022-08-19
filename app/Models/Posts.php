<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
    protected $guarded = ['id'];
    public $timestamps = false;

    // public function post_user(){
    //     return $this->hasOne(User::class, 'users_id', 'user_id');
    // }
}

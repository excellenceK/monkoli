<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    //
    protected $fillable=['name','message','email','phone','read_at','photo','subject','for_users'];
}

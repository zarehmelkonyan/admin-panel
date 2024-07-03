<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
            "first_name",
            "last_name" ,
            "email" ,
            "avatar" ,
            "position" ,
            "salary" ,
            "gender" ,
            "age"  ,
            "started_at" ,
            "slug"
    ];
}

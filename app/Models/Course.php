<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','duration','img','user_id'];

    function user(){
        return $this->belongsTo(User::class);
    }

    public function students(){
        return $this->belongsToMany(User::class);
    }
}

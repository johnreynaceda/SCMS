<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function seniors(){
        return $this->hasMany(SeniorCitizen::class);
    }
}

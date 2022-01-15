<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function senior(){
        return $this->belongsTo(SeniorCitizen::class,'id','id');
    }
    public function pensions(){
        return $this->hasMany(Pension::class);
    }
}

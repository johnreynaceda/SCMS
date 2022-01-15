<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeniorCitizen extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function member(){
        return $this->hasOne(Membership::class);
    }

    public function barangay(){
        return $this->belongsTo(Barangay::class);
    }

    public function attachments(){
        return $this->hasMany(Attachment::class);
    }
}

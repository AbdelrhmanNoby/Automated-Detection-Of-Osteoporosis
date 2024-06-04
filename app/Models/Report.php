<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
     protected $fillable = [
        'report_name',
        'diagnosis',
        'image',
        'report',
        'patient_id',
        'user_id',
        'report_date',
    ];

        public function patient(){
        return $this->belongsTo('App\Models\Patient');
    }

        public function user(){
        return $this->belongsTo('App\Models\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = [
        'user_id',
        'doctor_id',
        'health_insurance',
        'reference',
        'problem_description',
        'high_blood_pressure',
        'date'
        
    ];
    
   public function doctor()
  {
  	return $this->belongsTo(User::class);
  }
   public function user()
  {
  	return $this->belongsTo(User::class);
  }
 // In Prescription.php
    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'prescription_medicine')
                    ->withPivot(['dosage', 'duration', 'time', 'interval', 'comment']);
    }

    public function box()
    {
        return $this->belongsTo(Box::class);
    }
}

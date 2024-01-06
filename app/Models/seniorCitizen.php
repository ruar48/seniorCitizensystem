<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seniorCitizen extends Model
{

    protected $fillable = [
        'seniorID',
        'firstName',
        'middleName',
        'lastName',
        'gender',
        'birthday',
        'age',
        'birthPlace',
        'address',
        'contactNumber',
        'pensionstatus',
        'monthlyPension',
        'status',
        'emergencyContactPerson',
        'emergencyContactPersonNumber',
        'emergencyContactPersonAddress',

    ];

      // Accessor for the 'age' attribute
      public function getAgeAttribute()
      {
          return now()->diffInYears($this->attributes['birthday']);
      }
    use HasFactory;
}
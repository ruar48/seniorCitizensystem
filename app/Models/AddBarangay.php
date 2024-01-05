<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddBarangay extends Model
{
    protected $fillable = [
        'barangayName',
        'contactNumber',
        'email',
        'contactPerson',
        'contactPersonNumber',

    ];
    use HasFactory;
}
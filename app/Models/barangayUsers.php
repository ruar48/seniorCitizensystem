<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barangayUsers extends Model
{
    protected $fillable = [
        'barangayID',
        'fullName',
        'contactNumber',
        'userName',
        'password',

    ];


    public function barangay_information(){
        return $this->belongsTo(AddBarangay::class);
    }
    use HasFactory;
}

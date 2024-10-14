<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Import the Authenticatable class
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetails extends Authenticatable  // Extend Authenticatable
{
    use HasFactory, SoftDeletes;

    // Define the table name if it's different from the default plural form
    protected $table = 'userdetails';
    protected $primaryKey = 'user_id';

    // Specify the fillable fields
    protected $fillable = ['user_id', 'name', 'phone', 'dob', 'address', 'gender', 'profile_pic', 'documents'];

    // You can uncomment this method to format the date of birth (dob)
    /*
    public function getDobAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
    */
}

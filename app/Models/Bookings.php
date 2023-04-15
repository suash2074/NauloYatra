<?php

namespace App\Models;

use App\MultiVendorTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;
    protected $fillable = [
        'number',
        'user_id',
        'guide_name',
        'package_id',
        'email',
        'number_of_people',
        'arrival_date',
        'contact_number',
        'days',
        'trek_id',
        'total_amount',
        'advance_payment',  
        'payment_status',
        'trip_status',
        'status'
    ];

    public function user_info(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function guide_info(){
        return $this->hasOne(User::class, 'id', 'guide_name');
    }

    public function package_info(){
        return $this->hasOne(Packages::class, 'id', 'package_id');
    }

    public function trek_info(){
        return $this->hasOne(Trek::class, 'id', 'trek_id');
    }

    public function getRules($act = 'add')
    {
        $rules = [
            'user_id' => 'nullable|exists:users,id',
            'package_id' => 'nullable|exists:packages,id',
            // 'email' => 'required|string',
            'number_of_people' => 'required|integer',
            'arrival_date' => 'required|date',
            'contact_number' => 'required|integer',
            'days' => 'nullable|integer',
            'guide_name' => 'required|string',
            'trek_id' => 'nullable|exists:treks,id'
        ];

        return $rules;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package_details extends Model
{
    use HasFactory;
    protected $fillable = [
        'package_id',
        'trek_type',
        'days',
        'price_per_person',
        'category',
        'details',
        'link',
        'status'
    ];

    public function package_info(){
        return $this->hasOne(Packages::class, 'id', 'package_id');
    }

    public function getRules($act = 'add')
    {
        $rules = [
            'package_id' => 'nullable|exists:packages,id',
            'days' => 'required|integer',
            'price_per_person' => 'required|integer',
            'details' => 'required|string',
            'link' => 'nullable|string',
        ];

        return $rules;
    }
}

<?php

namespace App\Models;

use App\MultiVendorTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasFactory;
    use MultiVendorTrait;
    protected $fillable = [
        'user_id',
        'trek_id',
        'package_name',
        'status'
    ];

    public function user_info()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function trek_info()
    {
        return $this->hasOne(Trek::class, 'id', 'trek_id');
    }

    public function getRules($act = 'add')
    {
        $rules = [
            'user_id' => 'nullable|exists:users,id',
            'trek_id' => 'nullable|exists:treks,id',
            'package_name' => 'required|string'
        ];

        return $rules;
    }
}

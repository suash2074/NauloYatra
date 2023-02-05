<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'medicine_name',
        'illness_name',
        'status'
    ];

    public function getRules($act = 'add'){
        $rules = [
            'medicine_name' => 'required|string',
            'illness_name' => 'required|string'
        ];
        return $rules;
    }
}

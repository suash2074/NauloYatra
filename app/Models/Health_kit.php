<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Health_kit extends Model
{
    use HasFactory;
    protected $fillable = [
        'trek_id',
        'medicine_id',
        'status'
    ];

    public function trek_info(){
        return $this->hasOne(Trek::class, 'id', 'trek_id');
    }

    public function medicine_info(){
        return $this->hasOne(Medicine::class, 'id', 'medicine_id');
    }

    public function getRules($act = 'add')
    {
        $rules = [
            'trek_id' => 'nullable|exists:treks,id',
            'medicine_id' => 'nullable|exists:medicines,id',
        ];
        return $rules;
    }
}

<?php

namespace App\Models;

use App\MultiVendorTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'trek_id',
        'user_id',
        'text',
        'status'
    ];

    public function trek_info(){
        return $this->hasOne(Trek::class, 'id', 'trek_id');
    }

    public function user_info(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getRules($act = 'add')
    {
        $rules = [
            'trek_id' => 'nullable|exists:treks,id',
            'user_id' => 'nullable|exists:users,id',
            'text' => 'required|string'
        ];
        return $rules;
    }
}

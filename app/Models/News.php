<?php

namespace App\Models;

use App\MultiVendorTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    use MultiVendorTrait;

    protected $fillable = [
        'user_id',
        'headline',
        'short_description',
        'image',
        'status'
    ];

    public function user_info(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getRules($act = 'add')
    {
        $rules = [
            'user_id' => 'nullable|exists:users,id',
            'headline' => 'required|string',
            'short_description' => 'required|string',
            'image' => 'nullable|image|max:5120',
        ];

        if ($act == 'update') {
            $rules['image'] = 'sometimes|image|max:5120';
        }

        return $rules;
    }
}

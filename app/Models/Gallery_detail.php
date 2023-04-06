<?php

namespace App\Models;

use App\MultiVendorTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'gallery_image',
        'image_caption',
        'season',
        'status'
    ];

    public function user_info(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getRules($act = 'add')
    {
        $rules = [
            'user_id' => 'nullable|exists:users,id',
            'gallery_image' => 'nullable|image|max:5120',
            'image_caption' => 'required|string',
        ];

        if ($act == 'update') {
            $rules['gallery_image'] = 'sometimes|image|max:5120';
        }

        return $rules;
    }
}

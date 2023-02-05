<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'gallery_image',
        'image_caption',
        'season',
        'status'
    ];

    public function getRules($act = 'add')
    {
        $rules = [
            'gallery_image' => 'nullable|image|max:5120',
            'image_caption' => 'required|string',
        ];

        if ($act == 'update') {
            $rules['gallery_image'] = 'sometimes|image|max:5120';
        }

        return $rules;
    }
}

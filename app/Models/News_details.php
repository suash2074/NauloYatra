<?php

namespace App\Models;

use App\MultiVendorTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News_details extends Model
{
    use HasFactory;
    protected $fillable = [
        'news_id',
        'sub_headline',
        'description',
        'image',
        'link',
        'status'
    ];

    public function news_info(){
        return $this->hasOne(News::class, 'id', 'news_id');
    }

    public function getRules($act = 'add')
    {
        $rules = [
            'news_id' => 'nullable|exists:news,id',
            'sub_headline' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|max:5120',
            'link' => 'nullable|string',
        ];

        if ($act == 'update') {
            $rules['image'] = 'sometimes|image|max:5120';
        }

        return $rules;
    }
}

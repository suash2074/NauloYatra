<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About_section extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'trek_id',
        'description',
        'image',
        'note',
        'status'
    ];

    public function trek_info(){
        return $this->hasOne(Trek::class, 'id', 'trek_id');
    }


    public function getRules($act = 'add')
    {
        $rules = [
            'title' => 'required|string',
            'trek_id' => 'nullable|exists:treks,id',
            'description' => 'required|string',
            'image' => 'nullable|image|max:5120',
            'note' => 'nullable|string',
        ];

        if ($act == 'update') {
            $rules['image'] = 'sometimes|image|max:5120';
        }

        return $rules;
    }
}

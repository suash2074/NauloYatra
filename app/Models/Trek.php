<?php

namespace App\Models;

use App\MultiVendorTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trek extends Model
{
    use HasFactory;
    // use MultiVendorTrait;

    protected $fillable = [
        'trek_name',
        'user_id',
        'background_image',
        'trek_type',
        'duration',
        'track_difficulty',
        'average_budget',
        'best_season',
        'status'
    ];

    public function user_info(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getRules($act = 'add'){
        $rules = [
            'trek_name' => 'required|string',
            'user_id' => 'nullable|exists:users,id',
            'background_image' => 'nullable|image|max:5120',
            'duration' => 'required|integer',
            'average_budget' => 'required|integer'
        ];

        if($act == 'update'){
            $rules['background_image'] = 'sometimes|image|max:5120';
        }
        return $rules;
    }
}

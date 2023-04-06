<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;
    protected $fillable = [
        'trek_id',
        'route_name',
        'start_point',
        'path_coordinates',
        'status'
    ];

    public function trek_info()
    {
        return $this->hasOne(Trek::class, 'id', 'trek_id');
    }

    public function getRules($act = 'add')
    {
        $rules = [
            'trek_id' => 'nullable|exists:treks,id',
            'route_name' => 'required|string',
            'start_point' => 'required|string',
            'path_coordinates' => 'required|text',
        ];

        return $rules;
    }
}

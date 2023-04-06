<?php

namespace App\Models;

use App\MultiVendorTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'trek_id',
        'gallery_detail_id',
        'status'
    ];

    public function trek_info(){
        return $this->hasOne(Trek::class, 'id', 'trek_id');
    }

    public function gallery_info(){
        return $this->hasOne(Gallery_detail::class, 'id', 'gallery_detail_id');
    }

    public function getRules($act = 'add')
    {
        $rules = [
            'trek_id' => 'nullable|exists:treks,id',
            'gallery_detail_id' => 'nullable|exists:gallery_details,id',
        ];
        return $rules;
    }
}

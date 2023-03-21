<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

trait MultiVendorTrait
{

    public static function bootMultiVendorTrait()
    {
        if (auth()->check()) {
            if (auth()->user()->role !== 'admin') {
                static::addGlobalScope('user_id', function (Builder $builder) {
                    $builder->where('user_id', auth()->id());
                });
            }
        }
    }
}

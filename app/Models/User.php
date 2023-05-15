<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'address',
        'phone',
        'photo',
        'availability',
        'role',
        'cost_per_day',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRules($act = 'add')
    {
        $rules = [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'username' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string|min:8',
            'photo' => 'nullable|image|max:5120',
            'cost_per_day' => 'nullable|integer'
        ];

        if ($act == 'update') {
            $rules['photo'] = 'sometimes|image|max:5120';
        }

        return $rules;
    }
}

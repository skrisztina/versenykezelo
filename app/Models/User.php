<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    /**
     * Summary of table
     * @var string
     */
    protected $table = "users";
    /**
     * Summary of primaryKey
     * @var string
     */
    protected $primaryKey = "email";
    /**
     * Summary of incrementing
     * @var bool
     */
    public $incrementing = false;

    /**
     * Summary of timestamps
     * @var bool
     */
    public $timestamps = false;
    /**
     * Summary of keyType
     * @var string
     */
    protected $keyType = "string";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'telefonszam',
        'szul_ido',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'szul_ido'=> 'date',
        ];
    }
}

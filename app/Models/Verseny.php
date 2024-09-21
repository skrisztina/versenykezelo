<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verseny extends Model
{
    use HasFactory;

    /**
     * Summary of table
     * @var string
     */
    protected $table = "verseny";

    /**
     * 
     * @var array<string, int>
     */
    protected $primaryKey = ['nev', 'ev'];
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
     * Summary of fillable
     * @var array<int,string>
     */
    protected $fillable = [
        'nev',
        'ev',
        'helyszin',
        'nyelvek',
    ];

    public function fordulok(){
        return $this->hasMany(Fordulo::class,'verseny_nev','nev')->whereColumn('verseny_ev','ev');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versenyzo extends Model
{
    use HasFactory;

    /**
     * Summary of table
     * @var string
     */
    protected $table='versenyzo';

    /**
     * Summary of primaryKey
     * @var string
     */
    protected $primaryKey="email";

    /**
     * 
     * @var bool
     */
    public $incrementing=false;

    public $timestamps=false;

    /**
     * Summary of keyType
     * @var string
     */
    protected $keyType= "string";

    /**
     * Summary of fillable
     * @var array<int, string>
     */
    protected $fillable=[
        'nev',
        'email',
        'szul_ido',
        'rang',
        'versenyzes_kezdete',
    ];

    protected function casts(): array
    {
        return [
            'szul_ido'=> 'date',
            'versenyzes_kezdete'=> 'date',
        ];
    }

    public function fordulok()
    {
        return $this->belongsToMany(Fordulo::class, 'versenyez', 'versenyzo_email', 'fordulo_datum')->withPivot('verseny_nev', 'verseny_ev');  
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fordulo extends Model
{
    use HasFactory;
    /**
     * Summary of table
     * @var string
     */
    protected $table = "fordulo";
    /**
     * Summary of primaryKey
     * @var string
     */
    protected $primaryKey = "datum";
    /**
     * Summary of incrementing
     * @var bool
     */
    public $incrementing = false;

    /**
     * Summary of keyType
     * @var string
     */
    protected $keyType = "string";
    /**
     * Summary of timestamps
     * @var bool
     */
    public $timestamps = false;

    /**
     * Summary of fillable
     * @var array<string>
     */
    protected $fillable = [
        'nehezseg',
        'datum',
        'verseny_nev',
        'verseny_ev'
    ] ;

    /**
     * Summary of casts
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'datum'=> 'date',
        ];
    }

    public function verseny()
    {
        return $this->belongsTo(Verseny::class, 'verseny_nev', 'nev')->whereColumn('verseny_ev','ev');
    }

    public function versenyzok()
    {
        return $this->belongsToMany(Versenyzo::class, 'versenyez', 'fordulo_datum', 'versenyzo_email')->withPivot('verseny_nev', 'verseny_ev');
    }

}

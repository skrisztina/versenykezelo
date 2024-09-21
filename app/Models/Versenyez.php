<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versenyez extends Model
{
    use HasFactory;
    protected $table="versenyez";
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        "verseny_nev",
        "verseny_ev",
        "versenyzo_email",
        "fordulo_datum",
    ] ;

    public function fordulo()
    {
        return $this->belongsTo(Fordulo::class, 'fordulo_datum', 'datum')
                    ->where([
                        ['verseny_nev', $this->verseny_nev],
                        ['verseny_ev', $this->verseny_ev]
                    ]);
    }

    public function versenyzo()
    {
        return $this->belongsTo(Versenyzo::class, 'versenyzo_email', 'email');
    }
}

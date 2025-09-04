<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalonKlien extends Model
{
    protected $table = 'calon_klien';
    
    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'tahap',
        'sumber',
        'catatan'
    ];
}
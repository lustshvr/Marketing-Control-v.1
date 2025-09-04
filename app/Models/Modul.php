<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $table = 'modul';
    
    protected $fillable = [
        'kode',
        'nama',
        'deskripsi'
    ];
}
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Klien extends Model
{
    protected $table = 'klien';
    
    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'narahubung',
        'jenjang',
        'jumlah_siswa',
        'catatan',
        'tgl_mou'
    ];
}
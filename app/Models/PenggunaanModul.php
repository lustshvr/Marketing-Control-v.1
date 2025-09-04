<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenggunaanModul extends Model
{
    protected $table = 'penggunaan_modul';
    
    protected $fillable = [
        'klien_id',
        'modul_id',
        'tgl_mulai',
        'tgl_akhir',
        'pelatihan_terakhir',
        'catatan'
    ];

    public function klien(){
        return $this->belongsTo(Klien::class);
    }
    public function modul(){
        return $this->belongsTo(Modul::class);
    }
}
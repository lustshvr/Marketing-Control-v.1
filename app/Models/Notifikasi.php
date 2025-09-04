<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    protected $table = 'notifikasi';
    
    protected $fillable = [
        'tagihan_id',
        'saluran',
        'isi_pesan',
        'status',
        'terkirim_pada'
    ];

    public function tagihan(){
        return $this->belongsTo(TagihanKlien::class);
    }
}
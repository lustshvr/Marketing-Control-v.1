<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagihanKlien extends Model
{
    protected $table = 'tagihan_klien';
    
    protected $fillable = [
        'klien_id',
        'keterangan',
        'jumlah_tagihan',
        'jatuh_tempo',
        'jumlah_bayar',
        'dibayar_pada',
        'status'
    ];

    public function klien(){
        return $this->belongsTo(Klien::class);
    }
}
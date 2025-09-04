<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AktivitasProspek extends Model
{
    protected $table = 'aktivitas_prospek';
    
    protected $fillable = [
        'calon_id',
        'user_id',
        'tgl_aktivitas',
        'jenis',
        'hasil',
        'catatan'
    ];

    public function calon(){
        return $this->belongsTo(CalonKlien::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
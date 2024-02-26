<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $fillable=[
      'id_guru','nama_mapel'
    ];

    public function gurus()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }
}

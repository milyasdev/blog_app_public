<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelModel extends Model
{
    use HasFactory;
    protected $table = 'db_artikel';
    protected $primaryKey = 'id';
    protected $fillable = ['judul', 'text', 'jml_comment', 'kategori', 'foto', 'status', 'view_count'];

    public function comments(){
        return $this->hasMany(KomentarModel::class, 'id_artikel');
    }
}
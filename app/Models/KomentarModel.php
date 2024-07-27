<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarModel extends Model
{
    use HasFactory;
    protected $table = 'db_comment';
    protected $primaryKey = 'id';
    protected $fillable = ['id_artikel', 'nama', 'email', 'komentar'];
}
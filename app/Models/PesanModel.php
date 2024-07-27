<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanModel extends Model
{
    use HasFactory;
    protected $table = 'db_pesan';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_pengirim', 'email_pengirim', 'wa_pengirim', 'pesan_pengirim'];
}
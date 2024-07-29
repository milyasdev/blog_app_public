<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPortofolio extends Model
{
    use HasFactory;
    protected $table = 'db_portfolio';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'url'];
}
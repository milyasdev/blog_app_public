<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    use HasFactory;
    protected $table = 'db_banner';
    protected $primaryKey = 'id';
    protected $fillable = ['banner'];
}
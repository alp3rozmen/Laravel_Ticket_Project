<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    use HasFactory;

    protected $fillable = ['id','user_id','explanation','category','status','created_at','updated_at'];
    protected $table = 'tickets'; // Veritabanı tablosu adı
    protected $primaryKey = 'id'; // Tablo üzerindeki birincil anahtar sütunu adı
}

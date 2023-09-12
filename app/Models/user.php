<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','email','email_verified_at','password','remember_token','created_at','updated_at'];

    protected $table = 'users'; // Veritabanı tablosu adı
    protected $primaryKey = 'id'; // Tablo üzerindeki birincil anahtar sütunu adı

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $connection = 'mysql_regis';
    protected $table = 'mahasiswa';
    protected $fillable = ['mhsTanggalLahir'];

    protected $primaryKey = 'mhsId';
    public $incrementing = false;
}

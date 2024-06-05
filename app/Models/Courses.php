<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory; 
    protected $table = 'courses';

     //mendefinisikan kolom yang boleh diisi
     protected $fillable = ['id', 'name', 'category', 'desc'];
}

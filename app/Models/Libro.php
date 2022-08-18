<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descripcion', 'cantidad_paginas', 'autor', 'editorial', 'fecha_publicacion', 'activa'];
}
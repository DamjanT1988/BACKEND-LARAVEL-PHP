<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class otherlibrary extends Model
{
    use HasFactory;

        //skapa tabell
        protected $table = 'otherlibraries';
        //skapa fält för ifyllnad
        protected $fillable = ['securitykey'];
}

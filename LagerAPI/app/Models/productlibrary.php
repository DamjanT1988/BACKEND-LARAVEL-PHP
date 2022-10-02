<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productlibrary extends Model
{
    use HasFactory;
    //skapa tabell
    protected $table = 'productlibraries';
    //skapa fält för ifyllnad
    protected $fillable = ['product_title', 'product_description', 'price', 'amount_storage', 'expiration_date', 'image_file_path', 'image_alt'];
}

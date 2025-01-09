<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    
    protected $fillable=['category_id', 'content'];
    
    public function category()
    {
        return $this->belongTo(category::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    
    protected $fillable = [ 'category_id','first_name','last_name','gender','email','tel','address','building','detail'];
    
    /*public static $rules = array(
        'first_name'=>'required',
        'last_name'=>'required',
        'gender'=>'required',
        'email'=>'required',
        'tel'=>'required',
        'address'=>'required',
        'building'=>'nullable',
        'detail'=>'required|max:120'
    );*/

    
    public function category()
    {
        return $this->belongTo(category::class, 'category_id');
    }

}

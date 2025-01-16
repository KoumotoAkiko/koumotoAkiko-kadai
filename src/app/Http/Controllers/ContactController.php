<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;


class ContactController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('index',compact('categories'));
    }
     public function confirm(ContactRequest $request){
        $contact=$request->only(['first_name','last_name','gender','email','tel','address','building','detail','content', 'category_id']);
        return view('confirm', compact('contact'));
     }
    public function store(Request $request){
        $contact=$request->only(['first_name', 'last_name' ,'gender','email','tel','address','building','detail','content', 'category_id']);
        Contact::create($contact);
        Category::create($category);
        return view('thanks');
    }
    
    public function create()
    {
        $categories = Category::all();
        return view('contact.create', compact('categories'));
        }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;


class ContactController extends Controller
{
    public function index(){
        $contacts=Contact::with('categories')->get();
        $categories=Category::all();
        return view('index',compact('contacts', 'categories'));
    }
     public function confirm(ContactRequest $request){
        $contact=$request->only(['first_name','last_name','gender','email','tel','address','building','detail','category']);
        return view('confirm', compact('contact'));
     }
    public function store(ContactRequest $request){
        $contact=$request->only(['first_name', 'last_name' ,'gender','email','tel','address','building','detail','category_id','content']);
        contact::create($contact);
        return view('thanks');
    }
    
    public function create()
    {
        $categories = Category::all();
        return view('contact.create', compact('categories'));
        }



}
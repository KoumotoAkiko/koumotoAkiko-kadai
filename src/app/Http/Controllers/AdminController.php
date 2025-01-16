<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{

    public function index(){
        $categories = Category::all();
        return view('admin',compact('categories'));
    }
    public function admin(){
        $contacts=Contact::simplePaginate(7);
        return view('admin', ['contacts'=> $contacts]);
    }



    public function search(Request $request)
    {
     $NameSearch=$request->get('name');
     $EmailSearch=$request->get('email');
     $GenderSearch=$request->get('gender');
     $CategorySearch=$request->get('category');
     $StartDateSearch=$request->get('start_date');
     $EndDateSearch=$request->get('end_date');

     return view('admin',compact('contents'));

    }
}



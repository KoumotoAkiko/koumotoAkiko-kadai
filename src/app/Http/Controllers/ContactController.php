<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Genre;
use Illuminate\Support\Facades\Date;
use Illuminate\Component\HttpFoundation\StreamedResponse;


class ContactController extends Controller
{
    public function index(){
        $categories = Category::all();
        $genres = Genre::all();
        return view('contact',compact('categories' , 'genres'));
    }
     public function confirm(ContactRequest $request){
        $contacts=$request->all();
        $category=Category::find($request->category_id);
        $genres=Genre::whereIn('id',$request->genres)->get();


        return view('confirm', compact('contacts','category','genres') );
     }

    public function store(ContactRequest $request)
    {
        if($request->has('back')){
            return redirect('/')->withInput();
        }

        $request['tell']=$request->tel_1 . $request->tel_2 . $request->tel_3;
        $contact=Contact::create(
            $request->only([
                'category_id',
                'genre_id',
                'first_name',
                'last_name',
                'gender',
                'email',
                'tell',
                'address',
                'building',
                'detail'
            ])
            );
            $contact->genres()->attach($request->genres);
            

            return view('thanks');

    }
    
    public function admin()
    {
        $contacts=Contact::with('category')->paginate(7);
        $categories=Category::all();
        $csvData=Contact::all();
        return view('admin', compact('contacts','categories','csvData'));

}

public function search(Request $request)
{
    if($request->has('reset')){
        return redirect('/admin')->withInput();
    }
    $query =Contact::query();

    $query =$this->getSearchQuery($request, $query);

    $contacts=$query->paginate(7);
    $csvData=$query->get();
    $categories=Category::all();
    return view('admin', compact('contacts','categories', 'csvData'));
}

public function destroy(Request $request)
{
    Contact::find($request->id)->delete();
    return redirect('/admin');
}

public function export(Request $request)
{
    $query=Contact::query();

    $query=$this->getSearchQuery($request, $query);

    $csvDate=$query->get()->toArray();

    $csvHeader=[
        'id','category_id','first_name','last_name','gender','email','tel','address','building','created_at','updated_at'
    ];

    $response=new StreamedResponse(function ()use ($csvHeader,$csvData){
        $createCsvFile=fopen('php://output', 'W');

        mb_convert_variables('SJIS-win', 'UTF-8', $csvHeader);

        fputcsv($createCsvFile, $csvHeader);

        foreach ($csvData as $csv){
            $csv['created_at']=Date::make($csv['created_at'])->setTimezone('Asia/Tokyo')->forma('Y/m/d H:i:s');
            $csv['updated_at']=Date::make($csv['updated_at'])->setTimezone('Asia/Tokyo')->forma('Y/m/d H:i:s');
            fputcsv($createCsvFile, $csv);
        }

        fclose($createCsvFile);
    },200,[
        'Content-Type'=>'text/csv',
        'Content-Disposition'=>'attachment; filename="contacts.csv"',
    ]);
    return $response;
    }

    private function getSearchQuery($request, $query)
    {
        if(!empty($request->keyword)){
            $query->where(function ($q) use ($request){
                $q->where('first_name', 'like','%' . $request->keyword . '%')
                ->orWhere('last_name', 'like', '%' . $request->keyword . '%')
                ->orWhere('email', 'like', '%' . $request->keyword . '%');
            });
        }

        if(!empty($request->gender)){
            $query->where('gender' , '=' , $request->gender);
        }

        if(!empty($request->category_id)){
            $query->where('gender' , '=', $request->category_id);
        }

        if(!empty($request->date)){
            $query->whereDate('created_at' , '=' , $request->date);
        }
    }

}
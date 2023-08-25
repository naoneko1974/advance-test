<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index() {
        return view('index');
    }

    public function confirm(ContactRequest $request){
        $contacts = $request->only(['first-name','last-name','gender','email','postcode','address','building_name','opinion']);
        return view('confirm',compact('contacts'));
    }

    public function store(Request $request){
        $contacts = $request->only(['fullname','gender','email','postcode','address','building_name','opinion']);
        Contact::create($contacts);
        return view('thanks');
    }

    public function manage(){
        // $contacts = Contact::all();
        $contacts = Contact::Paginate(10);
        return view('manage',compact('contacts'));
    }

    public function search(Request $request){

        $start_date_keyword = $request->input('start_date_keyword');
        $end_date_keyword = $request->input('end_date_keyword');

        $contacts = Contact::NameSearch($request->name_keyword)->GenderSearch($request->gender_keyword)->DateSearch($start_date_keyword, $end_date_keyword)->EmailSearch($request->email_keyword)->paginate(10);
        return view('manage',compact('contacts'));
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('manage')->with('message', '削除しました');
    }

}

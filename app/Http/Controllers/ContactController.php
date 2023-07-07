<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContactRequest;

class ContactController extends Controller
{
    public function contact(){
     $contact = Contact::all();
     return response()-> json(
        [
          'contacts' => $contact,
          'message' => 'contacts',
          'code' => 200
        ]
        );
    }
    public function store(StoreContactRequest $request){
        $request->validated($request->all());
        $contact = Contact::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'designation' => $request->designation,
                'contact_no' => $request->contact_no,

            ]
            );
            return response()->json([
                'message'=>'contact created succesfully',
                'contact'=>$contact,
                'code'=>200
            ]);
    }
}

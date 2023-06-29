<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $contact = Contact::all();
        return view('home', compact('contact'));
    }
    public function search(Request $request)
    {
        $output = "";
        $contact=Contact::where('name','LIKE','%'.$request->search.'%')->orWhere('email','LIKE','%'.$request->search.'%')->get();

        foreach($contact as $contact){
            $output.= '<tr>
                <td>'.$contact->name.'</td>
                <td>'.$contact->email.'</td>
                <td>'.$contact->number.'</td>
                <td>
                <form action="'.route('contact.destroy', $contact->id).'" method="POST" style="display: inline-block;">
                    '.csrf_field().'
                    '.method_field('DELETE').'
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="'.route('contact.show', $contact->id).'" class="btn btn-primary">Edit</a>
                </td>'
                ;}
            return response($output);
    }
}

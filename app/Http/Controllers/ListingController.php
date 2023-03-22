<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ListingController extends Controller
{
    //show All listings
    public function index()
    {
        //dd(request()->tag);
        return view('listings.index', [
           // 'listings' => Listing::all()
            //'listings' => Listing::latest()->get()
            // taka se listvat all
            //'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
            // add pagination
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(2)
        ]);
    }

    //show Single listing
    public function show(Listing $listing){
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Show CREATE form
    public function create()
    {
            return view('listings.create');
    }

    //Store Listing Data from POST form
    public function store(Request $request){
       // dd($request->all());
        $formFields = $request->validate([
            'title'=> 'required',
            // to be UNIQIE in DB => Rule::unique(db.table, table.field)
            'company'=> ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        // dali imame postnat file ot pole LOGO
        if($request->hasFile('logo')){
                                                                    // v podpapka "logos"
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }



    // Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing

}

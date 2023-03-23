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
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
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

        // Add Logged User id to the post
        $formFields['user_id'] = auth()->id();

        // dali imame postnat file ot pole LOGO
        if($request->hasFile('logo')){
                                                                    // v podpapka "logos"
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Listing::create($formFields);

        return redirect('/listings/manage')->with('message', 'Listing created successfully!');
    }

    /** SHOW Edit FORM */
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }


    /** Update Listing Data   */
    public function update(Request $request, Listing $listing){
        // dd($request->all());

        // Make sure logged in user is owner
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'title'=> 'required',
            // to be UNIQIE in DB => Rule::unique(db.table, table.field)
            'company'=> ['required'],
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

        $listing->update($formFields);

        return back()->with('message', 'Listing updated successfully!');
    }

    // Delete listing
    public function delete(Listing $listing)
    {
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $listing->delete();
        return redirect('/listings/manage')->with('message', 'Listing Deleted successfully!');
    }


    public function manage()
    {
        // generate Manage Posts i podavame user-a za filter
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
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

<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //show All listings
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::all()
        ]);
    }

    //show Single listing
    public function show(Listing $listing){
        return view('listing.show', [
            'listing' => $listing
        ]);
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

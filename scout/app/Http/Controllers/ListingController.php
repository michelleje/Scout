<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ListingController extends Controller
{
    public function index(Request $request)
    {
      $query = DB::table('property_listings');
          IF ($request->query('search')){
              $query->where('property_name', '=', $request->query('search'));
              $query->orWhere('property_address', '=', $request->query('search'));
          }
  
        $listings = $query->get();
  
      return view('results', [
        'listings' => $listings,
        'search' => $request->query('search')
             ]);
    }
}

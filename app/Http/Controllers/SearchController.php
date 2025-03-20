<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Replace with your actual model

class SearchController extends Controller
{
    public function index(Request $request)
     {

        dd($request->all()); // Debug incoming data
        $query = $request->input('search_bar');

        if ($query) {
            $items = Item::where('name', 'LIKE', "%{$query}%")->get();
            return view('search_results', compact('items'));
        }
             
        return response()->json(['message' => 'No results found'], 200);
    }
}

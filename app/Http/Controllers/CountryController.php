<?php
namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $countries = Country::where('title_en', 'like', "%$search%")->get();
        return response()->json($countries);
    }
}

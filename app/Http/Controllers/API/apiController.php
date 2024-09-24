<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;

class apiController extends Controller
{
    public function category()
    {
        $category = Category::all();
        if(!is_null($category))
        {
            return response()->json($category);
        }
    }
}

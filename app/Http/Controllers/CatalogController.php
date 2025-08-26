<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $base = Product::query()
            ->published()
            ->recent()
            ->with(['images', 'attributeValues.attribute']);

        $men = (clone $base)->gender('men')->limit(12)->get();
        $women = (clone $base)->gender('women')->limit(12)->get();

        return view('home', compact('men', 'women'));
    }
}

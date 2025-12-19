<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class ItemController extends Controller
{
    public function index()
    {

        return view('items.v1.index');
    }

    public function categoriesList()
    {
        $categories = User::all();
        return view('items.v1.partials.categoriesList', compact('categories'));
    }
}

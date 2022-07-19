<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $specials = Category::where("name", "specials")->first();
        return view("welcome", compact("specials"));
    }
    public function thankyou(User $user) {

        return view("thankyou", compact("user"));
    }
}

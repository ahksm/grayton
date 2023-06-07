<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function changeLanguage(Request $request)
    {
        $locale = $request->input('locale');
        session(['locale' => $locale]);
        return redirect()->back();
    }
}

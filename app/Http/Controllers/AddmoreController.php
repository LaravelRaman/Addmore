<?php

namespace App\Http\Controllers;

use App\Models\Addmore;
use Illuminate\Http\Request;

class AddmoreController extends Controller
{
    public function add_more_post(Request $request)
    {
        $request->validate([
            'addMoreInputFields.*.subject' => 'required',
            'addMoreInputFields.*.code' => 'required'
        ]);

        foreach ($request->addMoreInputFields as $key => $value) {
            Addmore::create($value);
        }

        return back()->with('success', 'New subject has been added.');
    }
}

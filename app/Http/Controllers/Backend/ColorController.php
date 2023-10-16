<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColorController extends Controller
{
    public function index_color()
    {
        $colors = Color::all();
        return view('admin.setup.color.index', compact('colors'));
    }

    public function store_color(Request $request)
    {
        $request->validate([
            'color_name' => 'required',
            'color_code' => 'required',
            'status' => 'required',
        ]);

        $result = Color::create([
            'name' => $request->color_name,
            'code' => $request->color_code,
            'status' => $request->status,
            'user_id' => Auth::user()->id,
        ]);

        if ($result) {
            return back()->with('success', 'Color Create Successfully!');
        } else {
            return back()->with('error', 'Something is Worng!');
        }
    }

    public function destroy_color(Color $color)
    {
        $color->delete();

        return back()->with('success', 'Color Successfully Deleted');
    }
}

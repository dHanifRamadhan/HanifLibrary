<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoinsController extends Controller
{
    public function index()
    {
        $data = DB::table('coins')->whereNull('deleted_at')->get();
        return view('admin.coins.index', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'picture' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $path = strval(rand(0000,9999)) . '-' . str_replace(' ', '', $request->file('picture')->getClientOriginalName());
        $picture = $request->picture->storeAs('image/coins'. $path);

        DB::table('coins')->insert([
            'qty' => $request->qty,
            'price' => $request->price,
            'picture' => $picture,
            'created_at' => now()
        ]);

        return redirect()->route('coin.index')->with('success', (object)[
            'title' => 'Successful',
            'message' => 'Successfully created coins for marketplace!'
        ]);
    }

    public function delete($id) {
        DB::table('coins')->where('id', $id)->update([
            'deleted_at' => now()
        ]);

        return redirect()->route('coin.index')->with('success', (object)[
            'title' => 'Successful',
            'message' => 'Successfully deleted coins'
        ]);
    }
}

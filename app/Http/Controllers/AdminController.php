<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Koncert;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function admin() {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        return view('admin.index');
    }

    public function createpage(Request $request) {
        $categorys = Category::all();
        return view('admin.create', compact('categorys'));
    }

    public function create(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:4000',
            'price' => 'required',
            'category' => 'required',
        ]);

        $data['category'] = $request->input('category');
        Item::create($data);
        return redirect()->route('admin');
    }
    public function editpage() {
        $items = Item::all();
        return view('admin.editpage', compact('items'));
    }

    public function editall(item $item)
    {
        return view('admin.editall', compact('item'));
    }

    public function edit(Request $request, item $item) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:4000',
            'price' => 'required',
        ]);
        $item->update($data);
        return redirect()->route('admin');
    }

    public function delete(item $item) {
        $item->delete();
        return redirect()->route('admin');
    }

    public function konc() {
        return view('admin.konc');
    }

    public function koncstore(Request $request) {
        $data = $request->validate([
           'name' => 'required|string|max:255',
           'description' => 'required|string|max:255',
           'quantity' => 'required|string|max:255',
           'price' => 'required|string|max:255',
           'date' => 'required|string|max:255',
        ]);

        Koncert::create($data);
        return redirect()->route('admin');
    }

}

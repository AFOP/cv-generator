<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('/components.item', ['items' => $items]);
    }

    public function show()
    {
        return view('/components.item');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3'
        ], [
            'title.required' => 'El título es obligatorio'
        ]);

        $items = new Item;
        $items->title = $request->title;
        $items->save();

        return redirect()->route('item')->with('success', 'Item creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        $item->title = $request->input('title');
        $item->save();

        return redirect()->route('item')->with('success', 'Item editado correctamente');
    }

    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();

        return redirect()->route('item')->with('success', 'Item eliminado correctamente');
    }
}

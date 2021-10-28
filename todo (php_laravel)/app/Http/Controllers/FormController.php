<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class FormController extends Controller
{
   public function create()
   {
      return view('todo.form');
   }

   /**** use With & [Session in BladeFile] ****/
   public function store(Request $request)
   {
      $request->validate([
         'name' => 'required|min:3|max:50',
         'price' => 'required|integer|min:1|max:100000',
         'stock' => 'required|integer|min:1|max:10'
      ]);
      $item = new Item();
      $item->name = $request->name;
      $item->price = $request->price;
      $item->stock = $request->stock;
      $item->save();

      return redirect()->route('form.create')->with('status', $request->name . ' is added.');
   }

   public function destroy($id)
   {
      $currentItem = Item::find($id);
      $currentItemName = $currentItem->name;
      $currentItem->delete();
      return redirect()->route('form.create')->with('destroyStatus', $currentItemName . ' is Deleted.');
   }

   public function edit($id)
   {
      $currentItem = Item::find($id);
      return view('todo.edit', compact('currentItem'));
   }

   public function update($id, Request $request)
   {
      $currentItem = Item::find($id);
      $currentItem->name = $request->name;
      $currentItem->price = $request->price;
      $currentItem->stock = $request->stock;
      $currentItem->update();

      return redirect()->route('form.create')->with('updateStatus', $currentItem->name . ' is Updated');
   }

}



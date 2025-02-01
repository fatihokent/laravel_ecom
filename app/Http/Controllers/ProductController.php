<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){ 
        $produits = Produit::all();
        return View ("produits.index", compact('produits'));
    }
    public function show ($id){
        $produit = Produit::find($id);
        return View ("produits.show", compact('produit'));
    }

    public function create(){
        return View ("produits.create");
    }
    
    public function store(Request $request){
        Produit::create($request->all());
        return redirect()->route ('produits.index');
    }

    public function edit ($id){
        $produit = Produit::find($id);
        return View ("produits.edit", compact('produit'));
    }

    public function update (Request $request, $id){
        $produit = Produit::find($id);
        $produit->update($request->all());
        return redirect()->route ('produits.index');
    }

    public function destroy ($id){
        $produit = Produit::find($id);
        $produit->delete();
        return redirect()->route ('produits.index');
    }

    public function search(Request $request){
        $query = $request->input('query', '');
        if ($query === '') {
            $produits = Produit::all();
        } else {
            $produits = Produit::where('nom', 'LIKE', '%' . $query . '%')->get();
        }

        return response()->json($produits);
    }
}

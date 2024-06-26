<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    public function create(){

        return view('product.create');

    }

    public function store(ProductRequest $request){

        $name = $request->name;
        $description = $request->description;
        $price = $request->price;
        $img= null;

        if ($request->file('img')){
            $img = $request->file('img')->store('public/img');// metodo file mi cattura il file della request perche è un file piu complesso ed il medoto store me lo va a salvare nella cartella img che sta dentro a public
        }

        Product::create([
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'img' => $request->has('img') ? $request->file('img')->store('public/img') : 'img/default.png',
            'user_id'=> Auth::user()->id
        ]);

        return redirect()->back()->with('message', 'Prodotto inserito');
    }

    public function index(){

        $products = Product::all();

        return view('product.index' , ['products' => $products]);

    }

    public function show(Product $product)
    {
        return view('product.show' , compact('product'));
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        //condizione se metto l immagine o meno
        if($request->file('img')){
            $img = $request->file('img')->store('public/img');
        }
        else{
            $img = $product->img;
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'img' => $img
        ]);

        return redirect(route('product.index'))->with('message', 'prodotto modificato'); //ritorno all pagina index degli articoli
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('message', 'prodotto eliminato');
    }
}

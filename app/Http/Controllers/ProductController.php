<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // GET /api/products - Menampilkan daftar produk
    public function index()
    {
        // return nya harus gini ser. jangan langsung datanya hmmmm
        return response()->json(Product::all());
    }

    // POST /api/products - Menambahkan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:150',
            'category' => 'required|string|max:100',
            'price' => 'required|numeric',
        ]);

        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    // GET /api/products/{id} - Menampilkan produk berdasarkan ID
    public function show($id)
    {
        $product = Product::find($id);
        if(empty($product)) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json($product);
    }

    // PUT /api/products/{id} - Update produk berdasarkan ID
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->update($request->all());
            return $product;
        }

        return response()->json(['message' => 'Product not found'], 404);
    }

    // DELETE /api/products/{id} - Hapus produk berdasarkan ID
    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return response()->json(['message' => 'Product deleted']);
        }

        return response()->json(['message' => 'Product not found'], 404);
    }
}
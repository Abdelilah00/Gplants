<?php

namespace App\Http\Controllers;

use App\Catégorie;
use App\Color;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('ProductId', 'desc')->paginate(12);
        return view('pages.shop')->with('products', $products);
    }

    public function havingFilters(Request $request)
    {
        if ($request->ajax()) {
            $categories = $request->filters[0];
            $colors = $request->filters[1];
            $minPrice = $request->minPrice;
            $maxPrice = $request->maxPrice;

            if (count($categories) == 1)
                $categories = Catégorie::orderBy('CatégorieId')->get('CatégorieId');
            if (count($colors) == 1)
                $colors = Color::orderBy('ColorId')->get('ColorId');


            $ids = array();
            $products = DB::table('products')
                ->whereIn('CatégorieId', $categories)
                ->WhereIn('ColorId', $colors)
                ->whereBetween('Prix', [$minPrice, $maxPrice])
                ->join('in_catégorie', 'in_catégorie.ProductId', '=', 'products.ProductId')
                ->join('have_a_color', 'have_a_color.ProductId', '=', 'products.ProductId')->get('Products.ProductId');

            foreach ($products as $Key => $product) {
                array_push($ids, $product->ProductId);
            }
            $products = Product::whereIn('ProductId', $ids)->get();
            return Response(view('ajax.products')->with('products', $products));
        }
    }

    public function havingCategories(Request $request)
    {
        $ids = array();
        $products = DB::table('products')
            ->whereIn('CatégorieId', $request->filters)
            ->join('in_catégorie', 'in_catégorie.ProductId', '=', 'products.ProductId')->get('Products.ProductId');

        foreach ($products as $Key => $product) {
            array_push($ids, $product->ProductId);
        }

        $products = Product::whereIn('ProductId', $ids)->get();
        return Response(view('ajax.products')->with('products', $products));

    }

    public function havingColors(Request $request)
    {
        $ids = array();
        $products = DB::table('products')
            ->WhereIn('ColorId', $request->filters)
            ->join('have_a_color', 'have_a_color.ProductId', '=', 'products.ProductId')->get('Products.ProductId');

        foreach ($products as $Key => $product) {
            array_push($ids, $product->ProductId);
        }

        $products = Product::whereIn('ProductId', $ids)->get();
        return Response(view('ajax.products')->with('products', $products));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('pages.product-details')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

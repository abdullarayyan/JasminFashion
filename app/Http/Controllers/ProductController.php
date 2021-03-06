<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::select("*")->orderBy("id", "desc");
        $status = $request->input('status', 0);
        $model = $request->input('model', NULL);
        $name = $request->input('name', NULL);
        $code = $request->input('code', NULL);
        switch ($status) {
            case '1':
                $products->where("status", 1);
                break;
            case '2':
                $products->where("status", 0);
                break;
        }
        if ($model) {
            $products->where("model", "LIKE", "%$model%");
        }
        if ($code) {
            $products->where("code", "LIKE", "%$code%");
        }
        if ($name) {
            $products->where("name", "LIKE", "%$name%");
        }
        $products = $products->paginate(5);
        return view("products.index")->with("products", $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {

        $product = new Product();

        return view('products.create_edit')->with(compact('product'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
//        dd($request->all());

        $this->validate($request, [
            'name' => 'required',
            'color' => 'required',
            'description' => 'required',
            'size' => 'required',
            'sale' => 'required',
            'status' => 'required',
            'model' => 'required',
            'code' => 'required',
            'price' => 'required',

            'file' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png',
                'max:1024'
            ],
        ]);

//        dd($request->file('file')->extension());

        $data = $request->except(['_token']);
        $data['quantity']=mt_rand(1000, 9999);
        $imgName = $data['quantity']  . $request->file('file')->extension();

        $request->file->move(public_path('images'), $imgName);
        $data['size'] = json_encode($request->size);

        $data['file']=$imgName;
        Product::query()->insert($data);

        return redirect(url('/product'))->with('success', '???? ?????????? ?????????????? ??????????');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view("products.create_edit")->with("product", $product);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Product $product)
    {

        $this->validate($request, [
            'name' => 'required',
            'color' => 'required',
            'description' => 'required',
            'size' => 'required',
            'sale' => 'required',
            'status' => 'required',
            'model' => 'required',
            'price' => 'required',

        ]);

        $product->name = $request->name;
        $product->color = $request->color;
        $product->description = $request->description;
        if ($request->hasFile('file')) {
            $imgName = $product->quantity  . $request->file('file')->extension();
            $request->file->move(public_path('images'), $imgName);
            $product->file = $imgName;
        }
        $product->size = $request->size;
        $product->sale = $request->sale;
        $product->status = $request->status;
        $product->model = $request->model;

        $product->save();


        return redirect(url('/product'))->with('success', '???? ?????????????? ??????????');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Product $product)
    {


        File::delete(public_path('images') . '/' . $product->file);

        $product->delete();

        return redirect(url('/product'))->with('success', '???? ?????? ?????????????? ??????????');

    }

    public function getProduct(Request $request)
    {
        $term = trim($request->get('q'));
        $model = "App\Models\\{$request->get('model')}";

        if (empty($term)) {
            return \Response::json([]);
        }

        $product = $model::query()
            ->where('status','<>',0)
            ->where('code', 'LIKE', '%' . $term . '%')->first();
//            $query->where('status', 0);


        $formatted_sponsors []= [
            'id' => $product->id,
            'text' => $product->name,
            'name'=>$product->name,
            'code' => $product->code,
            'size' => $product->size,
            'model' => $product->model,
            'price' => $product->price,
            'color' => $product->color
        ];
        return \Response::json($formatted_sponsors);
    }
}

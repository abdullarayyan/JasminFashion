<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
//        return view('products.index');
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
//dd($request->file->extension());


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
            'quantity' => 'required',

            'file' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png',
                'max:1024'
            ],
        ]);

        $imgName = time() . '-' . $request->name . '.' . $request->file('file')->extension();

        $request->file->move(public_path('images'), $imgName);
        $data = $request->except(['_token']);
        $data['size'] = json_encode($request->size);

        Product::query()->insert($data);

        return redirect(url('/product'))->with('success', 'تم اضافة الفستان بنجاح');

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
//        dd($request->all());
//        $product =Product::query()->firstOrFail($product);

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
            'quantity' => 'required',
            'file' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png',
                'max:1024'
            ],
        ]);
        $imgName = time() . '-' . $request->name . '.' . $request->file('file')->extension();
//dd($imgName);
        $request->file->move(public_path('images'), $imgName);

        $product->name = $request->name;
        $product->color = $request->color;
        $product->description = $request->description;
//        $data['size'] = json_encode($request->size);

        $product->size = $request->size;
        $product->sale = $request->sale;
        $product->status = $request->status;
        $product->model = $request->model;
        $product->code = $request->code;
        $product->file = $imgName;

        $product->save();


        return redirect(url('/product'))->with('success', 'تم التعديل بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Product $product)
    {
        dd($product);
        $product->delete();

        return redirect(url('/product'))->with('success', 'تم حذف الفستان بنجاح');

    }
}

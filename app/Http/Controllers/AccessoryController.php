<?php

namespace App\Http\Controllers;

use App\Models\accessory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AccessoryController extends Controller
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
        $accessories = Accessory::query()->select("*")->orderBy("id", "desc");
        $status = $request->input('status', 0);
        $model = $request->input('model', NULL);
        $name = $request->input('name', NULL);
        $code = $request->input('code', NULL);
        switch ($status) {
            case '1':
                $accessories->where("status", 1);
                break;
            case '2':
                $accessories->where("status", 0);
                break;
        }
        if ($model) {
            $accessories->where("model", "LIKE", "%$model%");
        }
        if ($code) {
            $accessories->where("code", "LIKE", "%$code%");
        }
        if ($name) {
            $accessories->where("name", "LIKE", "%$name%");
        }
        $accessories = $accessories->paginate(5);
        return view("accessories.index")->with("accessories", $accessories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {

        $accessory = new Accessory();

        return view('accessories.create_edit')->with(compact('accessory'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
//dd($request->all());


        $this->validate($request, [
            'name' => 'required',
            'color' => 'required',
            'description' => 'required',
            'sale' => 'required',
            'brand' => 'required',
            'status' => 'required',
            'model' => 'required',
            'code' => 'required',
            'price'=>'required',
            'file' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png',
                'max:1024'
            ],
        ]);


        $data = $request->except(['_token']);
        $data['quantity']=mt_rand(1000, 9999);
        $imgName = $data['quantity']  . $request->file('file')->extension();

        $request->file->move(public_path('images'), $imgName);

        $data['file']=$imgName;

        accessory::query()->insert($data);

        return redirect(url('/accessory'))->with('success', 'تم اضافة الاكسسوار بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $accessory
     * @return \Illuminate\Http\Response
     */
    public function show(Accessory $accessory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $accessory
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Accessory $accessory)
    {
        return view("accessories.create_edit")->with("accessory", $accessory);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $accessory
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Accessory $accessory)
    {
//        dd($request->all());
//        $accessory =Product::query()->firstOrFail($accessory);

        $this->validate($request, [
            'name' => 'required',
            'color' => 'required',
            'description' => 'required',
            'sale' => 'required',
            'status' => 'required',
            'model' => 'required',
            'code' => 'required',
            'price'=>'required',
            'brand' => 'required',

        ]);
        $accessory->name = $request->name;
        $accessory->color = $request->color;
        $accessory->description = $request->description;
        if ($request->hasFile('file')) {
            $imgName = $accessory->quantity  . $request->file('file')->extension();
            $request->file->move(public_path('images'), $imgName);
            $accessory->file = $imgName;
        }
        $accessory->sale = $request->sale;
        $accessory->status = $request->status;
        $accessory->model = $request->model;
        $accessory->brand = $request->brand;
        $accessory->code = $request->code;

        $accessory->save();


        return redirect(url('/accessory'))->with('success', 'تم تعديل الاكسسوار بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $accessory
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Accessory $accessory)
    {
        File::delete(public_path('images').'/'.$accessory->file);

        $accessory->delete();

        return redirect(url('/accessory'))->with('success', 'تم حذف الاكسسوار بنجاح');

    }

    public function getAccessory(Request $request)
    {
        $term = trim($request->get('q'));
        $model = "App\Models\\{$request->get('model')}";

        if (empty($term)) {
            return \Response::json([]);
        }

        $accessory = $model::query()
            ->where('status','<>',0)
            ->where('code', 'LIKE', '%' . $term . '%')->first();
//            $query->where('status', 0);

        $formatted_sponsors []= [
            'id' => $accessory->id,
            'text' => $accessory->name,
            'name'=>$accessory->name,
            'code' => $accessory->code,
            'size' => $accessory->size,
            'model' => $accessory->model,
            'price' => $accessory->price,
            'color' => $accessory->color
        ];
        return \Response::json($formatted_sponsors);
    }
}

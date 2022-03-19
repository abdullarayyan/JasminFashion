<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PartyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $parties = Party::select("*")->orderBy("id", "desc");
        $status = $request->input('status', 0);
        $model = $request->input('model', NULL);
        $name = $request->input('name', NULL);
        $code = $request->input('code', NULL);
        switch ($status) {
            case '1':
                $parties->where("status", 1);
                break;
            case '2':
                $parties->where("status", 0);
                break;
        }
        if ($model) {
            $parties->where("model", "LIKE", "%$model%");
        }
        if ($code) {
            $parties->where("code", "LIKE", "%$code%");
        }
        if ($name) {
            $parties->where("name", "LIKE", "%$name%");
        }
        $parties = $parties->paginate(5);
        return view("parties.index")->with("parties", $parties);
//        return view('parties.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {

        $party = new Party();

        return view('parties.create_edit')->with(compact('party'));

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'color' => 'required',
            'description' => 'required',
            'size' => 'required',
            'sale' => 'required',
            'status' => 'required',
            'model' => 'required',
            'code' => 'required',
            'price'=>'required',
            'quantity' => 'required',

            'file' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png',
                'max:1024'
            ],
        ]);

        $imgName =  $request->name . '.' . $request->file('file')->extension();

        $request->file->move(public_path('images'), $imgName);
        $data = $request->except(['_token']);
        $data['size'] = json_encode($request->size);

        Party::query()->insert($data);

        return redirect(url('/party'))->with('success', 'تم اضافة ستان السهرة بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Party $party
     * @return \Illuminate\Http\Response
     */
    public function show(Party $party)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Party $party
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Party $party)
    {
        return view("parties.create_edit")->with("party", $party);

    }

    /**
     * @param Request $request
     * @param Party $party
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Party $party)
    {
//        dd($request->all());
//        $party =Party::query()->firstOrFail($party);

        $this->validate($request, [
            'name' => 'required',
            'color' => 'required',
            'description' => 'required',
            'size' => 'required',
            'sale' => 'required',
            'status' => 'required',
            'model' => 'required',
            'code' => 'required',
            'price'=>'required',
            'quantity' => 'required',
            'file' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png',
                'max:1024'
            ],
        ]);
        $imgName =  $request->name . '.' . $request->file('file')->extension();
//dd($imgName);
        $request->file->move(public_path('images'), $imgName);

        $party->name = $request->name;
        $party->color = $request->color;
        $party->description = $request->description;
//        $data['size'] = json_encode($request->size);

        $party->size = $request->size;
        $party->sale = $request->sale;
        $party->status = $request->status;
        $party->model = $request->model;
        $party->code = $request->code;
        $party->file = $imgName;

        $party->save();


        return redirect(url('/party'))->with('success', 'تم التعديل بنجاح');

    }

    /**
     * @param Party $party
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Party $party)
    {
        File::delete(public_path('images').'/'.$party->file);


        $party->delete();

        return redirect(url('/party'))->with('success', 'تم حذف الفستان بنجاح');

    }
    public function getParty(Request $request)
    {
//        dd($request->all());
        $term = trim($request->get('q'));
        $model = "App\Models\\{$request->get('model')}";

        if (empty($term)) {
            return \Response::json([]);
        }

        $party = $model::query()
            ->where('status','<>',0)
            ->where('code', 'LIKE', '%' . $term . '%')->first();

        $formatted_sponsors []= [
            'id' => $party->id,
            'text' => $party->name,
            'name'=>$party->name,
            'code' => $party->code,
            'size' => $party->size,
            'model' => $party->model,
            'price' => $party->price,
            'color' => $party->color
        ];
        return \Response::json($formatted_sponsors);
    }
}

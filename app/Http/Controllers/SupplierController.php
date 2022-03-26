<?php

namespace App\Http\Controllers;

use App\classes\IHouse;
use App\facades\IHouseFacade;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
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
        $suppliers = Supplier::select("*")->orderBy("id", "desc");

        $name = $request->input('name', NULL);
        $mobile = $request->input('mobile', NULL);
        if ($name) {
            $suppliers->where("name", "LIKE", "%$name%");
        }
        if ($mobile) {
            $suppliers->where("mobile", "LIKE", "%$mobile%");
        }

        $suppliers = $suppliers->paginate(5);


        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $supplier = new Supplier();
        return view('suppliers.add_supplier', compact('supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
//        dd($request->all());
        Supplier::query()->insert($request->except(['_token']));
        return redirect(url('/supplier/create'))->with('success', 'تم اضافة المورد بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Supplier $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Supplier $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Supplier $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Supplier $supplier
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect(url('/supplier'))->with('success', 'تم حذف المورد بنجاح');
    }

    public function createMulti(Request $request)
    {

        $data = $request->except(['type']);

        if ($request->type === 'App\Models\Accessory') {
            $data = $request->except(['size', 'type']);
        } else {
            $data['size'] = json_encode($request->size);

        }

        for ($i = 0; $i < $request->get('quantity'); $i++) {
            $data['status'] = 1;
            if ($request->type === 'App\Models\Product') {
                $data['code'] = "#" . IHouse::getSequenceProduct() . '001';
            } elseif ($request->type === 'App\Models\Accessory') {
                $data['code'] = "#" . IHouse::getSequenceAccessory() . '001';
            } elseif ($request->type === 'App\Models\Accessory') {
                $data['code'] = "#" . IHouse::getSequenceParty() . '001';
            }
            $request->get('type')::query()->insert([$data]);

        }

        return redirect(url('/supplier/create'))->with('success', 'تم الترحيل بنجاح');

    }
}

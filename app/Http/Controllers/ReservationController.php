<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\Party;
use App\Models\Product;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
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
    public function index()
    {
        $reservations = Reservation::select("*")->orderBy("id", "desc")->paginate(5);

        return view('reservation.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $reservation = new Reservation();

        $products = Product::query()->get();
        return view('reservation.add_yatem')->with(compact('reservation', 'products'));

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
        $this->validate($request, [
            "customer_name" => 'required',
            "mobile" => 'required',
            "city" => 'required',
            "town" => 'required',
            "from" => 'required',
            "to" => 'required',
            "dress_name" => 'required',
        ], [
            'customer_name.required' => 'هذا الحقل مطلوب',
            'mobile.required' => 'هذا الحقل مطلوب',
            'city.required' => 'هذا الحقل مطلوب',
            'town.required' => 'هذا الحقل مطلوب',
            'party_color.required' => 'هذا الحقل مطلوب',
            'from.required' => 'هذا الحقل مطلوب',
            'to.required' => 'هذا الحقل مطلوب',
            'dress_name.required' => 'يرجى اكمال عملية الحجز ',

        ]);

        $reservation = new  Reservation();

//        dd($request->all());
        $reservation->customer_name = $request->customer_name;
        $reservation->mobile = $request->mobile;
        $reservation->from = $request->town;
        $reservation->city = $request->city;
        $reservation->start = $request->from;
        $reservation->end = $request->to;

        $reservation->dress_name = $request->dress_name;
        $reservation->dress_code = $request->dress_code;
        $reservation->dress_price = $request->dress_price;
        $reservation->dress_color = $request->dress_color;

        $reservation->dress_name_acc = $request->dress_name_acc;
        $reservation->dress_price_acc = $request->dress_price_acc;
        $reservation->dress_color_acc = $request->dress_color_acc;
        $reservation->dress_code_acc = $request->dress_code_acc;

        $reservation->party_name = $request->party_name;
        $reservation->party_code = $request->party_code;
        $reservation->party_price = $request->party_price;
        $reservation->party_color = $request->party_color;

        $reservation->party_name_acc = $request->party_name_acc;
        $reservation->party_price_acc = $request->party_price_acc;
        $reservation->party_color_acc = $request->party_color_acc;
        $reservation->party_code_acc = $request->party_code_acc;

        $reservation->save();
//        dd($reservation);
        $product = Product::query()->where('code', $reservation->dress_code)->first();
        if ($product != null) {
            $product->update(['status' => 0]);

        }

        $party = Party::query()->where('code', $reservation->party_code)->first();
        if ($party != null) {
            $party->update(['status' => 0]);

        }

        $product_acc = Accessory::query()->where('code', $reservation->dress_code_acc)->first();
        if ($product_acc) {
            $product_acc->update(['status' => 0]);
        }

        $party_acc = Accessory::query()->where('code', $reservation->dress_code_acc)->first();
        if ($party_acc) {
            $party_acc->update(['status' => 0]);

        }

        return redirect(url('/reservation/create'))->with('success', 'تم اضافة الحجز بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Reservation $reservation
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect(url('/reservation'))->with('success', 'تم حذف الحجز بنجاح');

    }

    public function invoice($id)
    {
        $customer = Reservation::query()->where('id', $id)->first();
        return view('reservation.invoice')->with(compact('customer'));

    }

    public function get_cities(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $categories = DB::table('cities')->where("city_id", $id)->select("id", "name")->get()->toArray();
            return response()->json($categories);
        }
    }

    public function updateTotalPrice(Request $request)
    {


        $reservation = Reservation::query()->latest()->first();
        if ($reservation) {
            $reservation->update(['total_price' => $request->get('total_price')]);
        }
        return redirect(url('/reservation'))->with('success', 'تم تخزين الحجز واضافة العربون بنجاح');
    }

}

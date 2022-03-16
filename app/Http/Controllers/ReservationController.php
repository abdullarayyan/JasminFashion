<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

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

        return view('reservation.index',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $reservation = new Reservation();

        return view('reservation.add_yatem')->with(compact('reservation'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "customer_name" => 'required',
            "mobile" => 'required',
            "city" => 'required',
            "town" => 'required',
            "from" => 'required',
            "to" => 'required',
            "dress_name" => 'required',
            "dress_code" => 'required',
            "dress_model" => 'required',
            "dress_price" => 'required',
            "dress_color" => 'required',
            "dress_name_acc" => 'required',
            "dress_price_acc" => 'required',
            "dress_color_acc" => 'required',
            "party_model" => 'required',
            "party_price" => 'required',
            "party_color" => 'required',
            "party_name_acc" => 'required',
            "party_price_acc" => 'required',
            "party_color_acc" => 'required',
        ],[
            'customer_name.required' => 'هذا الحقل مطلوب',
            'mobile.required' => 'هذا الحقل مطلوب',
            'city.required' => 'هذا الحقل مطلوب',
            'town.required' => 'هذا الحقل مطلوب',
            'party_color.required' => 'هذا الحقل مطلوب',
            'from.required' => 'هذا الحقل مطلوب',
            'to.required' => 'هذا الحقل مطلوب',
            'dress_name.required' => 'هذا الحقل مطلوب',
            'dress_code.required' => 'هذا الحقل مطلوب',
            'dress_model.required' => 'هذا الحقل مطلوب',
            'dress_price.required' => 'هذا الحقل مطلوب',
            'dress_color_acc.required' => 'هذا الحقل مطلوب',
            'dress_name_acc.required' => 'هذا الحقل مطلوب',
            'party_price_acc.required' => 'هذا الحقل مطلوب',
            'party_model.required' => 'هذا الحقل مطلوب',
            'party_color_acc.required' => 'هذا الحقل مطلوب'

        ]);

        $reservation = new  Reservation();

        $reservation->customer_name=$request->customer_name;
        $reservation->mobile=$request->mobile;
        $reservation->from=$request->town;
        $reservation->city=$request->city;
        $reservation->start=$request->from;
        $reservation->end=$request->to;

        $reservation->dress_name=$request->dress_name;
        $reservation->dress_code=$request->dress_code;
        $reservation->dress_price=$request->dress_price;
        $reservation->dress_color=$request->dress_color;

        $reservation->dress_name_acc=$request->dress_name_acc;
        $reservation->dress_price_acc=$request->dress_price_acc;
        $reservation->dress_color_acc=$request->dress_color_acc;

        $reservation->party_name=$request->party_name;
        $reservation->party_code=$request->party_code;
        $reservation->party_price=$request->party_price;
        $reservation->party_color=$request->party_color;

        $reservation->party_name_acc=$request->party_name_acc;
        $reservation->party_price_acc=$request->party_price_acc;
        $reservation->party_color_acc=$request->party_color_acc;

        $reservation->save();
//        $data = $request->except(['_token']);
//        Reservation::query()->insert($data);

//        dd($request->all());
        return redirect(url('/reservation'))->with('success', 'تم اضافة الفستان بنجاح');

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
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}

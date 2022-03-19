@extends("layouts.app")
<style>
    <
    link rel

    =
    "stylesheet"
    href

    =
    "https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity

    =
    "sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin

    =
    "anonymous"
    >

</style>

@section('content')

    <div class="card-section">
        <div class="actions">
            <a href="{{route("reservation.create")}}" class="btn btn-primary"
               style="background-color: #fcefba!important;">
                <i class="fa fa-plus"></i> اضافة حجز </a>
        </div>
        <div class="actions">
            <input type="hidden" name="filter" value="" id="hidden_filter">

            <div class="mt-5">
                @error('password')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror

                @if (session('message.success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message.success') }}
                    </div>
                @endif
            </div>


            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-hover" style="background-color: white">

                        {!! Form::open(['route'=>"reservation.index",'method'=>"get"]) !!}

                        <thead>

                        <tr>
                            <th>
                                اسم الزبون
                            </th>
                            <th>
                                رقم الهاتف
                            </th>
                            <th>
                                بداية الحجز
                            </th>
                            <th class=" ">
                                نهاية الحجز

                            </th>
                            <th class=" ">
                                البلدة

                            </th>
                            <th class=" ">
                                القرية

                            </th>
                            <th class="">
                                تفاصيل الحجز

                            </th>


                            <th>
                                عمليات
                            </th>
                        </tr>
                        <tr>
                            <td>
                                {{Form::text("name",Request::get("name",NULL),['class'=>"form-control form-filter input-sm",'placeholder'=>'الاسم'])}}
                            </td>
                            <td>
                                {{Form::text("mobile",Request::get("mobile",NULL),['class'=>"form-control form-filter input-sm",'placeholder'=>'الموبايل'])}}

                            </td>

                            <td>
                            </td>
                            <td>

                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>

                            <td style="display: flex">
                                <button type="submit"
                                        class="btn btn-sm btn-success" style="    padding-left: 15px!important;
                        padding-right: 15px!important;">
                                    <i class="fa fa-search"></i>
                                </button>
                                <a href="{{route("reservation.index")}}"
                                   class="btn btn-sm btn-info" style="margin-left: 0!important;padding-right: 15px;
                        padding-left: 15px;">
                                    <i class="fa fa-eraser"></i></a>
                            </td>
                        </tr>

                        {!! Form::close() !!}
                        </thead>
                        <tbody>
                        @forelse($reservations as $reservation)
                            {{--                            {{dd($reservation)}}--}}
                            <tr>
                                <td>
                                    <a href="{{route('reservation.invoice',$reservation->id)}}" style="color: blue!important;">{{$reservation->customer_name}}</a>

                                </td>
                                <td>
                                    {{$reservation->mobile}}

                                </td>
                                <td style="width: 20%">
                                    {{$reservation->start}}
                                </td>
                                <td style="width: 20%">
                                    {{$reservation->end}}
                                </td>
                                <td>
                                    {{$reservation->city}}
                                </td>
                                <td>
                                    {{$reservation->from}}
                                </td>

                                {{--{{dd($reservation->dress_code)}}--}}
                                <td class="text-body" style="width: 100%">
                                    <div style="display: none">
                                        {{$product_name=\App\Models\Product::query()->where('code',$reservation->dress_code)->first()}}
                                        <br>
                                    </div>
                                    فستان الزفاف
                                    =>
                                    <a
                                        class="attribute is-active">@if ($product_name) {{$product_name->name}} <i
                                            class="fa fa-check text-success fs15 pr5"></i> @else <i
                                            class="fa fa-times text-danger fs15 pr5"></i> @endif</a>

                                    <br>
                                    <div style="display: none">
                                        {{$ss=\App\Models\Party::query()->where('code',$reservation->party_code)->first()??''}}
                                        <br>
                                    </div>
                                    فستان السهرة
                                    =>
                                    {{--{{dd($ss)}}--}}
                                    <a
                                        class="attribute is-active">@if ($ss) {{$ss->name??''}} <i
                                            class="fa fa-check text-success fs15 pr5"></i> @else <i
                                            class="fa fa-times text-danger fs15 pr5"></i> @endif</a>

                                    <br>
                                    <div style="display: none">
                                        {{$dress_code_acc=\App\Models\Accessory::query()->where('code',$reservation->dress_code_acc)->first()??''}}
                                        <br>
                                    </div>
                                    اكسسوار زفاف
                                    =>

                                    <a
                                        class="attribute is-active">@if ($dress_code_acc) {{$dress_code_acc->name??''}}{{$dress_code_acc->code}}
                                        <i
                                            class="fa fa-check text-success fs15 pr5"></i> @else <i
                                            class="fa fa-times text-danger fs15 pr5"></i> @endif</a>
                                    <br>
                                    <div style="display: none">
                                        {{$party_code_acc=\App\Models\Accessory::query()->where('code',$reservation->party_code_acc)->select('name')->first()??''}}
                                        <br>
                                    </div>
                                    اكسسوار سهرة
                                    =>

                                    <a
                                        class="attribute is-active">@if ($party_code_acc) {{$party_code_acc->name??''}}
                                        <i
                                            class="fa fa-check text-success fs15 pr5"></i> @else <i
                                            class="fa fa-times text-danger fs15 pr5"></i> @endif</a>
                                </td>

                                <td style="display: flex">
                                    {{Form::open(['route'=>["reservation.destroy",$reservation->id],'method'=>"delete" ,'style'=>'display:flex'])}}
{{--                                    <a href="{{url('/reservation/'.$reservation->id.'/edit')}}"--}}
{{--                                       class="btn btn-info btn-sm" style="background-color: #0cdcff;--}}
{{--                    padding-bottom: 0;--}}
{{--                    padding-right: 15px;--}}
{{--                    padding-left: 15px;--}}
{{--                    line-height: 0;--}}
{{--                                 display: flex "--}}
{{--                                       title="Edit"><i--}}
{{--                                            class="fa fa-edit"></i></a>--}}
                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            style="width: 0; padding-left: 15px!important;padding-right: 15px!important;">
                                        <i class="fa fa-trash"></i>
                                    </button> {!! Form::close() !!}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="text-center">
                                    No data found.
                                </td>
                            </tr>
                        @endforelse

                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="12">
                                {!! $reservations->links()!!}
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ url('js/pages/fathers/index.js') }}"></script>
@endsection

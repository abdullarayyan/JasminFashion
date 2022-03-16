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
            <a href="{{route("reservation.create")}}" class="btn btn-primary" style="background-color: #fcefba!important;">
                <i class="fa fa-plus"></i> اضافة حجز  </a>
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
                                فستان الزفاف

                            </th>
                            <th class="">
                                فستان السهرة

                            </th>
                            <th style="width: 30%">
                                اكسسوار السهرة

                            </th>
                            <th>اكسسوار الزفاف
                            </th>

                            <th>
                                عمليات
                            </th>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                {{Form::text("name",Request::get("name",NULL),['class'=>"form-control form-filter input-sm",'placeholder'=>'الاسم'])}}

                            </td>

                            <td>
                                {{Form::text("model",Request::get("model",NULL),['class'=>"form-control form-filter input-sm",'placeholder'=>'المودبل'])}}
                            </td>
                            <td>
                                {{Form::text("code",Request::get("code",NULL),['class'=>"form-control form-filter input-sm",'placeholder'=>'بحث بواسطة الكود'])}}

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
                            <tr>
                                <td>
                                    {{$reservation->customer_name}}
                                </td>
                                <td>
                                    {{$reservation->mobile}}

                                </td>
                                <td>
                                    {{$reservation->start}}
                                </td>
                                <td>
                                    {{$reservation->end}}
                                </td>
                                <td>
                                {{$reservation->city}}
                                </td>
                                <td>
                                {{$reservation->from}}
                                </td>
                                <td style="    word-break: break-all;">
                                    {{$reservation->party_name}}
                                </td>
                                <td>
                                {{$reservation->dress_name}}
                                </td>
                                <td>
                                {{$reservation->dress_name_acc}}
                                </td>
                                <td>
                                    {{$reservation->party_name_acc}}
                                </td>
                                <td class="text-center">

                                </td>


                                <td class="text-center">
                                    <a href="#" data-class="Blog"
                                       data-id="{{$reservation->id}}"
                                       id="{{$reservation->id}}"
                                       class="attribute is-active">@if ($reservation->sale) <i
                                            class="fa fa-check text-success fs15 pr5"></i> @else <i
                                            class="fa fa-times text-danger fs15 pr5"></i> @endif</a>
                                </td>

                                <td style="display: flex">
                                    {{Form::open(['route'=>["reservation.destroy",$reservation->id],'method'=>"delete" ,'style'=>'display:flex'])}}
                                    <a href="{{url('/reservation/'.$reservation->id.'/edit')}}"
                                       class="btn btn-info btn-sm" style="background-color: #0cdcff;
                    padding-bottom: 0;
                    padding-right: 15px;
                    padding-left: 15px;
                    line-height: 0;
                                 display: flex "
                                       title="Edit"><i
                                            class="fa fa-edit"></i></a>
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

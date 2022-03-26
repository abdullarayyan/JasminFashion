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
            <a href="{{route("supplier.create")}}" class="btn btn-primary"
               style="background-color: #fcefba!important;">
                <i class="fa fa-plus"></i> اضافة مورد </a>
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

                        {!! Form::open(['route'=>"supplier.index",'method'=>"get"]) !!}

                        <thead>

                        <tr>
                            <th>
                                اسم المورد
                            </th>
                            <th>
                                رقم الهاتف
                            </th>
                            <th>
                                ايميل المورد
                            </th>
                            <th class=" ">
                                الدولة
                            </th>
                            <th class=" ">
                                كود المورد

                            </th>
                            <th class=" ">
                                اجمالي السعر
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


                            <td style="display: flex">
                                <button type="submit"
                                        class="btn btn-sm btn-success" style="    padding-left: 15px!important;
                        padding-right: 15px!important;">
                                    <i class="fa fa-search"></i>
                                </button>
                                <a href="{{route("supplier.index")}}"
                                   class="btn btn-sm btn-info" style="margin-left: 0!important;padding-right: 15px;
                        padding-left: 15px;">
                                    <i class="fa fa-eraser"></i></a>
                            </td>
                        </tr>

                        {!! Form::close() !!}
                        </thead>
                        <tbody>
                        @forelse($suppliers as $supplier)
                            {{--                            {{dd($supplier)}}--}}
                            <tr>
                                <td>
                                    {{$supplier->name}}
                                </td>
                                <td>
                                    {{$supplier->mobile}}

                                </td>
                                <td style="width: 20%">
                                    {{$supplier->email}}
                                </td>
                                <div class="hide">
{{--                                    {{dd(DB::table('cities')->where('id',$supplier->city)->first())}}--}}
                                    {{$city = \App\Models\City::query()->where('id',$supplier->country)->first()}}
                                </div>
                                <td>
                                    {{$city->name}}
                                </td>
                                <td>

                                    {{$supplier->code}}
                                </td>

                                <td>
                                    {{$supplier->total_price}}
                                </td>
                                <td style="display: flex">
                                    {{Form::open(['route'=>["supplier.destroy",$supplier->id],'method'=>"delete" ,'style'=>'display:flex'])}}
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
                                {!! $suppliers->links()!!}
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

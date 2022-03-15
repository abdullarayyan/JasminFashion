@extends("layouts.app")
<style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</style>
@section('title', "فساتين الزفاف")

@section('content')

    <div class="actions">
        <a href="{{route("product.create")}}" class="btn btn-primary" style="background-color: #fcefba!important;">
            <i class="fa fa-plus"></i> اضافة فستان </a>
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
    </div>




    <div class="portlet-body">
        <div class="table-scrollable">
            <table class="table table-hover" style="background-color: white">
                {!! Form::open(['route'=>"product.index",'method'=>"get"]) !!}

                <thead>

                <tr>
                    <th>
                        صور الفساتين
                    </th>
                    <th>
                        الاسم
                    </th>
                    <th>
                        الموديل
                    </th>
                    <th class=" ">
                        الكود

                    </th>
                    <th class=" ">
                        الكمية

                    </th>
                    <th class=" ">
                        السعر

                    </th>
                    <th class="">
                        اللون

                    </th>
                    <th class="">
                        الحجم

                    </th>
                    <th style="width: 30%">
                        الوصف

                    </th>
                    <th>متوفر؟
                    </th>
                    <th>
                        قابل للعروض؟

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
                    <td></td>
                    <td style="display: flex">
                        <button type="submit"
                                class="btn btn-sm btn-success" style="    padding-left: 15px!important;
                        padding-right: 15px!important;">
                            <i class="fa fa-search"></i>
                        </button>
                        <a href="{{route("product.index")}}"
                           class="btn btn-sm btn-info" style="margin-left: 0!important;padding-right: 15px;
                        padding-left: 15px;">
                            <i class="fa fa-eraser"></i></a>
                    </td>
                </tr>

                {!! Form::close() !!}
                </thead>
                <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>
                            <img alt="Image" src="{{ asset('images/').'/'.$product->file }}" style="max-width: 100px;
    max-height: 100%;" class="w-100 shadow-xl">
                        </td>
                        <td>
                            {{$product->name}}
                        </td>
                        <td>
                            {{$product->model}}
                        </td>
                        <td>
                            {{$product->code}}
                        </td>
                        <td>
                            {{$product->quantity}}
                        </td>
                        <td>
                            {{$product->price}}
                        </td>
                        <td>
                            {{$product->color}}
                        </td>
                        <td>
                            {{$product->size}}
                        </td>
                        <td style="    word-break: break-all;">
                            {{$product->description}}
                        </td>
                        <td class="text-center">
                            <a href="#" data-type="is_active" data-class="Blog"
                               data-id="{{$product->id}}"
                               id="{{$product->id}}"
                               class="attribute is-active">@if ($product->status) <i
                                    class="fa fa-check text-success fs15 pr5"></i> @else <i
                                    class="fa fa-times text-danger fs15 pr5"></i> @endif</a>
                        </td>


                        <td class="text-center">
                            <a href="#" data-class="Blog"
                               data-id="{{$product->id}}"
                               id="{{$product->id}}"
                               class="attribute is-active">@if ($product->sale) <i
                                    class="fa fa-check text-success fs15 pr5"></i> @else <i
                                    class="fa fa-times text-danger fs15 pr5"></i> @endif</a>
                        </td>

                        <td style="display: flex">
                        {{Form::open(['route'=>["product.destroy",$product->id],'method'=>"delete" ,'style'=>'display:flex'])}}
                            <a href="{{url('/product/'.$product->id.'/edit')}}"
                               class="btn btn-info btn-sm" style="background-color: #0cdcff;
                    padding-bottom: 0;
                    padding-right: 15px;
                    padding-left: 15px;
                    line-height: 0;
                                 display: flex "
                               title="Edit"><i
                                    class="fa fa-edit"></i></a>
                            <button type="submit"
                                    class="btn btn-sm btn-danger" style="width: 0; padding-left: 15px!important;padding-right: 15px!important;">
                                <i class="fa fa-trash"></i>
                            </button>                            {!! Form::close() !!}
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
                        {!! $products->links()!!}
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>




@endsection

@section('js')
    <script type="text/javascript" src="{{ url('js/pages/fathers/index.js') }}"></script>
@endsection

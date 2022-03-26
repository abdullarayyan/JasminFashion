@extends("layouts.app")

@section('title', "الاكسسوارات")
@section('page_title', 'الاكسسوارات')

@section('css')
    <style>
        a {
            color: #057a65;
        }

        table a:hover {
            text-decoration: underline;
        }

        #fathersTable .father_name {
            min-width: 180px;
        }

        #fathersTable .alert {
            margin-bottom: 0;
            text-align: center;
        }

    </style>
@endsection
@section('content')

    <div class="card-section">
        <div class="actions">
            <a href="{{route("accessory.create")}}" class="btn btn-primary" style="background-color: #fcefba!important;">
                <i class="fa fa-plus"></i> اضافة اكسسوار </a>
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
                        {!! Form::open(['route'=>"accessory.index",'method'=>"get"]) !!}

                        <thead>

                        <tr>
                            <th>
                                صور الاكسسوار
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
                                السعر

                            </th>
                            <th class="">
                                اللون

                            </th>
                            <th class=" ">
                                الماركة

                            </th>
                            <th class="">
                                الكمية

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
                                <a href="{{route("accessory.index")}}"
                                   class="btn btn-sm btn-info" style="margin-left: 0!important;padding-right: 15px;
                        padding-left: 15px;">
                                    <i class="fa fa-eraser"></i></a>
                            </td>
                        </tr>

                        {!! Form::close() !!}
                        </thead>
                        <tbody>
                        @forelse($accessories as $accessory)
                            <tr>
                                <td>
                                    <img alt="Image" src="{{ asset('images/').'/'.$accessory->file }}" style="max-width: 100px;
    max-height: 100%;" class="w-100 shadow-xl">
                                </td>
                                <td>
                                    {{$accessory->name}}
                                </td>
                                <td>
                                    {{$accessory->model}}
                                </td>
                                <td>
                                    {{$accessory->code}}
                                </td>
                                <td>
                                    {{$accessory->price}}
                                </td>
                                <td><span style="background-color: {{$product->color}};color: {{$product->color}};     display: inline-table;">color</span></td>

                                <td>
                                    {{$accessory->brand}}
                                </td>
                                <td>
                                    {{$accessory->quantity}}
                                </td>
                                <td style="    word-break: break-all;">
                                    {{$accessory->description}}
                                </td>
                                <td class="text-center">
                                    <a href="#" data-type="is_active" data-class="Blog"
                                       data-id="{{$accessory->id}}"
                                       id="{{$accessory->id}}"
                                       class="attribute is-active">@if ($accessory->status) <i
                                            class="fa fa-check text-success fs15 pr5"></i> @else <i
                                            class="fa fa-times text-danger fs15 pr5"></i> @endif</a>
                                </td>


                                <td class="text-center">
                                    <a href="#" data-class="Blog"
                                       data-id="{{$accessory->id}}"
                                       id="{{$accessory->id}}"
                                       class="attribute is-active">@if ($accessory->sale) <i
                                            class="fa fa-check text-success fs15 pr5"></i> @else <i
                                            class="fa fa-times text-danger fs15 pr5"></i> @endif</a>
                                </td>

                                <td style="display: flex">
                                    {{Form::open(['route'=>["accessory.destroy",$accessory->id],'method'=>"delete" ,'style'=>'display:flex'])}}
                                    <a href="{{url('/accessory/'.$accessory->id.'/edit')}}"
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
                                {!! $accessories->links()!!}
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

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
            <div class="mt-5">
                <div id="tableWrapper">


                    <div class="portlet-body" style="background-color: #fdfdf9!important">
                        <div class="table-scrollable">
                            <table id="fathersTable" class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="clickable full_name_head">
                                        صور الفساتين
                                        <i class='bx bxs-up-arrow'></i>
                                    </th>
                                    <th class="clickable full_name_head">
                                        الاسم
                                        <i class='bx bxs-up-arrow'></i>
                                    </th>
                                    <th class="clickable idc_head">
                                        الموديل
                                        <i class='bx bxs-up-arrow'></i>
                                    </th>
                                    <th class="clickable nationality_head">
                                        الكود
                                        <i class='bx bxs-up-arrow'></i>
                                    </th>
                                    <th class="clickable">
                                        اللون
                                        <i class='bx bxs-up-arrow'></i>
                                    </th>
                                    <th class="clickable">
                                        الماركة
                                        <i class='bx bxs-up-arrow'></i>
                                    </th>
                                    <th class="clickable">
                                        الكمية
                                        <i class='bx bxs-up-arrow'></i>
                                    </th>
                                    <th class="clickable">
                                        الوصف
                                        <i class='bx bxs-up-arrow'></i>
                                    </th>
                                    <th class="clickable">
                                        الحالة(متوفر؟)
                                        <i class='bx bxs-up-arrow'></i>
                                    </th>
                                    <th class="clickable">
                                        قابل للعروض؟
                                        <i class='bx bxs-up-arrow'></i>
                                    </th>
                                    <th class="clickable">
                                        عمليات
                                        <i class='bx bxs-up-arrow'></i>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                {!! Form::open(['route'=>"accessory.index",'method'=>"get"]) !!}

                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        {{Form::text("name",Request::get("title",NULL),['class'=>"form-control form-filter input-sm",'placeholder'=>'الاسم'])}}

                                    </td>

                                    <td>
                                        {{Form::text("model",Request::get("title",NULL),['class'=>"form-control form-filter input-sm",'placeholder'=>'المودبل'])}}
                                    </td>
                                    <td>
                                        {{Form::text("code",Request::get("title",NULL),['class'=>"form-control form-filter input-sm",'placeholder'=>'بحث بواسطة الكود'])}}

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
                                    <td>
                                        <a href="{{route("accessory.index")}}"
                                           class="btn btn-sm btn-info filter-submit margin-bottom">
                                            <i class="fa fa-refresh"></i> اعادة</a>
                                        <button type="submit"
                                                class="btn btn-sm btn-success filter-submit margin-bottom">
                                            <i class="fa fa-search"></i> بحث
                                        </button>
                                    </td>
                                </tr>

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
                                            {{$accessory->color}}
                                        </td>
                                        <td>
                                            {{$accessory->brand}}
                                        </td>
                                        <td>
                                            {{$accessory->quantity}}
                                        </td>
                                        <td>
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
                                            <a href="#" data-type="س" data-class="Blog"
                                               data-id="{{$accessory->id}}"
                                               id="{{$accessory->id}}"
                                               class="attribute is-active">@if ($accessory->sale) <i
                                                    class="fa fa-check text-success fs15 pr5"></i> @else <i
                                                    class="fa fa-times text-danger fs15 pr5"></i> @endif</a>
                                        </td>

                                        <td>
                                            {{Form::open(['route'=>["accessory.destroy",$accessory->id],'method'=>"delete"])}}
                                            <a href="{{url('/accessory/'.$accessory->id.'/edit')}}"
                                               class="btn btn-info btn-sm" style="background-color: #0cdcff"
                                               title="Edit"><i
                                                    class="fa fa-edit"></i> @lang("تعديل")</a>
                                            <button onclick="return confirm('are you sure?')" type="submit"
                                                    class="btn btn-danger btn-sm" title="Delete"><i
                                                    class="fa fa-trash"></i> @lang("حذف")</button>

                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="8">
                                        {!! $accessories->links()!!}
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>


                    <div class="pagination_wrapper">
                        <div class="pagination_details mb-2 mt-4 text-left">
                            <span id="pagination_details"></span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center table-pager">
                            <div class="pagination">
                                <li class="page-item" id="previous-page">
                                    <a class="page-link" href="javascript:void(0)">السابق</a>
                                </li>
                                <li class="page-item" id="first-page">
                                    <a class="page-link" href="javascript:void(0)">1</a>
                                </li>
                                <li class="page-item">
                                    <input id="custom-page" onblur="changePage()" type="number" value="1">
                                </li>
                                <li class="page-item" id="last-page">
                                    <a id="last-page-link" class="page-link" href="javascript:void(0)"></a>
                                </li>
                                <li class="page-item" id="next-page">
                                    <a class="page-link" href="javascript:void(0)">التالي</a>
                                </li>
                            </div>
                            <div class="form-group m-0">
                                <select onchange="changePageSize()" id="pageSize" name="pageSize"
                                        class="form-control m-0">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ url('js/pages/fathers/index.js') }}"></script>
@endsection
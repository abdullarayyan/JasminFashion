@extends("layouts.app")

@section('title', "فساتين السهرة")
@section('page_title', 'فساتين السهرة')

@section('content')

    <div class="card-section">
        <div class="actions">
            <a href="{{route("party.create")}}" class="btn btn-primary" style="background-color: #fcefba!important;">
                <i class="fa fa-plus"></i> اضافة فستان سهرة </a>
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
                                    <th class="clickable nationality_head">
                                        الكمية
                                        <i class='bx bxs-up-arrow'></i>
                                    </th>
                                    <th class="clickable nationality_head">
                                        السعر
                                        <i class='bx bxs-up-arrow'></i>
                                    </th>
                                    <th class="clickable">
                                        اللون
                                        <i class='bx bxs-up-arrow'></i>
                                    </th>
                                    <th class="clickable">
                                        الحجم
                                        <i class='bx bxs-up-arrow'></i>
                                    </th>
                                    <th class="clickable">
                                        الوصف
                                        <i class='bx bxs-up-arrow'></i>
                                    </th>
                                    <th class="clickable" style="width: 20px">
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

                                {!! Form::open(['route'=>"party.index",'method'=>"get"]) !!}

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
                                    <td>
                                        <a href="{{route("party.index")}}"
                                           class="btn btn-sm btn-info filter-submit margin-bottom">
                                            <i class="fa fa-refresh"></i> اعادة</a>
                                        <button type="submit"
                                                class="btn btn-sm btn-success filter-submit margin-bottom">
                                            <i class="fa fa-search"></i> بحث
                                        </button>
                                    </td>
                                </tr>

                                @forelse($parties as $party)
                                    <tr>
                                        <td>
                                            <img alt="Image" src="{{ asset('images/').'/'.$party->file }}" style="max-width: 100px;
    max-height: 100%;" class="w-100 shadow-xl">
                                        </td>
                                        <td>
                                            {{$party->name}}
                                        </td>
                                        <td>
                                            {{$party->model}}
                                        </td>
                                        <td>
                                            {{$party->code}}
                                        </td><td>
                                            {{$party->quantity}}
                                        </td><td>
                                            {{$party->price}}
                                        </td>
                                        <td>
                                            {{$party->color}}
                                        </td>
                                        <td>
                                            {{$party->size}}
                                        </td>
                                        <td>
                                            {{$party->description}}
                                        </td>
                                        <td class="text-center">
                                            <a href="#" data-type="is_active" data-class="Blog"
                                               data-id="{{$party->id}}"
                                               id="{{$party->id}}"
                                               class="attribute is-active">@if ($party->status) <i
                                                    class="fa fa-check text-success fs15 pr5"></i> @else <i
                                                    class="fa fa-times text-danger fs15 pr5"></i> @endif</a>
                                        </td>


                                        <td class="text-center">
                                            <a href="#" data-type="س" data-class="Blog"
                                               data-id="{{$party->id}}"
                                               id="{{$party->id}}"
                                               class="attribute is-active">@if ($party->sale) <i
                                                    class="fa fa-check text-success fs15 pr5"></i> @else <i
                                                    class="fa fa-times text-danger fs15 pr5"></i> @endif</a>
                                        </td>

                                        <td>
                                            {{Form::open(['route'=>["party.destroy",$party->id],'method'=>"delete"])}}
                                            <a href="{{url('/party/'.$party->id.'/edit')}}"
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
                                        {!! $parties->links()!!}
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
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
@endsection

@section('js')
    <script type="text/javascript" src="{{ url('js/pages/fathers/index.js') }}"></script>
@endsection

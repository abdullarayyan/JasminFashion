@extends('layouts.app')
@section('css')
    <style>
        .status-failed {
            color: red;
        }

        .status-success {
            color: green;
        }

        .table-succes {
            background-color: #459e91;
            color: #f8fafc;
        }

        .table thead th {
            color: #f1f1f1;
            border-width: 1px;
        }

        .table-text {
            white-space: nowrap;
            max-width: 50%;
        }

    </style>
@endsection
@section('content')
    <div class="page-title">
        <h1 id="previousPageTitle"></h1>
        <h1>تقارير الملفات</h1>
    </div>
    <div class="card-section">
        <div class="d-flex flex-wrap mb-4">
            @include('.pages.yatem.partials.import')
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="col">
                    <h4>@lang('message.yateem_import.result')</h4>
                    @foreach(session('aytamsImportResult',[])??[] as $key=>$result)
                        <h5>@lang('message.yateem_import.'.$key)</h5>
                        <ul>
                            @foreach($result as $status=>$count)
                                <li class="status-{{ $status }}">@lang('message.yateem_import.'.$status, ['count'=>$count])</li>
                            @endforeach
                        </ul>
                        <hr/>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
                <button type="button" class="btn btn-outline-primary ml-3" style="background: #459e91; color: #eeeeee"
                        onclick="location.href='{{ url('aytams-import-result?sheet=yateem')}}'">الايتام
                    <div
                        style="background: #ff002a;float: left;color: #eeeeee;margin-left: 10px;margin-right: 10px;font-size: large;">
                        {{$yateemErrorsCount}} </div>
                </button>

                <button type="button" class="btn btn-outline-primary ml-3" style="background: #459e91; color: #eeeeee"
                        onclick="location.href='{{ url('aytams-import-result?sheet=father')}}'">الآباء
                    <div
                        style="background: #ff002a;float: left;color: #eeeeee;margin-left: 10px;margin-right: 10px;font-size: large;">
                        {{$fatherErrorsCount}} </div>
                </button>
                <button type="button" class="btn btn-outline-primary ml-3" style="background: #459e91; color: #eeeeee"
                        onclick="location.href='{{ url('aytams-import-result?sheet=mother')}}'">الامهات
                    <div
                        style="background: #ff002a;float: left;color: #eeeeee;margin-left: 10px;margin-right: 10px;font-size: large;">
                        {{$motherErrorsCount}} </div>
                </button>
                <button type="button" class="btn btn-outline-primary ml-3" style="background: #459e91; color: #eeeeee"
                        onclick="location.href='{{ url('aytams-import-result?sheet=moeel')}}'">المعيلين
                    <div
                        style="background: #ff002a;float: left;color: #eeeeee;margin-left: 10px;margin-right: 10px;font-size: large;">
                        {{$moeelErrorsCount}} </div>
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered mb-5">
                        <thead>
                        <tr class="table-succes">
                            <th scope="col" style="width: 100%">الخطأ</th>
                            @foreach(trans('import')[request()->get('sheet')]??[] as $key=>$title)
                                <th scope="col">{{ $title }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($importResult as $importResults)
                            <tr>
                                <td style="color: red" class="table-text">
                                    <ul>
                                        @foreach($importResults['error'] as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                @foreach(trans('import')[request()->get('sheet')]??[] as $key=>$title)
                                    <td class="table-text">{{ data_get($importResults['record'], $key) }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

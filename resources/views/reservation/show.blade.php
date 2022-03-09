@extends('layouts.app')

@section('title', 'كفالات')

@section('page_title', 'كفالات')

@section('content')

        <div class="card-section">
            <div class="actions">
                <div class="d-flex flex-wrap align-items-center">
                </div>
            <ul class="custom-table">
                <li class="head">
                    <span>الكافل</span>
                    <span>تاريخ الكفالة</span>
                    <span>مبلغ الكفالة/شهر</span>
                    <span>مدة الكفالة</span>
                    <span>المتبقي</span>
                    <span>الحالة</span>
                </li>

                <ul id="warranty_table_body" class="body">
                    @forelse($warranties as $warranty)
                        <li>
                            <span>{{$warranty->sponsor->full_name}}</span>
                            <span>{{$warranty->start}}</span>
                            <span>{{$warranty->amount}}</span>
                            <span>{{\Illuminate\Support\Carbon::createFromDate($warranty->start)->diffInMonths($warranty->end) }}أشهر  </span>
                            <span>{{ now()->diffInMonths($warranty->end)}} أشهر</span>
                            <span>{{$warranty->status}}</span>
                        </li>
                    @empty
                        <ul>
                            <li id="span" style="margin-top: 20px ;font-size: 20px;background-color: white">
                                لا يوجد كفالات لهذا اليتيم...
                            </li>
                        </ul>
                    @endforelse
                </ul>
            </ul>
        </div>
    </div>
@endsection


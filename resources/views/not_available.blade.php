@extends('layouts.app')

@section('title', 'طباعة ')

@section('page_title', 'طباعة ')

@section('css')
    <style>
        a {
            color: #057a65;
        }

        table a:hover {
            text-decoration: underline;
        }

        #yatemsTable .yatem_name {
            min-width: 180px;
        }

        #yatemsTable .alert {
            margin-bottom: 0;
            text-align: center;
        }

        .table tbody tr td {
            min-width: 125px;
        }

        .table tbody tr td:first-child {
            min-width: 40px;
        }
    </style>
@endsection
<div class="hide">
<?php

    $product = \App\Models\Product::query()->where('status',0)->get();
    $party = \App\Models\Party::query()->where('status',0)->get();
    $acc = \App\Models\Accessory::query()->where('status',0)->get();

    $fas=$product->concat($party);
    $data = $fas->concat($acc);
?>
</div>
@section('content')
    <div class="card-section">
        <div class="actions">
            <div id="tableWrapper">
                <table id="yatemsTable" class="table table-hover">
                    <thead>
                    <tr>

                        <th class="idc_head" onclick="changeSort('idc')">
                            الاسم
                        </th>
                        <th class="mobile_1_head" onclick="changeSort('mobile_1')">
                            الكود
                        </th>
                        <th class="address_head" onclick="changeSort('address')">
                            الموديل
                        </th>
                        <th class="address_head" onclick="changeSort('ؤيؤ')">
                            الحجم
                        </th>
                        <th class="yatom_reason_head" onclick="changeSort('yatom_reason')">
                            السعر
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $product)
{{--                        {{dd($product)}}--}}
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->model }}</td>
                            <td>{{ $product->size[0]??'لا يوجد احجام للاكسسوار' }}</td>
                            <td>{{ $product->price}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        window.print();
    </script>
@endsection

@extends('layouts.app')

@section('title', 'طباعة الأيتام')

@section('page_title', 'طباعة الأيتام')

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

@section('content')
<div class="card-section">
    <div class="actions">
        <div id="tableWrapper">
            <table id="yatemsTable" class="table table-hover">
                <thead>
                    <tr>
                        <th class="full_name_head" onclick="changeSort('full_name')">
                            الإسم الرباعي
                        </th>
                        <th class="idc_head" onclick="changeSort('idc')">
                            رقم الهوية
                        </th>
                        <th class="mobile_1_head" onclick="changeSort('mobile_1')">
                            الموبايل 1
                        </th>
                        <th class="address_head" onclick="changeSort('address')">
                            العنوان
                        </th>
                        <th class="yatom_reason_head" onclick="changeSort('yatom_reason')">
                            سبب اليتم
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($yatems as $yatem)
                        <tr>
                            <td>{{ $yatem->full_name }}</td>
                            <td>{{ $yatem->idc }}</td>
                            <td>{{ $yatem->mobile_1 }}</td>
                            <td>{{ $yatem->address }}</td>
                            <td>{{ $yatem->yatom_reason }}</td>
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

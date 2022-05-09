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
    {{
    $dress = \App\Models\Reservation::query()->where('created_at','<>',\Illuminate\Support\Carbon::now()->endOfYear())->get(),
}}
</div>
@section('content')
    <div class="card-section">
        <div class="actions">
            <div id="tableWrapper">
                <table id="yatemsTable" class="table table-hover">
                    <thead>
                    <tr>

                        <th class="idc_head" onclick="changeSort('idc')">
                            اسم الزبون
                        </th>
                        <th class="idc_head" onclick="changeSort('idc')">
                            رقم هاتف الزبون
                        </th>
                        <th class="mobile_1_head" onclick="changeSort('mobile_1')">
                            تاريخ الحجز
                        </th>
                        <th class="yatom_reason_head" onclick="changeSort('yatom_reason')">
                            المدفوعات
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($dress))
                        @foreach ($dress as $product)
                            <tr>
                                <td>{{ $product->customer_name }}</td>
                                <td>{{ $product->mobile }}</td>
                                <td>{{ $product->created_at }}</td>
                                <td>{{ $product->total_price }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">
                                لا يوجد مبيعات لهذة السنة حتى الان
                            </td>
                        </tr>
                    @endif
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

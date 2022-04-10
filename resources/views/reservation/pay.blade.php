@extends("layouts.app")
<style>


</style>

@section('content')

    <div class="card-section">

        <div class="actions">


            <h3 class="section-title non-account-data">المعلومات الأساسية للزبون</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group non-account-data">
                                <label for="job_id">{{ __('اسم الزبون') }}</label>

                                <input id="job_id" type="text"
                                       class="form-control required @error('job_id') is-invalid @enderror"
                                       name="job_id"
                                       value="{{ old('job_id') ??  $reservation->customer_name ?? '' }}"
                                       disabled readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group non-account-data">
                                <label for="full_name">{{ __('رقم الهاتف') }}</label>
                                <input id="full_name" type="text"
                                       class="form-control "
                                       name="full_name"
                                       value="{{ old('full_name') ?? $reservation->mobile ?? '' }}"
                                       readonly disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group non-account-data">
                                <label for="birth_of_date">{{ __('تاريخ بداية الحجز ') }}</label>
                                <input id="birth_of_date" type="text" name="birth_of_date"
                                       class="date datepicker form-control"
                                       value="{{ old('birth_of_date') ?? $reservation->start?? '' }}"
                                       readonly disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group non-account-data">
                                <label for="birth_of_date">{{ __('تاريخ نهاية الحجز ') }}</label>
                                <input id="birth_of_date" type="text" name="birth_of_date"
                                       class="date datepicker form-control"
                                       value="{{ old('birth_of_date') ?? $reservation->end?? '' }}"
                                       readonly disabled>
                            </div>
                        </div>

                    </div>

                    <h3 class="section-title non-account-data">المعلومات الخاصة بالحجز</h3>

                    <div class="row">

                        <div style="display: none">
                            {{$product_name=\App\Models\Product::query()->where('code',$reservation->dress_code)->first()}}
                            <br>
                        </div>

                        <div style="display: none">
                            {{$ss=\App\Models\Party::query()->where('code',$reservation->party_code)->first()??''}}
                            <br>
                        </div>

                        <div style="display: none">
                            {{$dress_code_acc=\App\Models\Accessory::query()->where('code',$reservation->dress_code_acc)->first()??''}}
                            <br>
                        </div>

                        <div style="display: none">
                            {{$party_code_acc=\App\Models\Accessory::query()->where('code',$reservation->party_code_acc)->select('name')->first()??''}}
                            <br>
                        </div>
                        {{--                        {{dd($product_name)}}--}}

                        @if($product_name!=null)
                            <div class="col-md-3">
                                <div class="form-group non-account-data">
                                    <label for="birth_of_date">{{ __('فستان زفاف') }}</label>
                                    <input id="birth_of_date" type="text" name="birth_of_date"
                                           class="date datepicker form-control"
                                           value="{{'₪'.$product_name->name.','.'سعره'.'='. $product_name->price  }}"
                                           readonly disabled>
                                </div>
                            </div>
                        @else
                            <div class="col-md-3">
                                <div class="form-group non-account-data">
                                    <label for="birth_of_date">{{ __('فستان زفاف') }}</label>
                                    <input id="birth_of_date" type="text" name="birth_of_date"
                                           class="date datepicker form-control"
                                           value="{{ 'لا يوجد'}}"
                                           readonly disabled>
                                </div>
                            </div>
                        @endif

                        @if($ss!=null)
                            <div class="col-md-3">
                                <div class="form-group non-account-data">
                                    <label for="birth_of_date">{{ __('فستان سهرة') }}</label>
                                    <input id="birth_of_date" type="text" name="birth_of_date"
                                           class="date datepicker form-control"
                                           value="{{'₪'.$ss->name.','.'سعره'.'='. $ss->price  }}"
                                           readonly disabled>
                                </div>
                            </div>
                        @else
                            <div class="col-md-3">
                                <div class="form-group non-account-data">
                                    <label for="birth_of_date">{{ __('فستان سهرة') }}</label>
                                    <input id="birth_of_date" type="text" name="birth_of_date"
                                           class="date datepicker form-control"
                                           value="{{ 'لا يوجد'}}"
                                           readonly disabled>
                                </div>
                            </div>
                        @endif

                        @if($dress_code_acc!=null)
                            <div class="col-md-3">
                                <div class="form-group non-account-data">
                                    <label for="birth_of_date">{{ __('اكسسوار زفاف') }}</label>
                                    <input id="birth_of_date" type="text" name="birth_of_date"
                                           class="date datepicker form-control"
                                           value="{{'₪'.$dress_code_acc->name.','.'سعره'.'='. $dress_code_acc->price  }}"
                                           readonly disabled>
                                </div>
                            </div>
                        @else
                            <div class="col-md-3">
                                <div class="form-group non-account-data">
                                    <label for="birth_of_date">{{ __('اكسسوار زفاف') }}</label>
                                    <input id="birth_of_date" type="text" name="birth_of_date"
                                           class="date datepicker form-control"
                                           value="{{ 'لا يوجد'}}"
                                           readonly disabled>
                                </div>
                            </div>
                        @endif

                        @if($party_code_acc!=null)
                            <div class="col-md-3">
                                <div class="form-group non-account-data">
                                    <label for="birth_of_date">{{ __('اكسسوار سهرة') }}</label>
                                    <input id="birth_of_date" type="text" name="birth_of_date"
                                           class="date datepicker form-control"
                                           value="{{'₪'.$party_code_acc->name.','.'سعره'.'='. $party_code_acc->price  }}"
                                           readonly disabled>
                                </div>
                            </div>
                        @else
                            <div class="col-md-3">
                                <div class="form-group non-account-data">
                                    <label for="birth_of_date">{{ __('اكسسوار سهرة') }}</label>
                                    <input id="birth_of_date" type="text" name="birth_of_date"
                                           class="date datepicker form-control"
                                           value="{{ 'لا يوجد'}}"
                                           readonly disabled>
                                </div>
                            </div>
                        @endif

                    </div>

                    <h3 class="section-title non-account-data">معلومات الدفع</h3>
                    @if (isset($errors) && $errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <form action="{{route('reservation.pay1')}}" method="GET" style="    border: 25px solid #ff8080;">
                        <input type="hidden" name="id" value="{{$reservation->id}}">
{{--                        <input type="hidden" name="remaining" value="{{($reservation->dress_price+$reservation->party_price+$reservation->dress_price_acc+$reservation->party_price_acc)-$reservation->total_price}}">--}}

                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group non-account-data">
                                    <label for="job_id">{{ __('اجمالي المبلغ') }}</label>

                                    <input id="job_id" type="text"
                                           class="form-control required @error('job_id') is-invalid @enderror"
                                           name="job_id"
                                           value="{{$reservation->dress_price+$reservation->party_price+$reservation->dress_price_acc+$reservation->party_price_acc}}"
                                           disabled readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group non-account-data">
                                    <label for="full_name">{{ __('المدفوع مسبقا') }}</label>
                                    <input id="full_name" type="text"
                                           class="form-control "
                                           name="full_name"
                                           value="{{ $reservation->total_price }}"
                                           readonly disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group non-account-data">
                                    <label for="birth_of_date">{{ __('المتبقي') }}</label>
                                    <input id="birth_of_date" type="text" name="birth_of_date"
                                           class="date datepicker form-control"
                                           value="{{ ($reservation->dress_price+$reservation->party_price+$reservation->dress_price_acc+$reservation->party_price_acc)-$reservation->total_price }}"
                                           readonly disabled>
                                </div>
                            </div>
{{--                            {{dd((($reservation->dress_price+$reservation->party_price+$reservation->dress_price_acc+$reservation->party_price_acc)-$reservation->total_price))}}--}}
                            @if((($reservation->dress_price+$reservation->party_price+$reservation->dress_price_acc+$reservation->party_price_acc)-$reservation->total_price)==0)
                            <div class="col-md-3">
                                <div class="form-group non-account-data">

                                    <label for="total_price">{{ __('المبلغ المراد دفعه') }}</label>
                                    <input id="total_price" type="text"
                                           class="form-control @error('total_price') is-invalid @enderror"
                                           name="total_price"
                                           value="{{ old('total_price') }}"
                                           autocomplete="total_price" maxlength="10" placeholder="يرجى اضافة المبلغ" readonly disabled>
                                </div>
                            </div>
                            @else
                                <div class="col-md-3">
                                    <div class="form-group non-account-data">

                                        <label for="total_price">{{ __('المبلغ المراد دفعه') }}</label>
                                        <input id="total_price" type="text"
                                               class="form-control @error('total_price') is-invalid @enderror"
                                               name="total_price"
                                               value="{{ old('total_price') }}"
                                               autocomplete="total_price" maxlength="10" placeholder="يرجى اضافة المبلغ" >
                                    </div>
                                </div>
                            @endif

                        </div>


                        <div class="row" style="justify-content: space-evenly;">
                            @if((($reservation->dress_price+$reservation->party_price+$reservation->dress_price_acc+$reservation->party_price_acc)-$reservation->total_price)==0)

                            @else
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn--primary type--uppercase"
                                            style="background-color: #fd9292!important;    width: inherit;">اضافة المبلغ
                                    </button>
                                </div>
                            @endif


                            <div class="col-md-4">

                                <button class="btn btn--primary type--uppercase"
                                        style="background-color: #fd9292!important;    width: -webkit-fill-available;">
                                    <a href="/reservation"> العوده لصفحة العرض</a></button>
                            </div>
                        </div>


                    </form>




                </div>
            </div>
        </div>
    </div>
@endsection



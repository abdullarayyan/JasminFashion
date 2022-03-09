<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-primary ml-3" data-toggle="modal"
        data-target="#exampleModal">
    <i class="bx bxs-user-plus"></i>
    <span>اضافة أخ /أخت</span>
</button>
<!-- Modal -->
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافة أخ/أخت</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/aytams-add-brother',$yatem->id ) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="full_name"><span
                                                class="required_lbl">*</span>{{ __('الإسم الرباعي') }}</label>
                                        <input id="full_name" type="text"
                                               class="form-control required @error('full_name') is-invalid @enderror"
                                               name="full_name" required
                                               autocomplete="full_name">
                                        @error('full_name')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="idc"><span class="required_lbl">*</span>{{ __('رقم الهوية') }}
                                        </label>
                                        <input id="idc" type="number" maxlength="{{ getMaxLength('idc') }}"
                                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                               class="form-control required @error('idc') is-invalid @enderror"
                                               name="idc"
                                               required autocomplete="idc">
                                        @error('idc')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="birth_of_date">{{ __('تاريخ الميلاد') }}</label>
                                        <input id="birth_of_date" type="date" name="birth_of_date"
                                               class="date datepicker form-control @error('birth_of_date') is-invalid @enderror"
                                               data-plugin="datepicker">

                                        @error('birth_of_date')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="place_of_birth">{{ __('مكان الولادة') }}</label>
                                        <input id="place_of_birth" type="text" class="form-control @error('place_of_birth') is-invalid @enderror"
                                               name="place_of_birth"
                                               autocomplete="place_of_birth">

                                        @error('place_of_birth')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile_1"><span class="required_lbl">*</span>{{ __('الموبايل') }}
                                        </label>
                                        <input id="mobile_1" type="number" maxlength="{{ getMaxLength('mobile') }}"
                                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                               class="form-control required @error('mobile_1') is-invalid @enderror"
                                               name="mobile_1" required
                                               autocomplete="mobile_1">
                                        @error('mobile_1')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender"><span class="required_lbl">*</span>{{ __('الجنس') }}</label>

                                        <select id="gender" name="gender" required
                                                class="select2 form-control @error('gender') is-invalid @enderror">
                                            <option value="1">ذكر</option>
                                            <option value="0">أنثى</option>
                                        </select>
                                        @error('gender')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nationality">{{ __('الجنسية') }}</label>
                                        <input id="nationality" type="text"
                                               class="form-control @error('nationality') is-invalid @enderror"
                                               name="nationality"
                                               {{--                                               value="{{ old('nationality') ?? ($yatem->user_profile->nationality ?? '') }}"--}}
                                               autocomplete="nationality">

                                        @error('nationality')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row" >
                                <div class="col-md-6" >
                                    <button class="btn btn-primary ml-3">
                                        <i class="bx bxs-user-plus"></i>
                                        <span>اضافة</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


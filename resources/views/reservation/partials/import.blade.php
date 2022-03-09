<!-- Button trigger modal -->
<button type="button" class="btn btn-primary ml-3" data-toggle="modal" id="btn-modal-import"
        data-target="#exampleModal">
    <i class="bx bxs-file-import"></i>
    <span>استيراد ملف</span>
</button>

<!-- Modal -->
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">استيراد ملف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/aytams-import') }}" method="POST" enctype="multipart/form-data" onsubmit="showSpinner()">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-control form-upload">
                                        <div class="d-flex align-items-center">
                                            <button type="button"
                                                    onclick="document.getElementById('file_upload').click()">
                                                اختار ملف
                                            </button>
                                            <label class="filename"></label>
                                        </div>
                                        <input required type='file' class="hidden_file_input" name="file"
                                               id="file_upload">
                                    </div>
                                </div>
                                @if (isset($errors) && $errors->any())
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif

                                <div class="col-md-2">
                                    <button class="btn btn-primary ml-3">
                                        <i class="bx bx-upload"></i>
                                        <span>رفع الملف</span>
                                    </button>
                                </div>

                                <div class="col-md-2">
                                    <a href="{{url('/aytams-export-sample')}}" class="btn btn-outline-primary ml-3">
                                        <i class="bx bx-download"></i>
                                        <span>تحميل نموذج</span>
                                    </a>
                                </div>


                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

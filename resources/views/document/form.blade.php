@extends('layout.default')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-10">
            <form action="{{route('document.post')}}" method="POST" id="mainForm" enctype="multipart/form-data">
                @csrf

                <div class="card">
                    <div class="card-header">
                        <h4>Supporting Documents</h4>
                    </div>



                    <div class="card-body">

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="row mb-4">
                            <div class="col-md-4">
                                <h6>Document Name</h6>
                            </div>
                            <div class="col-md-4">
                                Upload File
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Company Registration
                            </div>
                            <div class="col-md-4">
                                <div class="image-upload justify-content-center">
                                    <label for="file-input">
                                        <i class="fa-solid fa-upload" style="cursor:pointer"></i>
                                    </label>

                                    <input id="file-input" type="file" name="company_registration" />
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                VAT Registration
                            </div>
                            <div class="col-md-4">
                                <div class="image-upload justify-content-center">
                                    <label for="file-input">
                                        <i class="fa-solid fa-upload" style="cursor:pointer"></i>
                                    </label>

                                    <input id="file-input" type="file" name="vat_registration"  />
                                </div>
                            </div>

                        </div>

                        <div class="row mt-4">
                            <div class="col-md-4">
                                <h6>Additional Documents</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Additional Document 1
                            </div>
                            <div class="col-md-4">
                                <div class="image-upload justify-content-center">
                                    <label for="file-input">
                                        <i class="fa-solid fa-upload" style="cursor:pointer"></i>
                                    </label>

                                    <input id="file-input" type="file" name="doc_1" style="display:none" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Additional Document 2
                            </div>
                            <div class="col-md-4">
                                <div class="image-upload justify-content-center">
                                    <label for="file-input">
                                        <i class="fa-solid fa-upload" style="cursor:pointer"></i>
                                    </label>

                                    <input id="file-input" type="file" name="doc_2" style="display:none" />
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Next Step</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function getFile(filename)
 {
  var newfile=filename.replace(/^.*\\/,"");
  $('.imageUpload').html(newfile);
 }
</script>

@endpush

@endsection
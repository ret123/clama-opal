@extends('layout.default')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-10">
            <form action="{{ route('companies.post') }}" method="POST" id="mainForm">
                @csrf

                <div class="card">
                    <div class="card-header">Contact Details</div>



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

                        <div class="form-inline mb-4">
                            <input class="form-check-input" type="radio" name="company_type" value="NGO" id="flexRadioDefault1" checked onclick="show1();">
                            <label class="form-check-label" for="flexRadioDefault1">
                                NGO
                            </label>

                            <input class="form-check-input ml-4" type="radio" name="company_type" value="Company" id="flexRadioDefault2" onclick="show2();">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Company
                            </label>
                        </div>
                        <div class="row">
                            <div id="div1" class="form-group  col-md-4" style="display:none">
                                <label for="company_numbar">Company Registration Number:</label>
                                <input type="text" value="{{ $company->company_number ?? '' }}" class="form-control" id="company_number" name="company_number">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="company_name">Company Name:</label>
                                <input type="text" value="{{ $company->company_name ?? '' }}" class="form-control" id="company_name" name="company_name" />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">Email:</label>
                                <input type="text" value="{{ $company->email ?? '' }}" class="form-control" id="email" name="email" />
                            </div>
                        </div>



                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="otp">OTP:</label>
                                <input type="text" id="otp" class="form-control" name="otp" />
                            </div>



                        </div>
                        <button class="btn btn-primary" onclick="showForm();">Validate OTP</button>


                        <div id="show-form" class="mt-4" style="display:none">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="first_name">First Name:</label>
                                    <input type="text" value="{{ $company->first_name ?? '' }}" class="form-control" id="first_name" name="first_name" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" value="{{ $company->last_name ?? '' }}" class="form-control" id="last_name" name="last_name" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="country">Country:</label>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                            Country
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">India</a>
                                            <a class="dropdown-item" href="#">United State of America</a>
                                            <a class="dropdown-item" href="#">United Kingdom</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phone">Phone Number:</label>
                                    <input type="text" value="{{ $company->phone ?? '' }}" class="form-control" id="phone" name="phone" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="website">Website:</label>
                                    <input type="text" value="{{ $company->website ?? '' }}" class="form-control" id="website" name="website" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="description">Media Links:</label>


                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="twitter">Twitter:</label>
                                    <input type="text" value="{{ $company->twitter ?? '' }}" class="form-control" id="twitter" name="twitter" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="linkedin">LinkedIn:</label>
                                    <input type="text" value="{{ $company->linkedin ?? '' }}" class="form-control" id="linkedin" name="linkedin" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="facebook">Facebook:</label>
                                    <input type="text" value="{{ $company->facebook ?? '' }}" class="form-control" id="facebook" name="facebook" />
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Next Step</button>

                        </div>



                    </div>

                    <div class="card-footer">

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
<script>
    function show1() {
        document.getElementById('div1').style.display = 'none';
    }

    function show2() {
        document.getElementById('div1').style.display = 'block';
    }
</script>
<script>
    function showForm() {
      
        event.preventDefault();
        document.getElementById('show-form').style.display = 'block';
    
    }
</script>
@endpush

@endsection
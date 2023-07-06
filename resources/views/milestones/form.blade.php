@extends('layout.default')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-10">
            <form action="{{route('milestones.post')}}" method="POST" id="mainForm">
                @csrf

                <div class="card">
                    <div class="card-header">
                        <h4>Milestones</h4>
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

                        <div class="row">
                            <div class="col-md-4">
                                <h6>Activity Phase</h6>
                            </div>
                            <div class="col-md-4">
                                <h6>Duration</h6>
                            </div>
                            <div class="col-md-4">

                            </div>
                        </div>
                        <div id="container">
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <input type="text" name="activity_phase[]" class="form-control" value="{{old('activity_phase') ?? ''}}">
                                </div>
                                <div class="col-md-3">
                                    <input type="number" name="duration[]" class="form-control" value="{{old('duration')}}">
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select form-control" aria-label="Default select example" name="duration_type[]" value="{{old('duration_type')}}">

                                        <option value="days">Days</option>
                                        <option value="weeks">Weeks</option>
                                        <option value="months">Months</option>
                                        <option value="years">Years</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <input type="text" name="activity_phase[]" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <input type="number" name="duration[]" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select form-control" aria-label="Default select example" name="duration_type[]">

                                        <option value="days">Days</option>
                                        <option value="weeks">Weeks</option>
                                        <option value="months">Months</option>
                                        <option value="years">Years</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <input type="text" name="activity_phase[]" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <input type="number" name="duration[]" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select form-control" aria-label="Default select example" name="duration_type[]">

                                        <option value="days">Days</option>
                                        <option value="weeks">Weeks</option>
                                        <option value="months">Months</option>
                                        <option value="years">Years</option>
                                    </select>
                                </div>
                                <div class="col-md-2 addButton">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle-fill" onclick="addRow()" style="cursor:pointer" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                    </svg>
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
    function addRow() {
        console.log('clicked');
        var newRow = $(` <div class="row mb-2">
                            <div class="col-md-4">
                                <input type="text" name="activity_phase[]" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <input type="number" name="duration[]" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <select class="form-select form-control" aria-label="Default select example" name="duration_type[]">

                                    <option value="days">Days</option>
                                    <option value="weeks">Weeks</option>
                                    <option value="months">Months</option>
                                    <option value="years">Years</option>
                                </select>
                            </div>
                            <div class="col-md-2 addButton">
                           
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" style="cursor:pointer" fill="currentColor" class="bi bi-plus-circle-fill" 
                             onClick="addRow()" viewBox="0 0 16 16">
                              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                            </svg>
                            </div>
                        </div>`);
        $('#container').append(newRow);
        $('.addButton:not(:last)').hide();
    }
</script>

@endpush

@endsection
@extends('layout.default')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-10">
            <form action="{{route('milestones.post')}}" method="POST" id="mainForm">
                @csrf

                <div class="card">
                    <div class="card-header">
                        <h4>Financial Information</h4>
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
                                <h6>Item Description</h6>
                            </div>
                            <div class="col-md-4">
                                <h6>Cost (OMR)</h6>
                            </div>

                        </div>
                        <div id="container">
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <input type="text" name="item_description[]" class="form-control" value="{{old('item_description')}}">
                                </div>
                                <div class="col-md-4">
                                    <input type="number" name="cost[]" class="form-control" value="{{old('cost')}}">
                                </div>
                                <div class="col-md-2 addButton">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle-fill" onclick="addRow" style="cursor:pointer" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-dash-circle-fill" onclick="deleteRow" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z" />
                                    </svg>
                                </div>
                              

                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <input type="text" name="item_description[]" class="form-control" value="{{old('item_description')}}">
                                </div>
                                <div class="col-md-4">
                                    <input type="number" name="cost[]" class="form-control" value="{{old('cost')}}">
                                </div>
                                <div class="col-md-2 addButton">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle-fill" onclick="addRow()" style="cursor:pointer" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-dash-circle-fill" onclick="deleteRow" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z" />
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
        var newRow = $(`    <div class="row mb-2">
                                <div class="col-md-4">
                                    <input type="text" name="item_description[]" class="form-control" value="{{old('item_description')}}">
                                </div>
                                <div class="col-md-4">
                                    <input type="number" name="cost[]" class="form-control" value="{{old('cost')}}">
                                </div>
                                <div class="col-md-2 addButton">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle-fill" onclick="addRow()" style="cursor:pointer" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-dash-circle-fill" onclick="deleteRow" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z" />
                                    </svg>
                                </div>


                            </div>`);
        $('#container').append(newRow);

    }
</script>
<script>
    function deleteRow() {
        
    }
</script>

@endpush

@endsection
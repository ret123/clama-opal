@extends('layout.default')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-10">
            <form action="{{route('finance.post')}}" method="POST" id="mainForm">
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
                            <div class="row mb-2 cell">
                                <div class="col-md-4">
                                    <input type="text" name="item_description[]" class="form-control" value="{{old('item_description')}}">
                                </div>
                                <div class="col-md-4">
                                    <input type="number" name="cost[]" class="form-control" value="{{old('cost')}}">
                                </div>
                                <div class="col-md-2 mt-2 addButton">

                                    <i class="fa-solid fa-circle-plus fa-xl addRow" style="cursor:pointer"></i>
                                    <i class="fa-solid fa-circle-minus fa-xl deleteRow" style="cursor:pointer"></i>
                                </div>


                            </div>
                            <div class="row mb-2 cell">
                                <div class="col-md-4">
                                    <input type="text" name="item_description[]" class="form-control" value="{{old('item_description')}}">
                                </div>
                                <div class="col-md-4">
                                    <input type="number" name="cost[]" class="form-control" value="{{old('cost')}}">
                                </div>
                                <div class="col-md-2 mt-2 addButton">

                                    <i class="fa-solid fa-circle-plus fa-xl addRow" style="cursor:pointer"></i>
                                    <i class="fa-solid fa-circle-minus fa-xl deleteRow" style="cursor:pointer"></i>
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
    $("#container").on('click', '.addRow', function() {

        var newRow = $(`    <div class="row mb-2 cell">
                                <div class="col-md-4">
                                    <input type="text" name="item_description[]" class="form-control" value="{{old('item_description')}}">
                                </div>
                                <div class="col-md-4">
                                    <input type="number" name="cost[]" class="form-control" value="{{old('cost')}}">
                                </div>
                                <div class="col-md-2 mt-2 addButton">

                                <i class="fa-solid fa-circle-plus fa-xl addRow" style="cursor:pointer"></i>
                                    <i class="fa-solid fa-circle-minus fa-xl deleteRow" style="cursor:pointer"></i>
                                </div>


                            </div>`);
        $('#container').append(newRow);

    });
</script>
<script>
    $("#container").on('click', '.deleteRow', function() {
        console.log('clicked')
        $(this).closest('.cell').remove();
    });
</script>

@endpush

@endsection
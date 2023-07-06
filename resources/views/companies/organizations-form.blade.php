@extends('layout.default')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-10">
            <form action="{{route('companies.organizations.post')}}" method="POST" id="mainForm">
                @csrf

                <div class="card">
                    <div class="card-header">
                        <h4>Organization Details</h4>
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
                        <h6>Status of Organization</h6>

                        <div class="row">
                            @foreach($organizations->split($organizations->count()/2) as $row)
                            <div class="col-md-6">
                                @foreach($row as $org)
                                <input type="checkbox" name="organization_status[]" value="{{$org->name}}"> {{$org->name}} <br />
                                @endforeach
                            </div>

                            @endforeach

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="checkbox" name="organization_status[]" value="others">
                                Others

                            </div>

                        </div>



                        <div class="row mt-4">
                            <div class="form-group col-md-12">
                                <label for="organization_description"><h6>Organization Descriptions:</h6></label>
                                <textarea class="form-control" id="organization_description" name="organization_description" rows="4">{{ old('organization_description') ?? '' }}</textarea>

                            </div>
                        </div>

                        
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Next Step</button>
                            </div>
                        </div>



                    </div>

                    <div class="card-footer">

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
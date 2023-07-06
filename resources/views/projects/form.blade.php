@extends('layout.default')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-10">
            <form action="{{ route('projects.post') }}" method="POST" id="mainForm" enctype="multipart/form-data">
                @csrf

                <div class="card">
                    <div class="card-header">Project Details</div>



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
                            <div class="form-group col-md-4">
                                <label for="category">Category:</label>
                                <select class="form-select form-control" aria-label="Default select example" name="category">
                                    <option selected>Category</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div id="div1" class="form-group  col-md-4">
                                <label for="title">Title:</label>
                                <input type="text" value="{{ old('title') ?? '' }}" class="form-control" id="title" name="title">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="project_description">Description:</label>
                                <textarea class="form-control" id="project_description" name="project_description" rows="2">{{ old('project_description') ?? '' }}</textarea>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="project_objective">Project Objective:</label>
                                <textarea class="form-control" id="project_objective" name="project_objective" rows="2">{{ old('project_objective') ?? '' }}</textarea>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="project_outcome">Project Outcome:</label>
                                <textarea class="form-control" id="project_outcome" name="project_outcome" rows="2">{{ old('project_outcome') ?? '' }}</textarea>

                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="jobs">How many jobs were created?:</label>
                                <input type="number" value="{{ old('jobs') ?? '' }}" class="form-control" id="jobs" name="jobs" />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="sme">How many SMEs were supported?:</label>
                                <input type="number" value="{{ old('sme') ?? '' }}" class="form-control" id="sme" name="sme" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="product_utilized">How many local products were utilized?:</label>
                                <input type="number" value="{{ old('product_utilized') ?? '' }}" class="form-control" id="product_utilized" name="product_utilized" />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="social_impact">Environmental Social Impact:</label>
                                <input type="number" value="{{ old('social_impact') ?? '' }}" class="form-control mt-4" id="social_impact" name="social_impact" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="beneficiaries">Number of beneficiaries:</label>
                                <input type="number" value="{{ old('beneficiaries') ?? '' }}" class="form-control" id="beneficiaries" name="beneficiaries" />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="beneficiaries_description">Describe Beneficiaries:</label>
                                <input type="text" value="{{ old('beneficiaries_description') ?? '' }}" class="form-control" id="beneficiaries_description" name="beneficiaries_description" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="target_group">Target Group:</label>
                                <select class="form-select form-control" aria-label="Default select example" name="target_group">
                                    <option selected>Target Group</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                               
                            </div>
                            <div class="form-group col-md-4">
                                <label for="capacity">Capacity:</label>
                                <input type="number" value="{{ old('capacity') ?? '' }}" class="form-control" id="capacity" name="capacity" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="governate">Governate:</label>
                                <select class="form-select form-control" aria-label="Default select example" name="governate">
                                    <option selected>Governate</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Town">Town:</label>
                                <select class="form-select form-control" aria-label="Default select example" name="town">
                                    <option selected>Town</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Project Image</label>
                                <input class="form-control" type="file" name="project_image" id="formFile">
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


@endsection
@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit company info</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('company.show', $company->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $company->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ $company->address }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Modify</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

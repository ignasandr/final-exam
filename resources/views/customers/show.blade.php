@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit customer details</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('customer.show', $customer->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $customer->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Surname</label>
                            <input type="text" name="surname" class="form-control" value="{{ $customer->surname }}">
                        </div>
                        <div class="form-group">
                            <label>Phone: </label>
                            <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}"> 
                        </div>
                        <div class="form-group">
                            <label>Email: </label>
                            <input type="text" name="email" class="form-control" value="{{ $customer->phone }}"> 
                        </div> 
                        <div class="form-group">
                           <label>Comment: </label>
                           <textarea id="mce" name="comment" rows=10 cols=100 class="form-control">{{ $customer->comment }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Company: </label>
                            <select name="company_id">
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}" 
                                    @if($company->id == $customer->company_id) 
                                        selected="selected" 
                                    @endif 
                                >{{ $company->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Modify</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <h1>Customers</h1>
    <div class="card-body">
        <form action="{{ route('customer.index') }}" method="GET" style="display: inline-block">
            <select name="company_id" id="" class="form-control">
                <option value="" selected disabled>Filter by company:</option>
                @foreach ($companies as $company)
                <option value="{{ $company->id }}" 
                    @if($company->id == app('request')->input('company_id')) 
                        selected="selected" 
                    @endif>{{ $company->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Filter</button>
            <a class="btn btn-success" href="{{ route('customer.index')}}">Show All</a>
        </form>

        <table class="table">
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Comment</th>
                <th>Company</th>
                <th>Actions</th>
            </tr>
        @foreach ($customers as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->surname }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->email }}</td>
            <td>{!! $customer->comment !!}</td>
            <td>{{ $customer->company_id }}</td>
            <td>
                <form action="/customers/{{ $customer->id }}" method="POST">
                    <a class="btn btn-success" href="{{ route('customer.show', $customer->id) }}">Modify</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                </form>
            </td>
 
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('customer.create') }}" class="btn btn-success">Add</a>
        
    </div>
</div>

</div>

@endsection
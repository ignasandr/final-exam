@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Companies</h1>
    <div class="card-body">
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        @foreach ($companies as $company)
        <tr>
            <td>{{ $company->name }}</td>
            <td>{{ $company->address }}</td>
            <td>
                <form action="/companies/{{ $company->id }}" method="POST">
                    <a class="btn btn-success" href="{{ route('company.show', $company->id) }}">Modify</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('company.create') }}" class="btn btn-success">Add</a>
    </div>
</div>

</div>

@endsection
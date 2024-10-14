@extends('layouts.master')

@section('title', 'Learning Laravel')

@section('content')
<h1>Laravel Training</h1>
@if(auth()->check())
    <h2>Welcome, {{ auth()->user()->name }}</h2>

@endif
<p>Your main page</p>
<nav></nav>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">UserID</th>
            <th scope="col">UserName</th>
            <th scope="col">DOB</th>
            <th scope="col">Phone No</th>
            <th scope="col">ACTION</th>
            <th scope="col">
                <form method="GET" action="{{ route('user.search') }}">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Search"
                            value="{{ request()->get('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </form>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($userdetail as $userdata)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $userdata->user_id }}</td>
                <td>{{ $userdata->name }}</td>
                <td>{{ $userdata->dob }}</td>
                <td>{{ $userdata->phone }}</td>
                <td>
                    <a href="{{ route('user.edit', $userdata->user_id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('user.delete', $userdata->user_id) }}" class="btn btn-danger">Delete</a>
                    <a href="{{ route('user.profile', $userdata->user_id) }}" class="btn btn-success">View</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div>
    {{ $userdetail->links() }}
</div>
@endsection
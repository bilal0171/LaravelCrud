@extends('layouts.master')
@section('title', 'createuser')
@section('content')
    <form action="{{ route('user.update', ['user_id' => $userdetail->user_id]) }}" method="post">
        @csrf
        <div class="form-group">
            <input type="hidden" name="user_id" value="{{ $userdetail->user_id }}">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $userdetail->name }}" class="form-control" placeholder="Name:">

        </div>
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" value="{{ $userdetail->dob }}">
        </div>
        <div class="form-group">
            <label for="name">phone</label>
            <input type="text" name="phone" value="{{ $userdetail->phone }}" class="form-control" placeholder="Phone:">

        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender">
                <option value="M" @if ($userdetail->gender == 'M') selected="selected" @endif>Male</option>
                <option value="F" @if ($userdetail->gender == 'F') selected="selected" @endif>Female</option>
            </select>


        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" value="{{ $userdetail->address }}" class="form-control"
                placeholder="Address:">

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>


@endsection

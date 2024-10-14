@extends('layouts.master')
@section('title', 'createuser')
@section('content')
    <form action="{{ Route('save') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name:">

        </div>
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob">
        </div>
        <div class="form-group">
            <label for="name">phone</label>
            <input type="text" name="phone" class="form-control" placeholder="Phone:">

        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>


        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" placeholder="Address:">

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>


@endsection

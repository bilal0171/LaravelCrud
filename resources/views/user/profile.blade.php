@extends('layouts.master')

@section('title', 'User Profile')

@section('content')
<div class="container">
    <h1>{{ $userDetails->name }}'s Profile</h1>

    
    @if($userDetails->profile_pic)
        <img src="{{ asset('storage/' . $userDetails->profile_pic) }}" alt="Profile Picture" class="img-fluid">
    @endif

    
    <p><strong>Date of Birth:</strong> {{ $userDetails->dob }}</p>
    <p><strong>Phone:</strong> {{ $userDetails->phone }}</p>
    <p><strong>Gender:</strong> {{ $userDetails->gender == 'M' ? 'Male' : 'Female' }}</p>
    <p><strong>Address:</strong> {{ $userDetails->address }}</p>

    
    @if($userDetails->documents)
        <h3>Supporting Documents:</h3>
        @foreach (json_decode($userDetails->documents) as $document)
            <a href="{{ asset('storage/' . $document) }}" target="_blank">View Document</a><br>
        @endforeach
    @endif
</div>
@endsection


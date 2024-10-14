<!-- resources/views/multiplication.blade.php -->
@extends('layouts.master')

@section('title', 'Multiplication Table')

@section('content')
    <h1>Multiplication Table</h1>
    <form action="{{ url('multiplication') }}" method="get">
        @csrf
        <input type="number" name="number" id="number" class="form-control mb-2">
        <input type="submit" value="Multiply" class="btn btn-primary">
    </form>
    
    @if (isset($s))
        <p>Multiplication table of {{ $n }} is as follows:</p>
        @foreach ($s as $k => $value)
            <p>{{ $n }} x {{ $k }} = {{ $value }}</p>
        @endforeach
    @else
        <p>Enter a valid number.</p>
    @endif
@endsection

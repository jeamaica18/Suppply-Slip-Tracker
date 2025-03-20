@extends('layouts.dashboard') {{-- Extends the main dashboard layout --}}

@section('content')  {{-- Defines the content section --}}
    <p>Supply Slip Tracker System, {{ auth()->user()->username }}</p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection
<script src="{{ asset('js/sorting.js') }}"></script>

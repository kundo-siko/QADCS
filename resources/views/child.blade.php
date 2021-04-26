<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>
    <p>Hello, {{ $name }}.</p>
    <p>The current UNIX timestamp is {{ time() }}</p>
    <p>Hello, {!! $name !!}. Unescaped</p>
	
@endsection
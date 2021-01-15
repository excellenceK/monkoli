@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owlcarousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

    <title>monkoli</title>
@endsection
@section('main')

    @include('webpages.home')
@endsection

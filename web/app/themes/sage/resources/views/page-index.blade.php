{{--
Template Name: Главная
--}}

@extends('layouts.app')

@section('content')
  @include('partials.banner')
  @include('partials.about')
  @include('partials.practices')
  @include('partials.informcenter')
@endsection

@extends('layouts.base')

@section('title')
    @yield('title')
@endsection

@section('content')

    

    <div class="py-20 px-8">
        @yield('page')
    </div>


    @yield('script')
@endsection
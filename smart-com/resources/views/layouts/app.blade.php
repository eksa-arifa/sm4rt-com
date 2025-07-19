@extends('layouts.base')

@section('title')
    @yield('title')
@endsection

@section('content')
    <x-navbar />

    <div class="bg-white border-gray-200 dark:bg-gray-900 min-h-screen">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            @yield('page')
        </div>
    </div>


    @yield('script')
@endsection
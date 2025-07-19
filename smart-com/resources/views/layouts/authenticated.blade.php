@extends('layouts.base')

@section('title')
    @yield('title')
@endsection

@section('content')

    <x-sidebar>
        <div class="py-8 px-8">
            @yield('page')
        </div>
    </x-sidebar>



    @yield('script')
@endsection
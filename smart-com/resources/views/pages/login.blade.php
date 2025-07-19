@extends('layouts.app')

@section('page')
    <div class="absolute top-1/2 left-1/2 -translate-1/2 shadow-md p-6 rounded-md w-[300px] max-w-screen">
        <h1 class="text-blue-400 font-bold text-2xl">Login</h1>

        <form action="{{route('login.post')}}" method="POST">
            @csrf

            <div class="w-full flex flex-col p-2">
                <label for="email" >
                    Email:
                </label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-1" >
            </div>
            <div class="w-full flex flex-col p-2">
                <label for="password">
                    Password:
                </label>
                <input type="password" name="password" id="password" class="w-full px-4 py-2 border border-1" >
            </div>
            <div class="flex items-center">
                <input type="checkbox" value="yes" id="remember" name="remember_me">
                <label for="remember">Ingat saya</label>
            </div>

            <button type="submit" class="w-full bg-blue-400 py-2 cursor-pointer text-white mt-2">Kirim</button>
        </form>
    </div>
@endsection
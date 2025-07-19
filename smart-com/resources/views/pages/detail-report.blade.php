@extends('layouts.authenticated')

@section('page')
    <h1>Nama pelapor: {{$report->user->name}}</h1>
    <h1>Deskripsi: {{$report->description}}</h1>
    <h1>Lokasi pelapor: {{$report->location}}</h1>
    <h1>Foto pelapor: <img src="{{env("APP_URL").$report->photo}}" alt="Photo pelapor"></h1>
@endsection
@extends('layouts.authenticated')

@section('page')
    <h1 class="text-2xl">Input report</h1>

    <form action="{{route('report.createPost')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col">
            <label for="description">Description:</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </div>
        <div class="flex flex-col">
            <label for="location">Location</label>
            <input type="text" name="location" id="location">
        </div>
        <div class="flex flex-col">
            <label for="photo">Photo:</label>
            <input type="file" name="photo">
        </div>

        <div class="flex flex-col">
            <label for="category">Category:</label>
            <select name="category" id="category">
                @foreach ($categories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Kirim</button>
    </form>
@endsection


@extends('layouts/header')
@section('content')
{{--  
@if($msg = Session::get('success'))
  <div class="container">
    <p class="alert alert-primary">{{$msg}}</p>
  </div>
@endif

@if($msg = Session::get('asdf'))
  <div class="container">
    <p class="alert alert-success">{{$msg}}</p>
  </div>
@endif

@if($msg = Session::get('warning'))
  <div class="container">
    <p class="alert alert-warning">{{$msg}}</p>
  </div>
@endif --}}
<br>
<br>
<br>
<br>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col"></th>
      <th scope="col"></th>

          {{-- <th scope="col"> <a href="/category/create">Add New Record</a></th> --}}
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $dt)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$dt->name}}</td>
      <td>{{$dt->des}}</td>
      <td>
        {{-- <a href="/category/edit/{{$dt->id}}">Edit</a></td> --}}
        <form action="/category/{{$dt->id}}/edit"> 
           
          @csrf
            <button type="submit">Edit</button></td>
            </form>
        <td>
        <form method="post" action="category/{{$dt->id}}"> 
        @csrf
        <button type="submit">Delete</button></td>
        @method('delete')
        @csrf
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
  
@endsection

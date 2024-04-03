@extends('layouts/header')
@section('content')

<br>
<br>
<br>
<br>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Book Name</th>
      <th scope="col">QTY</th>
      <th colspan="3" style="text-align: right">Action</th>
      <td></td>
      <td></td>
      <td></td>
    
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $dt)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$dt->book_name}}</td>
      <td>{{$dt->qty}}</td>
      <td></td>
      <td></td>


      <td>
        {{-- <a href="/category/edit/{{$dt->id}}">Edit</a></td> --}}
        <form action="/stock/edit/{{$dt->id}}"> 
          @csrf
          <button type="submit">Edit</button></td>
          </form>
      <td>
        <form method="post" action="/stock/delete/{{$dt->id}}"> 
          {{-- @method('delete') --}}
        @csrf
        <button type="submit">Delete</button></td>
        </form>
      </td>
      <td>
        <form method="get" action="/book"> 
          @csrf
          <button type="submit">Add Stock</button></td>
          </form>
      <td>
    </tr>
    @endforeach
  </tbody>
</table>
  
@endsection

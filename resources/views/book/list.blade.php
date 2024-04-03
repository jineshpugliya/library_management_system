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
      <th scope="col">Author Name</th>
      <th scope="col">Publisher Name</th>
      <th scope="col">Price</th>
      <th scope="col">Category ID</th>
      <th scope="col">Sub Category ID</th>

      <th colspan="3" style="text-align: center">Action</th>
      {{-- <th scope="col"></th>
      <th scope="col"></th> --}}


          {{-- <th scope="col"> <a href="/category/create">Add New Record</a></th> --}}
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $dt)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$dt->book_name}}</td>
      <td>{{$dt->author_name}}</td>
      <td>{{$dt->publisher_name}}</td>
      <td>{{$dt->price}}</td>
      <td>{{$dt->category->name??"N/A"}}</td>
      <td>{{$dt->subcategory->subc_name??"N/A"}}</td>

      <td>
        {{-- <a href="/category/edit/{{$dt->id}}">Edit</a></td> --}}
        <form action="book/{{$dt->id}}/edit"> 
          @csrf
          <button type="submit">Edit</button></td>
          </form>
      <td>
        <form method="post" action="book/{{$dt->id}}"> 
          @method('delete')
        @csrf
        <button type="submit">Delete</button></td>
        </form>
      </td>
      <td>
        <form method="get" action="stock/show/{{$dt->id}}"> 
          @csrf
          <button type="submit">Add Stock</button></td>
          </form>
      <td>
    </tr>
    @endforeach
  </tbody>
</table>
  
@endsection

@extends('layouts/header')
@section('content')

<br>
<br>
<br>
<br>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Teacher Id</th>
      <th scope="col">Student Name</th>
      <th scope="col">Mobile Number</th>
      <th colspan="3" style="text-align: center">Action</th>
          </tr>
  </thead>
  <tbody>
  @foreach ($data as $dt)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$dt->techer_id}}</td>
      <td>{{$dt->name}}</td>
      <td>{{$dt->m_number}}</td>
      <td>
        <form action="teacher/{{$dt->id}}/edit"> 
          @csrf
          <button type="submit">Edit</button></td>
          </form>
      <td>
        <form method="post" action="teacher/{{$dt->id}}"> 
          @method('delete')
        @csrf
        <button type="submit">Delete</button></td>
        </form>
      </td>
      <td>
        <form method="get" action="teacher/create"> 
          @csrf
          <button type="submit">Add New Record</button></td>
          </form>
      <td>
    </tr>
    @endforeach
  </tbody>
</table>
  
@endsection

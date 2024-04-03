@extends('layouts/header')
@section('content')
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
<meta name="generator" content="Jekyll v4.1.1">
<title>Form create page</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
    <body>
<br>
<br>
<br>
<br>
<div class="form-contant">  
    <form method="post" action="/student/{{$data->id}}">
        @method('put')
        @csrf
        <div class="form-group">
        <label for="cid">Enter Collage Id</label>
        <input type="text" name="cid" value="{{$data->college_id}}" class="form-control @error('cid') border border-danger @enderror">
        </div>
        
        <div class="form-group">
        <label for="name">Enter Student Name</label>
        <input type="text" name="name" value="{{$data->name}}" class="form-control @error('name') border border-danger @enderror">
        </div>
        
        <div class="form-group">
        <label for="mobile">Enter Mobile Number</label>
        <input type="text" name="mobile" value="{{$data->m_number}}" class="form-control @error('pub') border border-danger @enderror">
        </div>
        
        
        
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
    
@endsection
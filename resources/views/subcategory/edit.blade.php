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
    <form method="post" action="/subcategory/{{$data->id}}">
        @method('put')
        @csrf
    <div class="form-group">
        <label for="name">Enter Name</label>
        <input type="text" name="name" value="{{$data->subc_name}}" class="form-control" placeholder="Enter name">
    </div>
    <div class="form-group">
        <label for="decs">Description</label>
        <input type="text" name="des" value="{{$data->sub_des}}" class="form-control" placeholder="Enter Description">
    </div>
    <div>        
        <select class="from-group @error('category_id') border-border @enderror" name="category_id">
            {{-- <option> Select Category</option> --}}
            <option value="{{$data->category_id}}">{{$data->category->name??''}}</option>
                @foreach($catdata as $cd)
                    <option value="{{$cd->id}}">{{ucfirst($cd->name)}}</option>
                @endforeach
        </select>
    </div>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
</div>
    
@endsection
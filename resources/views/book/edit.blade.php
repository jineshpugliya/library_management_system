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
    <form method="post" action="/book/{{$data->id}}">
        @method('put')
        @csrf
        <div class="form-group">
        <label for="name">Enter Book Name</label>
        <input type="text" name="name" value="{{$data->book_name}}" class="form-control @error('name') border border-danger @enderror" placeholder="Enter Book name">
        </div>
        
        <div class="form-group">
        <label for="authername">Enter Author Name</label>
        <input type="text" name="auth" value="{{$data->author_name}}" class="form-control @error('auth') border border-danger @enderror" placeholder=" Enter Author Name">
        </div>
        
        <div class="form-group">
        <label for="publisher">Enter Publisher Name</label>
        <input type="text" name="pub" value="{{$data->publisher_name}}" class="form-control @error('pub') border border-danger @enderror" placeholder=" Enter Publisher Name">
        </div>
        
        <div class="form-group">
        <label for="price">Price</label>
        <input type="text" name="price" value="{{$data->price}}" class="form-control @error('price') border border-danger @enderror" placeholder=" Enter price">
        </div>
        
        <div class="from-group from-control">
            <label for="details">Category</label>
            <select class="from-group @error('category_id') border-border @enderror" name="category_id">
                <option value="{{$data->category_id}}">{{$data->category->name??''}}</option>
                    @foreach($catdata as $cd) 
                        <option value="{{$cd->id}}">{{ucfirst($cd->name)}}</option>
                    @endforeach
            </select>
        
            <label for="details">Sub Category</label>
            <select class="from-group @error('subcategory_id') border-border @enderror" name="subcategory_id">
                <option value="{{$data->subcategory_id}}">{{$data->subcategory->subc_name??''}}</option>
                    @foreach($subcatdata as $cd)
                        <option value="{{$cd->id}}">{{ucfirst($cd->subc_name)}}</option>
                    @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
    
@endsection
@extends('layouts.header')
@section('content')

        <br>
        <br>
        <br>
        <br> 

<div class="form-contant">  
<form method="post" action="/student">
@csrf
<div class="form-group">
<label for="cid">Enter College Id</label>
<input type="text" name="cid" class="form-control @error('cid') border border-danger @enderror" placeholder="Enter College Id">
</div>

<div class="form-group">
<label for="student name">Enter Student Name</label>
<input type="text" name="sname" class="form-control @error('sname') border border-danger @enderror" placeholder="Enter Student Name">
</div>

<div class="form-group">
<label for="mobile">Enter Mobile Number</label>
<input type="text" name="mobile" class="form-control @error('mobile') border border-danger @enderror" placeholder=" Enter Mobile Number">
</div>


<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection
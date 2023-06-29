@extends('layouts.app')
@section('content')
<div class="container">
    <form method="post" action="{{route('contact.update', $contact->id)}}" class="form">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"  >Name</label>
            <input type="text" name="name" class="form-control" value="{{$contact->name}}" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" value="{{$contact->email}}" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">No.Telp</label>
            <input type="number" name="number" value="{{$contact->number}}"class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection

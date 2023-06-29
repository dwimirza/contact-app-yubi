    @extends('layouts.app')
    @section('content')
    <div class="container mt-5">
        <div class="card bg-white">
            <div class="card-body bg-white">
                <form method="post" action="{{route('contact.store')}}" class="form">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">No.Telp</label>
                        <input type="number" name="number" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @endsection

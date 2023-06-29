@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="search mb-4">
                        <label for="search" class="form-label">Search Name</label>
                        <input type="search" id="search" name="search" class="form-control" placeholder="search disini">
                    </div>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>No.Telp</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="data">
                            @foreach($contact as $c)
                            <tr>
                                <td>{{$c->name}}</td>
                                <td>{{$c->email}}</td>
                                <td>{{$c->number}}</td>
                                <td>
                                    <form action="{{route('contact.destroy', $c->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        <a href="{{route('contact.edit', $c->id)}}" class="btn btn-primary">Edit</a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                        <tbody id="Content" class="searchData">

                        </tbody>
                    </table>
                    <a href="{{route('contact.index')}}" class="btn btn-primary">Tambah</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#search').on('keyup', function(){
        $value=$(this).val();

        if($value){
            $('.data').hide()
            $('.searchData').show()
        }else{
            $('.data').show()
            $('.searchData').hide()
        }

        $.ajax({
            type : 'get',
            url : '{{URL::to('search')}}',
            data:{'search':$value},
            success:function(data){
                $('#Content').html(data);
            }
        })
    })
</script>
@endsection

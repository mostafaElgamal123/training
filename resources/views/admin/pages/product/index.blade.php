@extends('admin.master')


@section('title', 'add new')


@section('content')
    <div class="container pt-4">
        <div class="row">
            <div class="col-10 mx-auto">
                <a href="{{ route('products.create') }}" class="btn btn-primary">add new</a>
                <div class="card-body">
                @include("genarel-component.admin.messages")
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>title</th>
                                <th>description</th>
                                <th>price</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($product as $produc)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$produc->title}} </td>
                                <td>{{$produc->description}} </td>
                                <td>{{$produc->price}} </td>
                                <td>
                                  <div class="d-flex">
                                    <a href="{{route("products.edit",$produc->id)}}" class="btn btn-info" >edit</a>
                                    <form method="post" action="{{route("products.destroy",$produc->id)}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" >delte</button>
                                    </form>
                                  </div>
                                </td>
                            </tr>
                        @endforeach                        
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

@endsection

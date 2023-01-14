@extends('admin.master')


@section('title', 'add new')


@section('content')
    <div class="container pt-4">
        <div class="row">
            <div class="col-10 mx-auto">
                <a href="{{ route('create') }}" class="btn btn-primary">add new</a>
                <div class="card-body">
                @include("genarel-component.admin.messages")
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>description</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($category as $categor)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$categor->name}} </td>
                                <td>{{$categor->description}} </td>
                                <td>
                                  <div class="d-flex">
                                    <a href="{{route("edit",$categor->id)}}" class="btn btn-info" >edit</a>
                                    <form method="post" action="{{route("delete",$categor->id)}}">
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

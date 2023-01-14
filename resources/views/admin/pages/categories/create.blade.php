@extends('admin.master')


@section('title', 'add new')


@section('content')

    <div class="container p-4">
        <div class="row">
            <div class="col-10 mx-auto">
            @include("genarel-component.admin.messages")
                <form class="border p-4" method="post" action="{{route("store")}}">
                @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">name</label>
                            <input type="text" name="name" value="{{old("name")}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">description</label>
                            <textarea name="description"  class="form-control">{{old('description')}}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">add new</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection

@extends("admin.master")


@section("title","edit")


@section("content")
 <div class="container p-4">
        <div class="row">
            <div class="col-10 mx-auto">
            @include("genarel-component.admin.messages")
                <form class="border p-4" method="post" action="{{route("products.update",$product->id)}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">title</label>
                            <input type="text" name="title" value="{{$product->title}}" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">price</label>
                            <input type="text" name="price" value="{{$product->price}}" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">image</label>
                            <input type="file" name="image" value="{{$product->image}}" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">description</label>
                            <textarea name="description"  class="form-control">{{ $product->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">category</label>
                            <select class="form-control" name="category_id">
                            @foreach ($category as $categor)
                                <option value="{{$categor->id}}" @if($categor->id==$product->category_id) selected @endif >{{$categor->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
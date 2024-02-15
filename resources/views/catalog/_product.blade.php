<img src="{{$item->image}}" alt="" class="img-fluid">
<h3> <a href="{{route('product', $item->id)}}">{{$item->name}}</a> </h3>
<div class="text-danger">{{$item->price}}</div>
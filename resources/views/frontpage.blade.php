@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"><b>Menu</b></div>
                <div class="card-body">
                    <ul class="list-group">
                        <a href="" class="list-group-item list-group-item-action">Category 1</a>
                        <a href="" class="list-group-item list-group-item-action">Category 1</a>
                        <a href="" class="list-group-item list-group-item-action">Category 1</a>
                        <a href="" class="list-group-item list-group-item-action">Category 1</a>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Pizza</b></div>
                <div class="card-body">
                     <div class="row">
                         @forelse ($pizzas as $pizza)
                         <div class="col-md-4 mt-2 text-center" style="border: 1px solid #ccc;">
                            <img src="{{Storage::url($pizza->image)}}" class="img-thumbnail" width="100%">
                            <p>{{$pizza->name}}</p>
                            <p>{{$pizza->description}}</p>
                            <a href="">
                                <button class="btn btn-danger mb-2">Order Now</button>
                            </a>
                        </div>
                         @empty
                             <p>Sorry, no pizzas to show :(</p>
                         @endforelse
                     </div>   
                </div>
            </div>
        </div>

    </div>
</div>
<style>
    a.list-group-item{
        font-size: 18px;
    }
    a.list-group-item:hover{
        background-color: red ;
        color: white;
    }
    .card-header{
        background-color: red;
        color: white;
        font-size: 20px;
    }
</style>
@endsection

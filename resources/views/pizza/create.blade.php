@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>
                <div class="card-body">
                    <ul class="list-group">
                        <a href="{{route('pizza.index')}}" class="list-group-item list-group-item-action">View</a>
                        <a href="{{route('pizza.create')}}" class="list-group-item list-group-item-action">Create</a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pizza</div>
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p> 
                    @endforeach
                </div>
                @endif

                <form action="{{route('pizza.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name of Pizza">
                    </div>

                    <div class="form-group mt-2">
                        <label for="description">Description</label>
                        <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="form-inline mt-2 mt-2">
                        <div class="col-md-4 mb-3">
                          <label for="validationDefault01">Pizza Price($)</label>
                          <input type="number" class="form-control" name="small_pizza_price" placeholder="Small pizza price">                        
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="number" class="form-control" name="medium_pizza_price" placeholder="Medium pizza price">
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="number" class="form-control" name="large_pizza_price" placeholder="Large pizza price">
                        </div>
                    </div>

                    <div class="form-group mt-2">
                        <label for="category">Category</label>
                            <select class="form-control" name="category">
                                <option value="vegetarian">Vegetarian Pizza</option>
                                <option value="non-vegetarian">Non-vegetarian Pizza</option>
                                <option value="mix">Mix Pizza</option>
                                <option value="vegan">Vegan Pizza</option>
                                <option value="keto">Keto Pizza</option> 
                            </select>
                    </div>

                    <div class="form-group mt-2">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="form-group mt-5 text-center">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>

                </div>
            </form>
            </div>
    </div>
</div>
@endsection
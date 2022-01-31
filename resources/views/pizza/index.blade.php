@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">All Pizza</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price (Small)</th>
                            <th scope="col">Price (Medium)</th>
                            <th scope="col">Price (Large)</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if(count($pizzas) > 0)
                                @foreach ($pizzas as $key => $pizza)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td><img src="{{Storage::url($pizza->image)}}" width="80"></td>
                                        <td>{{$pizza->name}}</td>
                                        <td>{{$pizza->description}}</td>
                                        <td>{{$pizza->category}}</td>
                                        <td>{{$pizza->small_pizza_price}}</td>
                                        <td>{{$pizza->medium_pizza_price}}</td>
                                        <td>{{$pizza->large_pizza_price}}</td>
                                        <td>
                                            <a href="{{route('pizza.edit', $pizza->id )}}"><button class="btn btn-primary">Edit</button></a>
                                            <button class="btn btn-danger" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#confirmDeleteModal{{$pizza->id}}">Delete
                                            </button>
                                        </td>
                                    
                                        <!-- Delete Confirmation Modal -->
                                        <div class="modal fade" id="confirmDeleteModal{{$pizza->id}}" 
                                                                tabindex="-1" 
                                                                aria-labelledby="confirmDeleteModal" 
                                                                aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                <button type="button" class="btn-close" 
                                                                    data-bs-dismiss="modal" 
                                                                    aria-label="Close">
                                                </button>
                                            </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form action="{{route('pizza.destroy',$pizza->id)}}" method="POST">
                                                    @csrf @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                        </div>
                                        </div>
                                        </div>
                                        
                                        </div>

                                    </tr>
                                @endforeach  
                            @else
                              <p>Nothing to show :(</p>
                            @endif
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

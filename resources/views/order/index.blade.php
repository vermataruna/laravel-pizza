@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Orders</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">User</th>
                            <th scope="col">Phone/Email</th>
                            <th scope="col">Pizza Name</th>
                            <th scope="col">Date/Time</th>
                            <th scope="col">Small Pizza</th>
                            <th scope="col">Medium Pizza</th>
                            <th scope="col">Large Pizza</th>
                            <th scope="col">Message</th>
                            <th scope="col">Status</th>
                            <th scope="col">Accept</th>
                            <th scope="col">Reject</th>
                            <th scope="col">Completed</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)                
                          <tr>
                            <th scope="row">1</th>
                            <td>{{$order->user->name}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->date}}/{{$order->time}}</td>
                            <td>{{$order->pizza->name}}</td>
                            <td>{{$order->small_pizza}}</td>
                            <td>{{$order->medium_pizza}}</td>
                            <td>{{$order->large_pizza}}</td>
                            <td>{{$order->message}}</td>
                            <td>{{$order->status}}</td>
                            <form action="{{route('user.status',$order->id)}}" method="POST">
                                @csrf @method('PUT')
                                <td>
                                    <input type="submit" name="status" value="Accepted" class="btn btn-success"></button>
                                </td>
                                <td>
                                    <input type="submit" name="status" value="Rejected" class="btn btn-danger"></button>
                                </td>
                                <td>
                                    <input type="submit" name="status" value="Completed" class="btn btn-warning"></button>
                                </td>
                            </form>
                          </tr>

                          
                          @endforeach
                        </tbody>
                      </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

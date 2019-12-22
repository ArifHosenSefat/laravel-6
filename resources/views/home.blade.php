@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All User List</div>

                  <div class="card-body"></div>
<table class="table table-bordered">
  <thead>
    <tr>
    <th>SL.NO.</th>
    <th>Name</th>
    <th>password</th>
    <th>Email</th>
    <th>Account Open At</th>
   
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
 
    <tr>
    <!-- <td>{{ print_r($loop) }}</td> -->
    <!-- <td>{{ $loop->index }}</td> -->
    <td>{{ $loop->index + 1 }}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->password}}</td>
    <td>{{$user->email}}</td>
    <!-- <td>{{$user->created_at->format('D-m-Y H:i:s A')}}</td> -->
    <!-- <td>{{$user->created_at->diffForHumans() }}</td> -->
    <td> 
    <!-- {{$user->created_at}}
    <br>
    {{$user->created_at->diffForHumans() }}
     -->
    
      @if($user->created_at->diffForHumans() == '1 week ago')
      {{$user->created_at}}
      @else
      {{$user->created_at->diffForHumans() }}
      @endif
    </td>
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

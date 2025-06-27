 @extends('layouts.master')

@section('title')

User Index

@endsection



@section('content')

<h1>Users</h1> 

<div class="row">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Created Date</th>
            <th scope="col">Edite</th>
            <th scope="col">Delete</th>

          </tr>
        </thead>
        <tbody>
   @foreach ($users as $user)
   <tr>
    <th scope="row">{{$loop->index}}</th>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
     <td><a href="{{route('users.show', $user->id)}}" class="btn btn-primary">Edit</a></td> 
     <td><a href="{{route('users.show', $user->id)}}" class="btn btn-danger">Delete</a></td>  



</tr>
   @endforeach

      
        
        </tbody>
      </table>
</div>


@endsection

@section('scripts')

<script>
    console.log('hello');
</script>

@endsection


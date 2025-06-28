 @extends('layouts.master')

@section('title')

User Index

@endsection



@section('content')

<h1>Users</h1> 

  <div class="row mt-4 mb-4">
    <div class="col-sm-6 ">
      <form method="post" action="{{route('users.create.dummy')}}">
        @csrf
        <button type="submit" class="btn btn-primary">Create Dummy</button>
      </form>
    </div>

     <div class="col-sm-6">
      <form method="post" action="{{route('users.delete.dummy')}}">
        @csrf
         @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete All</button>
      </form>
    </div>
  </div>


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
     <td>
      <form method="post" action="{{route('users.destroy',$user->id)}}">
        @csrf
        @method('Delete')
       <button class="btn btn-danger">Delete</button>
    </form>
  </td>  



</tr>
   @endforeach

      
        
        </tbody>
      </table>
</div>

{{$users->links('partials.pagination')}}

@endsection

@section('scripts')

<script>
    console.log('hello');
</script>

@endsection


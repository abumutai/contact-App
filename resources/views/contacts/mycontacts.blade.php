
@extends('base')

@section('main')
<div class="row">
        
<div class="col-sm-12">

                @if(session()->get('success'))
                  <div class="alert alert-success">
                    {{ session()->get('success') }}  
                  </div>
                @endif
              </div>
  <div class="container w-75 p-3">
             
<div class="col-sm-12">
    <h3 >My Contacts</h3>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Id</td>
          <td>Name</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($followers as $follower)
        <tr>
       
            <td>{{$follower->follower_id}}</td>
            <td>{{$follower->follower_name}}</td>
        <td><a class="btn btn-success" href="{{route('followers.show',$follower->follower_id)}}">View Contact</a></td>
            <td><a class="btn btn-danger" href="{{route('followers.destroy',$follower->follower_id)}}">Block Contact</a></td>
            
            
        </tr>
        @endforeach
    </tbody>
  </table>
</div>

<div class="col-sm-12">
  <h3>Follow Request</h3>    
<table class="table table-striped">
  <thead>
      <tr>
        <td>Id</td>
        <td>Name</td>
        <td colspan="2">Action</td>
      </tr>
  </thead>
  <tbody>
      @foreach($requests as $request)
      <tr>
     
          <td>{{$request->follower_id}}</td>
          <td>{{$request->follower_name}}</td>

      <td>
        
        <form method="POST" action="{{route('followers.update',$request->id)}}">
          @csrf
          @method('PATCH')
          <input type="hidden" name="user_id" value="{{$request->user_id}}">
          <input type="hidden" name="follower_id" value="{{$request->follower_id}}">
            <button type="submit" class="btn btn-success" >Accept</button></td>
        </form>
        
          <td><a class="btn btn-danger" href="{{route('followers.destroy',$request->follower_id)}}">Decline</a></td>
          
          
      </tr>
      @endforeach
  </tbody>
</table>
</div>
</div>   
@endsection
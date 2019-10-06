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
    <h3>Contacts</h3>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Type</td>
          <td>Name</td>
          <td>Description</td>
         
          <td colspan = "2">Actions</td>
        </tr>
    </thead>
    <tbody>
        
        @foreach($contacts as $contact)
        @if($contact->user_id!=Auth::user()->id)
        <tr>
            <td>{{$contact->user_id}}</td>
            <td>{{$contact->type}}</td>
            <td>{{$contact->name}}</td>
            <td>{{$contact->description}}</td>
            
            <td>
                <a href="{{ route('contacts.show',$contact->user_id)}}" class="btn btn-primary">View</a>
            </td>
            <td>
                <form action="{{ route('followers.store', $contact->id)}}" method="post">
                  @csrf
                
                  <input type="hidden" name="following_id" value="{{$contact->id}}">
                <input type="hidden" name="profile_id" value="{{Auth::user()->id}}">
                  <button class="btn btn-success" type="submit">Follow</button>
                </form>
            </td>
        </tr> @endif

        @endforeach
       
    </tbody>
  </table>
</div>

</div>
@endsection
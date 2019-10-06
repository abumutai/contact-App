@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h3>Add a contact</h3>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('contacts.store') }}">
          @csrf
          <div class="form-group">    
              <label for="first_name">Contact Type:</label>
              <select name="type" class="form-control" id="">
                <option value="personal">Personal</option>
                <option value="corporate">Corporate</option>
                <option value="government">Government</option>
              </select>
          </div>
          <div class="form-group">    
              <label for="first_name">Description:</label>
              <input type="text" class="form-control" placeholder="e.g personal contacts, company, school " name="description"/>
          </div>

          <div class="form-group">    
              <label for="first_name"> Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="city">City/Town:</label>
              <input type="text" class="form-control" name="city"/>
          </div>
          <div class="form-group">
              <label for="country">Country:</label>
              <input type="text" class="form-control" name="country"/>
          </div>
          <div class="form-group">
              <label for="title">Job Title/Company Business/Institution Type:</label>
              <input type="text" class="form-control" name="title"/>
          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
          </div>                         
          <button type="submit" class="btn btn-primary">Add contact</button>
      </form>
  </div>
</div>
</div>
@endsection
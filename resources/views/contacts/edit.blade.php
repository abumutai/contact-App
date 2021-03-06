@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h3>Update my contacts</h3>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('contacts.update', $contact->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">    
                <label for="first_name">Contact Type:</label>
            <select name="type" class="form-control" value="{{$contact->type}}">
                      <option value="personal">Personal</option>
                      <option value="corporate">Corporate</option>
                      <option value="government">Government</option>
                </select>
            </div>
            <div class="form-group">

                <label for="first_name"> Name:</label>
                <input type="text" class="form-control" name="first_name" value={{ $contact->name }} />
            </div>

            <div class="form-group">
                <label for="last_name">Description:</label>
                <input type="text" class="form-control" name="last_name" value={{ $contact->description }} />
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value={{ $contact->email }} />
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" name="city" value={{ $contact->city }} />
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" class="form-control" name="country" value={{ $contact->country }} />
            </div>
            <div class="form-group">
                <label for="job_title">Job Title/Company Business/Institution Type:</label>
                <input type="text" class="form-control" name="job_title" value={{ $contact->title }} />
            </div>
        <input type="hidden" value="{{Auth::user()->id}}">
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
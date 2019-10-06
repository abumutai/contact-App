@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h3>View {{ $contact->name }} Profile </h3>

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
        
            <div class="form-group">    
                <label for="first_name">Account Type:</label>
            <input type="text" readonly class="form-control" value="{{$contact->type}}">
                 
            <div class="form-group">

                <label for="first_name"> Name:</label>
                <input type="text" readonly class="form-control" name="first_name" value={{ $contact->name }} />
            </div>

            <div class="form-group">
                <label for="last_name">Profile Description:</label>
                <input type="textarea" readonly class="form-control" name="last_name" value={{ $contact->description }} />
            </div>

            <div class="form-group">
                <label for="city"> City:</label>
                <input type="text" readonly class="form-control" name="city" value={{ $contact->city }} />
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" readonly  class="form-control" name="country" value={{ $contact->country }} />
            </div>
            <button type="submit" readonly class="btn btn-primary">Follow</button>
        
    </div>
</div>
@endsection
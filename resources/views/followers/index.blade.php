@extends('base')

@section('main')
<div class="row">
        
<div class="container w-50 p-3">
<div class="col-sm-12">
<h3>{{$contact->name}} Profile</h3>    
    <form method="post" action="{{ route('contacts.store') }}">
        @csrf
        <div class="form-group">    
            <label for="first_name">Contact Type:</label>
        <input type="text" readonly class="form-control" value="{{$contact->type}}" />
        </div>
        <div class="form-group">    
            <label for="first_name">Description:</label>
        <input type="text" readonly class="form-control" value="{{$contact->description}}"/>
        </div>

        <div class="form-group">    
            <label for="first_name"> Name:</label>
        <input type="text" readonly class="form-control" value="{{$contact->name}}"/>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
        <input type="text" readonly class="form-control" value="{{$contact->email}}"/>
        </div>
        <div class="form-group">
            <label for="city">City/Town:</label>
        <input type="text" readonly class="form-control" value="{{$contact->city}}"/>
        </div>
        <div class="form-group">
            <label for="country">Country:</label>
        <input type="text" readonly class="form-control" value="{{$contact->country}}"/>
        </div>
        <div class="form-group">
            <label for="title">Job Title/Company Business/Institution Type:</label>
        <input type="text" readonly class="form-control" value="{{$contact->title}}"/>
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        </div>                         
        <button type="submit" class="btn btn-primary">Add contact</button>
    </form>

</div>
@endsection
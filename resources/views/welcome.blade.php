@extends('base')
@section('main')
<div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Find Contacts!</h1> 
          <p>This is a contact website. It has contacts of all the people you might. All you have to do is register and explore contacts to find out your friends and relatives.</p>
        <p><a class="btn btn-primary btn-lg" href="{{url('register')}}" role="button">Register Now&raquo;</a></p>
        </div>
      </div>
      <div class="container">
            <!-- Example row of columns -->
            <div class="row">
              <div class="col-md-4">
                <h2>Personal Contacts</h2>
                <p>You can search for personal contacts and request the owners to allow them to access them. Personal contacts are private by default unless changed by owners. </p>
                <p><a class="btn btn-secondary" href="#" role="button">Create Personal Profile &raquo;</a></p>
              </div>
              <div class="col-md-4">
                <h2>Corporate Contacts</h2>
                <p>You can search corporate contacts as well. Corporates can create accounts as for prospective clients to reach them.  Corporate contacts are public. </p>
                <p><a class="btn btn-secondary" href="#" role="button">Create Corporate Profile &raquo;</a></p>
              </div>
              <div class="col-md-4">
                <h2>Government Contacts</h2>
                <p> Government offices and institutions can create profiles so as to be accessed by citizens. Government offices contacts are made public by default. </p>
                <p><a class="btn btn-secondary" href="#" role="button">Create Institutions Profile  &raquo;</a></p>
              </div>
            </div>
        

        
          </div> 
@endsection
            
       

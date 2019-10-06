<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel CRUD</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css" >
</head>
<body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark d-flex mb-5">
        <a class="navbar-brand" href="{{url('/')}}">Contact Mee</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                    
                      <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                      
                    </li>
                    <li class="nav-item ">
                      @auth
                      <a class="nav-link" href="{{route('followers.edit',$id=Auth::user()->id)}}">My Contacts</a>  
                    
                      
                    </li>
                    <li class="nav-item ">
                    <a class="nav-link" href="{{route('contacts.show',$id=auth()->user()->id)}}">Profile</a>
                          </li>
                    @endauth
                    <li class="nav-item">
                      <a class="nav-link" href="/contacts">View Contacts</a>
                    </li>
                       
                </ul>
                </div>
                <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                    <a class="nav-link" 
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').style.display='list-item';">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                            </li>
                                
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        <button type="submit" class="btn-outline-success">Log out</button>
                                    </form>
                        @endguest
                    </ul>
               
              </nav>
              <div class="mb-5">
                  <br><br>
              </div>
    <div class="container mt-5">
        @yield('main')
    </div>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
<footer class="container">
    <hr>
        <p>&copy; Contacts mee 2019</p>
      </footer>
</html>
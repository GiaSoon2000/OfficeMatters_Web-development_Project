<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
      body {
          margin: 0;
          padding: 0;
          padding-top: 90px;
      }
      
      #usernameDisplay {
          font-size: 17px;
          margin-right: 10px;
          cursor: pointer;
          color: blue;
          text-decoration: underline;
      }

      #header {
        z-index: 9999; 
        background-color: #f8f9fa;
        top: 0;
        left: 0;
        position: fixed;
        width: 100%;
        height: 70px;
        border-top: 2px solid #000;
        border-bottom: 2px solid #000;
        margin-top: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      #header-content {
          display: contents;
          align-items: center;
          justify-content: space-between;
          padding: 0 20px;
          width: 100%;
      }

      #logo {
        font-weight: bold;
        font-size: 25px;
        margin-right: 40px;
      }

      #navigation {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
      }

      #navigation li {
        position: relative;
      }

      #navigation a {
        text-decoration: none;
        color: #000;
        padding-right: 50px;
        padding-left: 50px;
      }

      #navigation li:not(:last-child) a {
        border-right: 1px solid #000;
      }
          
      #auth-navigation {
        display: flex;
        align-items: center;
        margin-right: 20px;
        /* margin-top: 10px; */
        list-style: none;
      }

      #auth-navigation a {
        text-decoration: none;
        color: #000;
        border-bottom: none;
        padding-bottom: 2px;
      }

      /* Make the carousel images smaller */
      .carousel-item img {
        max-height: 500px; /* Adjust the height as needed */
        max-width: 80%; /* To maintain aspect ratio */
        margin: 0 auto; /* Center the images horizontally */
      }

      /* Adjust the carousel indicators position */
      .carousel-indicators {
        bottom: 10px;
      }

      /* Fix the left and right carousel control buttons to image size */
      .carousel-control-prev, .carousel-control-next {
        width: 22%;
      }

      .btn-custom {
        background-color: transparent;
        border-color: transparent;
        color: #0a0c0e;
        border-bottom: 2px solid #020202;
        transition: background-color 0.3s, color 0.3s;
      }

      .btn-custom:hover {
        background-color: black;
        color: white;
      }

      /* Add this custom CSS to hide the dropdown arrow */
      .hover-dropdown > .dropdown-toggle::after {
        display: none;
      }

    </style>
    <title>Office Matters</title>
  </head>
  <body>

    <div style="height: 20px; width: 100%; background-color: white;z-index: 9999; position: fixed;top: 0; left: 0;"></div>
  
  <!-- Navbar Section -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="header">
    <div class="container" id="header-content">
      <a class="navbar-brand" href="#" id="logo">Office Matters</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav" style="background-color: #F8F9FA;">
        <ul class="navbar-nav ml-auto" id="navigation">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('homePage')}}">Home</a>
          </li>
          <li class="nav-item dropdown hover-dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="shopDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Shop
            </a>
            <div class="dropdown-menu" aria-labelledby="shopDropdown">
              <a class="dropdown-item" href="{{ route('notebooks') }}">Notebooks</a>
              <a class="dropdown-item" href="{{ route('pens') }}">Pens & Pencils</a>
              <a class="dropdown-item" href="{{ route('deskAccessories') }}">Desk Accessories</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('about')}}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('contact')}}">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('FAQ')}}">FAQ</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto" id="auth-navigation">
          <!-- <li class="nav-item">
            <a id="loginLink" class="nav-link" href="{{route('login')}}"><i class="fas fa-user"></i> Log in</a>
          </li> -->

          <li class="nav-item">
            @if (Auth::check())
                <a class="nav-link" onclick="logoutUser()" >
                    <i class="fas fa-sign-out-alt"></i> Log out
                </a>
            @else
                <a class="nav-link" href="{{ route('login') }}">
                    <i class="fas fa-user"></i> Log in
                </a>
            @endif
          </li>

          <li class="nav-item">
          <a id="cartLink" class="nav-link" href="{{ route('myCart') }}">
              <i class="fas fa-shopping-cart"></i> Cart 
              @if(Session::has('cartItem') && Session::get('cartItem') > 0)
                  <span class="badge badge-pill badge-danger">{{ Session::get('cartItem') }}</span>
              @endif
          </a>
        </li>
      </ul>

      <!-- JavaScript for Logout Functionality -->
      <script>
          function logoutUser() {
              fetch('{{ route("logout") }}', {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json',
                      'X-CSRF-TOKEN': '{{ csrf_token() }}'
                  }
              }).then(response => {
                  if (response.ok) {
                      // Redirect to the home page after successful logout
                      window.location.href = '{{ route("homePage") }}';
                  } else {
                      console.error('Logout failed.');
                  }
              }).catch(error => {
                  console.error('Error occurred during logout:', error);
              });
          }
      </script>
      </div>
    </div>
  </nav>

  <div style="height: 20px; width: 100%; background-color: white;z-index: 9998; position: fixed;"></div>
  
  <!-- End Navbar Section -->
              
              
    <div class="container-fluid">  
      @yield('content')
    </div>
    
    <!-- Footer Section-->

  <footer style="background-color: #94bce4; padding: 20px;">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5>Office Matters</h5>
          <ul class="list-unstyled">
            <li><a href="{{route('about')}}">About</a></li>
            <li><a href="{{route('FAQ')}}">FAQ</a></li>
            <li><a href="{{route('contact')}}">Contact</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h5>Address</h5>
          <p>No.19, Jalan Impian Emas 3,<br>Taman Impian Emas,<br>81300, Skudai.</p>
          <p>Whatapps  +60 11-5981 3106<br>Email : Info@officematters.online</p>
        </div>
        <div class="col-md-4">
          <h5>Opening Hours</h5>
          <p>Monday - Sunday: 10am - 8pm</p>
        </div>
      </div>
    </div>
  </footer>

    <!-- Bootstrap v4.6 JS -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-dnBhX0vh1m8r5JqaCt1Tk9TNsTn4KZAJOrsELCcbmvu78AnzG1yOzVEvV67UhpVv" crossorigin="anonymous"></script>
  </body>
</html>
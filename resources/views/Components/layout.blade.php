
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Home</title>
        <link href="app.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="img/favicon.png" />
        @if (session()->has('Success'))
        <script>
            alert('{{session()->get('Success')}}')
        </script>
        @endif
    </head>
    
    <body>
        <div id="layoutDefault">
            <div id="layoutDefault_content">
                <main>

                    <nav style="color: rgb(0, 0, 0)" class="navbar navbar-marketing navbar-expand-lg bg-white navbar-light">
                        <div class="container">
                            <a class="navbar-brand text-dark" href="index.php">Home</a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><img src="img/menu.png" style="height:20px;width:25px" /><i data-feather="menu"></i></button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto mr-lg-5">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php">Home </a>
                                    </li>
                                    <li class="nav-item dropdown no-caret">
                                        <a class="nav-link" href="contact.php">Contact</a>
                                    </li>
                                    <li class="nav-item dropdown no-caret">
                                        <a class="nav-link" href="/register">About</a>
                                    </li>
                                </ul>

                {{-- don't have account
                             @guest
                             @endguest
                             --}}
                {{-- have account --}}
                             @auth
 <span> Welcome , {{auth()->user()->name}} </span>
 <form action="/logout" method="POST">
@csrf
  <button style="background-color: #713d6e; color: rgb(209, 190, 190) "
  class="btn-teal btn rounded-pill px-4 ml-lg-4" type="submit"> Logout </button>
 </form>
@else
<a style="background-color: #713d6e; color: rgb(209, 190, 190) "
class="btn-teal btn rounded-pill px-4 ml-lg-4" href="/register">Sign in<i
class="fas fa-arrow-right ml-1"></i></a>
<a style="background-color: #713d6e; color: rgb(209, 190, 190)"
 class="btn-teal btn rounded-pill px-4 ml-lg-4" href="/login">Sign up<i
 class="fas fa-arrow-right ml-1"></i></a>

                             @endauth

                            </div>
                        </div>
                    </nav>
@yield('content')


</main>
</div>


{{-- <div id="layoutDefault_footer">
    <footer class="footer pt-2 pb-4 mt-auto bg-dark footer-dark">
        <div class="container">
            <hr class="mb-1" />
            <div class="row align-items-center">
                <div class="col-md-6 small">Copyright &#xA9; online</div>
                <div class="col-md-6 text-md-right small">
                    <a href="#">Privacy Policy</a>
                    &#xB7;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer> --}}

</div>
</div>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>



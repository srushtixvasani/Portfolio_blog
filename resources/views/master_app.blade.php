<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font aweson for icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

    <!-- Google Font -->
    <!-- Nunito font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700" rel="stylesheet">
    <!-- Bebas font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <!-- Monteserrat font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
       crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/res/css/app.css">

    <!-- Parsely CSS frontend form validation -->
    <link rel="stylesheet" href="/res/css/parsley.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="/res/css/select2.min.css">

    <title>Portfolio</title>
</head>

<body>
    <nav id="mainNavbar" class="navbar navbar-dark navbar-expand-md py-0  fixed-top">
        <div class="d-flex flex-grow-1 ">
            <a href="{{ route('pages.central') }}" class="navbar-brand"> <i class="fas fa-book-open"> </i>  
                PORTFOLIO 
            </a>
            <div class="w-100 text-right">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navLinks" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                <i class="fas fa-bars" style="color:#EA1C2C; font-size:28px;"></i>
                </span>
            </button>
            </div>
        </div>
        <div class="collapse navbar-collapse flex-grow-1 text-right" id="navLinks">
            <ul class="navbar-nav ml-auto flex-nowrap">
                <li class="nav-item">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle m-2 menu-item" data-toggle="dropdown" href="{{ route('posts.index') }}" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-alt " > </i> 
                        @if(Auth::check())
                         {{ Auth::user()->name }}
                        @endif
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('posts.index') }}">YOUR BLOG</a>
                        <a class="dropdown-item" href="{{ route('categories.index') }}">CATEGORIES</a>
                        <a class="dropdown-item" href="{{ route('tags.index') }}">HASHTAGS</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                            {{ __('LOGOUT') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="/contact" class="nav-link m-2 menu-item">Contact Us</a>
                </li>

            </ul>
        </div>
    </nav>

    @include('components.blog_messages')

    <div>
        @yield('content')
    </div>


    <!--  JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

    <!-- Parsley JS Front end form validation-->
    <script src="/res/js/parsley.min.js" ></script>

    <!-- Select2 -->
    <script src="/res/js/select2.min.js" ></script>

    <script type="text/javascript" >
        $('.select2-multi').select2();
    </script>

    <!-- TinyMCE -->
    <!-- <script src="//cdn.tinymce.come/4/tinymce.min.js"> -->
    </script>
    <script src="https://cdn.tiny.cloud/1/cpik3bc1w9t7is92eu9r03kixp4yxlkp00ivjc17leyq452d/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker link code advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      menubar: false,
      
   });
  </script>


    <script>
        $(function () {
            $(document).scroll(function () {
                var $nav = $("#mainNavbar");
                $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height());
            });
        });
    </script>


</body>

</html>
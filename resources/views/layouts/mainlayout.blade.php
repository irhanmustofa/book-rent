<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Rental Buku | @yield('title')</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body>

    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">Book Rent</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <div class="body-content h-100 pt-5">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarSupportedContent">
                    @if(Auth::user())

                        @if (Auth::user()->role_id==1)

                        <a href="/dashboard" @if(request()->route()->uri == 'dashboard') class='active' @endif>Dashboard</a>
                        <a href="/books" @if(request()->route()->uri == 'books') class='active' @endif>Books</a>
                        <a href="/categories" @if(request()->route()->uri == 'categories' || request()->route()->uri ==
                            'category-add' || request()->route()->uri == 'category-edit/{slug}') class='active'
                            @endif>Categories</a>
                        <a href="/users" @if(request()->route()->uri == 'users' || request()->route()->uri ==
                            'registed-users') class='active' @endif>Users</a>
                        <a href="/rent-logs" @if(request()->route()->uri == 'rent-logs') class='active' @endif>Rent Log</a>
                        <a href="/" @if(request()->route()->uri == '/') class='active' @endif>Book List</a>
                        <a href="/book-rent" @if(request()->route()->uri == 'book-rent') class='active' @endif>Book Rent</a>
                        <a href="/book-return" @if(request()->route()->uri == 'book-return') class='active' @endif>Book Return</a>
                        <a href="/logout">Log Out</a>

                        @else

                        <a href="/profile" @if(request()->route()->uri == 'profile') class='active' @endif>Profile</a>
                        <a href="/" @if(request()->route()->uri == '/') class='active' @endif>Book List</a>
                        <a href="/logout">Log Out</a>

                        @endif
                    @else
                        <a href="/login">Log In</a>
                    @endif
                </div>
                <div class="content col-lg-10 p-5">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
              var form =  $(this).closest("form");
              var name = $(this).data("name");
              event.preventDefault();
              swal({
                  title: `Are you sure you want to delete this record?`,
                  text: "If you delete this, it will be gone forever.",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  form.submit();
                }
              });
          });
      
    </script>
</body>

</html>
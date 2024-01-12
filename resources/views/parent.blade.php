<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tanya dr. Rina</title>
  </head>
  <body style="">

    {{-- <div class="" id="page1">
        <nav class="navbar">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('asset-s/image/page1/LOGO.png') }}" class="ms-3 my-3" alt="" width="120" height="85">
                </a>
            </div>
        </nav>

        <div class="container-fluid text-white">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center">
                  <div class="col-md-5">
                    <h2>MAHA<br>DOELOER</h2>
                    <br>
                    <h6>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nisi illum illo quam delectus dicta explicabo optio ex! Id, assumenda atque possimus, distinctio ea amet ullam commodi dolor, dolorum deleniti sunt!</h6>
                  </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('asset-s/image/page1/TALENT.png') }}" alt="" class="w-100">
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Masthead-->
    <div class="masthead">
        <nav class="navbar" style="z-index: 3">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('asset-s/image/page1/LOGO.png') }}" class="my-3 ms-3" alt="" width="120" height="85" style="z-index: 3">
                </a>
            </div>
        </nav>
        <header class="">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="row">
                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                        <div class=" col-md-5 text-center text-white">
                            <h2 class="mx-auto my-0 text-uppercase" title="title">MAHA <br> DOELOER</h2>
                            <h6 class="text-white-50 mx-auto mt-2 mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, saepe, perspiciatis ad error atque nisi, alias vero recusandae impedit eaque neque harum. Eius dignissimos expedita, dolorem vitae nobis at tempore.</h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('asset-s/image/page1/TALENT.png') }}" alt="" class="w-100">
                    </div>
                </div>
            </div>
        </header>
    </div>

    <!-- Masthead-->
    <header class="masthead2">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <h1 class="mx-auto my-0 text-uppercase">Grayscale</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">A free, responsive, one page Bootstrap theme created by Start Bootstrap.</h2>
                    <a class="btn btn-primary" href="#about">Get Started</a>
                </div>
            </div>
        </div>
    </header>


    <style>
        /* .page1 {
          background-image: url('/asset-s/image/page1/BG.png');
          position: absolute;
          z-index: -1;
          height: 100vh;
          min-height: 650px;
          padding-top: 0;
          padding-bottom: 0;
        } */

        .masthead {
        position: relative;
        z-index: -1;
        width: 100%;
        height: 100vh;
        background: url("/asset-s/image/page1/BG.png");
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: scroll;
        background-size: cover;
        }

        .masthead2 {
        position: relative;
        width: 100%;
        height: 100vh;
        min-height: 35rem;
        padding: 15rem 0;
        background: url("/asset-s/image/page1/BG.png");
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: scroll;
        background-size: cover;
        }
    </style>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

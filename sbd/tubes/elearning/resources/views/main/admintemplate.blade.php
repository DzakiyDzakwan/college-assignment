<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- GOOGLE FONTS -->
    <link
      href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <!-- BOOTSTRAP -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <!-- BOX-ICON -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <!-- CSS -->
    @yield('css')
    @yield('title')
  </head>
  <body>
    <!-- SIDEBAR START -->
    @include('components.sidebaradmin')
    <!-- SIDEBAR END -->

    <!-- MAIN-BAR -->

    <!-- MAIN BAR START -->
    <div class="section-container px-3">
      @yield('content')
    </div>
    <!-- MAIN-BAR END -->

    {{-- sweetalert --}}
    @include('sweetalert::alert') 
    {{-- sweetalert End --}}

    <!-- JQUERY -->
    <script
      src="https://code.jquery.com/jquery-3.6.0.js"
      integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
      crossorigin="anonymous"
    ></script>
    <!-- BOOTSTRAP -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <!-- FONT AWESOME -->
    <!-- <script src="https://kit.fontawesome.com/9c0c4e63c7.js" crossorigin="anonymous"></script> -->
    <!-- VANILLA-JS -->
    <script src="{{asset('js/sidebar.js')}}"></script>
    <!-- CHART JS -->
    @yield('js')
  </body>
</html>

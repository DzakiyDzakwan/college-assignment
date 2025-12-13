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
    <!-- STYLE -->
    <style>
      body {
        background-color: #F2F2F2;
      }
      .alert {
        position: fixed;
        z-index: 1;
        width: 35%;
        transform: translateX(500px);
      }

      form {
        font-family: "Poppins";
        background-color: #FFFF
      }
    </style>
    <title>Login</title>
  </head>
  <body>
    <!-- ALERT -->
    @error('user_name')
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
      <strong>{{$message}}</strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> 
    @enderror

    @error('password')
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
      <strong>{{$message}}</strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @enderror

    @if (session()->has('loginFail'))
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
      <strong>{{session('loginFail')}}</strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <!-- ALERT END -->

    <div
      class="id container-fluid border border-black d-flex align-items-center justify-content-center"
      style="height: 100vh"
    >
      <form
        action="/login"
        method="POST"
        class="p-3 rounded shadow d-flex flex-column align-items-center"
        style="width: 400px"
      >
      @csrf
        <img src="{{asset('img/usu.png')}}" alt="" style="width: 80px" class="my-3" />
        <h3 class="fw-bold">Admin Login</h3>
        <div class="container-fluid">
          <div class="form-floating mb-3">
            <input
              type="text"
              class="form-control @error('user_name') is-invalid @enderror"
              id="floatingInput"
              placeholder="username"
              name="user_name"
              autocomplete="off"
              value="{{old('user_name')}}"
            />
            <label for="floatingInput">username</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control  @error('user_name') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password" />
            <label for="floatingPassword">Password</label>
          </div>
          <div class="my-3">
            <button class="btn btn-success container-fluid">Login</button>
          </div>
        </div>
      </form>
    </div>

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
  </body>
</html>

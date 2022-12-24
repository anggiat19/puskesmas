{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Rental Buku | login</title>
</head>
<body>


    <section class="vh-100" style="background-color: #508bfc;">

        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                        <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                        </div>
                    @endif
                    @if (session('status'))
                    <div class="alert alert-success">
                    {{ session('message') }}
                    </div>
                    @endif

                <form action="register" method="post" enctype="multipart/form-data">
                @csrf

                  <h3 class="mb-5">Sign Up</h3>

                  <div class="form-outline mb-4">
                    <input type="text" id="typeEmailX-2" class="form-control form-control-lg" name="username" placeholder="Username" />

                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password" placeholder="password" required/>

                  </div>
                  <div class="form-outline mb-4">
                    <input type="text" id="typePasswordX-2" class="form-control form-control-lg" name="phone" placeholder="phone"/>

                  </div>
                  <div class="form-outline mb-4">
                    <input  type="text" class="form-control form-control-lg" name="email" placeholder="email" rows="5" required></input>
 --}}

                  {{-- </div>
                  <div class="form-outline mb-4">
                    <input  type="file" class="form-control form-control-lg" name="image" placeholder="image" rows="5" required></input>


                  </div> --}}



                  {{-- <button class="btn btn-primary btn-lg btn-block" type="submit">Register</button><br>

                  <div class="my-3">
                    Have account ? <a href="login" >login</a>
                  </div> --}}





                {{-- </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('masuk') }}/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('masuk') }}/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('masuk') }}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('masuk') }}/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('masuk') }}/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('masuk') }}/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('masuk') }}/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('masuk') }}/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('masuk') }}/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('masuk') }}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('masuk') }}/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	@if (session('status'))
	<div class="alert alert-danger">
	{{ session('status') }}
	</div>
	@endif
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url({{ asset('masuk') }}/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign Up
					</span>
				</div>


				<form class="login100-form validate-form" method="POST" action="">
                    @csrf
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <span class="label-input100">Phone</span>
                        <input class="input100" type="text" name="phone" placeholder="Enter phone">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="email" name="email" placeholder="Enter email">
                        <span class="focus-input100"></span>
                    </div>

					<div class="flex-sb-m w-full p-b-30">




					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Register
						</button>
					</div>
                    <div class="my-3">
                        have account ? <a href="login" >Login</a>
                      </div>
				</form>
			</div>
		</div>
	</div>

<!--===============================================================================================-->
	<script src="{{ asset('masuk') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('masuk') }}/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('masuk') }}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{ asset('masuk') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('masuk') }}/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('masuk') }}/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{ asset('masuk') }}/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('masuk') }}/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('masuk') }}/js/main.js"></script>

</body>
</html>

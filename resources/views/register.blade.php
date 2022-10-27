<!DOCTYPE html>
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


                  </div>
                  <div class="form-outline mb-4">
                    <input  type="file" class="form-control form-control-lg" name="image" placeholder="image" rows="5" required></input>


                  </div>



                  <button class="btn btn-primary btn-lg btn-block" type="submit">Register</button><br>

                  <div class="my-3">
                    Have account ? <a href="login" >login</a>
                  </div>





                </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>

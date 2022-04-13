@extends('loginlayout')

@section('title','Hospital Sign Up')
    

@section('bootstrap')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection

@section('body')
    <section style="background-color: #C2E6CA;">
        <div class="container-fluid min-vw-100 min-vh-100">
            <div class="row d-flex justify-content-center align-items-center min-vw-100 min-vh-100 ">

                <div class="col-lg-7 col-md-6">
                    <img src="{{URL::asset('/image/signup.png')}}" alt="login" class="image-fluid" id="sign" style="width:500px; height:350px;border:none;"> 
                </div>
                <div class="col-lg-5 col-md-6 ">
                     <div class="container p-5 mb-5 mr-5 cuscontainers">
                         <div class="headers">
                           
                             <p class="title3">Sign Up to  Sakura</p>
                             <p class="title4">Already a member? <a href="login">Log in</a></p>
                         </div>
                         <form action="signup" method="POST">
                            @csrf
                         <div class="form-group mt-3">
                             <label for="name" >Your name:</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter your  username.." required>
                            @error('name')
                                <li class="text-danger">{{ $message }}</li>
                            @enderror
                         </div>
                         <div class="form-group mt-3">
                            <label for="email" >Your Email:</label>
                           <input type="email" name="email" id="email" class="form-control" placeholder="Enter your  email.." required>
                           @if ($error == 5)
                              <li class="text-danger">There already exists an account registered with this email address.</li>
                           @endif
                           @error('email')
                               <li class="text-danger">{{ $message }}</li>
                           @enderror
                        </div>
                         <div class="form-group mt-3">
                             <label for="password">Password :</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password.." required>
                            @error('password')
                            <li class="text-danger">{{ $message }}</li>
                        @enderror
                         </div>
                         <div class="form-group mt-3">
                            <label for="cfmpassword">Confrim password :</label>
                           <input type="password" name="cfmpassword" id="cfmpassword" class="form-control" placeholder="Enter your password.." required>
                           @error('cfmpassword')
                           <li class="text-danger">{{ $message }}</li>
                       @enderror
                        </div>
                         
                         
                         <button type="submit"  id="loginbutton"  class="btn mt-4">Create an account</button>
                        </form>

                     </div>
                     
                </div>
              
            </div>
        </div>
    </section>
@endsection 
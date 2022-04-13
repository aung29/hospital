@extends('loginlayout')

@section('title','Hospital Login')
    

@section('bootstrap')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection

@section('body')
    <section style="background-color: #B6B8DE;">
        <div class="container-fluid min-vw-100 min-vh-100">
            <div class="row d-flex justify-content-center align-items-center min-vw-100 min-vh-100 ">
                <div class="col-lg-7 col-md-6 ">
                     <div class="container p-5 mb-5 mx-5 cuscontainers">
                         <div class="headers">
                             <p class="title1">Welcome Back</p>
                             <p class="title2">Login to your account</p>
                         </div>
                         <form action="dashboard" method="POST">
                             @csrf
                         <div class="form-group mt-4">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Login with username.." required>
                          
                            @error('name')
                            <li class="text-danger">{{ $message }}</li>
                        @enderror
                         </div>
                         <div class="form-group mt-4">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password.." required>
                            @if ($error == 2)
                            <li class="text-danger">Email need to verify and check email box to verify.</li>
                        @endif
                            @if ($error == 3)
                            <li class="text-danger">Password is incorrect.</li>
                        @endif
                            @error('password')
                            <li class="text-danger">{{ $message }}</li>
                        @enderror
                         </div>
                         <div class="d-flex">
                            <div class="form-group mt-4 ">
                                <input type="checkbox" name="rempw" id="rempw" class="form-check-input ">
                                <label for="rempw">Remember Me</label>
                               
                            </div>
                            <div class="forget mt-4">
                                <a href="#" class="forgetpw">Forget Password?</a>
                            </div>
                         </div>
                         
                         <button type="submit"  id="loginbutton"  class="btn mt-4">Login</button>
                        </form>
                        <div class="row d-flex mt-3">
                           <div class="col-6" style="width: 150px">
                                <hr>        
                           </div>
                           <div class="col-1 mt-1">
                               <p>or</p>
                           </div>
                            <div class="col-5" style="width: 170px">
                                <hr>
                            </div>
                         </div>
                         <p>You don't have an account? <a href="signup">Sign Up</a>  in here!!</p> 
                     </div>
                     
                </div>
                <div class="col-lg-5 col-md-6">
                    <img src="{{URL::asset('/image/login.png')}}" alt="login" class="image-fluid " style="width:500px; height:350px"> 
                </div>
            </div>
        </div>
    </section>
@endsection 
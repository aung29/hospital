@extends('layout')

@section('title',"Add Doctor Form")

@section('bootstrap')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection

@section('body')
        {{-- <p class="dashboard">Doctors</p> --}}
        <div class="container mx-auto mx-5 mt-3 px-3 py-3">
            <div class="row">
                <div class="col-12 leftside">
                    <p class="fs-2">Add Doctor List Form</p>
                    <form action="{{ route('doctor.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-4 ">
                                   <div class="form-group">
                                    <label for="name" class="text-secondary">Doctor Name</label>
                                    <input type="text" name="name"  class="form-control" placeholder="Enter Doctor Name.." required>
                                   </div>
                                    
                            </div>
                            <div class="col-5 mx-5">
                                <div class="form-group ">
                                 <label for="specialist" class="text-secondary">Doctor Specialist</label>
                                 <input type="text" name="specialist"  class="form-control" placeholder="Enter specialist..." required>
                                </div>
                                 
                         </div>
                         <div class="col-4 mt-3">
                            <div class="form-group ">
                             <label for="profile" class="text-secondary">Doctor Profile</label>
                             <input type="file" name="profile"  class="form-control"  required>
                            </div>
                             
                        </div>

                            <div class="col-4 mt-3 mx-5">
                                <div class="form-group">
                                    <label for="stdate" class="text-secondary mb-2">Date</label>
                                    <input type="date" id="stdate" name="stdate" class="form-control" required >
                                    <label for="stdate" class="text-secondary mt-1">Start Time</label>
                                    <input type="time" id="sttime" name="sttime" class="form-control mt-2" required >

                                </div>
                                <div class="form-group mt-2">
                                    <label for="enddate" class="text-secondary">End Time</label>
                                    <input type="time" id="endtime" name="endtime" class="form-control mt-2" required >
                                    
                                </div>
                            </div>
                      

                         <div class="col-10 mt-5 text-left">
                           <button type="submit" class="btn btn-dark" style="height : 40px; border-radius:15px;margin-right : 30px;background :  rgb(48, 47, 47),color:white;">Add</button>
                          
                       
                   </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection
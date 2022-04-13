@extends('layout')


@section('title',"Add Appointment Form")

@section('bootstrap')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection

@section('body')
    
        <div class="container mx-auto mx-5 mt-3 px-3 py-3">
            <div class="row">
                <div class="col-12 leftside">
                    <p class="fs-2">Add Appointment Form</p>
                    <form action="{{ route('appointment.update',$appointments->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-4 ">
                                   <div class="form-group">
                                    <label for="name" class="text-secondary">Doctor Name</label>
                                    <input type="text" name="name"  class="form-control" placeholder="Enter Doctor Name.." value="{{ $appointments->text }}" required >
                                   </div>
                                    
                            </div>
                            <div class="col-6 mx-5">
                                <div class="form-group ">
                                 <label for="room" class="text-secondary">Room</label>
                                 <input type="number" name="room"  class="form-control" placeholder="Enter room number.." value="{{ $appointments->room }}" required>
                                </div>
                                 
                         </div>
                            <div class="col-4 mt-3">
                                <div class="form-group">
                                    <label for="datetime">Appointment Date</label>
                                    <input type="datetime-local" id="datetime" name="datetime"  value="{{ $appointments->datetimee}}"
       min="2021-12-14T00:00" max="2021-12-26T00:00">
                                </div>
                            </div>
                      

                         <div class="col-3 mt-5 text-left">
                           <button type="submit" class="btn btn-warning" style="height : 40px; border-radius:15px;margin-right : 30px;background :  rgb(48, 47, 47),color:white;">Add</button>
                          
                       
                   </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
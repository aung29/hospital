@extends('layout')


@section('title',"Add Room")

@section('bootstrap')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection

@section('body')
    
        <div class="container mx-auto mx-5 mt-3 px-3 py-3">
            <div class="row">
                <div class="col-12 leftside">
                    <p class="fs-2">Add Room Form</p>
                    <form action="{{ route('room.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-4 ">
                                   <div class="form-group">
                                    <label for="roomno" class="text-secondary">Room No</label>
                                    <input type="number" name="roomno"  class="form-control" placeholder="Enter room number.." required>
                                   </div>
                                    
                            </div>
                            <div class="col-6 mx-5">
                                <div class="form-group ">
                                 <label for="roomst" class="text-secondary">Room Status</label>
                                 <select name="status" id="roomst" class="form-select" style="width : 300px;font-size : 16px;border-radius : 10px; ">
                                    <option value="0" selected disabled>Choose Status</option>
                                    <option value="1">Active</option>
                                    <option value="2">Lock</option>
                                    <option value="3">Available</option>
                            </select>
                                </div>
                                 
                         </div>

                          <div class="col-4 mt-4">
                                   <div class="form-group">
                                    <label for="roomp" class="text-secondary">Patient</label>
                                    <input type="number" name="roomp"  class="form-control" placeholder="Enter patient.. ">
                                   </div>
                                    
                            </div>

                            <div class="col-4 mt-4 mx-5">
                                <div class="form-group">
                                 <label for="roomprice" class="text-secondary">Room Price</label>
                                 <input type="number" name="roomprice"  class="form-control" placeholder="Enter room price.. " required>
                                </div>
                                 
                         </div>

                         <div class="col-9 mt-5 text-left">
                           <button type="submit" class="btn btn-secondary" style="height : 40px; border-radius:15px;margin-right : 30px;background : tomato;">Add</button>
                          
                       
                   </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
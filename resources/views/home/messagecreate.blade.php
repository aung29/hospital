@extends('layout')


@section('title',"Add Message Form")

@section('bootstrap')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection

@section('body')
    
        <div class="container mx-auto mx-5 mt-3 px-3 py-3">
            <div class="row">
                <div class="col-12 leftside">
                    <p class="fs-2">Add Message Form</p>
                    <form action="{{ route('message.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-4 ">
                                   <div class="form-group">
                                    <label for="message" class="text-secondary">Message</label>
                                    <textarea  name="message"  class="form-control" placeholder="Enter message.." rows="3" cols="30" required> </textarea>
                                   </div>
                                    
                            </div>
                            <div class="col-6 mx-5">
                                <div class="form-group ">
                                 <label for="vip" class="text-secondary">Prioity</label>
                                 <select name="vip" id="vip" class="form-select" style="width : 300px;font-size : 16px;border-radius : 10px; ">
                                    <option value="0" selected disabled>Choose Prioity</option>
                                    <option value="1">Normal</option>
                                    <option value="2">Vip</option>
                                   
                            </select>
                                </div>
                                 
                         </div>

                      

                         <div class="col-8 mt-5 text-left">
                           <button type="submit" class="btn btn-warning" style="height : 40px; border-radius:15px;margin-right : 30px;background : silver;">Add</button>
                          
                       
                   </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
@extends('layout')


@section('title',"Edit Drug")

@section('bootstrap')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection

@section('body')
    
        <div class="container mx-auto mx-5 mt-3 px-3 py-3">
            <div class="row">
                <div class="col-12 leftside">
                    <p class="fs-2">Edit Drug Form</p>
                    <form action="{{ route('drug.update',$drugs->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-4 ">
                                   <div class="form-group">
                                    <label for="pname" class="text-secondary">Drug name</label>
                                    <input type="text" name="pname"  class="form-control" placeholder="Enter drug name.." value="{{ $drugs->name }}"required>
                                   </div>
                                    
                            </div>
                            <div class="col-6 mx-5">
                                <div class="form-group ">
                                 <label for="ptype" class="text-secondary">Drug type</label>
                                 <input type="text" name="ptype"  class="form-control" placeholder="Enter drug type.. " value="{{ $drugs->type }}" required >
                                </div>
                                 
                         </div>

                          <div class="col-4 mt-4">
                                   <div class="form-group">
                                    <label for="pstock" class="text-secondary">Stock</label>
                                    <input type="number" name="pstock"  class="form-control" placeholder="Enter stock... " value="{{ $drugs->stock }}" required>
                                   </div>
                                    
                            </div>

                            <div class="col-4 mt-4 mx-5">
                                <div class="form-group">
                                 <label for="pprice" class="text-secondary">Drug Price</label>
                                 <input type="number" name="pprice"  class="form-control" placeholder="Enter drug price.. " value="{{ $drugs->price }}" required>
                                </div>
                                 
                         </div>

                         <div class="col-9 mt-5 text-left">
                           <button type="submit" class="btn btn-secondary" style="height : 40px; border-radius:15px;margin-right : 30px;background : teal;">Update</button>
                          
                       
                   </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@extends('layout')
@section('title','Drug Store')
    

@section('bootstrap')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection


@section('body')
<div class="body">
    <p class="dashboard">Drug Store</p>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                   @forelse ($drugs as $drug)
                   <div class="col-6">
                    <div class="card" style=" weight : 400px ;height :360px ; ">
                        <div class="card-header">
                                <p class="text-left">Drug Name : {{$drug->name}}</p>
                                <p >Drug Type : {{ $drug->type }}</p>
                                
                                <p >Stock : {{ $drug->stock }}</p>
                               <p >Price :{{ $drug->price }}$</p>

                            </div>
                        
                        <div class="card-body">
                            <a href="{{ route('drug.edit', $drug->id) }}" class="btn btn-info mx-3">Edit</a>
                            <form action="{{ route('drug.destroy',$drug->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mx-3">Delete</button>
                            </form>
                           </div>
                    </div>
                </div>
                   @empty
                       Nothing
                   @endforelse
                </div>

           </div>
        </div>
   
 </div>
 
</div>

@endsection














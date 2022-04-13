@extends('layout')
@section('title','Appointment View')
    

@section('bootstrap')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection


@section('body')
<div class="body">
    <p class="dashboard">Appointment</p>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                   @forelse ($appointments as $app)
                   <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                                <p>Meet {{$app->name }}.</p>
                                <p>Room {{$app->room  }}</p>
                            <p class="price">{{ $app->date }}</p>
                            <p class="price">{{ $app->time }}</p>

                           
                        </div>
                        <div class="m-5">
                            <a href="{{ route('appointment.edit',$app->id) }}" class="btn btn-info mx-4">Edit</a>
                            <form action="{{ route('appointment.destroy',$app->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mx-4">Delete</button>
                            </form>
                           </div>
                    </div>
                </div>
                   @empty
                       
                   @endforelse
                </div>

            </div>

    </div>
 </div>
 
</div>

@endsection














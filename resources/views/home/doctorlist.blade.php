@extends('layout')


@section('title','Doctor List')


@section('body')
    
<div class="body">
    <p class="dashboard">Doctors List</p>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    @forelse ($doctors as $doctor)
                    <div class="card">
                        <div class="img">
                            <img src="/storage/doctorProfile/{{ $doctor->name }}.JPG" >
                        </div>
                        <div class="detail">
                            <p class="text">
                                <span class="value">  {{ $doctor->name }}</span>
                            </p>
                             <p class="text">
                                <span class="value">  {{ $doctor->specialist }}</span>
                            </p>
                            <p class="text">
                                <span class="value">  {{ date_format(date_create($doctor->avaliable_date),"D") }}</span>
                                <span class="value">  {{ date_format(date_create($doctor->starts),"H:i A") }}</span>
                                <span class="value" >-  {{ date_format(date_create($doctor->ends),"H:i A") }}</span>
                            </p>
                        </div>

                        <div class="card-body">
                            <a href="{{ route('doctor.edit', $doctor->id) }}" class="btn btn-info mx-3" style="background: black;color:white;text-align:center;font-size:15px;padding-top:5px;">Edit</a>
                            <form action="{{ route('doctor.destroy',$doctor->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mx-3">Delete</button>
                            </form>
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

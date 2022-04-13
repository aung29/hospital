@extends('layout')
@section('title','Room View')
    

@section('bootstrap')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection


@section('body')

<div class="body">
    <p class="dashboard">Room View</p>
    <div class="container-fluid">
        <div class="row">
            @forelse ($rooms as $room)
        
            @switch($room->status)
            
                @case(1)
                  <div class="d-flex col-3 p-3">
                    <div>
                        <p class="r_status activeRoom"></p>
                        <p class="roomname">Room {{ $room->room }}</p>
                    </div>
                    <div class="p-2">
                        <a href="{{ route('room.edit', $room->id )}}" class="btn btn-info mx-auto">Edit</a>
                        <form action="{{ route('room.destroy',$room->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mx-auto">Delete</button>
                        </form>
                    </div>
                  </div>
                
                    @break;
                @case(2)
                <div class="d-flex col-3 p-3">
                    <div>
                        <p class="r_status lock"></p>
                        <p class="roomname">Room {{ $room->room }}</p>
                    </div>
                    <div class="p-2">
                        <a href="{{ route('room.edit', $room->id )}}" class="btn btn-info mx-auto">Edit</a>
                        <form action="{{ route('room.destroy',$room->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mx-auto">Delete</button>
                        </form>
                    </div>
                  </div>
                    @break;
               @case(3)
               <div class="d-flex col-3 p-3">
                <div >
                    <p class="r_status avaliable"></p>
                    <p class="roomname">Room {{ $room->room }}</p>
                </div>
                <div class="p-2">
                    <a href="{{ route('room.edit', $room->id )}}" class="btn btn-info mx-auto">Edit</a>
                    <form action="{{ route('room.destroy',$room->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"  class="btn btn-danger mx-auto">Delete</button>
                    </form>
                </div>
              </div>
              @break;
                @default
                    
            @endswitch
          
  
           
        @empty
              No Room
        @endforelse
        </div>
    </div>
        <div class="p-5 mt-3">
    <span class="block activeRoom "> </span> Active
    <span class="block lock">  </span> Lock
    <span class="block avaliable"> </span> Avaliable

    </div>
 </div>
 
</div>
   
@endsection
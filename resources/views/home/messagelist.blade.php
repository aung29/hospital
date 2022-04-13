@extends('layout')
@section('title','Message View')
    

@section('bootstrap')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection


@section('body')
<div class="body">
    <p class="dashboard">Unread Message</p>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                   @forelse ($messages as $message)
                   <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                                <p>{{$message->message  }}</p>
                            @if ($message->vip == 2)
                            <ion-icon name='flag' class='colorsecondary'></ion-icon> VIP Message
                            @endif
                            <p class="price">{{ $message->time }}</p>

                           
                        </div>
                        <div class="m-4">
                            <a href="{{ route('message.edit',$message->id) }}" class="btn btn-info mx-auto">Edit</a>
                            <form action="{{ route('message.destroy',$message->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mx-auto">Delete</button>
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














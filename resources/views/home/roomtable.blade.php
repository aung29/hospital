@extends('layout')

@section('title',"Room Table")

@section('bootstrap')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection


@section('body')
<div class="container mx-auto mx-5 mt-3 px-3 py-3">
  <div class="row">
      <div class="col-10 leftside">
          <p class="fs-2">Room Table</p>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Room.No</th>
        <th scope="col">Status</th>
        <th scope="col">Person</th>
        <th scope="col">Price</th>
      </tr>
    </thead>
    <tbody>
    @forelse ($rooms as $item)

    <tr>
      <td>{{ $item->id }}</td>
      <td>Rm.{{$item->room }}</td>
        @if ($item->status == 1) <td>Active</td> @endif 
         @if ($item->status == 2) <td>Lock</td> @endif
        @if ($item->status == 3) <td>Available</td> @endif
        @if ($item->person == 0)
        <td>none</td> 
   @else
       <td>{{ $item->person }}</td>
   @endif

    <td class="price">{{$item->price }}$</td>
    </tr>
      @empty
        No Room Yet.
      @endforelse
     
    </tbody>
  </table> 
  
      </div>
  </div>
</div>
<div class="d-flex justify-content-center">
  {{ $rooms->links() }}
 
</div> 
@endsection
@extends('layout')

@section('title','Dashboard')
    



@section('body')
<div class="body">
    <p class="dashboard">@lang('message.Sakura Hospital')</p>
    <div class="h_status">
      <div class="doctor">
        <ion-icon name="git-network"></ion-icon>
        <p class="name"><a href="{{ route("doctor.create") }}">@lang('message.Doctor')</a></p>
        <p class="count" id="count1"></p>
      </div>
      <div class="nurse">
        <ion-icon name="people-outline"></ion-icon>
        <p class="name">@lang('message.Nurse')</p>
        <p class="count" id="count2"></p>
      </div>
      <div class="room">
        <ion-icon name="bed-outline"></ion-icon>
        <p class="name">@lang('message.Bed')</p>
        <p class="count" id="count3"></p>
      </div>
    </div>
    <div class="detailstatus">
      <div class="status">
        <div class="title colorprimary bgsecondary">
          <ion-icon name="bed-outline"></ion-icon><span id="roomTitle">@lang('message.Room Status')</span>
        </div>
        <table class="table">
           @forelse ($result as $item)
                <tr>
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
        </table>
       
          <form action="/roomtable">
            <button class="btn btnroom">@lang('message.See More')</button>
          </form>
           <form action="{{ route('room.create') }}">
            <button class="btn btnroom"><ion-icon name="add-circle"></ion-icon>@lang('message.Add Room')</button>
           </form>
           <form action="download1">
            <button class="btn btnroom"><ion-icon name="download"></ion-icon> @lang('message.Download')</button>
           </form>
         
      
      </div>
      
      <div class="status">
        <div class="title bgthird">
          <ion-icon name="mail-unread-outline"></ion-icon><span id="messageTitle">@lang('message.Unread Message')</span>
        </div>
        <table class="table" id="message">
          @forelse ($result2 as $item)
              <tr>
                @if ($item->vip==1)
                    <td>{{ $item->message }}
                    </td>
                @else
                    <td>{{ $item->message }} <br/>
                      <ion-icon name='flag' class='colorsecondary'></ion-icon>
                      Vip @lang('message.Message')
                    </td>
                @endif
                <td class="price">9:00AM</td>
              </tr>
              
          @empty
              No Message
          @endforelse
        </table>
       
       <form action="{{ route('message.index') }}">
        <button class="btn btnmessage">@lang('message.Read More')</button>
       </form>
        <form action="{{ route('message.create') }}">
        <button class="btn btnmessage bgmessage"><ion-icon name="add-circle"></ion-icon> @lang('message.Add Message')</button>
      </form>
      <form action="download2">
        <button class="btn btnmessage"><ion-icon name="download"></ion-icon> @lang('message.Download')</button>
       </form>
      </div>
    </div>
    <div class="detailstatus">
      <div class="status">
        <div class="title colorprimary bgfouth">
        <ion-icon name="medkit"></ion-icon><span id="drugTitle">@lang('message.Drug Store')</span>
        </div>
        <table class="table" id="drugTable">
            @forelse ($result3 as $item)
         
                <tr>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->type }}</td>
                  @if ($item->stock == 0)
                    <td>Out of Stock</td>
                  @else
                      <td>{{ number_format($item->stock) }}</td>
                  @endif
                  <td class="price">{{ number_format($item->price) }}$/per item</td>
                </tr>
            @empty
                No drug
            @endforelse
        </table>
        <form action="{{ route('drug.index') }}">
          <button class="btn btndrug bgfouth">@lang('message.Check All')</button></form>
        <form action="{{ route('drug.create') }}">
          <button class="btn btndrug bgfouth"><ion-icon name="add-circle"></ion-icon> @lang('message.Add Drug')</button></form>
          <form action="download3">
            <button class="btn btndrug"><ion-icon name="download"></ion-icon> @lang('message.Download')</button>
           </form>
      </div>
      <div class="status">
        <div class="title colorprimary btnappointment">
        <ion-icon name="calendar"></ion-icon><span id="appointmentTitle">@lang('message.Appointment')</span>
        </div>
        <table class="table" id="appointmentTable">
            @forelse ($result4 as $item)
                  <tr>
                    <td>Meet {{ $item->name }}</td>
                    <td>Room {{ $item->room  }}</td>
                    <td class="price">{{ $item->date}}</td>
                    <td class="price">{{ $item->time }}</td>
                  </tr>
            @empty
                No appointmnet
            @endforelse
        </table>
       <form action="{{ route('appointment.index') }}">
        <button class="btn btndrug btnappointment">@lang('message.See More')</button></form>
       <form action="{{ route('appointment.create') }}">
        <button class="btn btndrug btnappointments"><ion-icon name="add-circle"></ion-icon> @lang('message.Add Appointment')</button>
       </form>
       <form action="download4">
        <button class="btn btnappointments"><ion-icon name="download"></ion-icon> @lang('message.Download')</button>
       </form>
      </div>
  </div>

    <div class="language">
        <div class="english">
            <a href="/dashboard/en" class="">@lang('message.English')</a>
        </div>
        <div class="japan">
          <a href="/dashboard/jp" class="">@lang('message.Japan')</a>
      </div>
    </div>
</div>


@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- <script src="jquery3.6.0.js"></script> --}}
    {{-- <script src="roomviewScript.js"></script> --}}
    {{-- <link rel="stylesheet" href="../../public/style.css" type="text/css" /> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ url('../../public/style.css') }}" />
     --}}
     <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
     {{--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>  --}}
     {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
     {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
     {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <script
       type="module"
       src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
       ></script>
    <script
       nomodule
       src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
       ></script>
    <script src="{{ asset("js/app.js") }}" type="text/javascript"> </script>
      @yield('bootstrap')
 </head>
</head>
<body>
    <div class="main">
        <div class="header">
          <span id="logo"><img src="{{URL::asset('/image/logo.png')}}" alt="" /></span>
          <span>
           @lang('message.Message')<ion-icon name='mail-unread-outline'></ion-icon>
          </span>
          <span>
            @lang('message.Appointment') <ion-icon name='calendar'></ion-icon>
          </span>
          <span class="contact"
            >@lang('message.Care Center')
            <p id="phone"><ion-icon name="call"></ion-icon> </p></span>
        </div>
        <div class="mainbody">
          <div class="nav">
            <div class="systemname">@lang('message.Sakura Hospital')</div>
            <ul class="menu">
             
               @if ($active == 1)
               <li class="taglink active">
                @else
                <li class="taglink"> 
               @endif
                    <ion-icon name="apps"></ion-icon>
                    <a href="/dashboard" class="cleartag">@lang('message.Dashboard')</a> 
                 </li>
              
                 @if ($active == 7)
                 <li class="taglink active">
                  @else
                  <li class="taglink"> 
                 @endif
                  <ion-icon name="call"></ion-icon>
               <a href="/doctor" class="cleartag">Doctor List</a>
               </li> 
             
                 @if ($active == 3)
                 <li class="taglink active">
                  @else
                  <li class="taglink"> 
                 @endif
                 <ion-icon name="bed"></ion-icon>
                 <a href="/roomview" class="cleartag">@lang('message.Room View')</a>  
              </li>

              @if ($active == 4)
              <li class="taglink active">
               @else
               <li class="taglink"> 
              @endif
              <ion-icon name="mail-unread-outline"></ion-icon>
              <a href="/message" class="cleartag">@lang('message.Unread Message')</a>  
           </li>
         
           @if ($active == 5)
           <li class="taglink active">
            @else
            <li class="taglink"> 
           @endif
           <ion-icon name="add-circle"></ion-icon>
           <a href="/drug" class="cleartag">@lang('message.Drug Store')</a>  
        </li>

        @if ($active == 6)
        <li class="taglink active">
         @else
         <li class="taglink"> 
        @endif
         <ion-icon name="call"></ion-icon>
      <a href="/appointment" class="cleartag">@lang('message.Appointment list')</a>
      </li> 

      

         <li>
            <ion-icon name="log-out"></ion-icon>
            <a href="/logout" class="cleartag">@lang('message.Logout')</a>
         </li>
            

       
           </ul>
          
          </div>
         

    @yield('body')
</body>
</html>
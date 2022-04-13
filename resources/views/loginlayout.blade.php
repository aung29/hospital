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
     <link rel="stylesheet" type="text/css" href="{{ url('/css/style2.css') }}" />
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
   
    @yield('body')
</body>
</html>
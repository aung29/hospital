<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style2.css') }}" />
</head>
<body>
    <div class="mail-container">
            <div class="tagtitle">
                <p class="tagname">Sakura Hospital</p>
            </div>
            <div class="tagbody">
                <h3>Hey {{ $name }},</h3>
                <p>Thanks for registering for an account on Sakura Hospital! Before we get started, we just need to confirm that this is you. Click below to verify your email address:</p>
                <a href="http://127.0.0.1:8000/verify/{{ $token }}">Verify Email</a>
            </div>
    </div>
    
  
</body>
</html>



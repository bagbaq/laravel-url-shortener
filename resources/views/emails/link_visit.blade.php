<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="message">
            <p>Dear {{ $mailData['name'] }},</p>
            <p>Your short link <a href="{{ url($mailData['short_link']) }}">"{{ $mailData['short_link'] }}"</a> has been visited.
        </div>
    </div>
</body>
</html>

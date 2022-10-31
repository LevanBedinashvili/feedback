<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>From: {{ $data['email'] }}</p>
    <p>სახელი: {{ $data['name'] }}</p>
    <p>თემა: {{ $data['subject'] }}</p>
    <p>წერილი: {{ $data['text'] }}</p>

</body>
</html>

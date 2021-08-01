<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>PDF</title>
    <style>
        @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 400;
        src: url({{ asset('fonts/Roboto-Regular.ttf') }});
        }
        @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: bold;
        src: url({{ asset('fonts/Roboto-Bold.ttf') }});
        }
        body {
        font-family: 'Roboto';
        }
        </style>

</head>
<body>
    <small>Reservoir title: {{$reservoir->title}}</small>
    <small>Reservoir area:{{$reservoir->area}}</small>
    <small>Reservoir about:{!!$reservoir->about!!}</small>
</body>
</html>

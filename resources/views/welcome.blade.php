<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach($post as $item) <!-- Loop through the collection -->
        @if(isset($item->placeName)) <!-- Check if the second element of placeName exists -->
            <p>{{ $item->placeName }}</p>
        @else
            <p>Place name not available</p>
        @endif
    @endforeach
</body>
</html>

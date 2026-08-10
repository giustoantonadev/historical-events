<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historical Events</title>
</head>
<body>
    <h1>Historical Events</h1>
    <ul>
        @foreach($historicalEvents as $event)
            <li>{{ $event->title }} ({{ $event->year }})</li>
        @endforeach
    </ul>
</body>
</html>
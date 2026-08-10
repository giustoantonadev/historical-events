<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Events</title>
</head>
<body>
    <h1>Create Event</h1>
    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required><br>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea><br>

        <label for="year">Year:</label>
        <input type="number" name="year" id="year" required><br>

        <label for="image">Image:</label>
        <input type="file" name="image" id="image"><br>

        <label for="period_id">Period:</label>
        <select name="period_id" id="period_id" required>
            @foreach($periods as $period)
                <option value="{{ $period->id }}">{{ $period->name }}</option>
            @endforeach
        </select><br>

        <label for="historical_person_id">Historical Person:</label>
        <select name="historical_person_id[]" id="historical_person_id" multiple required>
            @foreach($historicalPeople as $person)
                <option value="{{ $person->id }}">{{ $person->name }}</option>
            @endforeach
        </select><br>

        <button type="submit">Create Event</button>
    </form>
</body>
</html>
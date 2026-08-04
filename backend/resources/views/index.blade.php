<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <h1>Welcome to the Historical Events Application</h1>
    <data-table id="historical-people-table" class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Biography</th>
                <th>Portrait</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($historicalPeople as $person)
                <tr>
                    <td>{{ $person->name }}</td>
                    <td>{{ $person->biography }}</td>
                    <td><img src="{{ asset('storage/' . $person->portrait) }}" alt="{{ $person->name }}" width="100"></td>
                </tr>
            @endforeach
        </tbody>
    </data-table>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Stacks Visibility</title>
    @vite('resources/js/app.js')
</head>

<body>
    <h2>Enter Book Stacks Grid</h2>

    <form action="{{ route('bookstacks.store') }}" method="POST">
        @csrf
        <label>Grid Size (N):</label>
        <input type="number" id="grid_size" name="grid_size" min="1" max="50" required>
        <button type="button" onclick="generateGrid()">Generate Grid</button>
        <div id="grid_input"></div>
        <button type="submit">Submit</button>

        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </form>

    @if(session('success'))
    <p>{{ session('success') }}</p>
    @endif

    <h2>Past Calculations</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Number</th>
                <th>Grid</th>
                <th>Visible stacks</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookStacks as $bookStack)
            <tr>
                <td>{{ $bookStack->grid_size }}</td>
                <td>
                    @foreach ($bookStack->grid_data as $row)
                    <div>
                        @foreach ($row as $value)
                        {{ $value }}
                        @endforeach
                    </div>
                    @endforeach
                </td>
                <td>{{ $bookStack->visible_stacks }}</td>
                <td>{{ $bookStack->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
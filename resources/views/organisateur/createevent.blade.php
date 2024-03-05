<!-- resources/views/events/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
</head>
<body>
    <h1>Create Event</h1>
    
    <!-- Display validation errors if any -->
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Display success message if any -->
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <!-- Event creation form -->
    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}">
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
        </div>
        <div>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="{{ old('date') }}">
        </div>
        <div>
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" value="{{ old('location') }}">
        </div>
        <div>
            <label for="category_id">Category:</label>
            <input type="number" id="category_id" name="category_id" value="{{ old('category_id') }}">
        </div>
        <div>
            <label for="available_seats">Available Seats:</label>
            <input type="number" id="available_seats" name="available_seats" value="{{ old('available_seats') }}">
        </div>
       
        <button type="submit">Create Event</button>
    </form>
</body>
</html>

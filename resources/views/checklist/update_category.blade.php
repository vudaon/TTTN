<!DOCTYPE html>
<html>
<head>
    <title>Checklist Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Checklist: {{ $checklist->flight_number }}</h2>
    <a href="{{route('checklist.edit.after',$checklist->id)}}">Edit after</a>
    <a href="{{route('checklist.edit.before',$checklist->id)}}">Edit before</a>

    <form action="{{ route('checklist.update', $checklist->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="flight_number">Flight Number</label>
            <input type="text" name="flight_number" class="form-control" value="{{ $checklist->flight_number }}">
        </div>
        <div class="form-group">
            <label for="time">Time</label>
            <input type="time" name="time" class="form-control" value="{{ $checklist->time }}">
        </div>
        <div class="form-group">
            <label for="airplane_id">Airplane ID</label>
            <input type="number" name="airplane_id" class="form-control" value="{{ $checklist->airplane_id }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Checklist</button>
    </form>

</div>
</body>
</html>

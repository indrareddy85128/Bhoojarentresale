<!DOCTYPE html>
<html>

<head>
    <title>{{ $subject }}</title>
</head>

<body>
    <h1>{{ $subject }}</h1>
    <p><strong>Insurance:</strong> {{ $insurance->insurance }}</p>
    <p><strong>Name:</strong> {{ $insurance->name }}</p>
    <p><strong>Phone Number:</strong> {{ $insurance->phone }}</p>
    <p><strong>Email:</strong> {{ $insurance->email }}</p>
    <p><strong>Car Number:</strong> {{ $insurance->car_number }}</p>
    <p><strong>Subject:</strong> {{ $insurance->subject }}</p>
    <p><strong>Authorise:</strong> {{ $insurance->authorise }}</p>
</body>

</html>

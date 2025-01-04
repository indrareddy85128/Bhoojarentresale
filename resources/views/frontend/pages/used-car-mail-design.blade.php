<!DOCTYPE html>
<html>

<head>
    <title>{{ $subject }}</title>
</head>

<body>
    <h1>{{ $subject }}</h1>
    <p><strong>Name:</strong> {{ $usedcar->name }}</p>
    <p><strong>Phone Number:</strong> {{ $usedcar->phone }}</p>
    <p><strong>Email:</strong> {{ $usedcar->email }}</p>
    <p><strong>Message:</strong> {{ $usedcar->message }}</p>
    <p><strong>Authorise:</strong> {{ $usedcar->authorise }}</p>
</body>

</html>

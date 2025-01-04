<!DOCTYPE html>
<html>

<head>
    <title>{{ $subject }}</title>
</head>

<body>
    <h1>{{ $subject }}</h1>
    <p><strong>Name:</strong> {{ $contact->name }}</p>
    <p><strong>Phone Number:</strong> {{ $contact->phone }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Subject:</strong> {{ $contact->subject }}</p>
    <p><strong>Message:</strong> {{ $contact->message }}</p>
    <p><strong>Authorise:</strong> {{ $contact->authorise }}</p>
</body>

</html>

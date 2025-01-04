<!DOCTYPE html>
<html>

<head>
    <title>{{ $subject }}</title>
</head>

<body>
    <h1>{{ $subject }}</h1>
    <p><strong>Resale:</strong> {{ $resale->resale_options }}</p>

    <p><strong>Flat Size,Facing,and BHK:</strong>
        @foreach ($resale->select_flat_size as $flat_size)
            {{ $flat_size }},
        @endforeach
    </p>

    <p><strong>Flat With:</strong>
        @foreach ($resale->furnished as $flat_with)
            {{ $flat_with }},
        @endforeach
    </p>
    <p><strong>Name:</strong> {{ $resale->name }}</p>
    <p><strong>Phone Number:</strong> {{ $resale->phone }}</p>
    <p><strong>Email:</strong> {{ $resale->email }}</p>
    <p><strong>Message:</strong> {{ $resale->message }}</p>
    <p><strong>Authorise:</strong> {{ $resale->authorise }}</p>
</body>

</html>

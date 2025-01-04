<!DOCTYPE html>
<html>

<head>
    <title>{{ $subject }}</title>
</head>

<body>
    <h1>{{ $subject }}</h1>
    <p><strong>Rent:</strong> {{ $rent->rent_options }}</p>

    <p><strong>Flat Size,Facing,and BHK:</strong>
        @foreach ($rent->select_flat_size as $flat_size)
            {{ $flat_size }},
        @endforeach
    </p>

    <p><strong>Flat With:</strong>
        @foreach ($rent->furnished as $flat_with)
            {{ $flat_with }},
        @endforeach
    </p>
    <p><strong>Name:</strong> {{ $rent->name }}</p>
    <p><strong>Phone Number:</strong> {{ $rent->phone }}</p>
    <p><strong>Email:</strong> {{ $rent->email }}</p>
    <p><strong>Message:</strong> {{ $rent->message }}</p>
    <p><strong>Authorise:</strong> {{ $rent->authorise}}</p>
</body>

</html>

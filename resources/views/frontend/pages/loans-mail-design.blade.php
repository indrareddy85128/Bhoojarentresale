<!DOCTYPE html>
<html>

<head>
    <title>{{ $subject }}</title>
</head>

<body>
    <h1>{{ $subject }}</h1>
    <p><strong>Loan :</strong> {{ $loan->loan }}</p>
    <p><strong>Loan Options :</strong>
        @if ($loan->loan_options)
            @foreach ($loan->loan_options as $loan_option)
                {{ $loan_option }}
            @endforeach
        @endif
    </p>
    <p><strong>Options :</strong>
        @if ($loan->options)
            @foreach ($loan->options as $option)
                {{ $option }}
            @endforeach
        @endif
    </p>
    <p><strong>Name :</strong> {{ $loan->name }}</p>
    <p><strong>Phone :</strong> {{ $loan->phone }}</p>
    <p><strong>Email :</strong> {{ $loan->email }}</p>
    <p><strong>Car Number:</strong> {{ $loan->car_number }}</p>
    <p><strong>Salary Per Month:</strong> {{ $loan->salary_per_month }}</p>
    <p><strong>Load Amount:</strong> {{ $loan->loan_amount }}</p>
    <p><strong>Message:</strong> {{ $loan->message }}</p>
    <p><strong>Authorise:</strong> {{ $loan->authorise }}</p>
</body>

</html>

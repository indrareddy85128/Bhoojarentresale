<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
</head>

<body>

    <p><strong>Name:</strong> {{ $lead->name }}</p>
    <p><strong>Phone Number:</strong> {{ $lead->phone }}</p>
    <p><strong>Email:</strong> {{ $lead->email }}</p>
    <p><strong>Message:</strong> {{ $lead->message }}</p>
    <p><strong>Lead Source:</strong> {{ $lead->lead_source }}</p>

    <h3>Form Details</h3>

    @if (!empty($resale_options))
        <p><strong>Resale Option:</strong> {{ $resale_options }}</p>
    @endif
    @if (!empty($rent_options))
        <p><strong>Rent Option:</strong> {{ $rent_options }}</p>
    @endif
    @if (!empty($loan_options))
        <p><strong>Loan Option:</strong> {{ $loan_options }}</p>
    @endif
    @if (!empty($insurance_options))
        <p><strong>Insurance Options:</strong> {{ $insurance_options }}</p>
    @endif
    @if (!empty($car_number))
        <p><strong> Car Number:</strong> {{ $car_number }}</p>
    @endif
    @if (!empty($mortgage_loan_options))
        <p><strong>Mortgage loan Options:</strong> {{ $mortgage_loan_options }}</p>
    @endif
    @if (!empty($salary_per_month))
        <p><strong>Salary Per Month:</strong> {{ $salary_per_month }}</p>
    @endif
    @if (!empty($loan_amount))
        <p><strong>Loan Amount:</strong> {{ $loan_amount }}</p>
    @endif
    @if (!empty($car_make_model))
        <p><strong>Car Make/Model:</strong> {{ $car_make_model }}</p>
    @endif
    @if (!empty($manufacturing_year))
        <p><strong>Manufacturing Year:</strong> {{ $manufacturing_year }}</p>
    @endif
    @if (!empty($kilometers))
        <p><strong>kilometers:</strong> {{ $kilometers }}</p>
    @endif



    @if (!empty($flat_details))
        <p><strong>Flat Details:</strong>
            @foreach ($flat_details as $flat_detail)
                {{ $flat_detail }}@if (!$loop->last)
                    ,
                @endif
            @endforeach
        </p>
    @endif
    @if (!empty($furnished_type))
        <p><strong>Furnished Type:</strong>
            @foreach ($furnished_type as $furnished)
                {{ $furnished }}@if (!$loop->last)
                    ,
                @endif
            @endforeach
        </p>
    @endif
    @if (!empty($sub_loan_options))
        <p><strong>Sub loan Options:</strong>
            @foreach ($sub_loan_options as $sub_loan)
                {{ $sub_loan }}@if (!$loop->last)
                    ,
                @endif
            @endforeach
        </p>
    @endif
    @if (!empty($sub_mortgage_loan_options))
        <p><strong>Sub Mortgage loan Options:</strong>
            @foreach ($sub_mortgage_loan_options as $sub_mortgage_loan)
                {{ $sub_mortgage_loan }}@if (!$loop->last)
                    ,
                @endif
            @endforeach
        </p>
    @endif

</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Contact Notification of ID #{{ $contact->id }}</h3>
    <p>Dear Admin,</p>
    <p>Contact Information</p>

    <ul>
        <li><strong>{{ $contact->fullName}}</strong></li>
        <li><strong>{{ $contact->email}}</strong></li>
        <li><strong>{{ $contact->phone}}</strong></li>
        <li><strong>{{ $contact->message}}</strong></li>
    </ul>
</body>
</html>

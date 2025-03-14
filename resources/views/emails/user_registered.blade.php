<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our Platform</title>
</head>
<body>
    <h2>Hello {{ $user->first_name }} {{ $user->last_name }},</h2>
    <p>Thank you for registering with us. We are excited to have you on board.</p>
    <p>Your registered email: <strong>{{ $user->email }}</strong></p>
    <p>If you have any questions, feel free to reach out.</p>
    <br>
    <p>Best Regards,</p>
    <p><strong>Seels</strong></p>
</body>
</html>

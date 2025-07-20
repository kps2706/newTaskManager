<!DOCTYPE html>
<html>
<head>
    <title>New User Approval Request</title>
</head>
<body>
    <p>Dear Admin,</p>

    <p>A new user has registered and is awaiting your approval:</p>

    <ul>
        <li><strong>Name:</strong> {{ $user->name }}</li>
        <li><strong>Email:</strong> {{ $user->email }}</li>
    </ul>

    <p>Please log in to the admin dashboard to review and authorize the user.</p>

    <p>Thank you,<br>System Notification</p>
</body>
</html>

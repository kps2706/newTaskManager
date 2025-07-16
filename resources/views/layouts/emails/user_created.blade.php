<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Account Has Been Created</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        .email-container {
            background-color: #ffffff;
            max-width: 600px;
            margin: 40px auto;
            padding: 30px;
            border: 1px solid #e3e3e3;
            border-radius: 8px;
        }
        h2 {
            color: #2c3e50;
        }
        .info {
            background-color: #ecf0f1;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 15px;
        }
        .info strong {
            display: inline-block;
            width: 130px;
        }
        .footer {
            margin-top: 25px;
            font-size: 13px;
            color: #7f8c8d;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            background-color: #2d89ef;
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 5px;
        }
        .note {
            margin-top: 20px;
            font-size: 14px;
            color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h2>Hello {{ $user->name }},</h2>

        <p>Your account has been created successfully. Below are your login credentials:</p>

        <div class="info">
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Temporary Password:</strong> {{ $tempPassword }}</p>
        </div>

        <p class="note"><strong>Note:</strong> You will be prompted to reset your password upon your first login.</p>

        <a href="{{ url('/login') }}" class="btn">Login Now</a>

        <div class="footer">
            <p>Regards,</p>
            <p><strong>PrabhakarTech Team</strong></p>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Maintenance Mode</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #C6CED1; /* Your background tone */
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            text-align: center;
            background: #ffffff;
            padding: 50px;
            border-radius: 14px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.15);
            max-width: 500px;
            width: 90%;
        }

        .logo {
            width: 180px;
            margin-bottom: 25px;
        }

        h1 {
            color: #1e293b;
            margin-bottom: 15px;
            font-size: 28px;
        }

        p {
            color: #475569;
            font-size: 16px;
            line-height: 1.6;
        }

        .loader {
            margin: 30px auto;
            width: 45px;
            height: 45px;
            border: 4px solid #e2e8f0;
            border-top: 4px solid #0ea5e9; /* Accent color */
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .footer-text {
            margin-top: 25px;
            font-size: 14px;
            color: #64748b;
        }
    </style>
</head>
<body>

<div class="container">

    <!-- Logo -->
    <img src="{{ asset('images/logo.png') }}" alt="Brand Logo" class="logo">

    <h1>We’re Currently Under Maintenance</h1>

    <div class="loader"></div>

    <p>
        Our website is undergoing a scheduled upgrade to improve your experience.
        <br>Please check back after 24 hours.
    </p>

    <div class="footer-text">
        © {{ date('Y') }} All Rights Reserved
    </div>

</div>

</body>
</html>

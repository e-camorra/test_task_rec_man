<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #6B73FF 0%, #000DFF 100%);
            color: #fff;
        }

        .container {
            text-align: center;
            background: rgba(0, 0, 0, 0.5);
            padding: 50px 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            width: 400px;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .message {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 25px;
            font-weight: bold;
            animation: fadeIn 0.8s ease-in-out;
        }

        .success-message {
            background-color: rgba(0, 255, 0, 0.2);
            border: 1px solid #00C851;
            color: #00FF7F;
        }

        .error-message {
            background-color: rgba(255, 0, 0, 0.2);
            border: 1px solid #ff4444;
            color: #ff6b6b;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .buttons a {
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-signup {
            background-color: #00C851;
            color: #fff;
        }

        .btn-signup:hover {
            background-color: #007E33;
        }

        .btn-signin {
            background-color: #33b5e5;
            color: #fff;
        }

        .btn-signin:hover {
            background-color: #0099CC;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Home Page</h1>

    <?php if (isset($register) && $register === true): ?>
        <div class="message success-message">
            ✅ Successfully signed up!
        </div>
    <?php elseif (isset($register) && $register === false): ?>
        <div class="message error-message">
            ❌ Registration failed. Please try again.
        </div>
    <?php endif; ?>

    <div class="buttons">
        <a href="/sign-up" class="btn-signup">Sign Up</a>
        <a href="/sign-in" class="btn-signin">Sign In</a>
    </div>
</div>

<script>
    const msg = document.querySelector('.message');
    if (msg) {
        setTimeout(() => msg.style.display = 'none', 5000);
    }
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
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
            font-size: 2.2rem;
            margin-bottom: 25px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="email"],
        input[type="password"] {
            padding: 12px 15px;
            border-radius: 8px;
            border: none;
            font-size: 1rem;
        }

        button {
            padding: 12px 15px;
            border-radius: 8px;
            border: none;
            background-color: #33b5e5;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0099CC;
        }

        .message {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
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

        .link {
            margin-top: 15px;
            color: #a0cfff;
            text-decoration: none;
            font-size: 0.95rem;
        }

        .link:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
<div class="container">
    <h1>Sign In</h1>
    <?php if (isset($authSuccess) && $authSuccess === false): ?>
        <div class="message error-message">
            ❌ Invalid email or password. Try again.
        </div>
    <?php endif; ?>

    <form action="/auth" method="POST">
        <label>
            <input type="email" name="email" placeholder="Email" required>
        </label>
        <label>
            <input type="password" name="password" placeholder="Password" required>
        </label>
        <button type="submit">Sign In</button>
    </form>

    <a href="/sign-up" class="link">Don't have an account? Sign up</a>
</div>

<script>
    const msg = document.querySelector('.message');
    if (msg) {
        setTimeout(() => msg.style.display = 'none', 5000);
    }
</script>

</body>
</html>

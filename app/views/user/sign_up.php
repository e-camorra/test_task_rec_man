<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
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
            margin-bottom: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 12px 15px;
            border-radius: 8px;
            border: none;
            font-size: 1rem;
            width: 100%;
        }

        .error {
            color: #ff4d4d;
            font-size: 0.9rem;
            margin-top: 5px;
            text-align: left;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            text-align: left;
        }

        button {
            padding: 12px 15px;
            border-radius: 8px;
            border: none;
            background-color: #00C851;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #007E33;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Register</h1>
    <form action="/create-user" method="POST">
        <div class="input-group">
            <label>
                <input type="text" name="first_name" placeholder="First Name" required value="<?= htmlspecialchars($_POST['first_name'] ?? '') ?>">
            </label>
            <?php if (!empty($errors['first_name'])): ?>
                <div class="error"><?= htmlspecialchars($errors['first_name']) ?></div>
            <?php endif; ?>
        </div>

        <div class="input-group">
            <label>
                <input type="text" name="last_name" placeholder="Last Name" required value="<?= htmlspecialchars($_POST['last_name'] ?? '') ?>">
            </label>
            <?php if (!empty($errors['last_name'])): ?>
                <div class="error"><?= htmlspecialchars($errors['last_name']) ?></div>
            <?php endif; ?>
        </div>

        <div class="input-group">
            <label>
                <input type="email" name="email" placeholder="Email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            </label>
            <?php if (!empty($errors['email'])): ?>
                <div class="error"><?= htmlspecialchars($errors['email']) ?></div>
            <?php endif; ?>
        </div>

        <div class="input-group">
            <label>
                <input type="password" name="password" placeholder="Password" required>
            </label>
            <?php if (!empty($errors['password'])): ?>
                <div class="error"><?= htmlspecialchars($errors['password']) ?></div>
            <?php endif; ?>
        </div>

        <button type="submit">Register</button>
    </form>
</div>
</body>
</html>

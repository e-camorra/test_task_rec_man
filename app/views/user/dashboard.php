<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
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
            align-items: flex-start;
            min-height: 100vh;
            background: linear-gradient(135deg, #6B73FF 0%, #000DFF 100%);
            color: #fff;
            padding-top: 80px;
        }

        .container {
            background: rgba(0, 0, 0, 0.5);
            padding: 40px 50px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            width: 800px;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            text-align: center;
        }

        .welcome {
            text-align: center;
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: #d1d1d1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background-color: rgba(255, 255, 255, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: rgba(0, 0, 0, 0.4);
            font-weight: bold;
            text-transform: uppercase;
            border-bottom: 2px solid #00C851;
        }

        tr:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .logout {
            display: inline-block;
            margin-top: 25px;
            padding: 10px 20px;
            background-color: #ff4444;
            color: #fff;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .logout:hover {
            background-color: #cc0000;
        }

    </style>
</head>
<body>
<div class="container">
    <h1>Dashboard</h1>
    <p class="welcome">Welcome, <strong><?= htmlspecialchars($user['first_name']) ?></strong>!</p>

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Project</th>
            <th>Status</th>
            <th>Last Update</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Project 1</td>
            <td>Active</td>
            <td>2020-10-20</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Project 2</td>
            <td>Active</td>
            <td>2021-10-20</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Project 3</td>
            <td>No active</td>
            <td>2022-10-20</td>
        </tr>
        </tbody>
    </table>

    <a href="/logout" class="logout">Logout</a>
</div>
</body>
</html>

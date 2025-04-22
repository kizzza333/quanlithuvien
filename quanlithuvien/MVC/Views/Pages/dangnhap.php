<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Login #2</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }
        .form-container {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: auto;
            width: 500px;
        }
        .form__title {
            margin-bottom: 2rem;
            font-size: 24px;
            font-weight: 400;
            text-align: center;
        }
        .form__input-group {
            margin-bottom: 1.5rem;
        }
        .form__input-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        .form__input-group input {
            width: 450px;
            padding: 0.75rem;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
        .form__forgot {
            display: block;
            text-align: center;
            margin-top: -1rem;
            margin-bottom: 1rem;
            color: #007bff;
            text-decoration: none;
        }
        .form__button {
            width: 20%;
            padding: 0.75rem;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
           
        }
        .form__button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h3 class="form__title">Đăng Nhập</h3>
        <form action="http://localhost/quanlithuvien/dangnhap_ctrl/dangnhap" method="post">
            <div class="form__input-group">
                <label for="username">Username</label>
                <input type="text" name="txtUsername" id="username" value="<?php if(isset($data['username'])) echo $data['username'] ?>">
            </div>
            <div class="form__input-group">
                <label for="password">Password</label>
                <input type="password" name="txtPassword" id="password" value="<?php if(isset($data['password'])) echo $data['password'] ?>">
            </div>
            <a href="#" class="form__forgot">Forgot Password?</a>
            <button type="submit" class="form__button" name="btndn">Login</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>

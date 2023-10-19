<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100svh;
        }
        .login-container {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 20rem;
            padding: 1.5rem;
            text-align: center;
        }
        .login-container h2 {
            margin-top: 0;
            color:rgba(0, 0, 0, 0.7);
        }
        .input-field {
            width: 90%;
            padding: 0.7rem;
            border: 1px solid #ccc;
            border-radius: 20px;
            margin-bottom: 1rem;
        }
        input:focus{
            outline: none;
        }
        .login-button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form id="login-form" method="post" action="validation.php">
            <input type="text" name="username"class="input-field" id="username" placeholder="Username" required>
            <input type="password" class="input-field" id="password" placeholder="Password" name="password"required>
            <?php
                if(isset($_GET['message']) && $_GET['message'] == 'Invalid Credentials'){
                    echo "<p style='color:red'>Invalid username or password</p>";
                }
                elseif(isset($_GET['message']) && $_GET['message'] == 'connection failed'){
                    echo "<p style='color:red'>connection failed/p>";
                }
                ?>
            <button type="submit" class="login-button" >Login</button>
        </form>
    </div>
</body>
</html>

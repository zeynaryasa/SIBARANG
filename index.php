<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .login-container {
            width: 300px;
            padding: 16px;
            background-color: #ffffff;
            margin: 0 auto;
            margin-top: 100px;
            border-radius: 4px;
            box-shadow: 0px 0px 10px 0px #000;
        }

        .login-container h1 {
            text-align: center;
            color: #5b6574;
        }

        .login-container form {
            width: 100%;
            height: auto;
            padding-top: 20px;
        }

        .login-container form input {
            width: 100%;
            height: 40px;
            margin-bottom: 20px;
            padding-left: 40px;
            box-sizing: border-box;
            border-radius: 20px;
            border: 1px solid #ccc;
        }

        .login-container form button {
            width: 100%;
            height: 40px;
            background-color: #003285;
            border: 0;
            border-radius: 20px;
            color: white;
            font-weight: bold;
            transition: background-color 1s;
            cursor: pointer;
        }

        .login-container form button:hover {
            background-color: #FF5F00;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h1>Login</h1>
        <form class="space-y-6" action="conf_login.php" method="POST">
            <div>
                <label for="id" class="block text-sm font-medium leading-6 text-black">ID</label>
                <div class="mt-2">
                    <input id="id" name="id" type="text" autocomplete="id" required class="block w-full bg-yellow-700 rounded-md border-0 py-1.5 text-white px-2 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-yellow-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-black">Password</label>
                </div>
                <div class="mt-2">
                    <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-white shadow-sm ring-1 bg-yellow-700 px-2 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-yellow-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <button type="submit" name="btn_login" class="flex w-full justify-center border-2 mb-2 border-white rounded-md bg-gradient-to-r from-black via-yellow-700 to-yellow-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600">Sign in</button>
            </div>
        </form>
    </div>
</body>
<footer style="text-align: center; padding: 10px; background-color: #f2f2f2; margin-top:10%;">
    © <?php echo date("Y"); ?> I Kadek Naryasa. All rights reserved.
</footer>


</html>
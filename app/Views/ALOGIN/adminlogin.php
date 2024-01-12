<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BFP Admin Login Form</title>
    <style>
        body {
            background-image: url("@/assets/bg.jpg");
            background-size: cover;
            background-position: center;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Arial', sans-serif;
        }

        .login-card {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            text-align: center;
            position: relative;
            background: linear-gradient(to bottom, #ffffff, #f0f0f0);
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .logo-container {
            margin-bottom: 20px;
        }

        .logo {
            width: 100%;
            max-width: 100px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .bfp-title {
            color: #d9534f;
            font-size: 1.8em;
            margin-top: 10px;
        }

        .v-text-field {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            border: 1px solid #d9534f;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .bfp-btn {
            background-color: #d9534f;
            color: #fff;
            margin-top: 20px;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .bfp-btn:hover {
            background-color: #c9302c;
        }

        .bfp-link {
            color: #d9534f;
            cursor: pointer;
            margin-top: 15px;
            display: inline-block;
            text-decoration: underline;
            font-size: 1em;
        }

        .q-mt-md {
            margin-top: 20px;
        }

        .create-account-btn {
            text-decoration: none;
            display: block;
            width: 100%;
            background-color: #d9534f;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 5px;
            text-align: center;
            margin-top: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .create-account-btn:hover {
            background-color: #c9302c;
        }

        .show-password {
            display: flex;
            align-items: center;
            margin-top: 15px;
        }

        .show-password input {
            margin-right: 5px;
        }

        .alert {
            background-color: #dff0d8;
            border-color: #d6e9c6;
            color: #3c763d;
            padding: 15px;
            border-radius: 5px;
            margin-top: 15px;
        }

        .alert-danger {
            background-color: #f2dede;
            border-color: #ebccd1;
            color: #a94442;
        }
    </style>
</head>

<body>

    <div class="login-card">
        <?php if (session()->has('logout_success')) : ?>
            <div class="alert alert-success mt-3" role="alert">
                <?= session('logout_success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->has('success')) : ?>
            <div class="alert alert-success mt-3" role="alert">
                <?= session('success') ?>
            </div>
        <?php endif; ?>

        <?php if (isset($validation) && $validation->getErrors()) : ?>
            <div class="alert alert-danger mt-3" role="alert">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <div class="logo-container">
            <img class="logo" src="<?= base_url('C:\laragon\www\BFP_WEBSITE\public\images\bfp-banner.jpg') ?>"
                alt="Logo">
        </div>

        <h2 class="bfp-title">Bureau of Fire Protection (Admin)</h2>
        
        <form action="<?= site_url('admin-login/processLogin') ?>" method="post">
            <label for="username">Email:</label>
            <input type="text" name="email_address" class="v-text-field" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" class="v-text-field" required>
            <div class="show-password">
                <input type="checkbox" id="showPassword"> Show Password
            </div>
            <br>
            <button type="submit" class="bfp-btn">Login</button>
        </form>
        <p class="bfp-link" onclick="goToForgotPassword()">Forgot Password?</p>
        
        <a href="<?= site_url('/admin-registration') ?>" class="create-account-btn">Create an Admin Account</a>
    </div>

    <script>
        document.getElementById('showPassword').addEventListener('change', function () {
            var passwordInput = document.querySelector('input[name="password"]');
            passwordInput.type = this.checked ? 'text' : 'password';
        });

        function goToForgotPassword() {
            console.log('Redirect to forgot password page');
        }
    </script>

</body>

</html>

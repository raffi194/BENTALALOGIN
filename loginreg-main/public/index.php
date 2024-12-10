<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleguide.css">
    <link rel="stylesheet" href="css/output.css">   
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>
<body class="flex items-center justify-center h-screen bg-gray-200">
    <!-- Background Image -->
    <div class="absolute inset-0 bg-cover bg-center blur-sm" style="background-image: url('img/Backgron.png'); z-index: -1;"></div>

    <!-- Login Form -->
    <div class="bg-white rounded-3xl shadow-lg p-8 w-full max-w-sm">
        <?php 
        include("php/config.php");
        if (isset($_POST['submit'])) {
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, $_POST['password']);

            $result = mysqli_query($con, "SELECT * FROM users WHERE Email='$email' AND Password='$password'") or die("Select Error");
            $row = mysqli_fetch_assoc($result);

            if (is_array($row) && !empty($row)) {
                $_SESSION['valid'] = $row['Email'];
                $_SESSION['username'] = $row['Username'];
                $_SESSION['age'] = $row['Age'];
                $_SESSION['id'] = $row['Id'];
                header("Location: home.php");
                exit;
            } else {
                echo "<div class='text-red-500 text-center mb-4'>Wrong Username or Password</div>";
                echo "<a href='index.php' class='block text-center'><button class='bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600'>Go Back</button></a>";
                exit;
            }
        } else {
        ?>
        <header class="text-2xl font-bold text-center mb-6" style="color: var(--ijo);">Sign In</header>
        <form action="" method="post">
            <div class="mb-4">
                <input type="text" name="email" id="email" placeholder="Email" autocomplete="on" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-400 focus:outline-none">
            </div>

            <div class="mb-4">
                <input type="password" name="password" id="password" placeholder="Password" autocomplete="off" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-400 focus:outline-none">
            </div>

            <div class="mb-6">
                <input type="submit" class="w-full bg-teal-500 font-medium text-white py-2 rounded-lg hover:bg-teal-700 cursor-pointer" name="submit" value="Login">
            </div>

            <div class="text-center">
                <a href="register.php" class="text-xs font-medium text-teal-600 hover:underline hover:font-bold">New to Bentala?</a>
            </div>
        </form>
        <?php } ?>
    </div>
</body>
</html>

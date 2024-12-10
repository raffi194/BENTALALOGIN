<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleguide.css">
    <link rel="stylesheet" href="css/output.css">  
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Register</title>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <!-- Background Image -->
    <div class="absolute inset-0 bg-cover bg-center blur-sm" style="background-image: url('img/Backgron.png'); z-index: -1;"></div>

    <!-- Registration Form Container -->
    <div class="bg-white shadow-lg rounded-3xl w-96 max-w-md p-8">

        <!-- Header -->
        <header class="text-2xl font-bold text-center mb-6" style="color: var(--ijo)">
            Create an Account
        </header>

        <?php 
        include("php/config.php");
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];

            // Verifying the unique email
            $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");

            if (mysqli_num_rows($verify_query) != 0) {
                echo "<div class='text-red-500 text-center mb-4'>
                          <p>This email is already in use. Try another one!</p>
                      </div>";
            } else {
                mysqli_query($con, "INSERT INTO users(Username, Email, Age, Password) VALUES('$username', '$email', '$age', '$password')")
                or die("Error Occurred");

                header("Location: verif.php");

                exit;
            }
        } else {
        ?>

        <!-- Registration Form -->
        <form action="" method="post">
            <!-- Username Field -->
            <div class="mb-4">
                <input type="text" name="username" id="username" 
                       placeholder="Username" 
                       required 
                       class="w-80 mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-400 focus:outline-none">
            </div>

            <!-- Email Field -->
            <div class="mb-4">
                <input type="email" name="email" id="email" 
                       placeholder="Email" 
                       autocomplete="on" 
                       required 
                       class="w-80 mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-400 focus:outline-none">
            </div>

            <!-- Phone Number Field -->
            <div class="mb-4">
                <input type="number" name="age" id="age" 
                       placeholder="Age" 
                       required 
                       class="w-80 mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-400 focus:outline-none">
            </div>

            <!-- Password Field -->
            <div class="mb-4">
                <input type="password" name="password" id="password" 
                       placeholder="Password" 
                       required 
                       class="w-80 mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-400 focus:outline-none">
            </div>

            <!-- Register Button -->
            <div class="mb-6">
                <button type="submit" name="submit" 
                        class="w-80 bg-teal-500 text-white font-medium py-2 rounded-md hover:bg-teal-600 focus:ring-2 focus:ring-teal-400">
                    Register
                </button>
            </div>

            <!-- Links -->
            <div class="text-center text-sm text-gray-600">
                Already a member? 
                <a href="index.php" class="text-teal-600 font-medium hover:underline hover:font-bold">Sign In</a>
            </div>

            <!-- Footer -->
            <div class="text-center text-xs text-gray-500 mt-6">
                By continuing, you agree to the 
                <a href="#" class="text-teal-600 hover:underline hover:font-bold">Terms of Service</a> 
                and acknowledge the 
                <a href="#" class="text-teal-600 hover:underline hover:font-bold">Privacy Policy</a>.
            </div>
        </form>
    </div>
    <?php } ?>
</body>
</html>

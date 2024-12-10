<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Home</title>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Navbar -->
    <div class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
        <!-- Logo -->
        <div>
            <a href="home.htm" class="text-xl font-bold text-teal-500 hover:text-teal-600">Logo</a>
        </div>

        <!-- Profile Link -->
        <div>
            <?php 
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT * FROM users WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_id = $result['Id'];
            }
            echo "<a href='edit.php?Id=$res_id' class='text-sm font-medium text-teal-500 hover:underline'>Change Profile</a>";
            ?>
        </div>
    </div>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center px-4">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg text-center">
            <p class="text-xl font-semibold text-gray-800 mb-4">
                Hello <span class="text-teal-500"><?php echo $res_Uname; ?></span>, Welcome!
            </p>
            <p class="text-sm text-gray-600 mb-2">
                Your email is <span class="font-medium text-gray-800"><?php echo $res_Email; ?></span>.
            </p>
            <p class="text-sm text-gray-600">
                And you're <span class="font-medium text-gray-800"><?php echo $res_Age; ?></span> years old.
            </p>
        </div>
    </main>

</body>
</html>

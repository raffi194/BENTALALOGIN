<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styleguide.css">
  <link rel="stylesheet" href="css/output.css">  
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Registration Success!</title>
</head>
<body class="flex items-center justify-center h-screen bg-gray-200">

    <!-- bg -->
    <div class="absolute inset-0 bg-cover bg-center blur-sm" style="background-image: url('img/Backgron.png'); z-index: -1;"></div>

    <!-- form box -->
    <div class="bg-white shadow-lg rounded-3xl w-96 max-w-md p-8">

    <!-- judul -->
    <h1 class="text-2xl text-center font-bold mb-2"  style="color: var(--ijo)">Success!</h1>
    <p class="text-sm text-center text-gray-500 mb-6">Congratulations! Your account has been successfully created.</p>


    <!-- button confirm -->
    <button onclick="window.location.href='index.php'"
    class="w-80 bg-teal-500 text-white font-semibold py-2 rounded-md hover:bg-teal-600 focus:ring-2 focus:ring-teal-400">Continue</button>
  </div>

</body>
</html>
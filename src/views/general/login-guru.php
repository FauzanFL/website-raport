<?php
session_start();

require('../../includes/function.php');

$wrong = false;

if (isset($_POST["login"])) {
    $username = escape($_POST["username"]);
    $password = escape($_POST["password"]);

    $result = checkUsername($WAKEL, $username);
    if (mysqli_affected_rows($koneksi) > 0) {
        $row = mysqli_fetch_array($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            $_SESSION["role"] = $ROLE_WAKEL;
            $_SESSION["name"] = $row["nama"];
            redirect("dashboard.php");
            exit;
        }
    }

    $wrong = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Guru</title>
    <link rel="stylesheet" href="../../styles/login.css">
    <link rel="shortcut icon" href="../../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main>
        <h1 class="text-3xl font-bold mx-2 dark:text-white">Login Guru</h1>
        <form method="POST">
            <?php if ($wrong) : ?>
                <div class="flex p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-md dark:bg-red-200 dark:text-red-800" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Username atau password salah!</span>
                    </div>
                </div>
            <?php endif; ?>
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" name="username" id="username" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
                <label for="username" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="password" name="password" id="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
                <label for="password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
            </div>
            <div class="text-right">
                <button type="submit" name="login" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Masuk</button>
            </div>
        </form>
    </main>
</body>

</html>
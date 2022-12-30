<?php
session_start();

require('../../includes/function.php');

$name = $_SESSION["name"];
$role = $_SESSION["role"];

if (!$_SESSION["login"] || $role == $ROLE_SISWA) {
    redirect("../../../index.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="../../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="grid grid-cols-5">
        <aside class="w-64">
            <div class="fixed flex flex-col items-center top-0 bottom-0 w-1/5 bg-gray-600 border-r border-gray-400">
                <img src="../../assets/logo.png" alt="">
                <ol class="text-white text-xl font-medium max-w-48 w-20 md:w-32 lg:w-48 mt-8">
                    <li class="my-2 py-1 px-2 bg-white text-black rounded-md duration-500">
                        <a href="dashboard.php">Home</a>
                    </li>
                    <?php if ($role == $ROLE_ADMIN) : ?>
                        <li class="my-2 py-1 px-2 hover:bg-white hover:text-black rounded-md duration-500"><a href="../siswa/siswa.php">Siswa</a>
                        </li>
                        <li class="my-2 py-1 px-2 hover:bg-white hover:text-black rounded-md duration-500"><a href="../walikelas/wali-kelas.php">Wali
                                Kelas</a></li>
                        <li class="my-2 py-1 px-2 rounded-md duration-500"><button disabled>Nilai</button>
                        </li>
                    <?php elseif ($role == $ROLE_WAKEL) : ?>
                        <li class="my-2 py-1 px-2 rounded-md duration-500"><button disabled>Siswa</button>
                        </li>
                        <li class="my-2 py-1 px-2 rounded-md duration-500"><button disabled>Wali
                                Kelas</button></li>
                        <li class="my-2 py-1 px-2 hover:bg-white hover:text-black rounded-md duration-500"><a href="../nilai/nilai.php">Nilai</a>
                        </li>
                    <?php endif; ?>
                </ol>
            </div>
        </aside>
        <main class="col-span-4">
            <header class="sticky flex justify-between top-3 m-3 p-2 z-10 bg-white border border-gray-100 rounded-md shadow">
                <h1 class="text-2xl font-bold"><?= $name; ?></h1>
                <a href="../general/logout.php" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-1.5 mx-1 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    Logout
                </a>
            </header>

            <div class="flex justify-center mt-10">
                <div class="grid grid-cols-3 gap-5 m-3 w-4/5 max-h-32">
                    <?php if ($role == $ROLE_ADMIN) : ?>
                        <a href="../siswa/siswa.php" class="grid grid-cols-3 gap-5 place-items-center p-5 rounded-md bg-sky-600 hover:bg-sky-700 shadow-lg">
                            <img class="w-28" src="../../assets/group.png" alt="">
                            <h3 class="text-3xl px-5 font-bold">Siswa</h3>
                        </a>
                        <a href="../walikelas/wali-kelas.php" class="grid grid-cols-3 gap-5 place-items-center p-5 rounded-md bg-yellow-400 hover:bg-yellow-500 shadow-lg">
                            <img class="w-28" src="../../assets/instructor.png" alt="">
                            <h3 class="text-3xl px-5 font-bold">Wali Kelas</h3>
                        </a>
                        <button class="grid grid-cols-3 gap-5 place-items-center p-5 cursor-not-allowed rounded-md bg-red-400 shadow-lg" disabled>
                            <img class="w-28" src="../../assets/exam.png" alt="">
                            <h3 class="text-3xl px-5 font-bold">Nilai</h3>
                        </button>
                    <?php elseif ($role == $ROLE_WAKEL) : ?>
                        <button class="grid grid-cols-3 gap-5 place-items-center p-5 cursor-not-allowed rounded-md bg-sky-600 shadow-lg" disabled>
                            <img class="w-28" src="../../assets/group.png" alt="">
                            <h3 class="text-3xl px-5 font-bold">Siswa</h3>
                        </button>
                        <button class="grid grid-cols-3 gap-5 place-items-center p-5 cursor-not-allowed rounded-md bg-yellow-400 shadow-lg" disabled>
                            <img class="w-28" src="../../assets/instructor.png" alt="">
                            <h3 class="text-3xl px-5 font-bold">Wali Kelas</h3>
                        </button>
                        <a href="../nilai/nilai.php" class="grid grid-cols-3 gap-5 place-items-center p-5 rounded-md bg-red-500 hover:bg-red-600 shadow-lg">
                            <img class="w-28" src="../../assets/exam.png" alt="">
                            <h3 class="text-3xl px-5 font-bold">Nilai</h3>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wali Kelas</title>
    <link rel="shortcut icon" href="../../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
</head>

<body>
    <div class="grid grid-cols-5">
        <aside class="w-64">
            <div class="fixed flex flex-col items-center top-0 bottom-0 w-1/5 bg-gray-600 border-r border-gray-400">
                <img src="../../assets/logo.png" alt="">
                <ol class="text-white text-xl font-medium max-w-48 w-20 md:w-32 lg:w-48 mt-8">
                    <li class="my-2 py-1 px-2 hover:bg-white hover:text-black rounded-md duration-500">
                        <a href="../general/dashboard.php">Home</a>
                    </li>
                    <li class="my-2 py-1 px-2 hover:bg-white hover:text-black rounded-md duration-500"><a href="../siswa/siswa.php">Siswa</a>
                    </li>
                    <li class="my-2 py-1 px-2 bg-white text-black rounded-md duration-500"><a href="wali-kelas.php">Wali
                            Kelas</a></li>
                    <li class="my-2 py-1 px-2 hover:bg-white hover:text-black  rounded-md duration-500"><a href="../nilai/nilai.php">Nilai</a>
                    </li>
                </ol>
            </div>
        </aside>
        <main class="col-span-4">
            <header class="sticky flex justify-between top-3 m-3 p-2 z-10 bg-white border border-gray-100 rounded-md shadow">
                <h1 class="text-2xl font-bold">Ucup Gaming</h1>
                <a href="" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-1.5 mx-1 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    Logout
                </a>
            </header>

            <div class="overflow-x-auto m-3 mt-5 p-5 relative shadow-md sm:rounded-lg">
                <div class="flex justify-between items-center pb-4 bg-white dark:bg-gray-900">

                    <label for="table-search" class="sr-only">Cari</label>
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="table-search-users" class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari">
                    </div>
                </div>
                <div class="flex justify-end">
                    <a href="tambah-walikelas.php" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-3 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Tambah</a>
                </div>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                NIP
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Nama
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Kelas
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Username
                            </th>
                            <th scope="col" class="py-3 px-6">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Adit
                            </th>
                            <td class="py-4 px-6">
                                90
                            </td>
                            <td class="py-4 px-6">
                                Bahasa
                            </td>
                            <td class="py-4 px-6">
                                1
                            </td>
                            <td class="py-4 px-6 text-center">
                                <a href="edit-walikelas.php" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>

</html>
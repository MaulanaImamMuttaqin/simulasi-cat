<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.3.4/dist/flowbite.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= base_url('css/app.css')?>">
    <title>Login</title>
</head>
<body>
    <div class="h-screen w-screen flex flex-col items-center justify-center bg-gradient-to-tl  from-gray-300 to-gray-200">
        <div class="text-3xl mb-10   text-center font-extrabold text-transparent bg-clip-text bg-gradient-to-br from-gray-800 to-gray-500">
            <h1 class="text-2xl">SIMULASI CAT </h1>
            <h1 class="text-6xl tracking-widest">CPNS</h1>
        </div>

        <div class=" w-[400px] mobile:w-[320px] border border-gray-200 shadow-lg rounded-lg py-10 p-5 flex flex-col items-center justify-center gap-5 bg-gray-800">
            <div class="text-3xl text-gray-400">
                <h1>Masuk Tes</h1>
            </div>
            
            <form class="w-full" method="POST" action="<?= base_url('test/login')?>">
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" name="user_id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="user_id" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">User ID</label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" name="token" id="token" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="token" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tes Token</label>
                </div>
                
                <div class="center mt-10">
                    <button type="submit" class="text-white bg-gray-700 hover:bg-gray-600 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-xl w-full sm:w-auto px-10 py-2.5 text-center ">Masuk</button>
                </div>
                <div class="mt-5 px-4 py-2 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
                    <small>Masukkan <b>ID User</b>  dan <b>Token</b>  yang didapat dari operator untuk masuk ke dalam Tes</small>
                </div>
            </form>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
</body> 
</html>
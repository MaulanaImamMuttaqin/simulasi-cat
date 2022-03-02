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
    <div class="h-screen w-screen flex flex-col items-center justify-center ">
        

        <div class="w-[400px] h-[500px] border border-gray-200 shadow-lg rounded-lg p-10 flex flex-col items-center justify-between gap-5 bg-gradient-to-tr from-gray-800 to-gray-600">
            
            <div class="text-center font-thin  text-white ">
                <div class="">
                    <h1 class="text-xl">SIMULASI CAT </h1>
                    <h1 class="text-5xl tracking-widest">CPNS</h1>
                </div>
                <div class="text-3xl tracking-widest">
                    <h1>LOG IN</h1>
                </div>
            </div>
            
            <form class="w-full flex flex-col items-center" method="post" action="<?= base_url('operator/authenticate')?>">
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" name="username" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-400 appearance-none dark:text-white dark:border- dark:focus:border-white focus:outline-none focus:ring-0 focus:border-white peer" placeholder=" " required />
                    <label for="user_id" class="absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-white peer-focus:dark:text-white- peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="password" name="password" id="token" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-400 appearance-none dark:text-white dark:border- dark:focus:border-white focus:outline-none focus:ring-0 focus:border-white peer" placeholder=" " required />
                    <label for="token" class="absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-white peer-focus:dark:text-white- peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                </div>
                
                <div class="center">
                    <button type="submit" class="text-gray-500 text-center bg-white transition duration-300 hover:bg-gray-300 focus:ring-4 focus:ring-gray-200  rounded-full w-full sm:w-auto px-5 py-2.5 ">MASUK</button>
                </div>
            </form>
            <div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
</body> 
</html>
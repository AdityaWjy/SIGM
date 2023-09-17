<!-- logic register -->

<?php

require_once("./UserConfig.php");

if (isset($_POST['register'])) {

  // filter data
  $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
  // enkripsi password 
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

  // sql query

  $sql = "INSERT INTO tbl_user (nama, username, password)
          VALUES (:nama, :username, :password)";
  $stmt = $db->prepare($sql);

  // bind paramater ke query
  $params = array(
    ":nama" => $nama,
    ":username" => $username,
    ":password" => $password,
  );

  // eksekusi query untuk menyimpan di database
  $saved = $stmt->execute($params);
  
  // jika query simpan berhasil, maka user sudah terdaftar
  // maka alihkan ke halaman login
  if($saved) header("Location: ./user_login.php");

}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/dist/output.css" rel="stylesheet" />
    <link rel="icon" href="/public/assets/favicon.svg" />
    <title>Register Pengguna Baru</title>
  </head>

  <body>
    <!-- main grid start -->
    <main class="box-border antialiased text-black overflow-x-hidden md:mt-20">
      <div class="min-h-screen">
        <div class="h-full w-full grid grid-cols-12 relative">
          <!-- img -->
          <section class="col-span-12 md:col-span-6 md:h-full md:order-2">
            <div class="flex md:justify-center items-center justify-center">
              <lottie-player
                src="https://lottie.host/c7e5daca-4b4c-4bb1-9489-66fdd264fe87/bU9hhwvmOm.json"
                background="transparent"
                speed="1"
                s
                class="w-[200px] h-[200px] md:w-[450px] md:h-[450px] mt-14"
                loop
                autoplay
              ></lottie-player>
            </div>
          </section>

          <!-- form -->
          <section class="col-span-12 md:col-span-6 md:h-full md:w-full">
            <div
              class="w-full h-full flex flex-col justify-center items-center relative z-10 ppy-16 md:py-0"
            >
              <div class="mt-4 w-full max-w-sm px-4 sm:px-0">
                <form action="" method="POST">
                  <div class="mb-5">
                    <label
                      for="nama"
                      class="block w-full font-bold text-sm mb-[6px]"
                      >Nama</label
                    >
                    <div class="relative">
                      <input
                        type="text"
                        name="nama"
                        id="nama"
                        placeholder="Masukkan nama anda"
                        required
                        class="block w-full border rounded-lg px-[14px] py-[10px] shadow-sm outline-none focus:ring focus:ring-opacity-75 transition-all duration-200 disabled:cursor-not-allowed focus:ring-brand"
                      />
                    </div>
                  </div>
                  <div class="mb-5">
                    <label
                      for="username"
                      class="block w-full font-bold text-sm mb-[6px]"
                      >Username</label
                    >
                    <div class="relative">
                      <input
                        type="text"
                        name="username"
                        id="username"
                        placeholder="Masukkan username anda"
                        required
                        class="block w-full border rounded-lg px-[14px] py-[10px] shadow-sm outline-none focus:ring focus:ring-opacity-75 transition-all duration-200 disabled:cursor-not-allowed focus:ring-brand"
                      />
                    </div>
                  </div>

                  <div class="mb-5">
                    <label
                      for="password"
                      class="block w-full font-bold text-sm mb-[6px]"
                      >Password</label
                    >
                    <div class="relative">
                      <input
                        type="password"
                        name="password"
                        id="password"
                        required
                        class="block w-full border rounded-lg px-[14px] py-[10px] shadow-sm outline-none focus:ring focus:ring-opacity-75 transition-all duration-200 disabled:cursor-not-allowed focus:ring-brand"
                      />
                      <div
                        class="absolute top-1/2 right-5 transform -translate-y-1/2"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink"
                          aria-hidden="true"
                          role="img"
                          class="icon w-5 h-5 text-gray-500 cursor-pointer"
                          width="1em"
                          height="1em"
                          viewBox="0 0 24 24"
                          data-v-c3ad5561=""
                        >
                          <g
                            fill="none"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.5"
                          >
                            <path
                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178c.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"
                            ></path>
                            <path
                              d="M15 12a3 3 0 1 1-6 0a3 3 0 0 1 6 0Z"
                            ></path>
                          </g>
                        </svg>
                      </div>
                    </div>
                  </div>
                  <input type="submit" name="register" value="Daftar" class="flex items-center justify-center rounded-lg bg-primary border-primary text-white capitalize font-bold text-center hover:bg-slate-700 hover:border-slate-700 transition-all duration-300 disabled:cursor-not-allowed relative p-3 text-sm w-full">
                </form>
                <div class="container mx-auto mt-4">
                  <div
                    class="text-primary flex flex-col items-center text-center justify-center"
                  >
                    <p class="leading-5">
                      Sudah mempunyai akun?
                      <a
                        href="./user_login.php"
                        class="font-bold hover:text-slate-700 transition-colors duration-700"
                        >Masuk</a
                      >
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </main>
    <!-- main grid end -->

    <!-- CDN library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
  </body>

  <style>
    @import url("https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap");

    * {
      font-family: "Lato", sans-serif;
    }
  </style>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./tailwind.css" rel="stylesheet" />

    <!-- <title>Login</title> -->
  </head>
  <body class="bg-gray-100">
    <div
      class="
        flex flex-col
        w-full
        h-screen
        px-5
        py-20
        xs:py-36
        lg:p-20
        items-center
        justify-center
      "
    >
      <!-- card -->
      <div
        class="
          w-full
          h-full
          flex flex-row
          rounded-2xl
          overflow-hidden
          shadow-2xl
        "
      >
        <!-- picture  -->
        <div class="hidden md:flex md:w-1/2 bg-green-300"></div>
        <!-- login section  -->
        <div
          class="
            flex flex-col
            w-full
            items-center
            md:w-1/2
            py-5
            px-5
            md:px-20
            bg-white
          "
        >
          <div class="w-full h-full flex flex-col py-10 justify-between">
            <form action="" method="post">
              <h1 class="font-semibold text-gray-800 text-6xl mb-5 font-sans">
                Login
              </h1>
              <label class="my-5 font-sans font-semibold text-sm" for="email"
                >Email</label
              >
              <div
                class="
                  w-full
                  overflow-hidden
                  rounded-lg
                  border border-gray-600
                  px-2
                  py-1
                  mb-5
                  mt-2
                "
              >
                <input
                  id="email"
                  class="w-full focus:outline-none"
                  type="text"
                  placeholder="Masukkan Email"
                  name="email"
                />
              </div>
              <label class="my-5 font-sans font-semibold text-sm" for="password"
                >Password</label
              >
              <div
                class="
                  w-full
                  overflow-hidden
                  rounded-lg
                  border border-gray-600
                  px-2
                  py-1
                  mb-5
                  mt-2
                "
              >
                <input
                  id="password"
                  class="w-full focus:outline-none"
                  type="password"
                  placeholder="Masukkan Password"
                  name="email"
                />
              </div>
              <!-- button, forgot password section  -->
              <div class="flex flex-row items-center justify-between">
                <button
                  class="
                    px-5
                    py-2
                    rounded-lg
                    transition
                    duration-300
                    ease-in-out
                    bg-green-400
                    hover:bg-green-300
                    font-sans font-semibold
                    text-white
                  "
                >
                  Login
                </button>
                <span
                  class="
                    font-sans
                    text-sm text-gray-800
                    font-semibold
                    cursor-pointer
                    hover:underline
                    transition
                    duration-300
                    ease-in-out
                  "
                  >Lupa password?</span
                >
              </div>
            </form>
            <div class="flex flex-row w-full justify-center">
              <a href="<?= base_url('/register')?>">
                <span
                  class="
                    font-sans
                    text-sm text-gray-800
                    font-semibold
                    cursor-pointer
                  "
                  >Belum punya akun? Daftar
                  <span
                    class="
                      font-sans
                      text-sm text-blue-400
                      font-semibold
                      cursor-pointer
                      hover:underline
                      transition
                      duration-300
                      ease-in-out
                    "
                  >
                    disini
                  </span></span
                >
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script>
    document.title = 'Masuk ke website'
    // console.log(document.title)
  </script>
</html>

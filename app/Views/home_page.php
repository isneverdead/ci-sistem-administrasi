<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Administrasi</title>
    <link rel="stylesheet" href="./tailwind.css" />
  </head>
  <body>
    <div class="w-full h-screen flex flex-col px-4 pt-4 bg-gray-100">
      <div class="w-full flex flex-row px-5 bg-green-200 rounded-lg py-2 justify-between shadow-lg items-center">
        <h1 class="font-sans font-bold text-xl text-gray-800">Logo</h1>
        <div class="flex flex-row items-center">
          <a href="<?= base_url('/berita')?>">
            <button
              class="
                px-4
                py-2
                rounded-lg
                bg-white
                shadow-lg
                font-semibold
                text-md text-gray-800
                font-sans
                mr-2
                hover:shadow-none hover:bg-gray-100
                transition
                duration-300
              "
            >
              Berita
            </button>
          </a>
          <a href="<?= base_url('/auth/register')?>">
            <button
              class="
                px-4
                py-2
                lg:ml-8
                hidden
                <?=
                (isset($user_info['user_id']))
                ?
                'hidden'
                :
                'lg:flex'?>
                rounded-lg
                bg-yellow-200
                shadow-lg
                font-semibold
                text-md text-gray-800
                hover:shadow-none
                font-sans
                mr-3
              "
            >
              Daftar
            </button>
          </a>
          <a href="<?= base_url('/auth/login')?>">
            <button
              class="
                <?=
                (isset($user_info['user_id']))
                ?
                'hidden'
                :
                ''?>
                px-4
                py-2
                rounded-lg
                bg-white
                shadow-lg
                font-semibold
                text-md text-gray-800
                hover:shadow-none hover:bg-gray-100
                transition
                duration-300
                font-sans
              "
            >
              Masuk
            </button>
          </a>
          <a href="<?= base_url('/dashboard')?>">
            <button
              class="
                <?=
                (isset($user_info['user_id']))
                ?
                ''
                :
                'hidden'?>
                px-4
                py-2
                rounded-lg
                bg-white
                shadow-lg
                font-semibold
                text-md text-gray-800
                hover:shadow-none hover:bg-gray-100
                transition
                duration-300
                font-sans
              "
            >
              Dashboard
            </button>
          </a>
        </div>
      </div>
      <!-- end nav -->
      <div
        class="w-full h-full my-5 px-4 rounded-lg shadow-xl bg-white md:px-20 flex flex-col justify-center items-center"
      >
        <div class="w-full flex flex-col px-5 py-3">
          <h1 class="md:w-8/12 font-bold font-sans text-4xl lg:text-6xl text-gray-800">
            Sistem Informasi data mahasiswa Papua
          </h1>
          <h3 class="font-bold font-sans text-xl md:text-2xl mt-4 text-gray-800">kabupaten Lanni jaya berbasis web</h3>
        </div>
      </div>
    </div>
  </body>
</html>

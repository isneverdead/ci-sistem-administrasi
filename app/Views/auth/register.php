<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="<?= base_url('/tailwind.css') ?>" rel="stylesheet" />

  <!-- <title>Login</title> -->
</head>

<body class="bg-gray-100">
  <div class="
        flex flex-col
        w-full
        h-screen
        px-5
        py-16
        xs:py-32
        lg:p-20
        items-center
        justify-center
      ">
    <!-- card -->
    <div class="
          w-full
          h-full
          flex flex-row
          rounded-2xl
          overflow-hidden
          shadow-2xl
        ">
      <!-- picture  -->
      <div class="hidden md:flex md:w-1/2 bg-green-300"></div>
      <!-- login section  -->
      <div class="
            flex flex-col
            w-full
            items-center
            md:w-1/2
            py-2
            xs:py-5
            px-5
            md:px-20
            bg-white
          ">
        <div class="w-full h-full flex flex-col py-5 justify-between">
          <form action="<?= base_url('/auth/add') ?>" method="post">
            <?= csrf_field(); ?>
            <h1 class="font-semibold text-gray-800 text-6xl mb-5 font-sans">
              Register
            </h1>
            <?php if (!empty(session()->getFlashData('fail'))) : ?>
              <div class="w-full flex border-2 border-red-200 py-2 px-5 justify-center rounded-lg">
                <h5 class="font-sans font-semibold text-red-500 text-lg"><?= session()->getFlashData('fail') ?></h5>
              </div>
            <?php endif ?>
            <?php if (!empty(session()->getFlashData('success'))) : ?>
              <div class="w-full flex border-2 border-green-200 py-2 px-5 justify-center rounded-lg">
                <h5 class="font-sans font-semibold text-green-300 text-lg"><?= session()->getFlashData('success') ?></h5>
              </div>
            <?php endif ?>
            <label class="my-5 font-sans font-semibold text-sm" for="email">Email</label>
            <div class="
                  w-full
                  overflow-hidden
                  rounded-lg
                  border border-gray-600
                  px-2
                  py-1
                  mt-2
                ">
              <input id="email" class="w-full focus:outline-none" type="text" placeholder="Masukkan Email" name="email" value="<?= set_value('email'); ?>" />
            </div>
            <h5 class="font-sans text-red-500"><?= isset($validation) ? display_error($validation, 'email') : '<br/>' ?></h5>

            <label class="my-5 font-sans font-semibold text-sm" for="name">Nama</label>
            <div class="
                  w-full
                  overflow-hidden
                  rounded-lg
                  border border-gray-600
                  px-2
                  py-1
                  mt-2
                ">
              <input id="name" class="w-full focus:outline-none" type="text" placeholder="Masukkan Nama" name="name" value="<?= set_value('name'); ?>" autocomplete="off" />
            </div>
            <h5 class="font-sans text-red-500"><?= isset($validation) ? display_error($validation, 'name') : '<br/>' ?></h5>

            <label class="my-5 font-sans font-semibold text-sm" for="password">Password</label>
            <div class="w-full flex flex-row justify-between">
              <!-- password 1 -->
              <div class="
                    w-full
                    overflow-hidden
                    rounded-lg
                    border border-gray-600
                    px-2
                    py-1
                    mt-2
                  ">
                <input id="password" class="w-full focus:outline-none" type="password" placeholder="Masukkan Password" name="password" value="<?= set_value('password'); ?>" />
              </div>
              <!-- spacer -->
              <div class="w-10"></div>
              <!-- password 2 -->
              <div class="
                    w-full
                    overflow-hidden
                    rounded-lg
                    border border-gray-600
                    px-2
                    py-1
                    mt-2
                  ">
                <input id="password-confirm" class="w-full focus:outline-none" type="password" placeholder="Konfirmasi Password" name="confirm_password" value="<?= set_value('confirm_password'); ?>" />
              </div>
            </div>
            <h5 class="font-sans text-red-500 mb-2"><?= isset($validation) ? display_error($validation, 'confirm_password') : '<br/>' ?></h5>

            <!-- button, forgot password section  -->
            <div class="flex flex-row items-center justify-between">
              <button type="submit" class="
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
                  ">
                Register
              </button>
            </div>
          </form>
          <div class="flex flex-row w-full justify-center">
            <a href="<?= base_url('/auth/login') ?>">
              <span class="
                    font-sans
                    text-sm text-gray-800
                    font-semibold
                    cursor-pointer
                  ">Sudah punya akun? Masuk
                <span class="
                      font-sans
                      text-sm text-blue-400
                      font-semibold
                      cursor-pointer
                      hover:underline
                      transition
                      duration-300
                      ease-in-out
                    ">
                  disini
                </span></span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
  document.title = 'Daftar ke website'
  // console.log(document.title)
</script>

</html>
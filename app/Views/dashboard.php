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
    <nav class="relative flex flex-col w-full justify-between pr-5 lg:pr-10">
      <!-- navbar -->
      <div class="flex flex-row w-full justify-between">
        <div class="w-2/12 bg-white pl-5 md:pl-10 py-2">
          <h1 class="font-bold font-sans text-2xl text-gray-800">Logo</h1>
        </div>
        <div
          class="
            flex flex-row
            items-center
            rounded-full
            px-3
            py-2
            bg-white
            mt-2
          "
        >
          <div class="h-8 w-8 rounded-full bg-red-200"></div>
          <span class="font-semibold text-base text-gray-800 mx-2">Admin</span>
          <img
            src="<?= base_url('/assets/icons/arrow_down_icon.svg') ?>"
            class="w-3 h-3"
            alt="arrow_down_icon"
          />
        </div>
      </div>
      <!-- sidebar  -->
      <div class="absolute left-0 top-10 h-screen w-2/12 pr-2">
        <div class="h-full w-full bg-white"></div>
      </div>
    </nav>
  </body>
  <script>
    document.title = 'Dashboard'
    // console.log(document.title)
  </script>
</html>

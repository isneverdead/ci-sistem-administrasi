<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Berita</title>
    <link rel="stylesheet" href="./tailwind.css" />
    <?php 
    function getUser($user_id, $allUser) {
        foreach($allUser as $user) {
            if($user['user_id'] == $user_id) {
                return $user;
            }
        }
    }
    ?>
    <style>
      @media screen and (max-width: 768px) {
        ::-webkit-scrollbar {
          height: 4px;
        }
      }

      /* width */
      ::-webkit-scrollbar {
        width: 4px;
      }

      /* Track */
      ::-webkit-scrollbar-track {
        background: #ffffff00;
      }

      /* Handle */
      ::-webkit-scrollbar-thumb {
        background: #a7f3d0;
      }

      /* Handle on hover */
      ::-webkit-scrollbar-thumb:hover {
        background: #6ee7b7;
      }
    </style>
  </head>
  <body>
    <div class="w-full h-screen flex flex-col px-4 py-4 bg-gray-100">
      <div class="w-full flex flex-row px-5 bg-green-200 rounded-lg py-2 justify-between shadow-lg items-center">
      <a href="<?= base_url('/')?>">

      <h1 class="font-sans font-bold text-xl text-gray-800">Logo</h1>
      </a>
        <div class="flex flex-row items-center">
          <a href="<?= base_url('/')?>">
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
                lg:mr-10
                hover:shadow-none hover:bg-gray-100
                transition
                duration-300
              "
            >
              Home
            </button>
          </a>
          <a href="<?= base_url('/auth/register')?>">
            <button
              class="
                px-4
                py-2
                hidden
                <?= (isset($user_info['user_id'])) ? 'hidden' : 'lg:flex'?>
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
              <?= (isset($user_info['user_id'])) ? 'hidden' : ''?>
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
        </div>
      </div>
      <!-- end nav -->
      <div class="w-full mt-5 h-5/6 px-4 md:px-20 flex flex-row">
        <div class="h-full w-full flex flex-col py-10 overflow-y-scroll">
          <!-- start card  -->
          <?php
            foreach ($allNews as $news) {
                ?>
                
                
                <div class="mt-6">
            <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
              <div class="flex items-center justify-between">
                <span class="font-light text-gray-600">
                <?php
                    $created = $news['created_at'];
                    $date = date_create($created);
                    echo date_format($date, 'M d, Y');
                ?>    
              </span
                ><a href="#" class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500"><?= $news['tag']?></a>
              </div>
              <div class="mt-2">
                <a href="#" class="text-2xl font-bold text-gray-700 hover:underline"><?= $news['title']?></a>
                <p class="mt-2 text-gray-600">
                <?= $news['description']?>
                </p>
              </div>
              <div class="flex items-center justify-between mt-4">
                <a href="#" class="text-blue-500 hover:underline">Read more</a>
                <div>
                  <a href="#" class="flex items-center"
                    ><img
                      src="<?= getUser($news['creator'], $allUser)['profile_url']?>"
                      alt="avatar"
                      class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block"
                    />
                    <h1 class="font-bold text-gray-700 hover:underline"><?= getUser($news['creator'], $allUser)['name']?></h1>
                  </a>
                </div>
              </div>
            </div>
          </div>
                
                <?php
            }
          ?>
          
          <!-- end card -->
          
        </div>
      </div>
    </div>
  </body>
</html>

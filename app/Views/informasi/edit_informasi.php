<!-- <link href="./tailwind.css" rel="stylesheet" /> -->
<div class="w-full shadow-lg rounded-lg px-5 pt-5 flex flex-col h-full bg-white mb-4 overflow-y-scroll">
  <div class="flex w-full justify-center">
    <h1 class="fonst-sans font-bold text-2xl text-gray-800 mb-5">Edit berita</h1>
  </div>
  <form class="h-auto h-3/4" id="formBerita" action="<?= base_url('/dashboard/informasi/edit') ?>/<?= $berita['id'] ?>/save" method="post">
    <!-- error message -->
    <?php if (!empty(session()->getFlashData('fail'))) : ?>
      <div class="w-full flex border-2 border-red-200 py-2 px-5 justify-center rounded-lg mb-5">
        <h5 class="font-sans font-semibold text-red-500 text-lg"><?= session()->getFlashData('fail') ?></h5>
      </div>
    <?php endif ?>
    <?php if (!empty(session()->getFlashData('success'))) : ?>
      <div class="w-full flex border-2 border-green-200 py-2 px-5 justify-center rounded-lg mb-5">
        <h5 class="font-sans font-semibold text-green-300 text-lg"><?= session()->getFlashData('success') ?></h5>
      </div>
    <?php endif ?>
    
   
    <!-- input nama  -->
    <div class="w-full flex flex-row border-2 rounded-lg border-green-200">
      <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
        <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Judul</h1>
      </div>
      <div class="w-full overflow-hidden rounded-lg px-2 py-1">
        <input id="judul" class="w-full focus:outline-none" type="text" placeholder="Masukkan judul" name="title" value="<?= $berita['title'] ?>" />
      </div>
    </div>
    <h5 class="font-sans text-red-500 font-semibold"><?= isset($validation) && (display_error($validation, 'title') != null) ? display_error($validation, 'title') : '<br/>' ?></h5>

       <!-- input berita  -->
       <div class="h-2/4   w-full flex flex-col border-2 rounded-lg border-green-200">
      <!-- <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
        <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Jumlah</h1>
      </div> -->
      <div class="w-full overflow-hidden rounded-lg px-2 py-1">
      <textarea id="description" name="description" rows="4" cols="50"/>
        <!-- <input id="description" class="w-full focus:outline-none" type="textarea" placeholder="Masukkan berita" name="description" value="<?= $berita['description']  ?>" /> -->
      </div>
    </div>
    <h5 class="font-sans text-red-500 font-semibold"><?= isset($validation) && (display_error($validation, 'description') != null) ? display_error($validation, 'description') : '<br/>' ?></h5>

    <!-- input dipinjam  -->
    <div class="w-full flex flex-row border-2 rounded-lg border-green-200 ">
      <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
        <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Kategori</h1>
      </div>
      <div class="w-full overflow-hidden rounded-lg px-2 py-1">
        <input id="tag" class="w-full focus:outline-none" type="text" placeholder="Masukkan tag / kategori" name="tag" value="<?= set_value('tag'); ?>" />
      </div>
    </div>
    <h5 class="font-sans text-red-500 font-semibold"><?= isset($validation) && (display_error($validation, 'tag') != null) ? display_error($validation, 'tag') : '<br/>' ?></h5>

    <input id="creator" class="w-full focus:outline-none hidden" type="text" placeholder="" name="creator" value="<?= $user_info['user_id'] ?>" />


   
  </form>
  <div class="w-full flex justify-end mb-10">
    <a href="<?= base_url('/dashboard/informasi/delete') ?>/<?= $berita['id'] ?>">
      <button class="px-5 py-2 rounded-lg font-sans font-semibold text-gray-800 text-xl bg-red-200">Hapus</button>
    </a>
    <button type="submit" form="formBerita" class="ml-10 px-5 py-2 rounded-lg font-sans font-semibold text-gray-800 text-xl bg-green-200">Simpan</button>
  </div>
</div>
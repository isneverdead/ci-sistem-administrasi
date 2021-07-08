<link href="./tailwind.css" rel="stylesheet" />
<div class="w-full shadow-lg rounded-lg flex flex-col h-full bg-white mb-4 overflow-y-scroll">
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
  <div class="w-full flex flex-row px-5 mt-10 mb-5 items-center justify-between">
    <h1 class="fonst-sans font-bold text-lg md:text-2xl text-gray-800 mb-5 mr-5">Presensi kehadiran</h1>
    <a class=" <?= ($user_info['email'] == 'admin@admin.com')?'': 'hidden'?>" href="<?= base_url('/dashboard/presensi/add')?>">
    <button
      class="
        px-2
        md:px-5
        py-2
        rounded-lg
        font-sans font-bold
        md:font-semibold
        text-gray-800 text-base
        md:text-lg
        bg-green-200
      "
    >
      Tambah acara
    </button>
  </a>
  </div>
  <table class="text-left w-full border-collapse">
    <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
    <thead class="">
      <tr>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">Nama acara</th>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">Jumlah peserta</th>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">Tanggal</th>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b <?= ($user_info['email'] == 'admin@admin.com')?'': 'hidden'?>">Aksi </th>
      </tr>
    </thead>
    <tbody>
     
      <?php
      foreach ($data_acara as $acara) {
      ?>

        <tr class="hover:bg-green-100 transition duration-200">
          <td class="py-4 px-6 border-b border-grey-light"><?= $acara['name']; ?></td>
          <td class="py-4 px-6 border-b border-grey-light">
            <?php 
              $count = 0;
              foreach ($all_peserta as $peserta){
                if($peserta['presensi_id'] == $acara['id']) {
                  $count++;
                }
              }
              echo $count
            ?></td>
          <td class="py-4 px-6 border-b border-grey-light"><?= $acara['tanggal']; ?></td>
          <td class="py-4 px-6 border-b border-grey-light <?= ($user_info['email'] == 'admin@admin.com')?'': 'hidden'?>">
            <a href="<?= base_url('/dashboard/presensi/edit')?>/<?= $acara['id']?>">
              <button class="py-2 px-3 rounded-lg font-sans font-semibold bg-yellow-200 text-gray-800 text-lg">Edit</button>
            </a>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>

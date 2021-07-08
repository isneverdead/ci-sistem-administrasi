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
    <h1 class="fonst-sans font-bold text-2xl text-gray-800 mb-5">Inventaris</h1>
    <a class=" <?= ($user_info['email'] == 'admin@admin.com')?'': 'hidden'?>" href="<?= base_url('/dashboard/inventaris/add')?>">
      <button class="px-5 py-2 rounded-lg font-sans font-semibold text-gray-800 text-lg bg-green-200">
        Tambah barang
      </button>
    </a>
  </div>
  <table class="text-left w-full border-collapse">
    <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
    <thead class="">
      <tr>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">Nama</th>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">Jumlah</th>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">Status</th>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">Dipinjam oleh</th>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b <?= ($user_info['email'] == 'admin@admin.com')?'': 'hidden'?>">aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($inventaris as $barang) {
      ?>

      <tr class="hover:bg-green-100 transition duration-200">
        <td class="py-4 px-6 border-b border-grey-light"><?= $barang['name']; ?></td>
        <td class="py-4 px-6 border-b border-grey-light"><?= $barang['jumlah']; ?></td>
        <td class="py-4 px-6 border-b border-grey-light"><?= $barang['status']; ?></td>
        <td class="py-4 px-6 border-b border-grey-light"><?= $barang['dipinjam_oleh']; ?></td>
        <td class="py-4 px-6 border-b border-grey-light <?= ($user_info['email'] == 'admin@admin.com')?'': 'hidden'?>">
          <a href="<?= base_url('/dashboard/inventaris/edit')?>/<?= $barang['id']?>">
            <button class="py-2 px-3 rounded-lg font-sans font-semibold bg-yellow-200 text-gray-800 text-lg">
              Edit
            </button>
          </a>
        </td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>

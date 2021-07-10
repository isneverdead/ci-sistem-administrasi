<link href="../tailwind.css" rel="stylesheet" />
<div class="w-full shadow-lg rounded-lg flex flex-col h-full bg-white mb-4 overflow-y-scroll">
  <div class="w-full flex flex-row px-5 mt-10 mb-5 items-center justify-between">
    <h1 class="fonst-sans font-bold text-2xl text-gray-800 mb-5">Daftar Siswa</h1>
    <a class=" <?= ($user_info['email'] == 'admin@admin.com')?'': 'hidden'?>" href="<?= base_url('/dashboard/pelajar/add') ?>">
      <button class="px-5 py-2 rounded-lg font-sans font-semibold text-gray-800 text-lg bg-green-200">
        Tambah Siswa
      </button>
    </a>
  </div>
  <table class="text-left w-full border-collapse">
    <thead class="">
      <tr>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">Nama</th>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">Tingkat</th>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b <?= ($user_info['email'] == 'admin@admin.com')?'': 'hidden'?>">Aksi</th>
      </tr>
    </thead>
    <tbody>

      <?php
      foreach ($users as $user) {
      ?>

        <tr class="hover:bg-green-100 transition duration-200">
          <td class="py-4 px-6 border-b border-grey-light"><?= $user['nama'] ?></td>
          <td class="py-4 px-6 border-b border-grey-light"><?= $user['tingkat'] ?></td>
          <td class="py-4 px-6 border-b border-grey-light <?= ($user_info['email'] == 'admin@admin.com')?'': 'hidden'?>">
          <a href="<?= base_url('/dashboard/pelajar/edit')?>/<?= $user['id']?>">
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
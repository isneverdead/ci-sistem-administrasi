<link href="../tailwind.css" rel="stylesheet" />
<div class="w-full shadow-lg rounded-lg flex flex-col h-full bg-white mb-4 overflow-y-scroll">
  <div class="w-full flex flex-row px-5 mt-10 mb-5 items-center justify-between">
    <h1 class="fonst-sans font-bold text-2xl text-gray-800 mb-5">Daftar Mahasiswa</h1>
    <a class=" <?= ($user_info['email'] == 'admin@admin.com')?'': 'hidden'?>" href="<?= base_url('/dashboard/anggota/add') ?>">
      <button class="px-5 py-2 rounded-lg font-sans font-semibold text-gray-800 text-lg bg-green-200">
        Tambah Mahasiswa
      </button>
    </a>
  </div>
  <table class="text-left w-full border-collapse">
    <thead class="">
      <tr>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">Nama</th>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">NIM</th>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">Fakultas</th>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">Jurusan</th>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">Status</th>
      </tr>
    </thead>
    <tbody>

      <?php
      foreach ($users as $user) {
      ?>

        <tr class="hover:bg-green-100 transition duration-200">
          <td class="py-4 px-6 border-b border-grey-light"><?= $user->name; ?></td>
          <td class="py-4 px-6 border-b border-grey-light"><?= $user->nim; ?></td>
          <td class="py-4 px-6 border-b border-grey-light"><?= $user->fakultas ?></td>
          <td class="py-4 px-6 border-b border-grey-light"><?= $user->jurusan ?></td>
          <?php if ($user->aktif == 'aktif') : ?>
            <td class="py-4 px-6 border-b border-grey-light flex flex-row">
              Aktif
              <span class="ml-5">
                <div class="w-6 h-6 rounded-md bg-green-200 hover:bg-green-400"></div>
              </span>
            </td>
          <?php endif ?>
          <?php if ($user->aktif == 'tidak') : ?>
            <td class="py-4 px-6 border-b border-grey-light flex flex-row">
              Tidak
              <span class="ml-4">
                <div class="w-6 h-6 rounded-md bg-red-200 hover:bg-red-400"></div>
              </span>
            </td>
          <?php endif ?>
          <?php if ($user->aktif == 'cuti') : ?>
            <td class="py-4 px-6 border-b border-grey-light flex flex-row">
              Cuti
              <span class="ml-6">
                <div class="w-6 h-6 rounded-md bg-yellow-200 hover:bg-yellow-400"></div>
              </span>
            </td>
          <?php endif ?>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>
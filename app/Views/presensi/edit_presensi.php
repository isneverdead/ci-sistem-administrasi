<link href="../tailwind.css" rel="stylesheet" />
<div class="w-full shadow-lg rounded-lg px-5 pt-5 flex flex-col h-full bg-white mb-4 overflow-y-scroll">
  <div class="flex w-full justify-center">
    <h1 class="fonst-sans font-bold text-2xl text-gray-800 mb-5">Edit Acara</h1>
  </div>

  <form id="acaraForm" action="<?= base_url('/dashboard/presensi/edit') ?>/<?= $acara['id'] ?>/save" method="post">
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
        <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Nama</h1>
      </div>
      <div class="w-full overflow-hidden rounded-lg px-2 py-1">
        <input
          id="name"
          class="w-full focus:outline-none"
          type="text"
          placeholder="Masukkan nama anggota"
          name="name"
          value="<?= $acara['name'] ?>"
        />
      </div>
    </div>
    <h5 class="font-sans text-red-500 font-semibold">
      <?= isset($validation) && (display_error($validation, 'name') != null) ? display_error($validation, 'name') : '<br/>'
      ?>
    </h5>

    <!-- input tahun angkatan  -->
    <div class="w-full flex flex-row border-2 rounded-lg border-green-200 mb-5">
      <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
        <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Tanggal</h1>
      </div>
      <div class="w-full overflow-hidden rounded-lg px-2 py-1">
        <input
          id="tanggal"
          class="w-full focus:outline-none"
          type="date"
          placeholder="Masukkan tanggal acara"
          name="tanggal"
          value="<?= $acara['tanggal'] ?>"
        />
      </div>
    </div>
  </form>
  <div class="px-2 lg:px-5 flex items-center border-2 rounded-lg border-green-200 w-24 lg:w-28 bg-green-200 mb-5 mr-5">
    <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Peserta</h1>
  </div>
  <form id="pesertaForm" action="<?= base_url('/dashboard/presensi/edit') ?>/<?= $acara['id'] ?>/add" method="post">
    <input
      id="acara_id"
      class="w-full focus:outline-none hidden"
      type="text"
      placeholder="Masukkan id peserta"
      name="acara_id"
      value="<?= $acara['id'] ?>"
    />
    <div class="w-full flex flex-row border-2 rounded-lg border-green-200 mb-5">
      <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
        <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Nama</h1>
      </div>
      <div class="w-full overflow-hidden rounded-lg px-2 py-1">
        <input
          id="name"
          class="w-full focus:outline-none"
          type="text"
          placeholder="Masukkan nama peserta"
          name="name"
        />
      </div>
    </div>
    <div class="w-full flex flex-row border-2 rounded-lg border-green-200 mb-5">
      <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
        <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">NIM</h1>
      </div>
      <div class="w-full overflow-hidden rounded-lg px-2 py-1">
        <input id="nim" class="w-full focus:outline-none" type="text" placeholder="Masukkan nim peserta" name="nim" />
      </div>
    </div>
  </form>
  <button
    type="submit"
    form="pesertaForm"
    class="px-5 py-2 rounded-lg font-sans font-semibold text-gray-800 text-xl bg-green-200"
  >
    Tambah Peserta
  </button>

  <table class="text-left w-full border-collapse my-5">
    <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
    <thead class="">
      <tr>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">Nama</th>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">NIM</th>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($allPeserta as $peserta) {
      ?>

      <tr class="hover:bg-green-100 transition duration-200">
        <td class="py-4 px-6 border-b border-grey-light"><?= $peserta->name ?></td>
        <td class="py-4 px-6 border-b border-grey-light"><?= $peserta->nim ?></td>

        <td class="py-4 px-6 border-b border-grey-light">
          <a href="<?= base_url('/dashboard/presensi/edit')?>/<?= $acara['id']?>/delete/<?= $peserta->id?>">
            <button class="py-2 px-3 rounded-lg font-sans font-semibold bg-red-200 text-gray-800 text-lg">Hapus</button>
          </a>
        </td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
  <div class="w-full flex justify-end mb-10">
    <a href="<?= base_url('/dashboard/presensi/delete') ?>/<?= $acara['id'] ?>">
      <button class="px-5 py-2 rounded-lg font-sans font-semibold text-gray-800 text-xl bg-red-200">Hapus</button>
    </a>
    <button
      type="submit"
      form="acaraForm"
      class="ml-10 px-5 py-2 rounded-lg font-sans font-semibold text-gray-800 text-xl bg-green-200"
    >
      Simpan
    </button>
  </div>
</div>

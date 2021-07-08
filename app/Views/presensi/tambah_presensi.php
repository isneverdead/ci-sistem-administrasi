<!-- <link href="./tailwind.css" rel="stylesheet" /> -->
<div class="w-full shadow-lg rounded-lg px-5 pt-5 flex flex-col h-full bg-white mb-4 overflow-y-scroll">
  <div class="flex w-full justify-center">
    <h1 class="fonst-sans font-bold text-2xl text-gray-800 mb-5">Tambah Acara</h1>
  </div>
  <form action="<?= base_url('/dashboard/presensi/add/save') ?>" method="post">
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
    <!-- input email  -->
    <div class="w-full flex flex-row border-2 rounded-lg border-green-200">
      <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
        <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Nama</h1>
      </div>
      <div class="w-full overflow-hidden rounded-lg px-2 py-1">
        <input
          id="name"
          class="w-full focus:outline-none"
          type="text"
          placeholder="Masukkan nama acara"
          name="name"
          value="<?= set_value('name'); ?>"
        />
      </div>
    </div>
    <h5 class="font-sans text-red-500 font-semibold">
      <?= isset($validation)  && (display_error($validation, 'name') != null)  ? display_error($validation, 'name') : '<br/>'
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
          value="<?= set_value('tanggal'); ?>"
        />
      </div>
    </div>
    <div class="w-full flex justify-end">
      <button type="submit" class="px-5 py-2 rounded-lg font-sans font-semibold text-gray-800 text-xl bg-green-200">
        Simpan
      </button>
    </div>
  </form>
</div>

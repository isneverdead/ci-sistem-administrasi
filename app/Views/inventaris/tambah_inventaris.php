<!-- <link href="./tailwind.css" rel="stylesheet" /> -->
<div class="w-full shadow-lg rounded-lg px-5 pt-5 flex flex-col h-full bg-white mb-4 overflow-y-scroll">
  <div class="flex w-full justify-center">
    <h1 class="fonst-sans font-bold text-2xl text-gray-800 mb-5">Tambah barang</h1>
  </div>
  <form action="<?= base_url('/dashboard/inventaris/add/save') ?>" method="post">
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
        <input id="name" class="w-full focus:outline-none" type="text" placeholder="Masukkan nama barang" name="name" value="<?= set_value('name'); ?>" />
      </div>
    </div>
    <h5 class="font-sans text-red-500 font-semibold"><?= isset($validation) && (display_error($validation, 'name') != null) ? display_error($validation, 'name') : '<br/>' ?></h5>

    <!-- input jumlah  -->
    <div class="w-full flex flex-row border-2 rounded-lg border-green-200">
      <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
        <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Jumlah</h1>
      </div>
      <div class="w-full overflow-hidden rounded-lg px-2 py-1">
        <input id="jumlah" class="w-full focus:outline-none" type="text" placeholder="Masukkan jumlah barang" name="jumlah" value="<?= set_value('jumlah'); ?>" />
      </div>
    </div>
    <h5 class="font-sans text-red-500 font-semibold"><?= isset($validation) && (display_error($validation, 'jumlah') != null) ? display_error($validation, 'jumlah') : '<br/>' ?></h5>

    <div class="w-full flex flex-row border-2 rounded-lg border-green-200 ">
      <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
        <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Status</h1>
      </div>
      <div class="w-full overflow-hidden rounded-lg px-2 py-1">
        <select class="w-full" name="status" id="barang" value="<?= set_value('status');  ?>">
          <option value="tersedia">Tersedia</option>
          <option value="dipinjam">Dipinjam</option>
          <option value="rusak">Rusak</option>
          <option value="hilang">Hilang</option>
          <option value="-">-</option>
        </select>
      </div>
    </div>
    <h5 class="font-sans text-red-500 font-semibold"><?= isset($validation) && (display_error($validation, 'status') != null) ? display_error($validation, 'status') : '<br/>' ?></h5>


    <!-- input dipinjam  -->
    <div class="w-full flex flex-row border-2 rounded-lg border-green-200 mb-5">
      <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
        <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Dipinjam</h1>
      </div>
      <div class="w-full overflow-hidden rounded-lg px-2 py-1">
        <input id="dipinjam_oleh" class="w-full focus:outline-none" type="text" placeholder="Dipinjam oleh siapa?" name="dipinjam_oleh" value="<?= set_value('dipinjam_oleh'); ?>" />
      </div>
    </div>

    
    <div class="w-full flex justify-end">
      <button type="submit" class="px-5 py-2 rounded-lg font-sans font-semibold text-gray-800 text-xl bg-green-200">Simpan</button>
    </div>
  </form>
</div>
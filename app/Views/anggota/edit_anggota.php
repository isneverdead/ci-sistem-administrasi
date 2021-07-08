<!-- <link href="./tailwind.css" rel="stylesheet" /> -->
<div class="w-full shadow-lg rounded-lg px-5 pt-5 flex flex-col h-full bg-white mb-4 overflow-y-scroll">
  <div class="flex w-full justify-center">
    <h1 class="fonst-sans font-bold text-2xl text-gray-800 mb-5">Tambah anggota</h1>
  </div>

  <form id="anggotaForm" action="<?= base_url('/dashboard/anggota/edit') ?>/<?= $user_edit['user_id'] ?>/save" method="post">
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
    <div class="w-full flex flex-row border-2 rounded-lg border-green-200 ">
      <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
        <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Email</h1>
      </div>
      <div class="w-full overflow-hidden rounded-lg px-2 py-1">
        <input id="email" class="w-full focus:outline-none" type="text" placeholder="Masukkan email anggota" name="email" value="<?= $user_edit['email'] ?>" />
      </div>
    </div>
    <h5 class="font-sans text-red-500 font-semibold"><?= isset($validation)  && (display_error($validation, 'email') != null)  ? display_error($validation, 'email') : '<br/>' ?></h5>


    <!-- input password  -->
    <div class="w-full flex flex-col md:flex-row ">
      <div class="w-full md:w-5/12 flex flex-row border-2 rounded-lg border-green-200 mr-2 md:mr-10 mb-5 md:mb-0">
        <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
          <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Password</h1>
        </div>
        <div class="w-full overflow-hidden rounded-lg px-2 py-1">
          <input id="password" class="w-full focus:outline-none" type="password" placeholder="Masukkan password anggota" name="password" />
        </div>
      </div>
      <div class="w-full md:w-5/12 flex flex-row border-2 rounded-lg border-green-200 ">
        <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
          <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Confirm</h1>
        </div>
        <div class="w-full overflow-hidden rounded-lg px-2 py-1">
          <input id="confirmPassword" class="w-full focus:outline-none" type="password" placeholder="Konfirmasi password anggota" name="confirm_password" />
        </div>
      </div>
    </div>
    <h5 class=" font-sans text-red-500 font-semibold"><?= isset($validation) && (display_error($validation, 'confirm_password') != null) ? display_error($validation, 'confirm_password') : '<br/>' ?></h5>

    <!-- input nama  -->
    <div class="w-full flex flex-row border-2 rounded-lg border-green-200">
      <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
        <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Nama</h1>
      </div>
      <div class="w-full overflow-hidden rounded-lg px-2 py-1">
        <input id="name" class="w-full focus:outline-none" type="text" placeholder="Masukkan nama anggota" name="name" value="<?= $user_edit['name'] ?>" />
      </div>
    </div>
    <h5 class="font-sans text-red-500 font-semibold"><?= isset($validation) && (display_error($validation, 'name') != null) ? display_error($validation, 'name') : '<br/>' ?></h5>

    <!-- input NIM  -->
    <div class="w-full flex flex-row border-2 rounded-lg border-green-200 mb-5">
      <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
        <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">NIM</h1>
      </div>
      <div class="w-full overflow-hidden rounded-lg px-2 py-1">
        <input id="nim" class="w-full focus:outline-none" type="text" placeholder="Masukkan NIM anggota" name="nim" value="<?= $user_edit['nim'] ?>" />
      </div>
    </div>

    <!-- input Fakultas  -->
    <div class="w-full flex flex-row border-2 rounded-lg border-green-200 mb-5">
      <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
        <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Fakultas</h1>
      </div>
      <div class="w-full overflow-hidden rounded-lg px-2 py-1">
        <input id="fakultas" class="w-full focus:outline-none" type="text" placeholder="Masukkan Fakultas anggota" name="fakultas" value="<?= $user_edit['fakultas'] ?>" />
      </div>
    </div>

    <!-- input jurusan  -->
    <div class="w-full flex flex-row border-2 rounded-lg border-green-200 mb-5">
      <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
        <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Jurusan</h1>
      </div>
      <div class="w-full overflow-hidden rounded-lg px-2 py-1">
        <input id="jurusan" class="w-full focus:outline-none" type="text" placeholder="Masukkan Jurusan anggota" name="jurusan" value="<?= $user_edit['jurusan'] ?>" />
      </div>
    </div>

    <!-- input tahun angkatan  -->
    <div class="w-full flex flex-row border-2 rounded-lg border-green-200 mb-5">
      <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
        <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Tahun</h1>
      </div>
      <div class="w-full overflow-hidden rounded-lg px-2 py-1">
        <input id="angkatan" class="w-full focus:outline-none" type="month" placeholder="Masukkan tahun angkatan anggota" name="angkatan" value="<?= $user_edit['angkatan'] ?>" />
      </div>
    </div>
    <!-- input aktif  -->
    <div class="w-full flex flex-row border-2 rounded-lg border-green-200 mb-5">
      <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
        <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Status</h1>
      </div>
      <div class="w-full overflow-hidden rounded-lg px-2 py-1">
        <select class="w-full" id="aktif" name="aktif" value="<?= $user_edit['aktif'] ?>" >
          <option <?php echo ($user_edit['aktif'] == 'aktif') ? 'selected' : '' ?> value="aktif">Aktif</option>
          <option <?php echo ($user_edit['aktif'] == 'cuti') ? 'selected' : '' ?> value="cuti">Cuti</option>
          <option <?php echo ($user_edit['aktif'] == 'tidak') ? 'selected' : '' ?> value="tidak">Tidak</option>
          <option <?php echo ($user_edit['aktif'] == '-') ? 'selected' : '' ?> value="-">-</option>
        </select>
        <!-- <input id="aktifs" class="w-full focus:outline-none" type="text" placeholder="Masukkan Jurusan anggota" name="aktif" value="<?= $user_edit['aktif'] ?>" /> -->
      </div>
    </div>
    <input id="profile_url" class="hidden" type="text" name="profile_url" value="<?= $user_edit['profile_url'] ?>" />

  </form>
  <div class="w-full flex justify-end mb-10">
    <a href="<?= base_url('/dashboard/anggota/delete') ?>/<?= $user_edit['user_id'] ?>">
      <button class="px-5 py-2 rounded-lg font-sans font-semibold text-gray-800 text-xl bg-red-200">Hapus</button>
    </a>
    <button type="submit" form="anggotaForm" class="ml-10 px-5 py-2 rounded-lg font-sans font-semibold text-gray-800 text-xl bg-green-200">Simpan</button>
  </div>
</div>
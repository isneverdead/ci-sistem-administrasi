<link href="../tailwind.css" rel="stylesheet" />
<div class="w-full shadow-lg p-4 rounded-lg flex flex-col h-full bg-white mb-4 overflow-y-scroll">
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
  <div class="w-full flex flex-col md:flex-row">
    <div class="w-full md:w-4/12 h-72 mb-auto rounded-xl flex flex-row items-center justify-center overflow-hidden">
      <!-- <img class="w-full" src="<?= $user_info['profile_url'] ?>" alt="avatar"> -->
      <img class="w-full" src="<?= $user_info['profile_url'] ?>" alt="profile-picture" />
    </div>
    <div class="w-full md:ml-4 md:w-8/12 mt-5 md:mt-0 rounded-xl flex flex-col items-center justify-center overflow-hidden">
        <form id="profile" action="<?= base_url('/dashboard/profile/edit') ?>/<?= $user_info['user_id'] ?>/save" method="post">
            
            <!-- input email  -->
            <div class="mx-2 md:mx-0 md:w-full flex flex-row border-2 rounded-lg border-green-200">
              <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
                <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Email</h1>
              </div>
              <div class="w-full overflow-hidden rounded-lg px-2 py-1">
                <input id="email" class="w-full focus:outline-none" type="text" placeholder="Masukkan email anggota" name="email" value="<?= $user_info['email'] ?>" />
              </div>
            </div>
            <h5 class="font-sans text-red-500 font-semibold"><?= isset($validation)  && (display_error($validation, 'email') != null)  ? display_error($validation, 'email') : '<br/>' ?></h5>
        
        
            <!-- input password  -->
            <div class="mx-2 lg:mx-0 lg:w-full flex flex-col md:flex-row ">
              <div class="w-full md:w-5/12 flex flex-row border-2 rounded-lg border-green-200 mr-2 md:mr-10 mb-5 md:mb-0">
                <div class="px-2 lg:px-3 flex items-center w-32 bg-green-200 mr-5">
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
            <div class="mx-2 lg:mx-0 lg:w-full flex flex-row border-2 rounded-lg border-green-200">
              <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
                <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Nama</h1>
              </div>
              <div class="w-full overflow-hidden rounded-lg px-2 py-1">
                <input id="name" class="w-full focus:outline-none" type="text" placeholder="Masukkan nama anggota" name="name" value="<?= $user_info['name'] ?>" />
              </div>
            </div>
            <h5 class="font-sans text-red-500 font-semibold"><?= isset($validation) && (display_error($validation, 'name') != null) ? display_error($validation, 'name') : '<br/>' ?></h5>
        
            <!-- input NIM  -->
            <div class="mx-2 lg:mx-0 lg:w-full flex flex-row border-2 rounded-lg border-green-200 mb-5">
              <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
                <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">NIM</h1>
              </div>
              <div class="w-full overflow-hidden rounded-lg px-2 py-1">
                <input id="nim" class="w-full focus:outline-none" type="text" placeholder="Masukkan NIM anggota" name="nim" value="<?= $user_info['nim'] ?>" />
              </div>
            </div>
        
            <!-- input Fakultas  -->
            <div class="mx-2 lg:mx-0 lg:w-full flex flex-row border-2 rounded-lg border-green-200 mb-5">
              <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
                <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Fakultas</h1>
              </div>
              <div class="w-full overflow-hidden rounded-lg px-2 py-1">
                <input id="fakultas" class="w-full focus:outline-none" type="text" placeholder="Masukkan Fakultas anggota" name="fakultas" value="<?= $user_info['fakultas'] ?>" />
              </div>
            </div>
        
            <!-- input jurusan  -->
            <div class="mx-2 lg:mx-0 lg:w-full flex flex-row border-2 rounded-lg border-green-200 mb-5">
              <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
                <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Jurusan</h1>
              </div>
              <div class="w-full overflow-hidden rounded-lg px-2 py-1">
                <input id="jurusan" class="w-full focus:outline-none" type="text" placeholder="Masukkan Jurusan anggota" name="jurusan" value="<?= $user_info['jurusan'] ?>" />
              </div>
            </div>
        
            <!-- input tahun angkatan  -->
            <div class="lg:w-full flex flex-row border-2 rounded-lg border-green-200 mb-5">
              <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
                <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Tahun</h1>
              </div>
              <div class="w-full overflow-hidden rounded-lg px-2 py-1">
                <input id="angkatan" class="w-full focus:outline-none" type="month" placeholder="Masukkan tahun angkatan anggota" name="angkatan" value="<?= $user_info['angkatan'] ?>" />
              </div>
            </div>
            <!-- input aktif  -->
            <div class="mx-2 md:mx-0 md:w-full flex flex-row border-2 rounded-lg border-green-200 mb-5">
              <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
                <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Status</h1>
              </div>
              <div class="w-full overflow-hidden rounded-lg px-2 py-1">
                <select class="w-full" id="aktif" name="aktif" value="<?= $user_info['aktif'] ?>" >
                  <option <?php echo ($user_info['aktif'] == 'aktif') ? 'selected' : '' ?> value="aktif">Aktif</option>
                  <option <?php echo ($user_info['aktif'] == 'cuti') ? 'selected' : '' ?> value="cuti">Cuti</option>
                  <option <?php echo ($user_info['aktif'] == 'tidak') ? 'selected' : '' ?> value="tidak">Tidak</option>
                  <option <?php echo ($user_info['aktif'] == '-') ? 'selected' : '' ?> value="-">-</option>
                </select>
                <!-- <input id="aktifs" class="w-full focus:outline-none" type="text" placeholder="Masukkan Jurusan anggota" name="aktif" value="<?= $user_info['aktif'] ?>" /> -->
              </div>
            </div>
            <input id="profile_url" class="hidden" type="text" name="profile_url" value="<?= $user_info['profile_url'] ?>" />
        
          </form>
    </div>
  </div>
  <div class="w-full flex justify-end">
    <button form="profile" type="submit" class="px-5 py-2 rounded-lg font-sans font-semibold text-gray-800 text-xl bg-green-200">Simpan</button>
  </div>
</div>

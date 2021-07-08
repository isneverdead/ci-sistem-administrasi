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
  <?php 
    $saldo = 0;
    foreach ($allTransaksi as $transaksi) {
      if($transaksi['type'] == 'in') {
        $saldo = $saldo + $transaksi['saldo'];
      } else {
        $saldo = $saldo - $transaksi['saldo'];
      }
    }
    // echo $saldo;
  ?>
  <div class="w-full flex flex-row px-5 mt-10 mb-5 items-center justify-between">
    <h1 class="fonst-sans font-bold text-2xl text-gray-800 mb-5">Laporan keuangan</h1>
  </div>
  <div class="w-full flex flex-col lg:flex-row px-5 mb-5 items-center justify-between">
    <!-- kiri  -->
    <div class="w-full lg:w-auto flex flex-row rounded-lg overflow-hidden border-2 <?= ($saldo < 0) ? 'border-red-300' : 'border-green-200' ?>">
      <div class="px-5 py-2 font-sans font-semibold text-gray-800 text-lg  <?= ($saldo < 0) ? 'bg-red-300' : 'bg-green-200' ?>">Saldo</div>
      <span class="px-5 py-2 rounded-lg font-sans font-semibold text-gray-800 text-lg"
        >Rp.
        <?= $saldo?>
      </span>
    </div>
    <!-- kanan  -->
    <div class="w-full lg:w-auto flex flex-row justify-between m-5 lg:mt-0">
      <div class="flex flex-row mr-10 rounded-lg overflow-hidden border-2 border-green-200">
        <span id="displayDateTime" class="px-5 py-2 rounded-lg font-sans font-semibold text-gray-800 text-lg">29 June 2021</span>
      </div>
      <a class=" <?= ($user_info['email'] == 'admin@admin.com')?'': 'hidden'?>" href="<?= base_url('/dashboard/keuangan/add')?>">
        <button class="p-2 rounded-lg font-sans font-semibold text-gray-800 text-lg bg-green-200">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M12 12H4M12 20V12V20ZM12 12V4V12ZM12 12H20H12Z"
              stroke="black"
              stroke-width="2"
              stroke-linecap="round"
            />
          </svg>
        </button>
      </a>
    </div>
  </div>

  <table class="text-left w-full border-collapse">
    <thead class="">
      <tr>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">Nama</th>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">Jumlah</th>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">Jenis</th>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b">Tanggal</th>
        <th class="py-4 px-6 font-bold uppercase text-sm text-grey-800 border-b <?= ($user_info['email'] == 'admin@admin.com')?'': 'hidden'?>">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($allTransaksi as $transaksi) {
      ?>

      <tr class="hover:bg-green-100 transition duration-200">
        <td class="py-4 px-6 border-b border-grey-light"><?= $transaksi['name']; ?></td>
        <td class="py-4 px-6 border-b border-grey-light"><?= $transaksi['saldo']; ?></td>
        <td class="py-4 px-6 border-b border-grey-light"><?= $transaksi['type']; ?></td>
        <td class="py-4 px-6 border-b border-grey-light">
        <?php
                    $created = $transaksi['created_at'];
                    $date = date_create($created);
                    echo date_format($date, 'M d, Y');
                ?>     
      </td>
        <td class="py-4 px-6 border-b border-grey-light <?= ($user_info['email'] == 'admin@admin.com')?'': 'hidden'?>">
          <a class=" <?= ($user_info['email'] == 'admin@admin.com')?'': 'hidden'?>" href="<?= base_url('/dashboard/keuangan/edit')?>/<?= $transaksi['id']?>">
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
<script type="text/javascript">
  var today = new Date();
  var day = today.getDay();
  var daylist = ["Sunday","Monday","Tuesday","Wednesday ","Thursday","Friday","Saturday"];
  var monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];
  var date =today.getDate() +' '+(monthNames[today.getMonth()])+' '+today.getFullYear();
  // var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
  var dateTime = date;
   
  document.getElementById("displayDateTime").innerHTML = dateTime;
 
  </script>

<!-- <link href="./tailwind.css" rel="stylesheet" /> -->
<div class="w-full shadow-lg rounded-lg px-5 pt-5 flex flex-col h-full bg-white mb-4 overflow-y-scroll">
  <div class="flex w-full justify-center">
    <h1 class="fonst-sans font-bold text-2xl text-gray-800 mb-5">Edit Transaksi</h1>
  </div>
  <form id="formTransaksi" action="<?= base_url('/dashboard/keuangan/edit') ?>/<?= $transaksi['id'] ?>/save" method="post">
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
        <input id="name" class="w-full focus:outline-none" type="text" placeholder="Masukkan nama barang" name="name" value="<?= $transaksi['name'] ?>" />
      </div>
    </div>
    <h5 class="font-sans text-red-500 font-semibold"><?= isset($validation) && (display_error($validation, 'name') != null) ? display_error($validation, 'name') : '<br/>' ?></h5>

    <!-- input jumlah  -->
    <div class="w-full flex flex-row border-2 rounded-lg border-green-200">
      <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
        <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Nominal</h1>
      </div>
      <div class="w-full overflow-hidden rounded-lg px-2 py-1">
        <input id="saldo" class="w-full focus:outline-none" type="text" placeholder="Masukkan jumlah barang" name="saldo" value="<?= $transaksi['saldo'] ?>" />
      </div>
    </div>
    <h5 class="font-sans text-red-500 font-semibold"><?= isset($validation) && (display_error($validation, 'saldo') != null) ? display_error($validation, 'saldo') : '<br/>' ?></h5>

    <div class="w-full flex flex-row border-2 rounded-lg border-green-200 ">
      <div class="px-2 lg:px-5 flex items-center w-32 bg-green-200 mr-5">
        <h1 class="font-sans text-md md:text-xl font-semibold text-gray-800">Jenis</h1>
      </div>
      <div class="w-full overflow-hidden rounded-lg px-2 py-1">
        <select class="w-full" name="type" id="barang" value="<?= $transaksi['type']  ?>">
           <option <?php echo ($transaksi['type'] == 'in') ? 'selected' : '' ?> value="in">Pemasukan</option>
           <option <?php echo ($transaksi['type'] == 'out') ? 'selected' : '' ?> value="out">Pengeluaran</option>

        </select>
      </div>
    </div>
    <h5 class="font-sans text-red-500 font-semibold"><?= isset($validation) && (display_error($validation, 'type') != null) ? display_error($validation, 'type') : '<br/>' ?></h5>


 
    
   
  </form>
  <div class="w-full flex justify-end mb-10">
    <a href="<?= base_url('/dashboard/keuagan/delete') ?>/<?= $transaksi['id'] ?>">
      <button class="px-5 py-2 rounded-lg font-sans font-semibold text-gray-800 text-xl bg-red-200">Hapus</button>
    </a>
    <button type="submit" form="formTransaksi" class="ml-10 px-5 py-2 rounded-lg font-sans font-semibold text-gray-800 text-xl bg-green-200">Simpan</button>
  </div>
</div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js">
(function($, undefined) {

"use strict";

// When ready.
$(function() {
  
  var $form = $( "#saldo" );
  var $input = $form;

  $input.on( "keyup", function( event ) {
    
    
    // When user select text in the document, also abort.
    var selection = window.getSelection().toString();
    if ( selection !== '' ) {
      return;
    }
    
    // When the arrow keys are pressed, abort.
    if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
      return;
    }
    
    
    var $this = $( this );
    
    // Get the value.
    var input = $this.val();
    
    var input = input.replace(/[\D\s\._\-]+/g, "");
        input = input ? parseInt( input, 10 ) : 0;

        $this.val( function() {
          return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
        } );
  } );
  
  /**
   * ==================================
   * When Form Submitted
   * ==================================
   */
  $form.on( "submit", function( event ) {
    
    var $this = $( this );
    var arr = $this.serializeArray();
  
    for (var i = 0; i < arr.length; i++) {
        arr[i].value = arr[i].value.replace(/[($)\s\._\-]+/g, ''); // Sanitize the values.
    };
    
    console.log( arr );
    
    event.preventDefault();
  });
  
});
})(jQuery);

</script>
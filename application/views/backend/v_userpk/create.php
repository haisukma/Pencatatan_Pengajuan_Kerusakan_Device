<!-- BEGIN: Content -->
<div class="content">
   <div class="intro-y flex items-center mt-3">
      <div class="text-primary font-semibold text-3xl mr-auto">
         Tambah Pengajuan
      </div>
   </div>
   <div class="grid grid-cols-16 gap-6 mt-5">
      <div class="intro-y col-span-12 lg:col-span-6">
         <!-- BEGIN: Form Layout -->
         <form class="" action="<?php echo site_url('Userpk/save') ?>" method="post">
            <div class="intro-y box p-5">
               <div>
                  <label for="crud-form-1" class="form-label">Pengajuan</label>
                  <input id="crud-form-1" type="text" name="id_pengajuan" class="form-control w-full" placeholder="Ad32112xxx"
                     required autocomplete="off">
               </div>
               <div class="mt-3">
                  <label for="crud-form-1" class="form-label">Tanggal Pengajuan</label>
                  <input id="crud-form-1" type="text" name="tanggal_pengajuan" class="form-control w-full" placeholder="28-01-2024"
                     required autocomplete="off">
               </div>
               <div class="mt-3">
                  <label for="crud-form-1" class="form-label">Deskripsi Pengajuan</label>
                  <input id="crud-form-1" type="text" name="deskripsi_pengajuan" class="form-control w-full" placeholder="bluescreen"
                     required autocomplete="off">
               </div>
               <div class="mt-3">
                  <label for="crud-form-1" class="form-label">Lokasi Perangkat</label>
                  <input id="crud-form-1" type="text" name="lokasi_perangkat" class="form-control w-full"
                     placeholder="RuanganIPDS" required autocomplete="off">
               </div>
               <div class="mt-3">
                  <label for="crud-form-1" class="form-label">Nama</label>
                  <textarea name="username" class="form-control" id="" placeholder="ajengxxxxxx" rows="4" cols="4"
                     required autocomplete="off"></textarea>
               </div class="mt-3">
               <div class="text-right mt-5">
                  <a href="<?php echo site_url('Userwp') ?>"><button type="button"
                        class="btn btn-danger w-24 mr-1">Cancel</button></a>
                  <button type="submit" class="btn btn-primary w-24">Save</button>
               </div>
            </div>
         </form>
         <!-- END: Form Layout -->
      </div>
   </div>
</div>
<!-- END: Content -->
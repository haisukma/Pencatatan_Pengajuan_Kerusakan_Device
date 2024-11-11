<!-- BEGIN: Content -->
<div class="content">
  <div class="intro-y flex items-center mt-3">
    <div class="text-primary font-semibold text-3xl mr-auto">
      Edit Data Pengajuan Kerusakan
    </div>
  </div>
  <div class="grid grid-cols-16 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-6">
      <!-- BEGIN: Form Layout -->
      <form class="" action="<?php echo site_url('Pengajuan_Kerusakan/update/' . $edit['id_pengajuan'])
        ?>" method="post">
        <div class="intro-y box p-5">
          <div>
            <label for="crud-form-1" class="form-label">Kode Pengajuan</label>
            <input id="crud-form-1" type="text" name="id_pengajuan" class="form-control w-full" placeholder="<?php echo
              $edit['id_pengajuan'] ?>" value="<?php echo $edit['id_pengajuan'] ?>" disabled>
          </div>
          <div class="mt-3">
            <label for="crud-form-1" class="form-label">Tanggal Pengajuan</label>
            <input id="crud-form-1" type="text" name="tanggal_pengajuan" class="form-control w-full" placeholder="<?php echo
              $edit['tanggal_pengajuan'] ?>" value="<?php echo $edit['tanggal_pengajuan'] ?>">
          </div>
          </div>
          <div class="mt-3">
            <label for="crud-form-1" class="form-label">Deskripsi Kerusakan</label>
            <input id="crud-form-1" type="text" name="deskripsi_kerusakan" class="form-control w-full" placeholder="<?php echo
              $edit['deskripsi_kerusakan'] ?>" value="<?php echo $edit['deskripsi_kerusakan'] ?>" autocomplete="off">
          </div>
          <div class="mt-3">
            <label for="crud-form-1" class="form-label">Status Pengajuan</label>
            <input id="crud-form-1" type="text" name="status_pengajuan" class="form-control w-full" placeholder="<?php echo
              $edit['status_pengajuan'] ?>" value="<?php echo $edit['status_pengajuan'] ?>" autocomplete="off">
          <div class="text-right mt-5">
            <a href="<?php echo site_url('Pengajuan_Kerusakan') ?>"><button type="button"
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
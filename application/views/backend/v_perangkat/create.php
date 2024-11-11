<!-- BEGIN: Content -->
<div class="content">
  <div class="intro-y flex items-center mt-3">
    <div class="text-primary font-semibold text-3xl mr-auto">
      Edit Data Perangkat
    </div>
  </div>
  <div class="grid grid-cols-16 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-6">
      <!-- BEGIN: Form Layout -->
      <form class="" action="<?php echo site_url('Perangkat/update/' . $edit['id_perangkat'])
        ?>" method="post">
        <div class="intro-y box p-5">
          <div>
            <label for="crud-form-1" class="form-label">Kode Perangkat</label>
            <input id="crud-form-1" type="text" name="id_perangkat" class="form-control w-full" placeholder="<?php echo
              $edit['id_perangkat'] ?>" value="<?php echo $edit['id_perangkat'] ?>" disabled>
          </div>
          <div class="mt-3">
            <label for="crud-form-1" class="form-label">Nama Perangkat</label>
            <input id="crud-form-1" type="text" name="nama_perangkat" class="form-control w-full" placeholder="<?php echo
              $edit['nama_perangkat'] ?>" value="<?php echo $edit['nama_perangkat'] ?>">
          </div>
          </div>
          <div class="mt-3">
            <label for="crud-form-1" class="form-label">Merk</label>
            <input id="crud-form-1" type="text" name="merk" class="form-control w-full" placeholder="<?php echo
              $edit['merk'] ?>" value="<?php echo $edit['merk'] ?>" autocomplete="off">
          </div>
          <div class="mt-3">
            <label for="crud-form-1" class="form-label">Serial Number</label>
            <input id="crud-form-1" type="text" name="serial_number" class="form-control w-full" placeholder="<?php echo
              $edit['serial_number'] ?>" value="<?php echo $edit['serial_number'] ?>" autocomplete="off">
          </div>
          <div class="mt-3">
            <label for="crud-form-1" class="form-label">Lokasi Perangkat</label>
            <textarea name="lokasi_perangkat" class="form-control" id="" placeholder="<?php echo $edit['lokasi_perangkat'] ?>" rows="4"
              cols="4" required autocomplete="off"><?php echo $edit['lokasi_perangkat'] ?></textarea>
          </div>
          <div class="text-right mt-5">
            <a href="<?php echo site_url('Perangkat') ?>"><button type="button"
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
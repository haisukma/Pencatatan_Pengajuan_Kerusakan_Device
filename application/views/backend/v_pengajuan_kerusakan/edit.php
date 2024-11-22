<!-- BEGIN: Content -->
<div class="content">
  <div class="intro-y flex items-center mt-3">
    <div class="text-primary font-semibold text-3xl mr-auto">
      Edit Data Pengajuan Perangkat
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
            <label for="crud-form-2" class="form-label">Kode User</label>
            <select data-placeholder="Pilih User" name="id_users" class="tom-select w-full capitalize"
                id="crud-form-2">
                <option value="<?php echo $edit['id_users'] ?>"><?php echo $edit['id_users'] ?>
                </option>
                <?php
                foreach ($user->result_array() as $r) {
                    ?>
                    <option value="<?php echo $r['id_users'], $r['username'] ?>"><?php echo
                            $r['id_users'], ' | ', $r['username']; ?></option>
                <?php } ?>
            </select>
          </div>
          <div class="mt-3">
            <label for="crud-form-2" class="form-label">Kode Perangkat</label>
            <select data-placeholder="Pilih Kode Perangkat" name="id_perangkat" class="tom-select w-full capitalize" 
                id="crud-form-2">
                <option value="<?php echo $edit['id_perangkat'] ?>"><?php echo $edit['id_perangkat'] ?>
                </option>
                <?php
                foreach ($perangkat->result_array() as $r) {
                    ?>
                    <option value="<?php echo $r['id_perangkat'], $r['nama_perangkat'] ?>"><?php echo
                            $r['id_perangkat'], ' | ', $r['nama_perangkat']; ?></option>
                <?php } ?>
            </select>
          </div>
          <div class="mt-3">
            <label for="crud-form-1" class="form-label">Tanggal Pengajuan</label>
            <input id="crud-form-1" type="date" name="tanggal_pengajuan" class="form-control w-full" placeholder="<?php echo
              $edit['tanggal_pengajuan'] ?>" value="<?php echo $edit['tanggal_pengajuan'] ?>">
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
          </div>
          <div class="mt-3">
            <label for="crud-form-2" class="form-label">Status Pengajuan</label>
            <select data-placeholder="Statys Pengajuan" name="status_pengajuan" class="tom-select w-full capitalize" id="crud-form-2">
              <option value="<?php echo $edit['status_pengajuan'] ?>"><?php echo $edit['status_pengajuan'] ?></option>
              <option value="baru">Baru Diajukan</option>
              <option value="sedang diproses">Sedang Diproses</option>
              <option value="selesai">Selesai Diproses</option>
              <option value="ditolak">Ditolak</option>
            </select>
          </div>
        </div>
      </form>
      <!-- END: Form Layout -->
    </div>
  </div>
</div>
<!-- END: Content -->
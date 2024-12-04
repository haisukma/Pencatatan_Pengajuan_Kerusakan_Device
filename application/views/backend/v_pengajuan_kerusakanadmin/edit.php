<!-- BEGIN: Content -->
<div class="content">
  <div class="intro-y flex items-center mt-3">
    <div class="text-primary font-semibold text-3xl mr-auto">
      Edit Data Pengajuan
    </div>
  </div>
  <div class="grid grid-cols-16 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-6">
      <!-- BEGIN: Form Layout -->
      <form class="" action="<?php echo site_url('Pengajuan_KerusakanAdmin/update/' . $edit['id_pengajuan'])
        ?>" method="post">
        <div class="intro-y box p-5">
          <div>
            <label for="crud-form-1" class="form-label">Kode Pengajuan</label>
            <input id="crud-form-1" type="text" name="id_pengajuan" class="form-control w-full" placeholder="<?php echo
              $edit['id_pengajuan'] ?>" value="<?php echo $edit['id_pengajuan'] ?>" disabled>
          </div>
          <div class="mt-3">
                        <label for="crud-form-2" class="form-label">User</label>
                        <select data-placeholder="Pilih User" name="id_users" class="tom-select w-full capitalize"
                            id="crud-form-2">
                            <option value="<?php echo $edit['id_users'] ?>"><?php echo $edit['id_users'] ?>
                            </option>
                            <?php
                            foreach ($getuser->result_array() as $r) {
                                ?>
                                <option value="<?php echo $r['id_users'], $r['username'] ?>"><?php echo
                                        $r['id_users'], ' | ', $r['username']; ?></option>
                            <?php } ?>
                        </select>
          </div>
          <div class="mt-3">
                        <label for="crud-form-2" class="form-label">Perangkat</label>
                        <select data-placeholder="Pilih Perangkat" name="id_perangkat"
                            class="tom-select w-full capitalize" id="crud-form-2">
                            <option value="<?php echo $edit['id_perangkat'] ?>"><?php echo $edit['id_perangkat'] ?>
                            </option>
                            <?php
                            foreach ($getperangkat->result_array() as $r) {
                                ?>
                                <option value="<?php echo $r['id_perangkat'], $r['merk'] ?>"><?php echo
                                        $r['id_perangkat'], ' | ', $r['merk']; ?></option>
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
              <select id="crud-form-1" name="status_pengajuan" class="form-control w-full">
                  <option value="baru" <?php if($edit['status_pengajuan'] == 'baru') echo 'selected'; ?>>Baru Diajukan</option>
                  <option value="sedang diproses" <?php if($edit['status_pengajuan'] == 'sedang diproses') echo 'selected'; ?>>Sedang Diproses</option>
                  <option value="selesai" <?php if($edit['status_pengajuan'] == 'selesai') echo 'selected'; ?>>Selesai Diproses</option>
                  <option value="ditolak" <?php if($edit['status_pengajuan'] == 'ditolak') echo 'selected'; ?>>Ditolak</option>
              </select>
          </div>
          <div class="text-right mt-5">
            <a href="<?php echo site_url('Pengajuan_KerusakanAdmin') ?>"><button type="button"
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
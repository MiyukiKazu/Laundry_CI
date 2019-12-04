<script>
function deleteConfirm(url){
  $('#btn-delete').attr('href', url);
  $('#deleteModal').modal();
}
</script>


<!-- left column -->
<div class="col-md-12">
  <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Pesan Sekarang</h3>

    </div>	


   <form role="form" method="POST" action="<?= base_url('Pesan/add'); ?>">
      <div class="card-body">
        <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#modal-harga"  value="LIST HARGA">List Harga</button><br><br>
        <div class="form-group">
          <label for="ID Pelanggan">ID Pelanggan</label>
          <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?php echo $this->session->userdata('username'); ?>">
        </div>
        
        <div class="form-group">
          <label for="ID Layanan">ID Paket Cucian yang dipilih</label>
          <select class="form-control" id="id_tbarang" name="id_tbarang">
            <?php foreach ($tb as $tb): ?>
            <option value="<?php echo $tb->id_tbarang ?>"><?php echo $tb->id_tbarang ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-body">
        <?= $this->session->flashdata('notif'); ?>
      </div>

       <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>

<div class="col-md-12">
  <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Pesanan Anda</h3>
    </div>  
    <table id="example2" class="table table-bordered table-hover">
      <thead>
      <tr>
        <th>ID Transaksi</th>
        <th>ID Pelanggan</th>
        <th>ID Paket</th>
        <th>Status Rincian</th>
        <th>Tanggal Terima</th>
        <th>Tanggal Selsai</th>
        <th>Jumlah</th>
        <th>Harga</th>
      </tr>
      </thead>
      <tbody>
      <?php 
        $query = $this->db->query("SELECT * FROM detail_cucian,status_cucian WHERE id_pelanggan = 'yuki98' AND detail_cucian.id_statuscucian = status_cucian.id_statuscucian");
            foreach ($query->result() as $row)
            {
                  echo "<tr>";
                    echo "<td>$row->id_transaksi</td>";
                    echo "<td>$row->id_pelanggan</td>";
                    echo "<td>$row->id_tbarang</td>";
                    echo "<td>$row->nama_statuscucian</td>";
                    echo "<td>$row->tgl_terima</td>";
                    echo "<td>$row->tgl_selesai</td>";
                    echo "<td>$row->jumlah</td>";
                    echo "<td>$row->harga</td>";
                  echo "</tr>";
            } 
      ?>
      </tbody>
      <tfoot>
      <tr>
        <th>ID Transaksi</th>
        <th>ID Pelanggan</th>
        <th>ID Paket</th>
        <th>Status Rincian</th>
        <th>Tanggal Terima</th>
        <th>Tanggal Selsai</th>
        <th>Jumlah</th>
        <th>Harga</th>
      </tr>
      </tfoot>
    </table>

  </div>
</div>


<!-- Logout Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-harga">
  <div class="modal-dialog">
    <div class="modal-content bg-primary">
      <div class="modal-header">
        <h4 class="modal-title">List Daftar Harga</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="card bg-primary"> 
          <table id="example2" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>ID</th>
            <th>ID Barang</th>
            <th>ID Jenis Layanan</th>
            <th>ID Paket</th>
            <th>Harga /Kg atau /pcs</th>
          </tr>
          </thead>
          <tbody>
            <?php foreach ($tbm as $tb): ?>
            <tr>
              <td width="5%">
                <?php echo $tb->id_tbarang ?>
              </td>
              <td width="20%">
                <?php 
                $query = $this->db->query("SELECT nama_barang FROM jenis_barang WHERE id_jnsbarang = '$tb->id_jnsbarang' ");
                foreach ($query->result() as $row)
                {
                        echo $row->nama_barang;
                }
                ?>
              </td>
              <td width="20%">
                <?php 
                $query = $this->db->query("SELECT nama_layanan FROM layanan WHERE id_layanan = '$tb->id_layanan' ");
                foreach ($query->result() as $row)
                {
                        echo $row->nama_layanan;
                }
                ?>
              </td>
              <td width="20%">
                <?php 
                $query = $this->db->query("SELECT nama_paket FROM paket WHERE id_paket = '$tb->id_paket' ");
                foreach ($query->result() as $row)
                {
                        echo $row->nama_paket;
                }
                ?>
              </td>
              <td width="20%">
                <?php echo $tb->harga?>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
          <tr>
            <th>ID</th>
            <th>ID Barang</th>
            <th>ID Jenis Layanan</th>
            <th>ID Paket</th>
            <th>Harga</th>
          </tr>
          </tfoot>
        </table>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
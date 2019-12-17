<script>
function deleteConfirm(url){
  $('#btn-delete').attr('href', url);
  $('#deleteModal').modal();
}
</script>


<!-- left column -->
<div class="col-md-12">
  <!-- general form elements -->
  
</div>

<div class="col-md-12">
  <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Pesanan Masuk</h3>
    </div>  
    <table id="example2" class="table table-bordered table-hover">
      <thead>
      <tr>
        <th>ID Transaksi</th>
        <th>ID Pelanggan</th>
        <th>ID Paket</th>
        <th>Status Cucian</th>
        <th>Tanggal Terima</th>
        <th>Tanggal Selsai</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Ubah Status<th>
      </tr>
      </thead>
      <tbody>
      <?php 
        $query = $this->db->query("SELECT * FROM detail_cucian,status_cucian WHERE  detail_cucian.id_statuscucian = status_cucian.id_statuscucian AND detail_cucian.id_statuscucian = 1 OR detail_cucian.id_statuscucian = status_cucian.id_statuscucian AND detail_cucian.id_statuscucian = 2 ORDER BY id_transaksi DESC");
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
                    echo '<td width="5%%">';
                    echo'<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit'.$row->id_transaksi.'" >Edit' ;
                    echo'</button>';
                    echo'</td>';
                  echo "</tr>";
            } 
      ?>
      </tbody>
      <tfoot>
      <tr>
        <th>ID Transaksi</th>
        <th>ID Pelanggan</th>
        <th>ID Paket</th>
        <th>Status Cucian</th>
        <th>Tanggal Terima</th>
        <th>Tanggal Selsai</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Ubah Status<th>
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



<?php 
        $modalq = $this->db->query("SELECT * FROM detail_cucian,status_cucian WHERE  detail_cucian.id_statuscucian = status_cucian.id_statuscucian");
        date_default_timezone_set('Asia/Jakarta'); 
        $now = date('Y-m-d H:i:s');
?>
<?php foreach ($modalq->result() as $jen) :?>
<div class="modal fade" id="modal-edit<?php echo $jen->id_transaksi;?>">
  <div class="modal-dialog">
    <div class="modal-content bg-primary">
      <div class="modal-header">
        <h4 class="modal-title">Ubah Status Cucian</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="card bg-primary"> 
         <form role="form" method="POST" action="<?php echo site_url('Entry/edit/'.$jen->id_transaksi) ?>">
            <div class="card-body">
              <div class="form-group">
                <label for="id_layanan">Status Rincian Cucian </label>
                <input type="text" class="form-control" id="status_cucian" name="status_cucian" placeholder="Enter ID" value="<?php echo $jen->id_statuscucian; ?>">
              </div>
              <div class="form-group">
                <label for="id_layanan">Tanggal Terima</label>
                <input type="text" class="form-control" id="tanggal_terima" name="tanggal_terima" placeholder="Enter ID" value="<?php echo $now; ?>">
              </div>
              <p>
              Keterangan Status : <br>
              1. Waiting <br>
              2. Accepted <br>
              3. On Procces <br>
              4. Done <br>
              </p>
            </div>
            <!-- /.card-body -->
             <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
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
<?php endforeach; ?>
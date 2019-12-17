<script>
function deleteConfirm(url){
  $('#btn-delete').attr('href', url);
  $('#deleteModal').modal();
}
</script>
<div class="row">
  <div class="col-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Data Jenis Barang</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
          <?= $this->session->flashdata('success'); ?>
       </div>
      <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>ID_Jenis_barang</th>
            <th>Nama_Barang</th>
            <th>Satuan</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
          </thead>
          <tbody>
            <?php foreach ($jenis as $jen): ?>
            <tr>
              <td width="20%">
                <?php echo $jen->id_jnsbarang ?>
              </td>
              <td width="50%">
                <?php echo $jen->nama_barang ?>
              </td>
              <td width="20%">
                <?php echo $jen->satuan ?>
              </td>
              <td width="5%%">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit<?php echo $jen->id_jnsbarang; ?>" >
                  Edit 
                </button>
              </td>
              <td width="5%%">
                <a onclick="deleteConfirm('<?php echo site_url('Jenis_barang/delete/'.$jen->id_jnsbarang) ?>')"
    href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
          <tr>
            <th>ID_Jenis_barang</th>
            <th>Nama_Barang</th>
            <th>Satuan</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
<!-- left column -->
<div class="col-md-12">
  <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">INPUT BARANG</h3>
    </div>	


   <form role="form" method="POST" action="<?= base_url('Jenis_barang/add'); ?>">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">ID Jenis Barang</label>
          <input type="text" class="form-control" id="id_barang" name="id_barang" placeholder="Enter ID">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Nama Barang</label>
          <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Enter Nama Barang">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Satuan</label>
          <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Enter Satuan">
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

<?php foreach ($jenis as $jen): ?>
<div class="modal fade" id="modal-edit<?php echo $jen->id_jnsbarang;?>">
  <div class="modal-dialog">
    <div class="modal-content bg-primary">
      <div class="modal-header">
        <h4 class="modal-title">Edit Barang</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="card bg-primary"> 
         <form role="form" method="POST" action="<?= base_url('Jenis_barang/edit'); ?>">
            <div class="card-body">
              <div class="form-group">
                <label for="id_barang">ID Jenis Barang</label>
                <input type="text" class="form-control" readonly id="id_barang" name="id_barange" placeholder="Enter ID" value="<?php echo $jen->id_jnsbarang; ?>">
              </div>
              <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barange" placeholder="Enter Nama Barang" value="<?php echo $jen->nama_barang; ?>">
              </div>
              <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuane" placeholder="Enter Satuan" value="<?php echo $jen->satuan; ?>">
              </div>
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
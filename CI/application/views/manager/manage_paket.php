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
        <h3 class="card-title">Data paket</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
          <?= $this->session->flashdata('success'); ?>
       </div>
      <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>ID paket</th>
            <th>Nama paket</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
          </thead>
          <tbody>
            <?php foreach ($jenis as $jen): ?>
            <tr>
              <td width="20%">
                <?php echo $jen->id_paket ?>
              </td>
              <td width="50%">
                <?php echo $jen->nama_paket ?>
              </td>
              <td width="5%%">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit<?php echo $jen->id_paket; ?>" >
                  Edit 
                </button>
              </td>
              <td width="5%%">
                <a onclick="deleteConfirm('<?php echo site_url('paket/delete/'.$jen->id_paket) ?>')"
    href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
          <tr>
            <th>ID_paket</th>
            <th>nama_paket</th>
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
      <h3 class="card-title">INPUT PAKET</h3>
    </div>	


   <form role="form" method="POST" action="<?= base_url('paket/add'); ?>">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">ID Paket</label>
          <input type="text" class="form-control" id="id_paket" name="id_paket" placeholder="Enter ID">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Nama Paket</label>
          <input type="text" class="form-control" id="nama_paket" name="nama_paket" placeholder="Enter Nama Barang">
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
<div class="modal fade" id="modal-edit<?php echo $jen->id_paket;?>">
  <div class="modal-dialog">
    <div class="modal-content bg-primary">
      <div class="modal-header">
        <h4 class="modal-title">Edit Paket</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="card bg-primary"> 
         <form role="form" method="POST" action="<?= base_url('paket/edit'); ?>">
            <div class="card-body">
              <div class="form-group">
                <label for="id_paket">ID Paket</label>
                <input type="text" class="form-control" readonly id="id_paket" name="id_pakete" placeholder="Enter ID" value="<?php echo $jen->id_paket; ?>">
              </div>
              <div class="form-group">
                <label for="nama_paket">Nama Paket</label>
                <input type="text" class="form-control" id="nama_paket" name="nama_pakete" placeholder="Enter Nama Barang" value="<?php echo $jen->nama_paket; ?>">
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
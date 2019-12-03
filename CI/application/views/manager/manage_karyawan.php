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
        <h3 class="card-title">Data karyawan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
          <?= $this->session->flashdata('success'); ?>
       </div>
      <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Nama karyawan</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
          </thead>
          <tbody>
            <?php foreach ($jenis as $jen): ?>
            <tr>
              <td>
                <?php echo $jen->id ?>
              </td>
              <td>
                <?php echo $jen->username ?>
              </td>
              <td>
                <?php echo $jen->nama ?>
              </td>
              <td>
                <?php echo $jen->alamat ?>
              </td>
              <td>
                <?php echo $jen->no_telp ?>
              </td>
              <td width="5%">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit<?php echo $jen->id; ?>" >
                  Edit 
                </button>
              </td>
              <td width="5%">
                <a onclick="deleteConfirm('<?php echo site_url('Manage_karyawan/delete/'.$jen->id) ?>')"
    href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <th>ID</th>
            <th>Username</th>
            <th>Nama karyawan</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Edit</th>
            <th>Delete</th>
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
      <h3 class="card-title">INPUT karyawan</h3>
    </div>	


   <form role="form" method="POST" action="<?= base_url('Manage_karyawan/add'); ?>">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputPassword1">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Nama karyawan</label>
          <input type="text" class="form-control" id="nama_karyawan" name="nama" placeholder="Enter Nama karyawan">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Alamat</label>
          <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Enter Alamat karyawan">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">No Telp</label>
          <input type="text" class="form-control" id="notelp" name="no_telp" placeholder="Enter No Telp karyawan">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="notelp" name="password" placeholder="Enter Password karyawan">
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
<div class="modal fade" id="modal-edit<?php echo $jen->id;?>">
  <div class="modal-dialog">
    <div class="modal-content bg-primary">
      <div class="modal-header">
        <h4 class="modal-title">Edit karyawan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="card bg-primary"> 
         <form role="form" method="POST" action="<?= base_url('Manage_karyawan/edit'); ?>">
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">ID karyawan</label>
                  <input type="text" class="form-control" readonly id="id" name="id" placeholder="Enter ID" value="<?php echo $jen->id; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Username</label>
                  <input type="text" class="form-control" id="username" name="usernamee" placeholder="Enter Username" value="<?php echo $jen->username; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama karyawan</label>
                  <input type="text" class="form-control" id="nama" name="namae" placeholder="Enter Nama karyawan" value="<?php echo $jen->nama; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <input type="text" class="form-control" id="alamat" name="alamate" placeholder="Enter Alamat karyawan" value="<?php echo $jen->alamat; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">No Telp</label>
                  <input type="text" class="form-control" id="no_telp" name="no_telpe" placeholder="Enter No Telp karyawan" value="<?php echo $jen->no_telp; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="text" class="form-control" id="password" name="passworde" placeholder="Enter Pass" value="<?php echo $jen->password; ?>">
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
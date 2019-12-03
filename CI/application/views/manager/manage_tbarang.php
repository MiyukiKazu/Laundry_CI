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
        <h3 class="card-title">Data TBarang</h3>
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
            <th>ID Barang</th>
            <th>ID Jenis Layanan</th>
            <th>ID Paket</th>
            <th>Harga</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
          </thead>
          <tbody>
            <?php foreach ($tb as $tb): ?>
            <tr>
              <td width="5%">
                <?php echo $tb->id_tbarang ?>
              </td>
              <td width="20%">
                <?php echo $tb->id_jnsbarang ?>
              </td>
              <td width="20%">
                <?php echo $tb->id_layanan ?>
              </td>
              <td width="20%">
                <?php echo $tb->id_paket?>
              </td>
              <td width="20%">
                <?php echo $tb->harga?>
              </td>
              <td width="5%%">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit<?php echo $tb->id_tbarang; ?>" >
                  Edit 
                </button>
              </td>
              <td width="5%%">
                <a onclick="deleteConfirm('<?php echo site_url('Tbarang/delete/'.$tb->id_tbarang) ?>')"
    href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
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
      <h3 class="card-title">INPUT TBarang</h3>
    </div>	


   <form role="form" method="POST" action="<?= base_url('Tbarang/add'); ?>">
      <div class="card-body">

        <div class="form-group">
          <label for="ID Jenis">ID Jenis Barang</label>
          <select class="form-control" id="id_jenis" name="id_jenis">
            <?php foreach ($jenis as $jen): ?>
            <option value="<?php echo $jen->id_jnsbarang?>"><?php echo $jen->nama_barang ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        
        <div class="form-group">
          <label for="ID Layanan">ID Layanan</label>
          <select class="form-control" id="id_layanan" name="id_layanan">
            <?php foreach ($layanan as $lay): ?>
            <option value="<?php echo $lay->id_layanan ?>"><?php echo $lay->nama_layanan ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label for="ID Layanan">ID Paket</label>
          <select class="form-control" id="id_paket" name="id_paket">
            <?php foreach ($paket as $pak): ?>
            <option value="<?php echo $pak->id_paket ?>"><?php echo $pak->nama_paket ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label for="Harga">Harga</label>
          <input type="text" class="form-control" id="harga" name="harga" placeholder="Enter Harga">
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

<?php foreach ($tbm as $ta): ?>
<div class="modal fade" id="modal-edit<?php echo $ta->id_tbarang;?>">
  <div class="modal-dialog">
    <div class="modal-content bg-primary">
      <div class="modal-header">
        <h4 class="modal-title">Edit Tbarang</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="card bg-primary"> 
         <form role="form" method="POST" action="<?= base_url('Tbarang/edit'); ?>">
            <div class="card-body">
              <div class="form-group">
                <input type="hidden" class="form-control" id="id_tbarangu" name="id_tbarangu"  value="<?php echo $ta->id_tbarang;?>">
                <input type="hidden" class="form-control" id="id_jenisu" name="id_jenisu"  value="<?php echo $ta->id_jnsbarang;?>">
                <input type="hidden" class="form-control" id="id_layananu" name="id_layananu"  value="<?php echo $ta->id_layanan;?>">
                <input type="hidden" class="form-control" id="id_paketu" name="id_paketu"  value="<?php echo $ta->id_paket;?>">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" id="hargau" name="hargau"  value="<?php echo $ta->harga;?>">
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
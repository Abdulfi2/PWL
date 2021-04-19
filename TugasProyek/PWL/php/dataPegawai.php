<?php
require_once '../models/Pegawai.php';
//ciptakan object dari class Pegawai
$obj = new Pegawai();
//panggil method tampilkan data
$rs = $obj->dataPegawai();
?>
<h3>Data Pegawai</h3>
<?php
if(isset($member)){
?>
<a href="index.php?hal=formPegawai" class="btn btn-primary">Tambah</a>
<?php } ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">NIP</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Agama</th>
      <th scope="col">Id Divisi</th>
      <th scope="col">Kategori</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $no = 1;
  foreach($rs as $prod){  
  ?>
    <tr>
      <td><?= $no; ?></td>
      <td><?= $prod['nip']; ?></td>
      <td><?= $prod['nama']; ?></td>
      <td><?= $prod['email']; ?></td>
      <td><?= $prod['agama']; ?></td>
      <td><?= $prod['iddivisi']; ?></td>
      <td><?= $prod['kategori']; ?></td>
      <td>
      <form method="POST" action="../controllers/PegawaiController.php">
      <a href="../php/index.php?hal=detailPegawai&id=<?= $prod['id']; ?>"
         class="btn btn-info"><i class="fa fa-asterisk" aria-hidden="true"></i></a>
      <?php
      $role = $member['role'];
      if(isset($member)){
      ?>   
      <a href="../php/index.php?hal=formEditPegawai&id=<?= $prod['id']; ?>"
         class="btn btn-warning"><i class="fas fa-user-edit" aria-hidden="true"></i></a>
         <?php
          if($role != 'staff'){
          ?> 
        <button name="proses" value="hapus"
         onclick="return confirm('Anda Yakin Data diHapus?')"
         class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
        <?php } ?>
         <input type="hidden" name="idx" value="<?= $prod['id']; ?>" />
         <?php } ?> 
      </form>   
      </td>
    </tr>
  <?php 
  $no++;
  }
  ?>  
  </tbody>
</table>
<code>JAGA KERAHASIAAN DATA ANDA, KARENA ITU SANGAT BERHARGA!</code>
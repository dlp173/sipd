<h2>Daftar Mahasiswa</h2>
 
<table>
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Alamat</th>
    </tr>
    <?php $i = 0 ?>
    <?php foreach($mahasiswa as $m): ?>
    <tr>
        <td><?php echo $i++ ?></td>
        <td><?php echo $m->nim ?></td>
        <td><?php echo $m->nama ?></td>
        <td><?php echo $m->alamat ?></td>
    </tr>
    <?php endforeach ?>
</table>
<?php echo anchor('data_mahasiswa/add_multiple','Tambah Data') ?>
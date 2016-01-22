<h2>Multiple Form Input Mahasiswa</h2>
<form action="" method="post">
    <table>
        <tr>
            <td>No</td>
            <td>NIM</td>
            <td>Nama</td>
            <td>Alamat</td>
        </tr>
        <?php for($i=1;$i<=$banyak_data;$i++): ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><input name="data[<?php echo $i ?>][nim]" /></td>
            <td><input name="data[<?php echo $i ?>][nama]" /></td>
            <td><input name="data[<?php echo $i ?>][alamat]" /></td>
        </tr>
        <?php endfor ?>
    </table>
    <input type="submit" value="simpan" />
</form>
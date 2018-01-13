<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 1/4/18
 * Time: 01:41 AM
 */
    include "koneksi.php";

    $kode_mapel = $_POST['kode_mapel'];
    $results = mysql_query("SELECT g.id_guru, g.nama_guru FROM guru g INNER JOIN mengajar m ON g.id_guru = m.id_guru INNER JOIN mata_pelajaran m2 ON m.kode_mapel = m2.kode_mapel WHERE m.kode_mapel = ".$_POST['kode_mapel']);
    $jum = mysql_num_rows($results);

    if($jum > 0)
    {
        while($data = mysql_fetch_assoc($results))
        {
            ?>
                <option>----- Pilih pengajar -----</option>
                <option value="<?php echo $data['id_guru']?>"><?php echo $data['nama_guru']?></option>
            <?php
        }
    }
    else
    {
        ?>
            <option value="NULL">Pengajar Belum Ada / Kegiatan</option>
        <?php
    }
?>
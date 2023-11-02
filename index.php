<!DOCTYPE html>
<html>

<head>
  <title>Simple CRUD by ADAM MALIK</title>
</head>

<body>
  <h2>Simple CRUD</h2>
  <p><a href="index.php">Beranda</a>/<a href="tambah.php">Tambah Data</a></p>
  <h3>Data Siswa</h3>
  <table cellpadding="5" cellspacing="0" border="2" bgcolor="Yellow">
    <tr bgcolor="Cyan">
      <th>No.</th>
      <th>Nis</th>
      <th>Nama Lengkap</th>
      <th>Kelas</th>
      <th>Jurusan</th>
      <th>Opsi</th>
    </tr>
    <?php
    //file koneksi ke database
    include('koneksi.php');
    //query ke database dg SELECT table siswa di urutkan berdasarkan NIS paling besar
    $query = mysql_query("SELECT*FROM siswa ORDER BY Nis DESC") or die(mysql_eror());
    //cek, apakah hasil query diatas mendapatkan hasil atau tidak (data kosong atau tidak)
    if (mysql_num_rows($query) == 0) { //ini artinya jika data hasil query di atas kosong
      //jika data kosong, maka akan menampilkan row kosong
      echo '</tr><td colspan"6">Tidak Ada Data!</td></tr>';
    } else { //else ini artinya jika data hasil query ada (data diu data base tidak kosong)
      //jika data tidak kosong, maka akan melakukan perulangan while
      $no = 1; //membuat variabel $no untuk memnuat nomor urut
      while ($data = mysql_fetch_assoc($query)) { //perulangan while dg membuat variabel $data yang akan mengambil data di database
        //menampilkan row dengan database
        echo '<tr>';
        echo '<td>' . $no . '</td>'; //menampiplkan nomor urut
        echo '<td>' . $data['Nis'] . '</td>'; //menampilkan data nis dari database
        echo '<td>' . $data['Nama'] . '</td>'; //menampilkan data nama lengkap darui database
        echo '<td>' . $data['Kelas'] . '</td>'; //menampilkan data kelas dari database
        echo '<td>' . $data['Jurusan'] . '</td>'; //menampilkan data jurusan dari database
        echo '<td><a href="edit.php?id=' . $data['id'] . '">Edit</a>/<a href="hapus.php?id=' . $data['id'] . '"onclick="return confirm(\'Yakin?\')">Hapus</a></td>'; //menampilkan link edit dan hapus dimana tiap link terdapatGET id-> ?id=siswa_id
        echo '</tr>';
        $no++; //menambahkan jumlah nomor urut setiap row
      }
    }
    ?>
  </table>
</body>

</html>
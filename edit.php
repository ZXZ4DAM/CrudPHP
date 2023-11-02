<!DOCTYPE <!DOCTYPE html>
<html>

<head>
    <title>Simple CRUD by Adam Malik</title>
</head>

<body>
    <h2>simple CRUD</h2>
    <p><a href="index.php">Beranda</a>/<a href="tambah.php">Tambah Data</a></p>
    <?php
    //proses mengambil data kedatabase untuk di tampilkan di form edit berdasarkan siswa_id yang didapatkan dari GET id ->edit.php?id=siswa_id
    //include atau memasukan file koneksi ke database
    include('koneksi.php');
    //membuat variabel $id yang nilainya adalah dari URL GET id->edit.php?id=siswa_id
    $id = $_GET['id'];
    //melakukan query ke database dgn SELECT table siswa dengan kondisi WHERE siswa_id = '$id'
    $show = mysql_query("SELECT*FROM siswa WHERE id='$id'");
    //cek apakah data dari hasil query ada atau tidak
    if (mysql_num_rows($show) == 0) {
        //jika tidak ada data yang sesuai maka akan langsung diarahkan ke halaman kedapan atau beranda->index.php

    } else {
        //jika data ditemukan , maka membuat variabel $data 
        $data = mysql_fetch_assoc($show); //mengambil data kedatabase yang nantinya akan di tampilkan dib from edit di bawah 
    }
    ?>
    <form action="edit-proses.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- membuat inputan hidden dan nilainya adalah siswa_id-->
        <table cellpadding="3" cellspacing="0">
            <tr>
                <td>NIS</td>
                <td>:</td>
                <td><input type="text" name="Nis" size="30" value="<?php echo $data['Nis']; ?>" required></td> <!-- value diambil dari hasil query-->
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><input type="text" name="Nama" size="30" value="<?php echo $data['Nama']; ?>" required></td>
                <!-- value diambil dari hasil query-->
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>
                    <select name="Kelas" required>
                        <option value="">Pilih Kelas</option>
                        <option value="X" <?php if ($data['Kelas'] == 'X') {
                                                echo 'selected';
                                            } ?>>X</option><!--jika data di database sama dengan value maka akan  terselect/terpilih-->
                        <option value="XI" <?php if ($data['Kelas'] == 'XI') {
                                                echo 'selected';
                                            } ?>>XI</option><!--jika data di database sama dengan value maka akan  terselect/terpilih-->
                        <option value="XII" <?php if ($data['Kelas'] == 'XII') {
                                                echo 'selected';
                                            } ?>>XII</option><!--jika data di database sama dengan value maka akan  terselect/terpilih-->
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td>
                    <select name="Jurusan" required>
                        <option value="">Pilih Jurusan</option>
                        <option value="Rekayasa Perangkat Lunak" <?php if ($data['Jurusan'] == 'Rekayasa Perangkat Lunak') {
                                                                        echo 'selected';
                                                                    } ?>>Rekayasa Perangkat Lunak</option><!--Jika data didatabase sama dengan value maka akan teselect/terpilih-->
                        <option value="Komputer dan Jaringan" <?php if ($data['Jurusan'] == 'Komputer dan jaringan') {
                                                                    echo 'selected';
                                                                } ?>>Komputer dan Jaringan</option><!--Jika data didatabase sama dengan value maka akan teselect/terpilih-->
                        <option value="Multimedia" <?php if ($data['Jurusan'] == 'Multimedia') {
                                                        echo 'selected';
                                                    } ?>>Multimedia</option><!--Jika data didatabase sama dengan value maka akan teselect/terpilih-->
                        <option value="Akutansi" <?php if ($data['Jurusan'] == 'Akutansi') {
                                                        echo 'selected';
                                                    } ?>>Akutansi</option><!--Jika data didatabase sama dengan value maka akan teselect/terpilih-->
                        <option value="Perbankan" <?php if ($data['Jurusan'] == 'Perbankan') {
                                                        echo 'selected';
                                                    } ?>>Perbankan</option><!--Jika data didatabase sama dengan value maka akan teselect/terpilih-->
                        <option value="Pemasaran" <?php if ($data['Jurusan'] == 'Pemasaran') {
                                                        echo 'selected';
                                                    } ?>>Pemasaran</option><!--Jika data didatabase sama dengan value maka akan teselect/terpilih-->
                    </select>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td><input type="submit" name="simpan" value="simpan"></td>
            </tr>
        </table>
    </form>
</body>

</html>
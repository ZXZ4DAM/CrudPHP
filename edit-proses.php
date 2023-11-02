<?php
//mulai proses edit data 

//cek dahulu, jika tombol simpan di klik
if(isset($_POST['simpan'])){
//include atau memasukan file koneksi ke database
include('koneksi.php');
//jika tombol benar diklik maka lanjut prosesnya
$id = $_POST['id']; //membuat variabel $id dan datanya dari inputan dari hidden id
$nis = $_POST['Nis']; //membuat variabel $nis dan datanya dari inputan dari NIS 
$nama = $_POST['Nama']; //membuat variabel $nama dan datanya dari Nama Lengkap
$kelas = $_POST['Kelas']; //membuat variabel $kelas dan datanya dari inputan dropdown Kelas
$jurusan = $_POST['Jurusan']; // membuat variabel $jurusan dan data inputannya dari dropdown Jurusan
//melakuan query dari dengan perintah UPDATE untuk update ke database dengan kondisi WHERE siswa_id='$id'<-diambil dari inputan hidden id 
$update = mysql_query("UPDATE siswa SET Nis='$nis',Nama='$nama',Kelas='$kelas',Jurusan='$jurusan' WHERE id='$id'")or die(mysql_error());
//jika query update sukses
if($update){
echo 'DATA berhasil disimpan!'; //Pesan jika proses simpan sukses
echo '<a href="index.php">Kembali</a>';//membuat Link kembali ke halaman edit
}else{
echo 'GAGAL menyimpan data!'; //pesan jika proses simpan gagal
echo '<a href="edit.php">Kembali</a>';//membuat Link kembali ke halaman edit
}

}else{//jika tidak terdeteksi tombol simpan di klik

//redirect atau dikembalikan ke halaman edit
echo '<script>window.history.back()</script>';

}
?>
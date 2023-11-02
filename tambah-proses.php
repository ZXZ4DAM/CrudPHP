<?php
//mulai proses tambah data 

//cek dahulu, jika tombol tambah di klik 
if(isset($_POST['tambah'])){
//include atau memasukan file koneksi ke database
include('koneksi.php');
//jika tombol benar diklik maka lanjut prosesnya
$nis=$_POST['nis']; //membuat variabel $nis dan datanya dari inputan dari NIS 
$nama=$_POST['nama']; //membuat variabel $nama dan datanya dari Nama Lengkap
$kelas=$_POST['kelas']; //membuat variabel $kelas dan datanya dari inputan dropdown Kelas
$jurusan=$_POST['jurusan']; // membuat variabel $jurusan dan data inputannya dari dropdown Jurusan
//melakuan query dengan perintah INSERT INTO untuk memasukan data ke database
$input = mysql_query("INSERT INTO siswa VALUES(NULL,'$nis','$nama','$kelas','$jurusan')") or die (mysql_error());
//jika query input sukses
if($input){
echo 'DATA berhasil di tambahkan!'; //Pesan jika proses tambah sukses
echo '<a href="index.php?id='.$id.'">Kembali</a>';//membuat Link kembali ke halaman edit
}else{
echo 'GAGAL menyimpan data!'; //pesan jika proses tambah gagal
echo '<a href="edit.php?id='.$id.'">Kembali</a>';//membuat Link kembali ke halaman edit
}

}else{//jika tidak terdeteksi tombol simpan di klik

//redirect atau dikembalikan ke halaman tambah
echo '<script>window.history.back()</script>';

}
?>
<?php

    //panggil koneksi database
    include "koneksi.php";

    //uji jika tombol simpan di klik
    if(isset($_POST['bsimpan'])) {

        //persiapan simpan data baru
        $simpan = mysqli_query($koneksi, "INSERT INTO tmhs (nim, nama, alamat, jurusan)
                                        VALUES ('$_POST[tnim]',
                                                '$_POST[tnama]',
                                                '$_POST[talamat]',
                                                '$_POST[tjurusan]')");

        //jika simpan sukses
        if($simpan) {
            echo "<script>
                    alert('Simpan data Sukeses!');
                    document.location='index.php';
                    </script>";
        } else {
            echo "<script>
                    alert('Simpan data Gagal!');
                    document.location='index.php';
                    </script>";
        }
    }


     //uji jika tombol Edit di klik
     if(isset($_POST['bedit'])) {

        //persiapan Edit data baru
        $edit = mysqli_query($koneksi, "UPDATE tmhs SET 
                                                        'nim = $_POST[tnim]',
                                                        'nama= $_POST[tnama]',
                                                        'alamat = $_POST[talamat]',
                                                        'jurusan= $_POST[tjurusan]'
                                                        WHERE id_mhs = '$_POST[id_mhs]'
                                                        ");
        //jika Edit sukses
        if($edit) {
            echo "<script>
                    alert('Edit data Sukeses!');
                    document.location='index.php';
                    </script>";
        } else {
            echo "<script>
                    alert('Edit data Gagal!');
                    document.location='index.php';
                    </script>";
        }
    }
?>
<?php
  //panggil koneksi database
  include "koneksi.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.css" rel="stylesheet" >
    <link rel="icon" href="Asset/icon.png" type="image/x-icon">
    <title>My Website</title>
  </head>
  <body>
    <div class="mt-3">
      <div class="container">
        <h3 class="text-center"> Pengisian Data</h3>
        <h3 class="text-center">My Data</h3>
      </div>
    </div>

    <div class="card mt-3">
  <div class="card-header bg-primary text-light">
   Data Mahasiswa
  </div>
  <div class="card-body">
           <!-- Button trigger modal -->
           <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
              Tambah data
            </button>
      <table class="table table-bordered table-striped table-hover">
        <tr>
          <th>No.</th>
          <th>NIM</th>
          <th>Nama Lengkap</th>
          <th>Alamat</th>
          <th>Jurusan</th>
          <th>Aksi</th>
        </tr>

        <?php
            //persiapan menampilkan data
            $no= 1;
            $tampil = mysqli_query($koneksi, "SELECT * FROM tmhs ORDER BY id_mhs DESC");
            while($data = mysqli_fetch_array($tampil)) : 

        ?>

        <tr>
          <td><?=$no++ ?></td>
          <td><?=$data['nim'] ?></td>
          <td><?=$data['nama'] ?></td>
          <td><?=$data['alamat'] ?></td>
          <td><?=$data['jurusan'] ?></td>
          <td>
            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit <?= $no ?>">Edit</a>
            <a href="#" class="btn btn-danger">Hapus</a>
          </td>
        </tr>
              

              
        <!-- awal Modal  edit-->
            <div class="modal fade modal-lg" id="modalEdit <?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Form  Edit Data Mahasisawa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form method="POST" action="aksi.php">
                    <input type="hidden" name="id_mhs" value="<?=$data['id_mhs']?>">
                  <div class="modal-body">
                      

                      <div class="mb-3">
                          <label class="form-label">NIM</label>
                          <input  class="form-control" name="tnim" value="<?= $data['nim']?>" placeholder="Masukkan NIM Anda!">
                      </div>

                      <div class="mb-3">
                          <label class="form-label">Nama lengkap</label>
                          <input class="form-control" name="tnama" value="<?= $data['nama']?>" placeholder="Masukkan Nama Lengkap  Anda!">
                      </div>

                    <div class="mb-3">
                      <label class="form-label">Alamat</label>
                      <textarea class="form-control" name="talamat" rows="3"><?= $data['alamat']?></textarea>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Jurusan</label>
                      <select class="form-label" name="tjurusan">
                        <option value="<?= $data['jurusan']?>"><?= $data['jurusan']?> </option>
                        <option value="D3- Teknik Mesin">D3 - Teknik Mesin</option>
                        <option value="S1- Teknik Fiksi">S1- Teknik Fiksi</option>
                        <option value="S1- Teknik Informatika">S1- Teknik Informatika</option>
                      </select>
                    </div>

                     

                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="bedit">Edit</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
        <!-- akhir Modal edit-->  

                                     
        <?php endwhile; ?>
      </table>

             

        <!-- Modal -->
            <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Form Data Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form method="POST" action="aksi.php">
                  <div class="modal-body">
                      

                      <div class="mb-3">
                          <label class="form-label">NIM</label>
                          <input  class="form-control" name="tnim" placeholder="Masukkan NIM Anda!">
                      </div>

                      <div class="mb-3">
                          <label class="form-label">Nama lengkap</label>
                          <input class="form-control" name="tnama" placeholder="Masukkan Nama Lengkap  Anda!">
                      </div>

                    <div class="mb-3">
                      <label class="form-label">Alamat</label>
                      <textarea class="form-control" name="talamat" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Jurusan</label>
                      <select class="form-label" name="tjurusan">
                        <option></option>
                        <option value="D3- Teknik Mesin">D3 - Teknik Mesin</option>
                        <option value="S1- Teknik Fiksi">S1- Teknik Fiksi</option>
                        <option value="S1- Teknik Informatika">S1- Teknik Informatika</option>
                      </select>
                    </div>

                     

                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
        <!-- akhir Modal -->  




  </div>
</div>









 <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.js" ></script>
    <script src="js/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    </body>
</html> 


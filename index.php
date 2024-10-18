<?php
    include 'database.php';
    $db = new Database;
    $dataUsers = $db->tampilData();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>OOP PHP CRUD</title>
  </head>
  <body>
    <div class="container mt-3">
        <h1>OOP PHP CRUD</h1>
        <a href="input.php" class="btn btn-success">Tambah Data</a>
        <hr>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $nomor = 1;
                    foreach($dataUsers as $dataUser) {
                ?>
                <tr>
                    <th scope="row"><?php echo $nomor++; ?></th>
                    <td><?php echo $dataUser['nama']; ?></td>
                    <td><?php echo $dataUser['alamat']; ?></td>
                    <td><?php echo $dataUser['nohp']; ?></td>
                    <td>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal<?php echo $dataUser['id']; ?>">Detail</button>
                        <a href="edit.php?id=<?php echo $dataUser['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="proses.php?id=<?php echo $dataUser['id']; ?>&aksi=hapus" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>

                <!-- Detail Modal -->
                <div class="modal fade" id="detailModal<?php echo $dataUser['id']; ?>" tabindex="-1" aria-labelledby="detailModalLabel<?php echo $dataUser['id']; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detailModalLabel<?php echo $dataUser['id']; ?>">Detail Pengguna</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card" style="width: 100%;">
                                <img src="<?php echo $dataUser['foto']; ?>" alt="Foto Pengguna" style="width: 150px; height: auto; margin-left:150px; margin-top:40px;">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $dataUser['nama']; ?></h5>
                                        <p class="card-text">
                                            <strong>Jenis Kelamin:</strong> <?php echo $dataUser['jenis_kelamin']; ?><br>
                                            <strong>No HP:</strong> <?php echo $dataUser['nohp']; ?><br>
                                            <strong>Email:</strong> <?php echo $dataUser['email']; ?><br>
                                            <strong>Alamat:</strong> <?php echo $dataUser['alamat']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

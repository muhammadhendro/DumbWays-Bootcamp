<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>CRUD Perpustakaan</title>
</head>

<body>
    <div class="container">
        <br>
        <h4>Aplikasi CRUD Perpustakaan</h4><br>
        <?php

        include "koneksi.php";

        //Cek apakah ada nilai dari method GET dengan nama id_anggota
        if (isset($_GET['id'])) {
            $id = htmlspecialchars($_GET["id"]);

            $sql = "delete from books where id='$id' ";
            $hasil = mysqli_query($kon, $sql);

            //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
            }
        }

        ?>
        <a href="index.php" class="btn btn-primary" role="button">Home</a>
        <a href="create.php" class="btn btn-primary" role="button">Tambah Buku</a>
        <a href="createcategory.php" class="btn btn-primary" role="button">Tambah kategori</a>
        <a href="list.php" class="btn btn-primary" role="button">List Semua Buku</a><br><br>
        <h2>Komik</h2>
        <table class="table table-bordered table-hover">
            <br>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>

                    <th>Nama</th>
                    <th>Stok</th>


                    <th colspan='2'>Aksi</th>

                </tr>
            </thead>
            <?php
            include "koneksi.php";
            $sql = "select books.id, image, books.name, stok FROM books INNER JOIN categories ON books.category_id=categories.id WHERE category_id = 'KMK' ";

            $hasil = mysqli_query($kon, $sql);
            $no = 0;
            while ($data = mysqli_fetch_array($hasil)) {
                $no++;

            ?>
                <tbody>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><img src="img/<?= $data["image"]; ?>" alt="" width="100"></td>


                        <td><?= $data["name"]; ?></td>
                        <td><input type="text" id="myNumber" class="form-control " value="<?= $data["stok"]; ?>" /></td>


                        <!-- <td>
                            <a href="update.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-warning" role="button">Update</a>
                            <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $data['id']; ?>" class="btn btn-danger" role="button">Delete</a>
                        </td> -->
                        <td>



                            <button id="down" class="btn btn-primary" onclick=" down('0')"><span></span>Pinjam</button>
                            <button id="up" class="btn btn-warning" onclick="up('<?= $data["stok"]; ?>')"><span></span>Kembalikan</button>

                            <a href="update.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-success" role="button">Update</a>

                            <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin ingin dihapus?');" class="btn btn-danger" role="button">Hapus</a>
                        </td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>
        <h2>Novel</h2>
        <table class="table table-bordered table-hover">
            <br>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>

                    <th>Nama</th>
                    <th>Stok</th>


                    <th colspan='2'>Aksi</th>

                </tr>
            </thead>
            <?php
            include "koneksi.php";
            $sql = "select books.id, image, books.name, stok FROM books INNER JOIN categories ON books.category_id=categories.id WHERE category_id = 'NVL' ";

            $hasil = mysqli_query($kon, $sql);
            $no = 0;
            while ($data = mysqli_fetch_array($hasil)) {
                $no++;

            ?>
                <tbody>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><img src="img/<?= $data["image"]; ?>" alt="" width="100"></td>

                        <td><?= $data["name"]; ?></td>
                        <td><input type="text" id="myNumber" class="form-control " value="<?= $data["stok"]; ?>" /></td>


                        <!-- <td>
                            <a href="update.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-warning" role="button">Update</a>
                            <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $data['id']; ?>" class="btn btn-danger" role="button">Delete</a>
                        </td> -->
                        <td>
                            <button id="down" class="btn btn-primary" onclick=" down('0')"><span></span>Pinjam</button>
                            <button id="up" class="btn btn-warning" onclick="up('<?= $data["stok"]; ?>')"><span></span>Kembalikan</button>
                            <a href="update.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-success" role="button">Update</a>
                            <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin ingin dihapus?');" class="btn btn-danger" role="button">Hapus</a>
                        </td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>
        <h2>Programming</h2>
        <table class="table table-bordered table-hover">
            <br>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>

                    <th>Nama</th>
                    <th>Stok</th>


                    <th colspan='2'>Aksi</th>

                </tr>
            </thead>
            <?php
            include "koneksi.php";
            $sql = "select books.id, image, books.name, stok FROM books INNER JOIN categories ON books.category_id=categories.id WHERE category_id = 'PRGM' ";

            $hasil = mysqli_query($kon, $sql);
            $no = 0;
            while ($data = mysqli_fetch_array($hasil)) {
                $no++;

            ?>
                <tbody>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><img src="img/<?= $data["image"]; ?>" alt="" width="100"></td>
                        <td><?= $data["name"]; ?></td>
                        <td><input type="text" id="myNumber" class="form-control " value="<?= $data["stok"]; ?>" /></td>
                        <!-- <td>
                            <a href="update.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-warning" role="button">Update</a>
                            <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $data['id']; ?>" class="btn btn-danger" role="button">Delete</a>
                        </td> -->
                        <td>
                            <button id="down" class="btn btn-primary" onclick=" down('0')"><span></span>Pinjam</button>
                            <button id="up" class="btn btn-warning" onclick="up('<?= $data["stok"]; ?>')"><span></span>Kembalikan</button>
                            <a href="update.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-success" role="button">Update</a>
                            <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin ingin dihapus?');" class="btn btn-danger" role="button">Hapus</a>
                        </td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>

    </div>

    <script>
        function up(max) {
            document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) + 1;
            if (document.getElementById("myNumber").value >= parseInt(max)) {
                document.getElementById("myNumber").value = max;
            }
        }

        function down(min) {
            document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) - 1;
            if (document.getElementById("myNumber").value <= parseInt(min)) {
                document.getElementById("myNumber").value = min;
            }
        }
    </script>




























    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>
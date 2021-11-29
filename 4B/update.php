<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Form Update Buku</title>
</head>

<body>
    <div class="container">
        <?php

        //Include file koneksi, untuk koneksikan ke database
        include "koneksi.php";

        //Fungsi untuk mencegah inputan karakter yang tidak sesuai
        function input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_anggota
        if (isset($_GET['id'])) {
            $id = input($_GET["id"]);

            $sql = "select * from books where id='$id'";
            $hasil = mysqli_query($kon, $sql);
            $data = mysqli_fetch_assoc($hasil);
        }

        //Cek apakah ada kiriman form dari method post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $id = input($_POST["id"]);
            $name = input($_POST["name"]);
            $stok = input($_POST["stok"]);

            $deskripsi = input($_POST["deskripsi"]);
            $category_id = input($_POST["category_id"]);
            $gambarLama = htmlspecialchars($data["gambarLama"]);
            if ($_FILES['image']['error'] === 4) {
                $image = $gambarLama;
            } else {
                $image = upload();
            }
            //Query update data pada tabel anggota
            $sql = "UPDATE books SET
			
			
			name='$name',
			stok='$stok',
			image='$image',
            deskripsi='$deskripsi',
            category_id='$category_id'
			where id='$id'";

            //Mengeksekusi atau menjalankan query diatas
            $hasil = mysqli_query($kon, $sql);

            //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($hasil) {
                header("Location:index.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";
            }
        }
        function upload()
        {

            $namaFile = $_FILES['image']['name'];
            $ukuranFile = $_FILES['image']['size'];
            $error = $_FILES['image']['error'];
            $tmpName = $_FILES['image']['tmp_name'];

            //cek gambar diupload
            if ($error === 4) {
                echo "<script>
                alert('Masukkan gambar!');
                </script>";
                return false;
            }

            // cek ekstensi file
            $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
            $ekstensiGambar = explode('.', $namaFile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));

            if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
                echo "<script>
                alert('File bukan gambar!');
                </script>";
                return false;
            }

            // cek file size
            if ($ukuranFile > 1000000) {
                echo "<script>
            alert('File size terlalu besar!');
            </script>";
                return false;
            }

            // upload gambar
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensiGambar;
            move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

            return $namaFileBaru;
        }
        ?>
        <h2>Update Buku</h2>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">

                <input type="Hidden" name="id" class="form-control" value="<?php echo $data['id']; ?>" placeholder="Masukan Nama" required />
                <input type="hidden" name="gambarLama" value="<?= $data["image"]; ?>">
            </div>
            <div class="form-group">
                <label>Nama Buku:</label>
                <input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>" placeholder="Masukan Nama" required />

            </div>

            <div class="form-group">
                <label>Stok:</label>
                <input type="text" name="stok" class="form-control" value="<?php echo $data['stok']; ?>" placeholder="Masukan Nama" required />

            </div>
            <div class="form-group">
                <label>Image :</label>
                <img src="img/<?= $data["image"]; ?>" alt="" width="100"><br>
                <input type="file" name="image" id="image" class="form-control" placeholder="" required />
            </div>
            <div class="form-group">
                <label>Deskripsi:</label>
                <input type="text" name="deskripsi" class="form-control" value="<?php echo $data['deskripsi']; ?>" placeholder="Masukan No HP" required />
            </div>
            <div class="form-group">
                <label for="category_id"> Category_id :</label>
                <select id="category_id" name="category_id">
                    <option value="NVL">Novel</option>
                    <option value="KMK">Komik</option>
                    <option value="PRGM">Programming</option>
                    <option value="AGM">Agama</option>
                </select>
            </div>

            <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>




























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
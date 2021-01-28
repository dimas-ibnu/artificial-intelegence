<?php include "header.php" ?>

<body>
    <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
        <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-container">
                   
                </div>
            </div>
    </section>
    <section id="about" class="contact">
      <div class="container">

       
      <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="GET">
                            <div class="form-group">
                                <label for="sel1">
                                    <h4>Pilih Penyakit Berikut :</h4>
                                </label>
                                <select class="form-control" name="penyakit">
                                    <?php
                                    include "connect_backward.php";
                                    //Perintah sql untuk menampilkan semua data pada tabel jurusan
                                    $sql = "select * from penyakit";

                                    $hasil = mysqli_query($connect, $sql);
                                    $no = 0;
                                    while ($data = mysqli_fetch_array($hasil)) {
                                        $no++;

                                        $ket = "";
                                        if (isset($_GET['penyakit'])) {
                                            $jurusan = trim($_GET['penyakit']);

                                            if ($jurusan == $data['id']) {
                                                $ket = "selected";
                                            }
                                        }
                                    ?>
                                        <option <?php echo $ket; ?> value="<?php echo $data['id']; ?>"><?php echo $data['penyakit']; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-secondary" value="Pilih">
                            </div>
                        </form>

                        <form class="col-6" method="POST" action="backward_process.php">
                            <div style="overflow: scroll; height: 467px;">
                                <?php
                                if (isset($_GET['penyakit'])) {
                                    $jurusan = trim($_GET['penyakit']);
                                    $sql = "select * from gejala where id_penyakit='$jurusan'";
                                } else {
                                    $sql = "select * from gejala";
                                }

                                $data = mysqli_query($connect, $sql);
                                $no = 0;
                                while ($d = mysqli_fetch_array($data)) {
                                    $no++;
                                ?>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input" value="<?= $d['kode'] ?>" name="<?= $d['gejala'] ?>">
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Text input with checkbox" value="<?= $d['gejala'] ?>">
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <input type="submit" class="btn btn-secondary btn-lg btn-block" name="submit" value="Submit Gejala">
                        </form>
      </div>
    </section><!-- End Contact Sectio
</body>
<?php include "footer.php" ?>
<?php
include_once "header.php";
include_once "connect_backward.php";

?>

<body>
    <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
        <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-container">
                    <h2>Backward Chaining</h2>
                    <div class="foward" style="background-color: white; margin: 2   rem; padding: 1rem 2rem; border-radius: 10px">
                        <?php
                        $hasil = $_GET['hasil'];
                        $kode_penyakit = $_GET['penyakit'];
                        $sql = "SELECT `nama_penyakit`, `keterangan` FROM `penyakit` WHERE `kode`='{$kode_penyakit}'";
                        $result = $connect->query($sql);
                        $row = $result->fetch_row();

                        if ($hasil == "true") {
                            echo "<h4>Gejala {$row[0]} ditemukan dengan Keterangan :</h4>";
                            echo "<div class='text-left'>{$row[1]}</div>";
                            echo "<br><a href='?' class='btn btn-primary'>Konsultasi Lagi</a>";
                        } elseif($hasil == "false"){
                            echo "<h4>Penyakit {$row[0]} tidak sesuai dengan gejala-gelaja yang anda alami.</h4>";
                            echo "<br><a href='?' class='btn btn-primary'>Konsultasi Lagi</a>";
                        } else {
                            echo "<h5>Silahkan Pilih Salah Satu Penyakit Terlebih Dulu</h5>";
                        }
                        // var_dump($kode_penyakit);
                        ?>
                    </div>
                </div>
            </div>
    </section>
    <?php
    if ($hasil != "true") {
    ?>
        <section id="about" class="contact">
            <div class="container">


                <div class="row">
                    <div class="col-3">
                        <h4>Nama Penyakit</h4>
                        <div class="list-group" id="list-tab" role="tablist">
                            <?php
                            $sql = "SELECT `kode`, `nama_penyakit`, `keterangan` FROM `penyakit`";
                            $result = $connect->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    // echo "<li><a href=\"?selected={$row['kode']}\" class='dropdown-item'>{$row['nama_penyakit']} </a></li>";
                                    echo "<a class='list-group-item list-group-item-action btn-outline-primary' id='list-home-list' data-bs-toggle='list' href='?selected={$row['kode']}#{$row['kode']}' role='tab' aria-controls='home'><b>{$row['nama_penyakit']}</b></a>";
                                }
                            } else {
                                echo "Data kosong";
                            }
                            ?>

                            <!-- <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a> -->
                        </div>
                    </div>
                    <div class="col-9">
                        <h4>Gejala</h4>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="#<?php echo $_GET['selected'] ?>" role="tabpanel" aria-labelledby="list-home-list">
                                <form method="POST">
                                    <?php

                                    $namaGejala = array();
                                    $selected = $_GET['selected'];
                                    if ($selected != '') {
                                        $query = "SELECT * FROM `base_knowledge` WHERE `kode_penyakit`='{$selected}'";
                                        $raw = $connect->query($query);

                                        $selectedResult = $raw->fetch_assoc();
                                        $listGejala = explode(" ", $selectedResult['daftar_gejala']);

                                        if (isset($_POST['submit'])) {
                                            $arr = $_POST['selectedgejala'];
                                            if (count($listGejala) == count($arr)) {
                                                echo "<script> window.location ='?penyakit={$selected}&hasil=true'</script>";
                                                // $hasilKonsultasi = "true";
                                            } else {
                                                echo "<script> window.location ='?penyakit={$selected}&hasil=false'</script>";
                                            }
                                        }
                                        foreach ($listGejala as $i => $kodeGejala) {
                                            // echo $kodeGejala . "<br>";
                                            $getGejala = $connect->query("SELECT `nama_gejala` FROM `gejala` WHERE `kode`='{$kodeGejala}'");
                                            $gejala = $getGejala->fetch_row();
                                            // $namaGejala[$i] = $gejala[0];
                                            if ($gejala != NULL) {
                                    ?>
                                                <div class="list-group">
                                                    <label class="list-group-item">
                                                        <input class="form-check-input" type="checkbox" value="<?php echo $listGejala[$i] ?> " name="selectedgejala[]"> Apakah Anda merasa <?php echo $gejala[0]; ?> ?
                                                    </label>
                                                </div>

                                    <?php
                                            } else {
                                                echo "";
                                            }
                                        }
                                    }

                                    ?>
                                    <input type='submit' name="submit" class='btn btn-primary'>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <span style="color: white; font-size: 1.5rem; padding-bottom: 5px; font-weight: 500;">Pilih Penyakit :</span> -->



            </div>
        </section>
    <?php
    } else {
        echo "";
    }
    ?>
    <!-- End Contact Sectio

<?php include_once "footer.php" ?>
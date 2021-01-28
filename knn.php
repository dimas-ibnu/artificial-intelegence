<?php
include_once "header.php";
require_once __DIR__ . "/vendor/autoload.php";

use Phpml\Classification\KNearestNeighbors;


//[Suhu Udara, Kecepatan Angin] 
$samples = [[10, 0], [25, 0], [15, 5], [20, 3], [18, 7], [20, 10], [22, 5], [24, 6]];

//Dirasakan
$labels = ['Dingin', 'Panas', 'Dingin', 'Panas', 'Dingin', 'Dingin', 'Panas', 'Panas'];

$classifier = new KNearestNeighbors();

//Default Ecludiean Distance
$classifier->train($samples, $labels);


?>

<section id="hero" class="d-flex flex-column justify-content-end align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">
        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="carousel-container">
                <p class="animate__animated fanimate__adeInUp">
                <h2 class="mt-1">Knearest Neighbor</h2>
                <div class="foward" style="background-color: white; margin: 5rem; padding: 1rem 5rem; border-radius: 10px">
                    <!-- penanganan form dengan method POST -->


                    <?php
                    $suhu = $_POST['suhu'];
                    $kecepatan = $_POST['kecepatan'];

                    if (isset($suhu) && isset($kecepatan)) {
                        echo "<span>Kondisi yang dirasakan</span>";
                        $prediction = $classifier->predict([$suhu, $kecepatan]);
                        echo "<h3>".$prediction ."</h3>";
                        
                    } else {
                        echo "<h3>Belum Diisi</h3>";
                    }

                    ?>
                </div>
                </p>
            </div>
        </div>
    </div>
</section>
<center>
<div class="form-group m-4">
    <form method="post" action="knn.php">
        <label>Masukkan Suhu Udara</label><br />
        <input type="number" name="suhu"><br />
        <br />
        <label>Masukkan Kecepatan Udara</label><br />
        <input type="number" name="kecepatan"><br />
        <input type="submit" value="Prediksi" class="btn btn-primary mt-3">
    </form>
</div>
    <h2 class="pt-4">Data Sets</h2>
</center>
<section id="about" class="contact">
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Suhu Udara</th>
                    <th scope="col">Kecepatan Angin</th>
                    <th scope="col">Dirasakan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < count($samples); $i++) {
                    echo "<tr>";
                    // echo $samples[0][1];
                    for ($j = 0; $j < 1; $j++) {
                        echo "<td>" . $samples[$i][0] . " °c </td>";
                        echo "<td>" . $samples[$i][1] . " Km/h </td>";
                    }
                    echo "<td>" . $labels[$i] . "</td>";
                }
                ?>
            </tbody>
        </table>

        <a href="https://www.advernesia.com/blog/data-science/pengertian-dan-cara-kerja-algoritma-k-nearest-neighbours-knn/" target="_blank">Sumber data sets</a>

    </div>
</section>
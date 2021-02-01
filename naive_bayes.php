<?php
include_once "header.php";
require_once __DIR__ . "/vendor/autoload.php";


use Phpml\Classification\NaiveBayes;



$samples = [];
$labels = [];
$row = 1;

$minAmpli = 0;
$maxAmpli = 1;
$downCorner = 2;
$upperCorner = 3;
$label = 4;

if (($handle = fopen("naive_bayes_dataset.csv", "r")) !== false) {
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        $num = count($data);
        $row++;
        $sample = [$data[$minAmpli], $data[$maxAmpli], $data[$downCorner], $data[$upperCorner]];
        array_push($samples, $sample);
        array_push($labels, $data[$label]);
    }
    fclose($handle);
}

$classifier = new NaiveBayes();
$classifier->train($samples, $labels);

?>

<section id="hero" class="d-flex flex-column justify-content-end align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">
        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="carousel-container">
                <p class="animate__animated fanimate__adeInUp">
                <h2 class="mt-1">Naive Bayes</h2>
                <div class="foward" style="background-color: white; margin: 5rem; padding: 1rem 5rem; border-radius: 10px">
                    <!-- penanganan form dengan method POST -->


                    <?php
                    $min = $_POST['min'];
                    $max = $_POST['max'];
                    $turun = $_POST['turun'];
                    $naik = $_POST['naik'];


                    echo "<span>Hasil Prediksi</span>";
                    if (
                        isset($min) &&
                        isset($max) &&
                        isset($turun) &&
                        isset($naik)
                    ) {
                        $prediction = $classifier->predict([
                            $min,
                            $max,
                            $turun,
                            $naik,
                        ]);
                        echo "<h3>" . $prediction . "</h3>";
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
        <form method="post" action="naive_bayes.php">
            <label>Min Ampli</label>
            <input type="number" name="min">
            <label>Max Ampli</label>
            <input type="number" name="max">
            <label>Sudut Naik</label>
            <input type="number" name="turun">
            <label>Sudut Turun</label>
            <input type="number" name="naik">
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
                    <th scope="col">Min Ampli</th>
                    <th scope="col">Max Ampli</th>
                    <th scope="col">Sudut Turun</th>
                    <th scope="col">Sudut Naik</th>
                    <th scope="col">Irama</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < count($samples); $i++) {
                    echo "<tr>";
                    // echo $samples[0][1];
                    for ($j = 0; $j < 1; $j++) {
                        echo "<td>" . $samples[$i][0] . "</td>";
                        echo "<td>" . $samples[$i][1] . "</td>";
                        echo "<td>" . $samples[$i][2] . "</td>";
                        echo "<td>" . $samples[$i][3] . "</td>";
                    }
                    echo "<td>" . $labels[$i] . "</td>";
                }
                ?>
            </tbody>
        </table>

        <a href="https://www.advernesia.com/blog/data-science/pengertian-dan-cara-kerja-algoritma-k-nearest-neighbours-knn/" target="_blank">Sumber data sets</a>

    </div>
</section>
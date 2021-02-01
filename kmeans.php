<?php
include_once "header.php";
require_once __DIR__ . "/vendor/autoload.php";
// use Phpml\Dataset\Demo\IrisDataset;
use Phpml\Clustering\KMeans;

$clusterSize = 0;
$samples = [];
$labels = [];
$row = 1;

$custId = 0;
$genre = 1;
$age = 2;
$annualIncome = 3;
$spendScore = 4;

if (($handle = fopen("Mall_Customers.csv", "r")) !== false) {
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        $num = count($data);
        $row++;

        $sample = [$data[$age], $data[$annualIncome], $data[$spendScore]];

        array_push($samples, $sample);
        // array_push($labels, $data[$label]);
    }
    fclose($handle);
}

// $samples = [[1, 1], [8, 7], [1, 2], [7, 8], [2, 1], [8, 9]];



?>

<section id="hero" class="d-flex flex-column justify-content-end align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">
        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="carousel-container">
                <p class="animate__animated fanimate__adeInUp">
                <h2 class="mt-1">K-Means</h2>
                <div class="foward" style="background-color: white; margin: 1rem; padding: 1rem 5rem; border-radius: 10px">
                    <!-- penanganan form dengan method POST -->
                    <div class="form-group m-2">
                        <form method="post" action="kmeans.php">
                            <label>Masukkan Jumlah Klaster</label><br />
                            <input type="number" name="cluster"><br />
                            <br />
                            <input type="submit" value="Kelompokkan" class="btn btn-primary mt-3">
                        </form>
                    </div>
                </div>
                </p>
            </div>
        </div>
    </div>
</section>
<center>

    <h2 class="pt-4">Hasil Clustering</h2>
</center>
<section id="about" class="contact">
    <div class="container" style="overflow:auto;">
        <?php
        $cluster = $_POST['cluster'];
        if (isset($cluster)) {
            $clusterSize = $cluster;
            $kmeans = new KMeans($clusterSize);
            $data = $kmeans->cluster($samples);

            echo "<h5>Jumlah : $clusterSize</h5> <hr>";
            echo "<table class='table-bordered'><tbody>";
            for ($row = 0; $row < $clusterSize; $row++) {
                // echo "<p><b>$row</b></p>";

                echo "<thead><tr><th> ";
                echo "Cluster $row";
                echo "</th></tr></thead>";

                echo "<tr>";
                for ($col = 0; $col < count($data[$row]); $col++) {
                    // // echo "<ul>";
                    if ($data[$row][$col] != NULL) {
                        // echo "<th scope='row'>" . $col . "</th>";
                        echo "<td><center>";
                        echo "<b>char $col</b><br>";
                        for ($i = 0; $i < sizeof($data[$row][$col]); $i++) {
                            echo $data[$row][$col][$i] . "|";
                        }
                        echo "</center></td>";
                    } else {
                        echo "";
                    }
                }
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<h3>Belum Diisi</h3>";
        }


        ?>


    </div>
   <div class="container">
   <br>
    <a target="_blank" href="https://www.kaggle.com/shrutimechlearn/step-by-step-kmeans-explained-in-detail?select=Mall_Customers.csv">Sumber data sets ></a>
    <br>

    <a target="_blank" href="https://raharja.ac.id/2020/04/19/k-means-clustering/#:~:text=K%2Dmeans%20merupakan%20algoritma%20clustering.&text=K%2DMeans%20Clustering%20adalah%20suatu,pengelompokan%20data%20dengan%20sistem%20partisi.">Referensi Metode ></a>

    <br>
    <a target="_blank" href="https://www.kaggle.com/shrutimechlearn/step-by-step-kmeans-explained-in-detail?select=Mall_Customers.csv">Dokumentasi ></a>
</div>

</section>
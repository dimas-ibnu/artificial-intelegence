<?php include_once "header.php";?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <p class="animate__animated fanimate__adeInUp">
          <div class="foward" style="background-color: white; margin: 5rem; padding: 1rem 5rem; border-radius: 10px">

            <?php
           include "connect_foward.php";
require_once "parser-php-version.php";

            $answer    = $_GET['answer'];
            if ($answer != '') {
              mysql_query("INSERT INTO rule_temporary (username, pilihan, jawaban)
										VALUES ('alopakar','$answer','$_GET[pilihan]')");
            } elseif ($_GET[pilih] == '') {
              mysql_query("DELETE FROM rule_temporary where username='alopakar'");
            }
            if (!$answer) $answer = 1;
            $sql2 = mysql_query("SELECT * FROM penyakit where id_penyakit='{$answer}'");
            $s = mysql_fetch_array($sql2);
            $penyakit = nl2br($s['penyakit']);
            $solusi = $s['solusi'];

            $result = mysql_query("SELECT * FROM gejala where id='{$answer}'");
            if (mysql_num_rows($result)) {
              $row     = mysql_fetch_array($result);
              $pertanyaan = nl2br($row['pertanyaan']);
              echo ("");
              echo ("<br/><span style=' font-size:20px; color: #000;'>" . $pertanyaan . "</span>");
              echo ("<br/><br/>");
              if ($row['ifyes'] != "0" && $row['ifno'] != "0") {

                echo ("<a class='btn-success btn jawab' href=\"?pilih=tanya&pilihan=Y&answer={$row['ifyes']}\">Ya</a>&nbsp;
				  <a class='jawab btn-danger btn' href=\"?pilih=tanya&pilihan=N&answer={$row['ifno']}\">Tidak</a>");
              } else {
                echo "";
              }
            }

            if ($s['ifyes'] == "0" && $s['ifno'] == "0") {
              echo "<br/><span style=' font-size:0.9em; color: #000;'><b>Hasil Konsultasi :</b><br> " . $penyakit;
              echo "<p style='font-size:0.8em; color:#000'>". $solusi ."</p><br>";
              echo "<b>Rule yang Di lewati :</b><ul>";
              $rule = mysql_query("SELECT * FROM rule_temporary 
												left join gejala on rule_temporary.pilihan=gejala.id 
													where username='alopakar' AND pilihan NOT LIKE 'M%'");
              while ($o = mysql_fetch_array($rule)) {
                if ($o[jawaban] == 'Y') {
                  $jawaban = "<span style='color:green'>Yes</span>";
                } else {
                  $jawaban = "<span style='color:red'>No</span>";
                }
                echo " <li>$o[pertanyaan] $jawaban</li>";
              }
              echo "</ul><a class='btn-primary btn' href='index.php'>Coba Konsultasi Lagi</a></span>";
            } else {
              echo "";
            }
            ?>

          </div>
          </p>
        </div>
      </div>
  </section><!-- End Hero -->
  <?php include "footer.php"?>
</body>

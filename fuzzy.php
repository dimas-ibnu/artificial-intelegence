<?php include_once "header.php"; ?>

<?php
for ($a = 0; $a <= 2; $a++) {
    $vMin[$a] = $_POST['vMin' . $a];
    $vMax[$a] = $_POST['vMax' . $a];
}
for ($b = 0; $b <= 1; $b++) {
    $nil[$b] = $_POST['nil' . $b];
}

for ($c = 0; $c <= 3; $c++) {
    $rbyr[$c] = $_POST['rbyr' . $c];
    $rop[$c] = $_POST['rop' . $c];
    $rlyn[$c] = $_POST['rlyn' . $c];
    $rtip[$c] = $_POST['rtip' . $c];
}
?>
<section id="about" class="contact">
    <div class="container">
        <center>
        <h2 class="my-4">Fuzzy Tsukamoto</h2>
            <form method='post' action='fuzzy.php'>
                <table class="table table-dark table-striped">
                    <tr>
                        <td colspan='4' style='text-align:center'><b>VARIABEL</b></td>
                    </tr>
                    <?php
                    $mn = array("Permintaan Terendah", "Persediaan Terendah", "Produksi Terendah");
                    $mx = array("Permintaan Tertinggi", "Persediaan Tertinggi", "Produksi Tertinggi");
                    $nl = array("Permintaan", "Persediaan");
                    for ($i = 0; $i <= 2; $i++) {
                        echo "<tr>
							<td>" . $mn[$i] . "</td><td><input type='text' name='vMin" . $i . "' value='" . $vMin[$i] . "'</td>
							<td>" . $mx[$i] . "</td><td><input type='text' name='vMax" . $i . "' value='" . $vMax[$i] . "'</td>
						  </tr>";
                    }

                    echo "<tr><td colspan='4' style='text-align:center'><b><br/>YANG DITANYAKAN</b></td></tr><tr>";
                    for ($i = 0; $i <= 1; $i++) {
                        echo "<td>" . $nl[$i] . "</td><td><input type='text' name='nil" . $i . "' value='" . $nil[$i] . "' width='30px;' height='10px'/></td>";
                    }
                    echo "</tr></table><br /><br />
				<table class='table table-dark table-striped'><tr><td colspan='6' style='text-align:center;'><b>ATURAN FUZZY (RULE)</b></td></tr>";
                    for ($i = 0; $i <= 3; $i++) {
                        echo "<tr>
							<td>IF</td>
							<td>
								<select name='rbyr" . $i . "'>";
                        if ($rbyr[$i] == 0) {
                            echo "<option value='0' selected>Permintaan Turun</option>
									<option value='1'>Permintaan Naik</option>";
                        } else if ($rbyr[$i] == 1) {
                            echo "<option value='0'>Permintaan Turun</option>
									<option value='1' selected>Permintaan Naik</option>";
                        } else {
                            echo "<option value='0' selected>Permintaan Turun</option>
									<option value='1'>Permintaan Naik</option>";
                        }
                        echo "</select>
							</td>
							<td>
								<select name='rop" . $i . "'>";
                        if ($rop[$i] == 0) {
                            echo "<option value='0' selected>And</option>
									<option value='1'>Or</option>";
                        } else if ($rop[$i] == 1) {
                            echo "<option value='0'>And</option>
									<option value='1' selected>Or</option>";
                        } else {
                            echo "<option value='0' selected>And</option>
									<option value='1'>or</option>";
                        }
                        echo "</select>
							</td>
							<td>
								<select name='rlyn" . $i . "'>";
                        if ($rlyn[$i] == 0) {
                            echo "<option value='0' selected>Persediaan Sedikit</option>
									<option value='1'>Persediaan Banyak</option>";
                        } else if ($rlyn[$i] == 1) {
                            echo "<option value='0'>Persediaan Sedikit</option>
									<option value='1' selected>Persediaan Banyak</option>";
                        } else {
                            echo "<option value='0' selected>Persediaan Sedikit</option>
									<option value='1'>Persediaan Banyak</option>";
                        }
                        echo "</select>
							</td>
							<td>THEN</td>
							<td>
								<select name='rtip" . $i . "'>";
                        if ($rbyr[$i] == 0) {
                            echo "<option value='0' selected>Produksi Berkurang</option>
									<option value='1'>Produksi Bertambah</option>";
                        } else if ($rtip[$i] == 1) {
                            echo "<option value='0'>Produksi Berkurang</option>
									<option value='1' selected>Produksi Bertambah</option>";
                        } else {
                            echo "<option value='0' selected>Produksi Berkurang</option>
									<option value='1'>Produksi Bertambah</option>";
                        }
                        echo "</select>
							</td></tr>";
                    }
                    ?>

                    <tr>
                    </tr>
                    <tr>
                    </tr>
                </table><br>
                <button type='submit' class="btn btn-primary">Hitung</button>

            </form>

            <?php
            for ($i = 0; $i <= 2; $i++) {
                if ($vMin[$i] == null) {
                    exit;
                }
                if ($vMax[$i] == null) {
                    exit;
                }
            }
            for ($i = 0; $i <= 1; $i++) {
                if ($nil[$i] == null) {
                    exit;
                }
            }

            for ($i = 0; $i <= 1; $i++) {
                if ($nil[$i] <= $vMin[$i]) {
                    $K[$i][0] = 1;
                } else if ($nil[$i] >= $vMin[$i] && $nil[$i] <= $vMax[$i]) {
                    $K[$i][0] = ($vMax[$i] - $nil[$i]) / ($vMax[$i] - $vMin[$i]);
                } else if ($nil[$i] >= $vMax[$i]) {
                    $K[$i][0] = 0;
                }

                if ($nil[$i] <= $vMin[$i]) {
                    $K[$i][1] = 0;
                } else if ($nil[$i] >= $vMin[$i] && $nil[$i] <= $vMax[$i]) {
                    $K[$i][1] = ($nil[$i] - $vMin[$i]) / ($vMax[$i] - $vMin[$i]);
                } else if ($nil[$i] >= $vMax[$i]) {
                    $K[$i][1] = 1;
                }
            }
            echo "<div class='row'>";
            $a = array("Permintaan Turun", "Permintaan Naik", "Persediaan Sedikit", "Persediaan Banyak");
            $c = 0;
            $JumZ = 0;
            echo "<table class='table table-hover' border='1px solid' cellpadding='1' cellspacing='1'>
				<tr><td colspan='2' style='text-align:center;'><b>FUNGSI KEANGGOTAAN</b></td></tr>";
            for ($i = 0; $i <= 1; $i++) {
                for ($j = 0; $j <= 1; $j++) {
                    echo "<tr><td>" . $a[$c] . "</td><td>" . $K[$i][$j] . "</td></tr>";
                    $c++;
                }
            }
            echo "</table><br/><br/>";

            for ($i = 0; $i <= 3; $i++) {
                switch ($rop[$i]) {
                    case 0:
                        if ($K[0][$rbyr[$i]] >= $K[1][$rlyn[$i]]) {
                            $rule[$i] = $K[1][$rlyn[$i]];
                        } else {
                            $rule[$i] = $K[0][$rbyr[$i]];
                        }
                        break;
                    case 1:
                        if ($K[0][$rbyr[$i]] <= $K[1][$rlyn[$i]]) {
                            $rule[$i] = $K[1][$rlyn[$i]];
                        } else {
                            $rule[$i] = $K[0][$rbyr[$i]];
                        }
                        break;
                }

                $jumRule += $rule[$i];

                switch ($rtip[$i]) {
                    case 0:
                        $nilZ[$i] = ($vMax[2] - ($rule[$i] * ($vMax[2] - $vMin[2])));
                        break;
                    case 1:
                        $nilZ[$i] = (($rule[$i] * ($vMax[2] - $vMin[2])) + $vMin[2]);
                        break;
                }
                $JumZ = ($JumZ + ($rule[$i] * $nilZ[$i]));
            }

            echo "<table class='table table-hover' border='1px solid' cellpadding='1' cellspacing='1'>
				<tr><td colspan='5' style='text-align:center;'><b>HASIL DARI RULE</b></td></tr>";
            for ($i = 0; $i <= 3; $i++) {
                $b = $i + 1;
                echo "<tr><td>Nilai Rule " . $b . "</td><td>" . $rule[$i] . "</td><td> -->> </td><td>Nilai Z " . $b . "</td><td>" . $nilZ[$i] . "</td></tr>";
            }
            echo "</table><br/><br/>";
            $hasil = $JumZ / $jumRule;
            echo "</div>";
            echo "<h4 class='mt-3'><b>Produksi " . round($hasil) . "</b></h4>";

            ?>

        </center>
    </div>
    </>
    </div>

    </html>
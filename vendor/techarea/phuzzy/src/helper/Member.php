<?php

namespace Techarea\Phuzzy\Helper;

/**
* Member Helper for Phuzzy
*/
class Member
{

	protected
		$MNama,
		$MAwal,
		$MTengah,
		$MAkhir,
		$MTipe;

	/**
	 * Class Construct
	 *
	 * @param String 		$nama 		Nama domain
	 * @param Integer 		$awal 		Titik awal derajat keanggotaan
	 * @param Integer|Array 	$tengah 	Titik tengah derajat keanggotaan
	 * @param Integer 		$akhir 		Titik akhir derajat keanggotaan
	 * @param String 		$tipe 		Tipe domain
	 *
	 * @return none
	 * 
	 */
	public function __construct($nama = NULL, $awal = NULL, $tengah = NULL, $akhir = NULL, $tipe = NULL)
	{
		$this->MNama 	= $nama;
		$this->MAwal 	= $awal;
		$this->MTengah 	= $tengah;
		$this->MAkhir 	= $akhir;
		$this->MTipe 	= $tipe;
	}

	/**
	 * Untuk mendapatkan nama domain
	 * 
	 * @return String Nama domain
	 * 
	 */
	public function getMemberName()
	{
		return $this->MNama;
	}

	/**
	 * Proses fuzzifikasi
	 * 
	 * @param Float $titik 	Titik pada sumbu X
	 *
	 * @return Float 		Nilai hasil fuzzifikasi
	 */
	public function Fuzzification($titik)
	{
		// Jika titik diluar domain
		if (($titik < $this->MAwal) OR ($titik > $this->MAkhir)) return 0;

		// Jika titik sama dengan titk tengah
		if ($titik == $this->MTengah) return 1;

		// Jika tipe domain LEFT_INFINITY
		if ($this->MTipe == 'LEFT_INFINITY') :
			if ($titik <= $this->MTengah) return 1;
			if (($titik > $this->MTengah) AND ($titik < $this->MAkhir)) return ($this->MAkhir - $titik) / ($this->MAkhir - $this->MTengah);
		endif;

		// Jika tipe domain RIGHT_INFINITY
		if ($this->MTipe == 'RIGHT_INFINITY') :
			if ($titik >= $this->MTengah) return 1;
			if (($titik > $this->MAwal) AND ($titik < $this->MTengah)) return ($titik - $this->MAwal) / ($this->MTengah - $this->MAwal);
		endif;

		// Jika tipe domain TRIANGLE
		if ($this->MTipe == 'TRIANGLE') :
			if (($titik > $this->MAwal) AND ($titik < $this->MTengah)) return ($titik - $this->MAwal) / ($this->MTengah - $this->MAwal);
			if (($titik > $this->MTengah) AND ($titik < $this->MAkhir)) return ($this->MAkhir - $titik) / ($this->MAkhir - $this->MTengah);
		endif;

		// Jika tipe domain TRAPEZOID
		if ($this->MTipe == 'TRAPEZOID') :
			if (($titik > $this->MAwal) AND ($titik < $this->MTengah[0])) return ($titik - $this->MAwal) / ($this->MTengah[0] - $this->MAwal);
			if (($titik >= $this->MTengah[0]) AND ($titik <= $this->MTengah[1])) return 1;
			if (($titik > $this->MTengah[1]) AND ($titik < $this->MAkhir)) return ($this->MAkhir - $titik) / ($this->MAkhir - $this->MTengah[1]);
		endif;

		// Jika tidak ada diantara aturan diatas
		return 0;
	}
}

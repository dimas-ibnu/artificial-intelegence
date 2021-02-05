<?php

namespace Techarea\Phuzzy\Helper;

error_reporting(5);

use Techarea\Phuzzy\Helper\Member;

/**
* Fuzzify Helper for Phuzzy
*/
class Fuzzify extends Member
{

	protected $FMin 	= array();
	protected $FMax 	= array();
	protected $FMember 	= array();

	/**
	 * Untuk mendapatkan nilai Max dan Min
	 * 
	 * @param String 	$himpunan 	Nama Himpunan
	 * @param Float 	$var1   	Nilai pembanding 1
	 * @param Float 	$var2   	Nilai Pembanding 2
	 *
	 * @return Float 				Nilai Max dan Min
	 * 
	 */
	public function setMaxMin($himpunan, $var1 = 0, $var2 = 0)
	{
		if ($var1 <= $var2) :
			$this->FMin[$himpunan] = $var1;
			$this->FMax[$himpunan] = $var2;
		else :
			$this->FMin[$himpunan] = $var2;
			$this->FMax[$himpunan] = $var1;
		endif;
	}

	/**
	 * Atur member jadi kosong
	 * 
	 * @return Array Kosong
	 * 
	 */
	public function clearMembers()
	{
		$this->FMember = array();
	}

	/**
	 * Untuk menambahkan derajat keanggotaan
	 * 
	 * @param String 			$variabel	Nama variabel
	 * @param String 			$himpunan 	Nama himpunan
	 * @param Integer 			$awal 		Titik awal
	 * @param Integer|Array 	$tengah 	Titik tengah
	 * @param Integer 			$akhir 		Titik akhir
	 * @param String 			$tipe 		Tipe himpunan
	 *
	 * @return Array 						Derajat keanggotaan
	 * 
	 */
	public function addMember($variabel, $himpunan, $awal, $tengah, $akhir, $tipe)
	{
		$member = new Member($himpunan, $awal, $tengah, $akhir, $tipe);
		if ($member->MAwal < (float) $this->FMin[$variabel]) $this->setMaxMin($variabel, $member->MAwal, (float) $this->FMax[$variabel]);
		if ($member->MAkhir > (float) $this->FMax[$variabel]) $this->setMaxMin($variabel, (float) $this->FMin[$variabel], $member->MAkhir);
		$this->FMember[$variabel][] = $member;
	}

	/**
	 * Cara lain menambahkan derajat keanggotaan
	 * 
	 * @param String 	$variabel 	Nama variabel
	 * @param Array 	$members 	Derajat keanggotaan
	 *
	 * @return Array 				Derajat keanggotaan
	 * 
	 */
	public function setMembers($variabel, $members)
	{
		$this->FMember[$variable][] = $members;
	}

	/**
	 * Untuk mendapatkan data derjat keanggotaan
	 * 
	 * @param  String 	$variabel 	Nama variabel
	 * @param  String 	$himpunan   Nama himpunan
	 * 
	 * @return Array           		Data derajat keanggotaan
	 * 
	 */
	public function getMembers($variabel = NULL, $himpunan = NULL)
	{
		if ($himpunan != NULL) :
			return $this->FMember[$variabel][$himpunan];
		elseif ($variabel != NULL) :
			return $this->FMember[$variabel];
		else :
			return $this->FMember;
		endif;
	}

	/**
	 * Mengambil derajat keanggotaan berdasakan index
	 * 
	 * @param  String 	$variabel 	Nama variabel
	 * @param  String 	$value    	Nama index
	 * 
	 * @return Array    	       Data derajat keanggotaan
	 * 
	 */
	public function getMemberIndex($variabel, $value = NULL)
	{
		foreach ($this->FMember[$variabel] as $variabel => $member) :
			if ($value == $member->MNama) return $variabel;
		endforeach;
		return FALSE;
	}

	/**
	 * Mengambil derajat keanggotaan berdasakan nama
	 * 
	 * @param  String 	$variabel 	Nama variabel
	 * @param  String 	$nama    	Nama
	 * 
	 * @return Array    	       Data derajat keanggotaan
	 * 
	 */
	public function getMemberByName($variabel, $nama = NULL)
	{
		foreach ($this->FMember[$variabel] as $variabel => $member) :
			if ($nama == $member->MNama) return $member;
		endforeach;
		return FALSE;
	}
}

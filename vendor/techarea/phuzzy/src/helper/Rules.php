<?php

namespace Techarea\Phuzzy\Helper;

use Techarea\Phuzzy\Helper\Fuzzify;

/**
* Rules Helper for Phuzzy
*/
class Rules extends Fuzzify
{

	public
		$RXValue,
		$RYValue,
		$RRealInput,
		$RInputRange,
		$ROutputs;

	private
		$RInputNames,
		$ROutputNames,
		$RRules;
	
	/**
	 * Untuk menambahkan Variable masukan
	 * 
	 * @param Array 	$variable 	Nama variabel
	 *
	 * @return Array 				Nama variabel
	 * 
	 */
	public function setInputNames($variable)
	{
		$this->RInputNames = $variable;
	}

	/**
	 * Untuk menambahkan Variable keluaran
	 * 
	 * @param Array 	$variable 	Nama variabel
	 *
	 * @return Array 				Nama variabel
	 * 
	 */
	public function setOutputNames($variable)
	{
		$this->ROutputNames = $variable;
	}

	/**
	 * Mengambil nama variabel masukan
	 * 
	 * @return Array 	Nama variabel
	 * 
	 */
	public function getInputNames()
	{
		return $this->RInputNames;
	}

	/**
	 * Mengambil nama variabel keluaran
	 * 
	 * @return Array 	Nama variabel
	 * 
	 */
	public function getOutputNames()
	{
		return $this->ROutputNames;
	}

	/**
	 * Untuk membersihkan semua rule
	 * 
	 * @return Array 	Rule kosong
	 * 
	 */
	public function clearRules()
	{
		$this->RRules = array();
	}

	/**
	 * Untuk menambahkan rule
	 * 
	 * @param String 	$rule 	Rule
	 *
	 * @return Array 			Rule
	 * 
	 */
	public function addRule($rule)
	{
		$this->RRules[] = $rule;
	}

	/**
	 * Untuk mengambil semua rule
	 * 
	 * @return Array 	Rule
	 * 
	 */
	public function getRules()
	{
		return $this->RRules;
	}

	/**
	 * Rule operator AND
	 * 
	 * @param  Array 	$array 	Nilai Fuzzify
	 * 
	 * @return Float        	Nilai Min
	 * 
	 */
	private function _RuleAND($array)
	{
		return min($array);
	}

	/**
	 * Rule operator OR
	 * 
	 * @param  Array 	$array 	Nilai Fuzzify
	 * 
	 * @return Float        	Nilai Max
	 * 
	 */
	private function _RuleOR($array)
	{
		return max($array);
	}

	/**
	 * Untuk menjalankan rule-rule yang ada
	 * 
	 * @param  String 	$rule 	Rule
	 * 
	 * @return Array       		Nilai fuzzy setiap rule
	 * 
	 */
	public function executeRule($rule)
	{
		$rule = explode(' ', $rule);
		$outItem = array_pop($rule);
		$temp = array();
		$operator = '';

		foreach ($rule as $item) :
			if ($item == 'IF' OR $item == 'THEN') :
				continue;
			elseif ($item == 'AND' OR $item == 'OR') :
				$operator = $item;
			else :
				list($variabel, $himpunan) = explode('.', $item);
				$indexMember = $this->getMemberIndex($variabel, $himpunan);
				$temp[] = $this->ROutputs[$variabel][$indexMember];
			endif;
		endforeach;

		$value = ($operator == 'AND') ? $this->_RuleAND($temp) : $this->_RuleOR($temp);

		return array($outItem, $value);
	}
}

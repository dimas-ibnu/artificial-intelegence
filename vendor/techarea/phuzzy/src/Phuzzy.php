<?php

namespace Techarea\Phuzzy;

use Techarea\Phuzzy\Helper\Rules;

/**
* Phuzzy CLass
*/
class Phuzzy extends Rules
{

	public $stateOutout = array();
	protected $agregatePoint = 100;
	
	/**
	 * Untuk menghapus semua solusi
	 * 
	 * @return Array 	Array kosong
	 * 
	 */
	private function clearSolution()
	{
		$this->RXValue = array();
		$this->RYValue = array();
	}

	/**
	 * Untuk mengatur nilai variabel
	 * 
	 * @param String 	$variable 	Nama variabel
	 * @param Float 	$nilai    	Nilai variabel
	 *
	 * @return Void
	 * 
	 */
	public function setRealInput($variable, $nilai)
	{
		$this->RRealInput[$variable] = $nilai;
		$this->ROutputs[$variable] = array();
		for ($i = 0; $i < count($this->FMember[$variable]); $i++) :
			$this->ROutputs[$variable][] = $this->FMember[$variable][$i]->Fuzzification($this->RRealInput[$variable]);
		endfor;
	}

	/**
	 * Untuk mengatur nilai range
	 * 
	 * @param String 	$variable 	Nama variabel
	 * @param Array 	$range    	Nilai range
	 *
	 * @return Array 				Nilai range
	 * 
	 */
	public function setInputRange($variable, $range)
	{
		$this->RInputRange[$variable] = $range;
	}

	/**
	 * Agregate semua rule untuk didefuzzifikasi
	 * 
	 * @param  String 	$outputName 	Nama variabel
	 * @param  Array 	$member     	Data derajat keanggotaan
	 * @param  float  	$alphaCut 
	 * 
	 * @return Void
	 * 
	 */
	public function fuzzyAgregate($outputName, $member, $alphaCut = 0.0)
	{
		foreach ($this->RXValue[$outputName] as $index => $pointX) :
			if ($pointX < $member->MAwal) continue;
			if ($pointX > $member->MAkhir) break;
			$fuzzify = $member->Fuzzification($pointX);
			$value = min($fuzzify, $alphaCut);
			$this->RYValue[$outputName][$index] = max($this->RYValue[$outputName][$index], $value);
		endforeach;
	}

	/**
	 * Menjalankan algoritma fuzzy
	 */
	public function Execute()
	{
		$this->clearSolution();

		$sum = 0;
		$temp = $sum = $cnt = array();

		// Fill output agregate table
		foreach ($this->getOutputNames() as $outputName) :
			$agregateDeltaX = ($this->FMax[$outputName] - $this->FMin[$outputName]) / $this->agregatePoint;
			$this->RXValue[$outputName] = range($this->Fmin[$outputName], $this->FMax[$outputName], $agregateDeltaX);
			$this->RYValue[$outputName] = array_fill(0, count($this->RXValue[$outputName]), 0.0);
		endforeach;

		$rules = $this->getRules();
		foreach ($rules as $key => $rule) :
			list($outItem, $value) = $this->executeRule($rule);
			list($outputName, $memberName) = explode('.', $outItem);
			$this->stateOutout[$memberName] = $value;
			$member = $this->getMemberByName($outputName, $memberName);
			if ($value > 0) $this->fuzzyAgregate($outputName, $member, $value);
		endforeach;

		$result = array();

		foreach ($this->getOutputNames() as $outputName) :
			$sumA = 0.0;
			$sumB = 0.0;

			foreach ($this->RXValue[$outputName] as $id => $x) :
				$y = $this->RYValue[$outputName][$id];
				if ($y > 0 ) :
					$sumA += ($x * $y);
					$sumB += $y;
				endif;
			endforeach;

			$result[$outputName] = ($sumA == 0) ? 0 : ($sumA / $sumB);
		endforeach;

		return $result; 
	}
}

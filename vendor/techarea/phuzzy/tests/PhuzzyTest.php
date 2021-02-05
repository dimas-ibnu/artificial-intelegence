<?php

use Techarea\Phuzzy\Phuzzy;

class PhuzzyTest extends PHPUnit_Framework_TestCase {

	public function testExecute()
	{
		$phuzzy = new Phuzzy;

		$phuzzy->clearMembers();
		
		$phuzzy->setInputNames(['harga', 'rasa']);
		
		$phuzzy->addMember('harga', 'murah',  0, 2000, 4000, 'LEFT_INFINITY');
		$phuzzy->addMember('harga', 'sedang', 3000, 5000, 7000, 'TRIANGLE');
		$phuzzy->addMember('harga', 'mahal', 6000, 8000, 10000, 'RIGHT_INFINITY');

		$phuzzy->addMember('rasa', 'tidak',  0, 20, 40, 'LEFT_INFINITY');
		$phuzzy->addMember('rasa', 'sedang', 30, 50, 70, 'TRIANGLE');
		$phuzzy->addMember('rasa', 'enak', 60, 80, 100, 'RIGHT_INFINITY');

		$phuzzy->SetOutputNames(array('bonus'));

		$phuzzy->addMember('bonus', 'tidak',  0, 20, 40, 'LEFT_INFINITY');
		$phuzzy->addMember('bonus', 'sedang', 30, 50, 70, 'TRIANGLE');
		$phuzzy->addMember('bonus', 'banyak', 60, 80, 100, 'RIGHT_INFINITY');

		$phuzzy->clearRules();

		$phuzzy->addRule('IF harga.murah AND rasa.tidak THEN bonus.tidak');
		$phuzzy->addRule('IF harga.murah AND rasa.sedang THEN bonus.sedang');
		$phuzzy->addRule('IF harga.murah AND rasa.enak THEN bonus.banyak');

		$phuzzy->addRule('IF harga.sedang AND rasa.tidak THEN bonus.tidak');
		$phuzzy->addRule('IF harga.sedang AND rasa.sedang THEN bonus.sedang');
		$phuzzy->addRule('IF harga.sedang AND rasa.enak THEN bonus.sedang');

		$phuzzy->addRule('IF harga.mahal AND rasa.tidak THEN bonus.tidak');
		$phuzzy->addRule('IF harga.mahal AND rasa.sedang THEN bonus.tidak');
		$phuzzy->addRule('IF harga.mahal AND rasa.enak THEN bonus.sedang');

		$phuzzy->setRealInput('harga', 2000);
		$phuzzy->setRealInput('rasa', 20);

		$result = $phuzzy->Execute();

		print_r($result);
	}

}

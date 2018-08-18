<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AlgosHelpers\Leaf;

/*-----------------------------------------------*
 *												 *
 *			   Binary Tree Algorithms 			 *
 *												 *
 *-----------------------------------------------*/

class BinaryAlgos extends Controller{

	private $_test_method = "_generateTree";

	/**
	*	Create the biblical family tree
	*/
	private function _generateTree(){

		$god = new Leaf("God");
		$issac = new Leaf("Issac");
		$joseph = new Leaf("Joseph");
		$ruth = new Leaf("Ruth");
		$mary = new Leaf("Mary");
		$sara = new Leaf("Sara");
		$lot = new Leaf("Lot");
		$magdalina = new Leaf("Magdalina");
		$jesus = new Leaf("Jesus");
		$marc = new Leaf("Marc");
		$bathsheeba = new Leaf("Bathsheeba");
		$paul = new Leaf("Paul");
		$beyonce = new Leaf("Beyonce");
		$jayZ = new Leaf("Jay-Z");
		$lilWayne = new Leaf("lil Wayne");
		$kanye = new Leaf("Kanye");
		$kim = new Leaf("Kim");
		$blueIvy = new Leaf("Blue Ivy");
		$north = new Leaf("North");

		// construct the bidirectional tree
		$god->addChild($issac);
		$god->addChild($joseph);
		$ruth->addChild($lot);
		$issac->addChild($lot);
		$joseph->addChild($jesus);
		$mary->addChild($jesus);
		$sara->addChild($marc);
		$sara->addChild($bathsheeba);
		$lot->addChild($marc);
		$lot->addChild($bathsheeba);
		$magdalina->addChild($paul);
		$jesus->addChild($paul);
		$bathsheeba->addChild($jayZ);
		$bathsheeba->addChild($lilWayne);
		$bathsheeba->addChild($kanye);
		$paul->addChild($jayZ);
		$paul->addChild($lilWayne);
		$paul->addChild($kanye);
		$beyonce->addChild($blueIvy);
		$jayZ->addChild($blueIvy);
		$kanye->addChild($north);
		$kim->addChild($north);

		return $god;

		// echo "<pre>{$north->parents[1]->name}</pre>"; die;
		// echo "<pre>";
		// var_dump($god); 
		// echo "</pre>";
		// die;
	}


	public function show(){
		return view('algos', ['p_load' => $this->{$this->_test_method}()]);
	}
}
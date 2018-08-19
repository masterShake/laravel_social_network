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

	private $_test_method = "_pathExists";

	/**
	*	Create the biblical family tree
	*/
	private function _generateTree($person = "god", $withGod = false){

		$god = new Leaf("God", "M");
		$issac = new Leaf("Issac", "M");
		$joseph = new Leaf("Joseph", "M");
		$ruth = new Leaf("Ruth", "F");
		$mary = new Leaf("Mary", "F");
		$sara = new Leaf("Sara", "F");
		$lot = new Leaf("Lot", "M");
		$magdalina = new Leaf("Magdalina", "F");
		$jesus = new Leaf("Jesus", "M");
		$marc = new Leaf("Marc", "M");
		$bathsheeba = new Leaf("Bathsheeba", "F");
		$paul = new Leaf("Paul", "M");
		$beyonce = new Leaf("Beyonce", "F");
		$jayZ = new Leaf("Jay-Z", "M");
		$lilWayne = new Leaf("lil Wayne", "M");
		$kanye = new Leaf("Kanye", "M");
		$kim = new Leaf("Kim", "F");
		$blueIvy = new Leaf("Blue Ivy", "F");
		$north = new Leaf("North", "F");

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

		if($withGod)
			return [$$person, $lilWayne];
		return $$person;

		// echo "<pre>{$north->parents[1]->name}</pre>"; die;
		// echo "<pre>";
		// var_dump($god); 
		// echo "</pre>";
		// die;
	}

	/**
	*	echo all the fathers in North West's lineage
	*/
	private function _northDad($person = null){

		// base case
		if(is_null($person))
			// start with north
			$person = $this->_generateTree("north");

		// find the father
		$father = $person->parents[0]->gender == "M" ? $person->parents[0] : $person->parents[1];

		// Echo the name of the father
		echo $father->name . "<br><br>";

		// recurse
		if(count($father->parents) > 0)
			return $this->_northDad($father);
		die;
	}

	/**
	*	4.1 given a directed graph, find out 
	*	whether there is a route between two nodes
	*/
	private function _routeBetweenNodes($nodeA = null, $nodeB = null){

		// base case, generate nodes
		if(is_null($nodeA)){
			$nodeA = $this->_generateTree("north", true);
			$nodeB = $nodeA[1];
			$nodeA = $nodeA[0];
		}

		// if node has no more parents, do nothing
		if(count($nodeA->parents) > 0)

			// loop through the parents
			foreach($nodeA->parents as $parent){
				// if the parent is nodeB
				if( $parent === $nodeB ){
					echo "True";
					return true;
				}else{
					return $this->_routeBetweenNodes($parent, $nodeB);
				}
			}
	}

	/**
	*	4.1 improved!
	*	Use a breadth first search to find if a path
	*	exists between 2 nodes
	*/
	private function _pathExists(){

		// generate the nodes
		$nodeA = $this->_generateTree("north", true);
		$nodeB = $nodeA[1];
		$nodeA = $nodeA[0];

		// create the queue with starting node
		$unvisited = [$nodeA];

		//while the queue is unempty
		while( count($unvisited) > 0 ){

			// pop node off the top of the stack
			$curr = array_shift($unvisited);

			// loop through current node's parents
			foreach($curr->parents as $parent){

				// if one of the parents is the node we are looking for
				if($parent === $nodeB){
					// we win
					echo "true"; die;

				// otherwise throw that bitch on the stack
				}else{
					$unvisited []= $parent;
				}
			}
		}
		echo "false"; die;
	}


	public function show(){
		return view('algos', ['p_load' => $this->{$this->_test_method}()]);
	}
}
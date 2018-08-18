<?php

namespace App\Http\Controllers\AlgosHelpers;

class Leaf{
	
	public $children = [],
		   $parents = [],
		   $name = "";

	public function __construct($name){

		$this->name = $name;
	}

	public function addChild($child){

		$this->children []= $child;

		$child->parents []= $this;
	}
}
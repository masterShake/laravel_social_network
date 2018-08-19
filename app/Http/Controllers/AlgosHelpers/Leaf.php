<?php

namespace App\Http\Controllers\AlgosHelpers;

class Leaf{
	
	public $children = [],
		   $parents = [],
		   $name = "",
		   $gender = "",
		   $visited = false;

	public function __construct($name, $gender){

		$this->name = $name;

		$this->gender = $gender;
	}

	public function addChild($child){

		$this->children []= $child;

		$child->parents []= $this;
	}
}
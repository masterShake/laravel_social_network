<?php

namespace App\Http\Controllers\AlgosHelpers;

class LinkedList{

	public $data,
		   $prev,
		   $next;

	public function __contruct($data, $prev = null){

		$this->prev = $prev;

		if(!is_null($this->prev))

			$this->prev->setNext($this);
	}

	public function setNext($next){

		$this->next = $next;
	}

}
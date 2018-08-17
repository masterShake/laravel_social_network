<?php

namespace App\Http\Controllers\AlgosHelpers;

class LinkedList{

	public $data,
		   $prev,
		   $next = null;

	public function __construct($data, $prev = null){

		$this->data = $data;

		if(!is_null($prev)){

			$this->prev = $prev;

			$this->prev->next = $this;
		}
	}

}
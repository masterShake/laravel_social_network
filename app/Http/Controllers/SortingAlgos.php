<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class SortingAlgos extends Controller{

    private $_test_method = "_bubbleSort",
    		$_unsortedArray = [ 4, 6, 14, 2, 21, 1, 33, 9, 17, 16, 13, 29, 7, 22, 8, 30 ];

    private function _bubbleSort($a = null){

    	// base case
    	if(is_null($a))
    		$a = $this->_unsortedArray;

    	// not yet sorted trigger
    	$isSorted = true;

    	// loop through all the items
    	for($i = 0; $i < count($a) - 1; $i++){

    		// if the curr is greater than the prev
    		if($a[$i] > $a[$i+1]){

    			// swap them
    			$temp = $a[$i+1];
    			$a[$i+1] = $a[$i];
    			$a[$i] = $temp;

    			// not there yet
    			$isSorted = false;
    		}
    	}

    	// if the array is already sorted
    	if($isSorted){
	    	// print result
	        // echo "<pre>{$this->_unsortedArray[0]}<br>{$this->_unsortedArray[1]}</pre>"; die;
	        echo "<pre>";
	        print_r($a);
	        echo "</pre>"; die;
	    }else{
	    	return $this->_bubbleSort($a);
	    }
    }


    /**
     * Output the page
     *
     * @return Response
     */
    public function show()
    {
        return view('algos', ['p_load' => $this->{$this->_test_method}()]);
    }
}
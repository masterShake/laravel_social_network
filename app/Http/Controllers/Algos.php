<?php

namespace App\Http\Controllers;

// use App\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AlgosHelpers\LinkedList;

class Algos extends Controller
{

    private $_test_method = "_removeDups";

    /**
    *   1.1 Impliment an algorithm to determine if
    *       a string has all unique characters
    */
    private function _allUnique($str = "lakiweuornvvc"){

        // break the string into an array
        $str_array = str_split($str);

        // check for unique items
        $result = count($str_array) === count(array_unique($str_array)) ? "true" : "false";

        // print result
        echo "<pre>{$result}</pre>"; die;
        // echo "<pre>"
        // print_r($result);
        // echo "</pre>"; die;
    }

    /**
    *   1.4 Given a string, write a function to
    *       check if a permutation is a
    *       palendrome.
    */
    private function _isPalendrome($str = "tacocat"){

        // must have even number of same letters and no more than 1 odd number

        // break the string into an array
        $str_array = str_split($str);

        // get the count for each character
        $letter_count = array_count_values($str_array);

        // keep track of odd numbers
        $odd = 0;

        // loop through the array and add up the odd values
        foreach($letter_count as $occurances)
            $odd += $occurances % 2;

        $result = $odd > 1 ? "false" : "true";
        

        // print result
        echo "<pre>{$result}</pre>"; die;
        // echo "<pre>";
        // print_r($result);
        // echo "</pre>"; die;
    }

    /**
    *   2.1 Write a function to remove duplicates
    *       from an unsorted linked list
    */
    private function _removeDups(){

        $testNode = new LinkedList(1);

        $result = "titties";

        // print result
        echo "<pre>{$result}</pre>"; die;
        // echo "<pre>";
        // print_r($result);
        // echo "</pre>"; die;
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
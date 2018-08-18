<?php

namespace App\Http\Controllers;

// use App\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AlgosHelpers\LinkedList;

class Algos extends Controller
{

    private $_test_method = "_echoListData";

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
    *   link list creator
    */
    private function _linkListCreator(){

        $linkedList = new LinkedList("3");

        for($i = 0; $i < 10; $i++){

            $linkedList = new LinkedList((string)$i, $linkedList);

        }

        $linkedList = new LinkedList("9", $linkedList);
        // $linkedList = new LinkedList("18", $linkedList);

        return $linkedList;
    }

    /**
    *   2.1 Write a function to remove duplicates
    *       from an unsorted linked list
    */
    private function _removeDups(){

        $linkedList = $this->_linkListCreator();

        $hashMap = [];

        // loop through the linked list
        do{

            // if the value is already in the hashmap
            if(in_array($linkedList->data, $hashMap)){

                // remove that link in the chain
                $linkedList->prev->next = $linkedList->next;
                $linkedList->next->prev = $linkedList->prev;

            }

            // add the value to the hashmap
            array_push($hashMap, $linkedList->data);

            // move on to the next node
            $linkedList = $linkedList->prev;

        }while(!is_null($linkedList->prev));

        // handle the base case
        if(in_array($linkedList->data, $hashMap)){

            // remove that link in the chain
            $linkedList->next->prev = $linkedList->prev;
            $linkedList = $linkedList->next;

        }

        // check results
        $this->_echoListData($linkedList);
    }

    /**
    *   Remove duplicates in linked list recursive
    */
    private function _removeDupsR($linkedList = null, $hashMap = []){

            $linkedList = is_null($linkedList) ? $this->_linkListCreator() : $linkedList;

            // if the value is already in the hashmap
            if(in_array($linkedList->data, $hashMap)){

                // remove that link in the chain
                if(!is_null($linkedList->prev))
                    $linkedList->prev->next = $linkedList->next;
                $linkedList->next->prev = $linkedList->prev;

            }else{

                // add the data to the hashMap
                $hashMap []= $linkedList->data;
            }

            return is_null($linkedList->prev) ? 
                        $linkedList :
                        $this->_removeDupsR($linkedList->prev, $hashMap);
    }

    /**
    *   echo out linked list data
    */
    private function _echoListData(){

        $linkedList = $this->_removeDupsR();

        echo "<pre>";

        // loop through the linked list back to front
        do{

            echo $linkedList->data . "<br>";

            $linkedList = $linkedList->next;

        }while(!is_null($linkedList));

        echo "</pre>"; die;

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
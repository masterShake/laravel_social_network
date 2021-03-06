<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <br>
        <h2 style="text-align: center;">Practice Algorithms</h2>
        <br>
        <div class="card" style="min-height: 400px;">
            <pre>

                {{ $p_load }}

            </pre>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>

        /**
        *   1.4 check if string is a palendrom
        *       - 
        *
        */
        function isPalendrome(str){

            // maintain a hashtable
            let hashTable = {}

            // loop through the string
            for(let i = 0; i < str.length; i++){

                // if the letter already exists in the table
                if(hashTable.hasOwnProperty(str[i]))

                    // increment the counter
                    hashTable[str[i]] += 1
                
                // if the letter is not in the table
                else

                    // add it
                    hashTable[str[i]] = 1
                
            }

            // hashTable must contain no more than 1 odd numbered entry
            // keep a counter of odd numbers
            let odds = 0

            // loop through the hashTable
            for(let x in hashTable)

                // increment "odds" if the value is not divisible by 2
                odds += hashTable[x] % 2 == 1 ? 1 : 0;
            

            // console.log('number of odd letters:',odds)
            return odds > 1 ? false : true;

        }

        /**
        *   1.6 STRING COMPRESSION
        *       - "aaabbbbbbbccdee" -> "a3b7c2de2"
        *       - should return origal string if compression not shorter
        */
        function strCompress(str){

            // keep track of prev char
            let prevChar = str[0]

            // keep track of count of character
            let charCount = 1

            // compressed version
            let compressedStr = ""

            // loop through the string
            for(let i = 1; i < str.length + 1; i++){

                // if the current char matches the prev
                if(str[i] == prevChar){

                    // increment the char count
                    charCount += 1
                
                // if no match
                }else{

                    // update the compressed string
                    compressedStr += charCount > 1 ?  prevChar + charCount : prevChar;

                    // reset prevChar
                    prevChar = str[i]

                    // reset charCount
                    charCount = 1
                }
            }

            return compressedStr;
        }

        // const x = "aaabbbbbbbcddee"

        // console.log(strCompress(x))

        /**
        *   ROTATE MATRIX
        *   + - - - +    + - - - +
        *   | A B C |    | G D A |
        *   | D E F | => | H E B |
        *   | G H I |    | I F C |
        *   + - - - +    + - - - +
        *   @return 2D array
        */
        function rotateMatrix(matrix){

            return false;
        }
    </script>
    <script>
        /**----------------
        *
        *   CHAPTER 2: Linked Lists
        *
        -------------------*/

        /**
        *   Linked List Class
        */
        class LinkedList{

            // construct
            constructor(data, prev){

                this.data = data

                this.next = null;

                if(prev){

                    this.prev = prev

                    this.prev.next = this
                
                }else{

                    this.prev = null;
                }
            }
        }

        /**
        *   Generate a linked listed
        */
        function listGenerator(){

            let k = 
                l = new LinkedList("3")

            for(let i = 0; i < 10; i++)

                l = new LinkedList(i.toString(), l)

            l = new LinkedList("8", l)

            return k;
        }

        /**
        *   2.2 Return Kth to Last
        *       - write an algorithm to return the kth to last
        *         element of a singly linked list
        */
        function kToLast(k, ll){

            // keep track of total number of links
            let x = 1

            // copy the pointer
            let n = ll

            // loop through the list once to count # of links
            while(n.next != null){

                x += 1

                n = n.next
            }

            // set the index of k
            k = x - k

            // now that we have length, loop again
            for(let i = 0; i < k; i++)

                ll = ll.next

            return ll
        }

        /**
        *   2.2 Return Kth to Last (Recursive)
        */
        function rToLast(){
            return false;
        }

    </script>
  </body>
</html
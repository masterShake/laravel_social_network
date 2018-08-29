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

            //
        }

    </script>
  </body>
</html
<?php
    class FindReplace
    {
        private $findPhrase;
        private $replaceWith;
        private $originalPhrase;
        private $newPhrase;

        function __construct($findPhrase, $replaceWith, $originalPhrase)
        {
            $this->findPhrase = $findPhrase;
            $this->replaceWith = $replaceWith;
            $this->originalPhrase = $originalPhrase;
            $this->newPhrase = "";
        }
        // *** This function uses preg_replace with a regular expression for all test passing ***
        // ** case-insenstive searching i.e., search word "the" will match with "The", "THE", "tHe", "the", etc. **

        // function callReplace()
        // {
        //     $regularExpression = "/$this->findPhrase/i";
        //
        //     return preg_replace($regularExpression, $this->replaceWith, $this->originalPhrase);
        // }


        // *** This function uses str_ireplace to search string for the FIRST instance of a match and replaces it ***
        // ** case-insenstive, only one match, and not matches within words i.e., cathedral would not match **

        // function callReplace()
        // {
        //     $this->newPhrase .= str_ireplace($this->findPhrase, $this->replaceWith, $this->originalPhrase);
        //
        //     return $this->newPhrase;
        // }

        // *** This function uses stripos and substr_replace to search for and replace ***
        // ** case-insenstive, partial matches, and match within words are fine **

        // function callReplace()
        // {
        //     $temporaryArray = array();
        //     $explodeOurString = explode(" ", $this->originalPhrase);
        //
        //     foreach ($explodeOurString as $word) {
        //
        //         $positionOfMatchedWord = stripos($word, $this->findPhrase);
        //
        //         if (gettype($positionOfMatchedWord) == "integer") {
        //             array_push($temporaryArray, substr_replace($word, $this->replaceWith, $positionOfMatchedWord, strlen($this->findPhrase)));
        //         } else {
        //             array_push($temporaryArray, $word);
        //         }
        //     }
        //
        //     $this->newPhrase = implode(" ", $temporaryArray);
        //
        //     return implode(" ",$temporaryArray);
        // }


        // *** Function currently not working ***

        function callReplace()
        {
            $explodedPhrase = explode(" ", $this->originalPhrase); // Turn original phrase into an array of words
            foreach ($explodedPhrase as $key => $word) // for each word in the array of words
            {   // check to see if "cat" is located in the $word
                $positionOfWord = stripos($word, $this->findPhrase);

                if (gettype($positionOfWord) == "integer") {

                    $aNewWord = array(); // empty array to hold our new word
                    $explodeFindWord = str_split($this->replaceWith); // split up our desired phrase, (i.e. "dog")

                    $strippedWord = str_split($word); // split up the $word to push letters before, after, and delete "cat"
                    if ($positionOfWord != 0) {
                        for ($index = 0; $index < $positionOfWord; ++$index) {
                            array_push($aNewWord, $strippedWord[$index]);
                        }
                    }
                    for ($index = 0; $index < strlen($this->replaceWith); ++$index) {
                        array_push($aNewWord, $explodeFindWord[$index]);
                    }
                    for ($index = ($positionOfWord + strlen($this->findPhrase)); $index < strlen($word); ++$index) {
                        array_push($aNewWord, $strippedWord[$index]);
                    }
                    $explodedPhrase[$key] = implode($aNewWord); // re-create string from array
                } // end "if" stripos found in the word

            } // end foreach

            $results = implode(" ", $explodedPhrase);

            return $results;
        }
    }
?>

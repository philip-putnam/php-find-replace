<?php
    require_once 'src/FindReplace.php';


    class FindReplaceTest extends PHPUnit_Framework_TestCase
    {
        // FindReplace construct:
        // (find_this_word, replace_the_word_with_this, original_phrase)
        function test_callReplace()
        {
            //arrange
            $newFindReplace = new FindReplace("the", "fish", "The people went to the park");

            //act
            $results = $newFindReplace->callReplace();

            //assert
            $this->assertEquals("fish people went to fish park", $results);
        }

        function test_callReplace_partial()
        {
            //arrange
            $newFindReplace = new FindReplace("cat", "dog", "I am walking my cat to the cathedral");

            //act
            $results = $newFindReplace->callReplace();

            //assert
            $this->assertEquals("I am walking my dog to the doghedral", $results);
        }

        function test_callReplace_partialMiddle()
        {
            //arrange
            $newFindReplace = new FindReplace("cat", "dog", "I am walking my cat to the cathedral concatenate");

            //act
            $results = $newFindReplace->callReplace();

            //assert
            $this->assertEquals("I am walking my dog to the doghedral condogenate", $results);
        }
    }
 ?>

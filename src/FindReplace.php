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

        function callReplace()
        {
            $this->newPhrase .= str_ireplace($this->findPhrase, $this->replaceWith, $this->originalPhrase);

            return $this->newPhrase;
        }
    }
?>

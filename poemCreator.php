<?php
   session_start();
   $topic = filter_var($_POST['topic'], FILTER_SANITIZE_STRING);

   require_once("poemUtil.php");
   $poemUtil = new poemUtil($topic);
   if (!($poemUtil->validTopic())) {
     //TODO: add message explaining it's an invalid topic
     header("location: index.php");
     die();
   }

   // https://www.perfecttense.com/docs/#introduction
   // possible grammar apis
   // https://www.scribens.com/#

   // Sentence generator: https://linguatools.org/language-apis/sentence-generating-api/

   $feathers = $poemUtil->getNoun("https://api.datamuse.com/words?rel_gen={$topic}&md=p"); // was rel_trg
   $category = $poemUtil->getNoun("https://api.datamuse.com/words?rel_spc={$feathers}&md=p&topics={$topic}"); // maybe don't get this one randomly?
   $perches = $poemUtil->getVerb("https://api.datamuse.com/words?rel_trg={$category}&md=p");
   $soul = $poemUtil->getNoun("https://api.datamuse.com/words?ml=place&rel_trg={$topic}&md=p");
   $sings = $poemUtil->getVerb("https://api.datamuse.com/words?rel_trg={$category}&md=p");
   $tune = $poemUtil->getNoun("https://api.datamuse.com/words?ml={$sings}&md=p&topics={$topic}");
   $words = $poemUtil->getNoun("https://api.datamuse.com/words?rel_trg={$tune}&md=p&topics={$topic}");
   $stops = $poemUtil->getVerb("https://api.datamuse.com/words?rel_ant={$sings}&md=p");
   $atall = $poemUtil->getNoun("https://api.datamuse.com/words?rel_rhy={$soul}&md=p&topics={$category}");

   $title = "{$topic} is the thing with {$feathers}";
   $poem = "<p>{$topic} is the thing with {$feathers}</p>"
   . "<p>that {$perches} in the {$soul}</p>"
   . "<p>and {$sings} the {$tune} without the {$words}</p>"
   . "<p>and never {$stops} - {$atall}</p>";

   //print($poem);

   $_SESSION['title'] = $category;
   $_SESSION['poem'] = $poem;
   header("location: poem.php");
   die();

?>

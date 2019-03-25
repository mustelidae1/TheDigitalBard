<?php
   session_start();
   $topic = filter_var($_POST['topic'], FILTER_SANITIZE_STRING);

   // https://www.perfecttense.com/docs/#introduction
   // possible grammar api ^

   $query1 = "https://api.datamuse.com/words?rel_trg={$topic}&md=p";
   $resp1 = file_get_contents($query1);
   $json1 = json_decode($resp1, true);
   $feathers = $json1[0]["word"];

   $query2 = "https://api.datamuse.com/words?rel_spc={$feathers}&md=p&topics={$topic}";
   $resp2 = file_get_contents($query2);
   $json2 = json_decode($resp2, true);
   $category = $json2[0]["word"];

   $query3 = "https://api.datamuse.com/words?rel_trg={$category}&md=p";
   $resp3 = file_get_contents($query3);
   $json3 = json_decode($resp3, true);
   foreach ($json3 as $word) {
     if (in_array("v", $word["tags"])) {
       $perches = $word["word"];
       //TODO: deal with verb tense
       break;
     }
   }

   $query4 = "https://api.datamuse.com/words?ml=place&rel_trg={$topic}";
   $resp4 = file_get_contents($query4);
   $json4 = json_decode($resp4, true);
   $soul = $json4[0]["word"];

   // have to get second one because we already used the first one
   $query5 = "https://api.datamuse.com/words?rel_trg={$category}&md=p";
   $resp5 = file_get_contents($query5);
   $json5 = json_decode($resp5, true);
   $count = 0;
   foreach ($json5 as $word) {
     if (in_array("v", $word["tags"])) {
       $sings = $word["word"];
       //$sings = "{$sings}" . "s";
       //TODO: deal with verb tense
       if ($count == 0) {
         $count = $count + 1;
       } else {
         break;
       }
     }
   }

   $query6 = "https://api.datamuse.com/words?ml={$sings}&md=p&topics={$topic}";
   $resp6 = file_get_contents($query6);
   $json6 = json_decode($resp6, true);
   $tune = $json6[0]["word"];

   $query7 = "https://api.datamuse.com/words?rel_trg={$tune}&md=p&topics={$topic}";
   $resp7 = file_get_contents($query7);
   $json7 = json_decode($resp7, true);
   $words = $json7[0]["word"];
   if ($words == $topic) {
     $words = $json7[1]["word"];
   }

   $query8 = "https://api.datamuse.com/words?rel_ant={$sings}&md=p";
   $resp8 = file_get_contents($query8);
   $json8 = json_decode($resp8, true);
   foreach ($json8 as $word) {
     if (in_array("v", $word["tags"])) {
       $stops = $word["word"];
       //TODO: deal with verb tense
       break;
     }
   }

   $query9 = "https://api.datamuse.com/words?rel_rhy={$soul}&md=p&topics={$category}";
   $resp9 = file_get_contents($query9);
   $json9 = json_decode($resp9, true);
   $atall = $json9[0]["word"];

   $title = "{$topic} is the thing with {$feathers}";
   $poem = "<p>{$topic} is the thing with {$feathers}</p>"
   . "<p>that {$perches} in the {$soul}</p>"
   . "<p>and {$sings} the {$tune} without the {$words}</p>"
   . "<p>and never {$stops} - {$atall}</p>";

   print($poem);

   $_SESSION['title'] = $title;
   $_SESSION['poem'] = $poem;
   header("location: poem.php");
   die();

?>

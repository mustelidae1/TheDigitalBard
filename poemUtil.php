<?php
  class poemUtil {

    // TODO: the other possible way to handle words not found is if we realize
    // that we have taken a bad path and retrace our steps.
    // (or predict if a word isn't going to give us a lot of options later on)
    // Especially if we know it has to rhyme with something later this might be a good idea.


    public function __construct($topicIn) {
      global $usedWords;
      $usedWords = array();

      global $topic;
      $topic = $topicIn;
      $this->addUsed($topic);

      global $randomness;
      $randomness = 3;
    }


        //TODO: send user a message if their topic is not valid
    public function validTopic() {
      global $topic;
      $resp = file_get_contents("https://api.datamuse.com/words?rel_trg={$topic}&md=p");
      $json = json_decode($resp, true);
      $elementCount = count($json);
      if ($elementCount >= 3) {
        return true;
      } else {
        return false;
      }
    }

    // TODO: add getRhyming function that defaults to close rhymes if it can't find one
    // TODO: Stuff still times out -- see History at 10
    // TODO: make this get noun
    public function getWord($query) {
      // Only keep first word if there are multiple
      $pieces = explode(" ", $query);
      $query = $pieces[0];

      $resp = file_get_contents($query);
      $json = json_decode($resp, true);
      if (count($json) == 0) {
        global $topic;
        return $this->getWord("https://api.datamuse.com/words?rel_trg={$topic}&md=p");
      }
      $result = "";

      global $randomness;
      $numSearches = rand(0, $randomness);
      $searchCount = 0;

      foreach ($json as $word) {
        $curWord = $word["word"];
        if(!($this->isUsed($curWord)) || $searchCount == (count($json) - 1)) {
          $result = $curWord;

          // TODO: Find a better way to do this?
          // If randomness if 3 it only ever looks at the first 3
          if ($searchCount == $numSearches || $searchCount == (count($json) - 1)) {
            break;
          } else {
            $searchCount++;
            continue;
          }
        }
      }
      if(strcmp($result, "") == 0) {
        global $topic;
        return $this->getWord("https://api.datamuse.com/words?rel_trg={$topic}&md=p");
      }
      $this->addUsed($result);
      return $result;
    }

    public function getNoun($query) {
      // Only keep first word if there are multiple
      $pieces = explode(" ", $query);
      $query = $pieces[0];

      $resp = file_get_contents($query);
      $json = json_decode($resp, true);
      if (count($json) == 0) {
        global $topic;
        return $this->getWord("https://api.datamuse.com/words?rel_trg={$topic}&md=p");
      }
      $result = "";

      global $randomness;
      $numSearches = rand(0, $randomness);
      $searchCount = 0;

      $nouns = array();
      foreach ($json as $word) {
        if (in_array("n", $word["tags"])) {  // TODO: sometimes tags array is empty...why?
           $nouns[] = $word;
        }
      }
      if (count($nouns) == 0) {
        global $topic;
        return $this->getWord("https://api.datamuse.com/words?rel_trg={$topic}&md=p");
      }
      foreach ($nouns as $word) {
        $curWord = $word["word"];
        if(!($this->isUsed($curWord)) || $searchCount == (count($nouns) - 1)) {
          $result = $curWord;
          if ($searchCount == $numSearches || $searchCount == (count($nouns) - 1)) {
            break;
          } else {
            $searchCount++;
            continue;
          }
        }
      }
      if(strcmp($result, "") == 0) {
        global $topic;
        return $this->getNoun("https://api.datamuse.com/words?rel_trg={$topic}&md=p");
      }
      $this->addUsed($result);
      return $result;
    }

    public function getVerb($query) {
      // Only keep first word if there are multiple
      $pieces = explode(" ", $query);
      $query = $pieces[0];

      $resp = file_get_contents($query);
      $json = json_decode($resp, true);
      if (count($json) == 0) return "is";
      $result = "";

      global $randomness;
      $numSearches = rand(0, $randomness);
      $searchCount = 0;

      $verbs = array();
      foreach ($json as $word) {
        //print_r($json);
        //echo("<br><br>");
        if (in_array("v", $word["tags"]) || $searchCount == count($json)) {
           $verbs[] = $word;
        }
      }
      if (count($verbs) == 0) return "is";
      foreach ($verbs as $word) {
        $curWord = $word["word"];
        if(!($this->isUsed($curWord)) || $searchCount == (count($verbs) - 1)) {
          $result = $curWord;
          $result = $this->verbPresentTense($result);
          if ($searchCount == $numSearches || $searchCount == (count($verbs) - 1)) {
            break;
          } else {
            $searchCount++;
            continue;
          }
        }
      }
      if(strcmp($result, "") == 0) {
        global $topic;
        return $this->getVerb("https://api.datamuse.com/words?rel_trg={$topic}&md=p");
      }
      $this->addUsed($result);
      return $result;
    }

    public function verbPresentTense($verb) {
      // https://rapidapi.com/ceneezer/api/conjugate?utm_source=mashape&utm_medium=301
      // TODO
      if (strcmp(substr($verb, -1), "s") == 0) {
        return $verb;
      } else if (strcmp(substr($verb, -2), "ed") == 0) {
        $verb = substr($verb, 0, -2); //TODO: doesn't work for words like emigrated that are supposed to end in ed
      } else if (strcmp(substr($verb, -3), "ing") == 0) {
        $verb = substr($verb, 0, -3);
      }
      $vowels = ["a", "i", "o", "u"]; // not including e because if it ends in e we just add the s
      if (in_array(substr($verb, -1), $vowels)) {
        return ($verb . "es");
      } else {
        return ($verb . "s");
      }
    }

    public function addUsed($word) {
      global $usedWords;
      $usedWords[] = $word; // pushes to end of array
    }

    public function isUsed($word) {
      global $usedWords;
      $retval = false;
      foreach ($usedWords as $curWord) {
        if (strcmp($word, $curWord) == 0) {
          $retval = true;
        }
      }
      return $retval;
    }
  }
?>

<?php
$x=$bookslist;

//get the q parameter from URL
$hint="";
//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  foreach($bookslist as $book)
  {
    $y=$book->name;
    $z=$book->id;

    if (stristr($y,$q)) {
        if ($hint=="") {
          $hint="<option onclick='chooseBook(this)' class=\"change-onhover\" value='" .
          $z.
          "'>" .
          $y. "</option>";
        } else {
          $hint=$hint . "<option onclick='chooseBook(this)' class=\"change-onhover\" value='" .
          $z.
          "'>" .
          $y. "</option>";
        }
      }
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="";
} else {
  $response=$hint;
}

//output the response
echo $response;
?> 
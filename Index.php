<?php
include 'Parser.php';
include 'Tag.php';

use CustomTagParser\Parser;

$text = '<mention id="11" name="ucup"><quote id="11" content="blablabla">';
$parser = new CustomTagParser\Parser($text);

foreach($parser->tags('mention') as $tag) {
  $tag->replaceWith('<a href="users/'.$tag->id.'">'.$tag->name.'</a>');
}
foreach($parser->tags('quote') as $tag) {
  $tag->replaceWith('<br>Quoting user_id='.$tag->id.'<br>Content='.$tag->content);
}
echo $parser->toString();
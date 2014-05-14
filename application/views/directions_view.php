<?php
//views/news_view.php.php
print '<h1>' . $xml->channel->title . '</h1>';
  echo '<h1>' . $xml->channel->description . '</h1>';
  foreach($xml->channel->item as $story)
  {
    echo '<a href="' . $story->link . '">' . $story->title . '</a><br />'; 
    echo '<p>' . $story->description . '</p><br /><br />';
  }
?>

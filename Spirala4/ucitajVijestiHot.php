<?php
  $citaj = simplexml_load_file("hotNews.xml");
  foreach ($citaj as $c){
    echo "<a href='".$c->a."'>";
    echo "<div class='hotSlika'><img src='".$c->img."'/></div>";
    echo "<div class='hotText'><p>".$c->p."</p></div>";
    echo "</a>";
  }
?>

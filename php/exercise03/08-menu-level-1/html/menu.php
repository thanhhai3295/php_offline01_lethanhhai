<?php 
  include 'data.php';
  $xhtml = '';
  foreach($arrMenu as $keyLevelOne => $menuLevelOne) { 
      $classActive = '';
      if ($keyLevelOne == $menuCurrent) $classActive = 'class="active"';
      $xhtml .= '<li '.$classActive.'><a href="'.$menuLevelOne["link"].'">'.$menuLevelOne["name"].'</a></li>';      
  }
?>

<div class="menuBackground">
  <div class="center">
    <ul class="dropDownMenu">
      <?php echo $xhtml; ?>    
    </ul>
  </div>
</div>
<?php 
  include 'data.php';
  $xhtml = '';
  foreach($arrMenu as $keyLevelOne => $menuLevelOne) {
    if (isset($menuLevelOne['child'])) {
      $classActive = ($keyLevelOne == $menuCurrent) ? 'class="active"' : '';
      if(in_array($menuCurrent,array_keys($menuLevelOne['child']))) {
        $classActive = 'class="active"';
      }else {
        foreach($menuLevelOne['child'] as $keyLevelTwo => $menuLevelTwo) {
          if(in_array($menuCurrent,array_keys($menuLevelTwo['child']))) {
            $classActive = 'class="active"';
          }
        }
      }
      $xhtml .= '<li '.$classActive.'><a href="'.$menuLevelOne['link'].'">'.$menuLevelOne['name'].'</a><ul>';
      foreach($menuLevelOne['child'] as $keyLevelTwo => $menuLevelTwo) {

        $xhtml .= '<li><a href="'.$menuLevelTwo['link'].'">'.$menuLevelTwo['name'].'</a><ul>';
        foreach($menuLevelTwo['child'] as $keyLevelThree => $menuLevelThree) {
          $xhtml .= '<li><a href="'.$menuLevelThree['link'].'">'.$menuLevelThree['name'].'</a></li>';
        }
        $xhtml .= '</ul></li>';
      }
      $xhtml .= '</ul></li>';
    }else {
      $classActive = ($keyLevelOne == $menuCurrent) ? 'class="active"' : '';
      $xhtml .= '<li '.$classActive.'><a href="'.$menuLevelOne['link'].'">'.$menuLevelOne['name'].'</a></li>';
    }
  }
?>
<div class="menuBackground">
  <div class="center">
    <ul class="dropDownMenu">
    <?php echo $xhtml; ?>
        
    </ul>
  </div>
</div>
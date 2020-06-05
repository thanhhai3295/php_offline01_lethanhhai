<table class="table table-striped table-bordered">
  <thead>
    <tr class="bg-primary text-white">
      <th class="text-center">
        <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="customCheck999">
        <label class="custom-control-label" for="customCheck999"></label>
        </div>
      </th>
      <th class="text-center">ID</th>
      <th class="text-center" style="width:30%;">Name</th>
      <th class="text-center">Status</th>
      <th class="text-center">Ordering</th>
      <th class="text-center">Action</th>
    </tr>
  </thead>
  <tbody class="anima" id="livesearch">
    <form action="index.php?controller=users&action=multiDelete" id="main-form" method="POST">
<?php 
    $items = $this->items;
    $xhtml = '';
    if(!empty($items)) {
      foreach ($items as $key => $value) {
        $id       = $value['id'];
        $name     = HTML::addSpan($value['name']);
        $ordering = $value['ordering'];
        $status   = HTML::showStatus($value['status'],$id);
        $xhtml .= '<tr>
                  <td class="text-center">
                  <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="checkbox[]" value="'.$id.'" class="custom-control-input" id="customCheck'.$id.'">
                  <label class="custom-control-label" for="customCheck'.$id.'"></label>
                  </td>
                  <td class="text-center">'.$id.'</td>
                  <td>'.$name.'</td>
                  <td class="text-center status">'.$status.'</td>
                  <td class="text-center">'.$ordering.'</td>
                  <td class="text-center">
                  <a href="index.php?controller=users&action=form&id='.$id.'" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
                  <a href="index.php?controller=users&action=delete&id='.$id.'" class="text-danger"><i class="fa fa-fw fa-trash"></i> Delete</a>
                  </td>
                </tr>';
      }
    }else {
      $xhtml = '<tr><td class="text-center alert alert-warning" colspan="6">Don\'t Find Any Result</td></tr>';
    }
    echo $xhtml;
?>
    </form>
  </tbody>
</table>
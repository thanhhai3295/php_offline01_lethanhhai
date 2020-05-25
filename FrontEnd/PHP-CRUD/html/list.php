<?php 
  include 'database/MysqliDb.php';
  include 'libs/HTML.php';
  include 'modal/UserModel.php';  
  $page = 1;
  if(isset($_GET['page'])) $page = $_GET['page'];

  $userModel = new UserModel();
  $params['page'] = $page;
  $items = $userModel->listItem($params);
  $xhtml = '';
  $totalPage = $userModel->db->totalPages;
  foreach ($items as $key => $value) {
    $id       = $value['id'];
    $name     = $value['name'];
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
              <a href="form.php?id='.$id.'" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
							<a href="delete.php?id='.$id.'" class="text-danger"><i class="fa fa-fw fa-trash"></i> Delete</a>
              </td>
            </tr>';
  }
  echo $xhtml;
?>
<?php 

  include 'database/MysqliDb.php';
  include 'libs/HTML.php';
  include 'modal/UserModel.php';  
  $page = 1;
  if(isset($_GET['page'])) $page = $_GET['page'];
  $q = $_GET['q'];
  
  $userModel = new UserModel();
  if($q == '') $userModel->db->orderBy("id","desc");
  $userModel->db->where ("name", '%'.$q.'%', 'like');
  $params['page'] = $page;
  $items = $userModel->listItem($params);
  $xhtml = '';
  $totalPage = $userModel->db->totalPages;
  if(!empty($items)) {
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
                <td>'.str_replace($q,"<span class='red'>$q</span>",$name).'</td>
                <td class="text-center status">'.$status.'</td>
                <td class="text-center">'.$ordering.'</td>
                <td class="text-center">
                <a href="form.php?id='.$id.'" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
                <a href="delete.php?id='.$id.'" class="text-danger"><i class="fa fa-fw fa-trash"></i> Delete</a>
                </td>
              </tr>';
    }
  } else {
    $xhtml = '<tr>
                <td colspan="6" class="text-center">Don\'t Find Result</td>
              </tr>';
  }
  
  echo $xhtml;

?>
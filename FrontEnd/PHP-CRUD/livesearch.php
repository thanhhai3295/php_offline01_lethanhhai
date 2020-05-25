<?php 
  include './database/connectDB.php';
  $q = $_GET['q'];
  if($q == '') $db->orderBy("id","desc");
  $page = 1;
  $db->pageLimit = 4;
  $db->where ("name", '%'.$q.'%', 'like');
  $users = $db->arraybuilder()->paginate("users", $page);
  $totalPage = $db->totalPages;
  $str = '';
  if(!empty($users)) {
    foreach ($users as $key => $value) {
      $str .= '<tr>
                <td class="text-center">
                <div class="custom-control custom-checkbox">
                <input type="checkbox" name="checkbox[]" value="'.$value['id'].'" class="custom-control-input" id="customCheck'.$value['id'].'">
                <label class="custom-control-label" for="customCheck'.$value['id'].'"></label>
                </td>
                <td class="text-center">'.$value['id'].'</td>
                <td>'.str_replace($q,"<span class='red'>$q</span>",$value['name']).'</td>
                <td class="text-center">'.($value['status'] == 0 ? '<a class="btn btn-danger text-white w-50">Inactive</a>' : '<a class="btn btn-primary text-white w-50">Active</a>').'</td>
                <td class="text-center">'.$value['ordering'].'</td>
                <td class="text-center">
                <a href="edit.php?id='.$value['id'].'" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
                <a href="delete.php?id='.$value['id'].'" class="text-danger"><i class="fa fa-fw fa-trash"></i> Delete</a>
                </td>
              </tr>';
    }
  }else {
    $str = '<tr>
            <td colspan="6" class="text-center">Don\'t Find Result</td>
          </tr>';
  }
  
echo $str;


?>
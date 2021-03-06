<?php 
  $columnPost		= $this->arrParam['filter_column'] ?? '';
	$orderPost		= $this->arrParam['filter_column_dir'] ?? '';
  $lblID      	= Helper::cmsLinkSort('ID', 'id', $columnPost, $orderPost);
  $lblName    	= Helper::cmsLinkSort('Name', 'name', $columnPost, $orderPost);
  $lblCreated 	= Helper::cmsLinkSort('Created', 'created', $columnPost, $orderPost);
  $lblOrdering 	= Helper::cmsLinkSort('Ordering', 'ordering', $columnPost, $orderPost);
  $lblStatus  	= Helper::cmsLinkSort('Status', 'status', $columnPost, $orderPost);
  $message      = Helper::createMessage();
  $filter       = Helper::createFilter($this->arrParam,$this->countStatus);
  $pagination   = $this->pagination->showPagination(true);
  $hiddenColumn    = Helper::cmsInput('hidden','filter_column','id');
  $hiddenColumnDir = Helper::cmsInput('hidden','filter_column_dir',$this->arrParam['filter_column_dir']??'');
  $hiddenPage      = Helper::cmsInput('hidden','filter_page','1');
  echo Helper::createTitle($this->_title);
?>

<form action="" id="adminForm" method="POST">

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <?php echo $message; ?> <!-- MESSAGE -->
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Table Group</h3>
              <?php echo $filter; ?> <!-- FILTER -->
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover table-bordered">
                  <thead>
                    <tr>
                        <th>
                          <div class="icheck-danger d-inline">
                            <input type="checkbox" id="checkboxDanger1">
                            <label for="checkboxDanger1">
                            </label>
                          </div>
                        </th>
                        <th><?php echo $lblID ?></th>
                        <th style="width:30%"><?php echo $lblName ?> </th>
                        <th><?php echo $lblCreated ?></th>
                        <th><?php echo $lblOrdering ?></th>
                        <th><?php echo $lblStatus ?></th>
                        <th style="width:25%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $xhtml = '';
                    if (!empty($this->items)) {
                      foreach ($this->items as $key => $value) {
                        $status   = HTML::showStatus($value['status'],$value['id']);
                        $created  = HTML::dateFormat($value['created']);
                        $name     = HTML::addSpan($value['name']);
                        $urlForm  = URL::createLink('admin','group','form',['id' => $value['id']]);
                        $urlDelete = URL::createLink('admin','group','delete',['id' => $value['id']]);
                        $xhtml .= '<tr>
                                    <td>
                                      <div class="icheck-danger d-inline">
                                        <input type="checkbox" id="'.$value['id'].'">
                                        <label for="'.$value['id'].'">
                                        </label>
                                      </div>
                                    </td>
                                    <td>'.$value['id'].'</td>
                                    <td>'.$name.'</td>
                                    <td>'.$created.'</td>
                                    <td>'.$value['ordering'].'</td>
                                    <td>'.$status.'</td>
                                    <td>
                                      <div class="action">
                                        <a href="'.$urlForm.'" class="btn btn-primary"><i class="far fa-edit"></i> Edit</a>
                                        <a class="btn btn-danger" href="'.$urlDelete.'"><i class="fas fa-times"></i> Delete</a>
                                      </div>
                                    </td>
                                  </tr>';
                      } 
                    } else {
                      $xhtml = '<tr><td colspan="7" class="p-0">
                                  <div class="alert alert-danger alert-dismissible m-0">
                                  <h5 class="m-0"><i class="icon fas fa-ban"></i>NO DATA FOUND</h5>
                              </div></td></tr>';
                    }
                    
                  echo $xhtml;
                  ?>       
                  </tbody>
              </table>
            </div><!-- /.card-body -->                  
        </div> <!-- /.card -->
      </div>
    </div>    <!-- end row -->
    <!-- PAGINATION -->
    <div class="row">
      <div class="col-md-12">
        <?php echo $pagination;?>
      </div>
    </div>
    <!-- END PAGINATION -->
  </div><!-- /.container-fluid -->
</section>
<?php echo $hiddenColumn.$hiddenColumnDir.$hiddenPage; ?>
</form>


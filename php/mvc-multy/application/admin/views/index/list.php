<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><?php echo $this->_title ?></h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
    <!-- /.content-header -->

    <!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <?php if(!empty($_SESSION)) HTML::successMSG(isset($_SESSION) ? $_SESSION : ''); ?>
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Table Group</h3>
              <div class="card-tools w-25">
              <form action="" method="GET">
                  <div class="input-group input-group-sm">    
                    <div class="filter mr-3">
                      <?php 
                        $filterActive = URL::createLink('admin','group','list',['filter' => 1]);
                        $filterInactive = URL::createLink('admin','group','list',['filter' => 0]);
                      ?>
                      <a href="<?php echo $filterActive ?>" class="btn btn-outline-success btn-sm">Active(<?php HTML::countStatus(1) ?>)</a>
                      <a href="<?php echo $filterInactive ?>" class="btn btn-outline-warning btn-sm">Inactive(<?php HTML::countStatus(0) ?>)</a>    
                    </div>
                    <input type="text" name="search" class="form-control float-right" placeholder="Search" style="border: 1px solid #ced4da" value="<?php echo isset($_GET['search'])?$_GET['search']:''?>">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                    <input type="hidden" value="<?php echo $_GET['module'] ?>" name="module">
                    <input type="hidden" value="<?php echo $_GET['controller'] ?>" name="controller">
                    <input type="hidden" value="<?php echo $_GET['action'] ?>" name="action">
                  </div>
                </form>
              </div>
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
                        <th>ID</th>
                        <th style="width:40%">Name</th>
                        <th>Created</th>
                        <th>Ordering</th>
                        <th>Status</th>
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
                                        <a class="btn btn-danger"><i class="fas fa-times"></i> Delete</a>
                                      </div>
                                    </td>
                                  </tr>';
                      } 
                    }else {
                      $xhtml = '<tr><td colspan="7" class="p-0"><div class="alert alert-danger alert-dismissible m-0">
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
    <div class="row">
      <div class="col-md-12">
        <ul class="pagination d-flex justify-content-end">
          <li class="page-item <?php HTML::disablePagination() ?>" ><a href="<?php HTML::plusPagination(-1) ?>" class="page-link">Previous</a></li>
        <?php 
          $xhtml = '';
          $active = '';
          $totalPage = $this->totalPage;
          for($i = 1; $i <= $totalPage; $i++) {
            if(isset($_GET['page']) && $i == $_GET['page']) {
              $active = 'active';
            }else if(!isset($_GET['page']) && $i == 1 ){
              $active = 'active';
            }else {
              $active = '';
            }
            
            $url = URL::createLink('admin','group','list',['page' => $i]);
            foreach($_GET as $key => $value) {
              if($key == 'search' || $key == 'filter') {
                $url .= "&$key=$value";
              }
            }
            $xhtml .= '<li class="page-item '.$active.'"><a class="page-link" href="'.$url.'">'.$i.'</a></li>';
          }
          echo $xhtml;
        ?>
          
          <li class="page-item <?php HTML::disablePagination($totalPage) ?>"><a href="<?php HTML::plusPagination(+1) ?>" class="page-link">Next</a></li>
          
        </ul>
      </div>
    </div>


  </div><!-- /.container-fluid -->
</section>


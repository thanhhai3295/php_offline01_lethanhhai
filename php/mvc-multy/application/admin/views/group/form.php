<?php 
  $nameTable = str_replace('/','',$this->_title);
  $action = explode('/',$this->_title);
  $action = trim($action[1]);

  $inputName = Helper::createInput('text','form[name]',$this->arrParam['form']['name']??'','Name',$this->errors['name']??''); 
  $errorName = Helper::createError($this->errors['name']??'');

  $inputOrdering = Helper::createInput('text','form[ordering]',$this->arrParam['form']['ordering']??'','ordering',$this->errors['name']??''); 
  $errorOrdering = Helper::createError($this->errors['ordering']??'');

  $selectArray = [
    'default' => 'Choose Status',
    'active'  => 'Active',
    'inactive'=> 'Inactive'
  ];
  $selectStatus = Helper::cmsSelectbox('form[status]','form-control',$selectArray,$this->arrParam['form']['status']??'');
  $errorStatus = Helper::createError($this->errors['status']??'');
  echo Helper::createTitle($this->_title); 
?>
    <!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-info">
        <div class="card-header indigo">
          <h3 class="card-title"><?php echo $nameTable ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" method="POST" action="">
          <div class="card-body">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <?php echo $inputName.$errorName;?>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Ordering</label>
              <div class="col-sm-10">
                <?php echo $inputOrdering.$errorOrdering;?>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
              <div class="col-sm-10">
                <?php echo $selectStatus.$errorStatus ?>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-info indigo" name="submit"><?php echo $action; ?></button>
          </div>
          <!-- /.card-footer -->
        </form>
        </div>

      </div>  <!-- col-md-6 -->
    </div> <!-- row -->
  </div><!-- /.container-fluid -->
</section>
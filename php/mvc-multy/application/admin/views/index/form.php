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
      <div class="col-md-6">
        <div class="card card-info">
        <div class="card-header indigo">
          <h3 class="card-title"><?php echo str_replace('/','',$this->_title) ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" method="POST" action="">
          <div class="card-body">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <?php 
                  HTML::input('text','name',isset($this->name) ? $this->name : '','Name',isset($this->error['name']) ? $this->error['name'] : ''); 
                  HTML::error(isset($this->error['name'])?$this->error['name']:'');
                ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Ordering</label>
              <div class="col-sm-10">
              <?php 
                HTML::input('text','ordering',isset($this->ordering) ? $this->ordering : '','Ordering',isset($this->error['ordering']) ? $this->error['ordering'] : '');
                HTML::error(isset($this->error['ordering'])?$this->error['ordering']:''); 
              ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
              <div class="col-sm-10">
                <?php HTML::select(isset($this->status)?$this->status:'') ?>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <?php $str = explode('/',$this->_title); ?>
            <button type="submit" class="btn btn-info indigo" name="submit"><?php echo $str[1]; ?></button>
          </div>
          <!-- /.card-footer -->
        </form>
        </div>

      </div>  <!-- col-md-6 -->
    </div> <!-- row -->
  </div><!-- /.container-fluid -->
</section>
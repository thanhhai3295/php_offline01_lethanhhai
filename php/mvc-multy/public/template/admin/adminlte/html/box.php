<div class="row">
   
   <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
         <div class="inner">
            <h3><?php echo $this->countGroup ?></h3>
            <p>Group</p>
         </div>
         <div class="icon">
            <i class="ion ion-stats-bars"></i>
         </div>
         <a href="<?php echo URL::createLink('admin','group','list'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
   </div>
   <!-- ./col --> 
</div>
<!-- /.row -->
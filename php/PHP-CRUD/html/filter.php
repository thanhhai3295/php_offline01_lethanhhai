<div class="card">
  <div class="card-header"><i class="fas fa-search-plus"></i><strong> Filter</strong></div>
  <div class="card-body">
    <div class="col-sm-12">
      <form method="get" action="" class="clearfix mb-0">			
      <div class="float-left">		
        <div class="input-group mb-3">
          <input type="text" name="search" size="30" class="form-control" placeholder=" Search" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?php 
            if(isset($_GET['search'])) echo $_GET['search'];
          ?>">
          <div class="input-group-append">
            <button type="submit" class="btn btn-outline-secondary" type="button">Search</button>
          </div>
        </div>
      </div>
        <div class="float-right">
          <a href="index.php?filter=active" class="btn btn-outline-primary filter">Active(<?php $userModal->countStatus(1); ?>)</a>
          <a href="index.php?filter=inactive" class="btn btn-outline-danger filter">Inactive(<?php $userModal->countStatus(0); ?>)</a>
        </div>
      </form>
    </div>
  </div>
</div>
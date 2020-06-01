<?php 
  $name = $this->items['name'];
  $status = $this->items['status'];
  $ordering = $this->items['ordering'];
?>
<form action="" method="POST">
Name <input type="text" name="name" placeholder="name" value="<?php echo $name ?>">  <br />
Status <input type="text" name="status" placeholder="status" value="<?php echo $status ?>"> <br />
Ordering <input type="text" name="ordering" placeholder="ordering" value="<?php echo $ordering ?>"> <br />
  <button type="submit" name="submit">Edit</button> 
</form>
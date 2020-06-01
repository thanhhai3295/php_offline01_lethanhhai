<?php 
  getTimeXML();
  echo '<form action="process.php" method="POST">
        <label for="timeout">Time Out</label>
        <input type="text" name="timeOut" style="width:40px;" value="'.$timeOut.'">
        <input type="submit" value="Save" name="save">
        </form>'; 
?>
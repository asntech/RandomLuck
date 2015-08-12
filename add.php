<?php
include('inc/header.php');
?>
    <div class="container">
      <br><br>
      <div class="row">
          <div class="col-lg-12">
      <div class="jumbotron">
  <?php
  if($_POST['submit'])
  {
    $participants = explode(PHP_EOL, $_POST['participants']);
    $participant_file = fopen("participant_list.txt", "w") or die("Unable to open file!");
    $count = 0;
    foreach ($participants as $participant) {
      fwrite($participant_file, $participant."\n");
      $count +=1; 
      //echo $participant."\n";
    }
    fclose($participant_file);
    ?>
  <div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Well done!</strong> You successfully added <b><?php echo $count; ?></b> participants.</a>.
  </div>
  <?php  

 }

$handle = fopen("participant_list.txt", "r") or die("Unable to open file!");
$count = 0;
  
?>
	  <form class="form-horizontal" method="post" action="add.php">
  <fieldset>
    <legend>Add Participants</legend>
    
    <div class="form-group">
      <label for="participants" class="col-lg-2 control-label">Participants:</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="15" name="participants"  id="participants" x-webkit-speech=""><?php if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        echo $buffer;
    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}
    ?></textarea>
        <span class="help-block">Enter each participant name in each line.</span>
      </div>
    </div>
 
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" value="submit" name="submit" class="btn btn-primary">Add</button>
      </div>
    </div>
  </fieldset>
</form>
		</div>
	 </div>
        </div>

 <?php
 fclose($participant_file);
include('inc/footer.php');
?>
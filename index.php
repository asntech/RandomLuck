<?php
include('inc/header.php');
?>

    <div class="container">
    	<br><br>

      <div class="row">
        <div class="col-lg-8">
          <div class="jumbotron">
    	     <h2>Welcome to RandomLuck!</h2>
    	     <p><b>RandomLuck</b> is a totally random winner picker.</p>
           <form class="form-horizontal" method="post" action="draw.php">
    	     <p>
              <button type="submit" class="btn btn-primary btn-lg" value="submit" name="submit" class="btn btn-primary btn-lg">Draw Now!</button>
           </p>

         </form>
        <small> Make sure you already added all the <a href="add.php"> participants</a> to the list.</small>

    		  </div>
    	 </div>
       <div class="col-lg-4">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Participants</h3>
          </div>
          <div class="panel-body">
          <?php
           $participants = array();
           $handle = fopen("participant_list.txt", "r") or die("Unable to open file!");
           $count = 0;
           echo "<ul>";
           if ($handle) {
                while (($buffer = fgets($handle, 4096)) !== false) {
                    echo "<li>".$buffer."</li>";
                $count +=1;
                }
                if (!feof($handle)) {
                    echo "Error: unexpected fgets() fail\n";
                }
                fclose($handle);
            }
          echo "</ul>";
          echo "There are <b>". $count ." </b>participants in the list currently.";
        ?>

          </div>
        </div>

        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Prize</h3>
          </div>
          <div class="panel-body">
            List your prize here...
          </div>
        </div>

       </div>
        </div>

 <?php
include('inc/footer.php');
?>



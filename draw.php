<?php
include('inc/header.php');
?>

    <div class="container">
    	<br><br>
      <div class="row">
        <div class="col-lg-12">
          <div class="jumbotron">
    	     <h1> <img src="img/hourglass.gif" align="center">Congratulations!</h1>
    	     <p><hr></p>
    
           <?php
           //sleep(10);
           $participants = array();
           $handle = fopen("participant_list.txt", "r") or die("Unable to open file!");
           $count = 0;
           if ($handle) {
                while (($buffer = fgets($handle, 4096)) !== false) {
                    $participants[] = $buffer;
                $count +=1;
                }
                if (!feof($handle)) {
                    echo "Error: unexpected fgets() fail\n";
                }
                fclose($handle);
            }
        
              $winner = array_pop(array_splice($participants, array_rand($participants), 1));
              //sleep(3);
            
           ?>
           <div class='winner' id='winner'><h2>The winner is: <b><?php  echo $winner; ?></b></h2> </div>
           <hr>

           <form class="form-horizontal" method="post" action="draw.php">
           <p>
              <button type="submit" class="btn btn-primary btn-lg" value="submit" name="submit" class="btn btn-primary btn-lg">Draw Again!</button>
           </p>

         </form>

    		  </div>
    	 </div>
       
        </div>

 <?php
include('inc/footer.php');
?>
<script type="text/javascript">

function toggleWinner() {
  $('#winner').hide();
   setTimeout(function(){
   $('#winner').show();// or fade, css display however you'd like.
}, 10000);`
}
toggleWinner();
</script>



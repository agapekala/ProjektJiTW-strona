<?php
include_once "includes/dbh.inc.php";
include_once "includes/notifications.php";

$s="SELECT child_id,child_name FROM children WHERE parent_id='$par'";
    $result=mysqli_query($conn, $s);
    $i=0;
    $child_array=[];
    while($row=$result->fetch_assoc
          ()){
        $child_array[$i]=$row['child_id'];
        $i=$i+1;
    }

?>
<aside id="popup_nots">
	<div class="popup-inner" id="popup-inner">
    <div class="in">
	<a href="" class="close"><i class="fa fa-times fa-2x" ></i></a>	
    <script>document.querySelector("#popup_nots .close").onclick = function (event) {
    event.preventDefault();
    document.getElementById("popup_nots").style.display = "none"; }</script>
    
    <h2>Nadchodzące wydarzenia</h2>
     
<form action="includes/unset_nots.php" class="pform" method="POST">
  <div class="imgcontainer">
    <img src="images/nots.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
   <?php
      for($i=0; $i<sizeof($nots_array);$i++){
          $s="SELECT title,start FROM events WHERE id='$nots_array[$i]'";
    $result=mysqli_query($conn, $s);
    while($row=$result->fetch_assoc
          ()){
        $hour=date('H:i:s', strtotime($row['start']));
        $date=date("d-m-Y", strtotime($row['start']));
        $d1=date("Y-m-d",strtotime($row['start']));
        $d2=date("Y-m-d",strtotime("now"));
        
        echo '<div class="not_cont"><i class="fa fa-chevron-right" aria-hidden="true"></i>
        <label><b>Tytuł wydarzenia: </b></label>
        '.$row['title'].'<br>
        <label><b>Data: </b></label>
        '.$date.'<br>
        <label><b>Godzina: </b></label>'.$hour.'
        <br><label><b>Dziecko: </b></label>'.$child_name[$i].'
        </div><br><br>'
        ;
        
    }
      }
      ?>
       <button type="submit" name="submit" class="test_button">Oznacz jako przeczytane</button>
  </div>
</form>
</div>
    </div>
    </aside>
   
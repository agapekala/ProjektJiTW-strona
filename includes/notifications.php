<?php 
/*
if(strtotime('2017-12-31')<strtotime('+1 week')){
                        $_SESSION['nots']=true;
                    }else{
                        $_SESSION['nots']=false;
                    }
                    */

$par=$_SESSION['u_id'];
$nots_array=[]; //id wydarzeń
$nots_child=[];
$child_name=[];
$s="SELECT child_id,child_name FROM children WHERE parent_id='$par'";
    $result=mysqli_query($conn, $s);
    $i=0;
    $child_array=[];
    while($row=$result->fetch_assoc
          ()){
        $child_array[$i]=$row['child_id'];
        $nots_child[$i]=$row['child_name'];
        $i=$i+1;
    }

$k=0;
for($j=0; $j<sizeof($child_array); $j++){
    $s="SELECT start, id FROM events WHERE child_id='$child_array[$j]'";
    $result=mysqli_query($conn, $s);
     while($row=$result->fetch_assoc
          ()){
        if(strtotime($row['start'])<strtotime('+1 week') && strtotime($row['start'])>strtotime("now")){
            $nots_array[$k]=$row['id'];
            $child_name[$k]=$nots_child[$j];
                $k=$k+1;
        }
    }
}

if(sizeof($nots_array)!=0 && !isset( $_SESSION['not_off'])){
$_SESSION['nots']=sizeof($nots_array);
}
?>
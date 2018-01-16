<?php
session_start();
//include_once 'includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>Książeczka szczepień onlilne</title>
	<link rel="Shortcut icon" href="images/strzykawka.jpg" />
	<meta charset="utf-8">
		<link rel="stylesheet" href="styles/projekt_main_print.css" media="print">
	<link id="pagestyle1" rel="stylesheet" href="styles/projekt_main.css">
	<link id="pagestyle2" rel="stylesheet" href="styles/login.css">
	<link id="pagestyle4" rel="stylesheet" href="styles/account.css">
	<link id="pagestyle3" rel="stylesheet" href="styles/popup.css">
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
   
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

</head>
<body>
<?php
    include 'header.php';
    ?>
<form class="account" name="account">
  <div class="panel">
    Dane dziecka
</div>
   <div class="account_form">
    <div class="imgcontainer">
        <img src="images/baby.png" class="user_picture" alt="Child Picture">
    </div>
    <?php

if(isset($_GET['id'])){
   
    $_SESSION['current_id']=$_GET['id'];
    $ch_id=$_GET['id'];
    $s="SELECT child_id,child_name, child_age, birth_date, child_gender FROM children WHERE child_id='$ch_id'";
    $result=mysqli_query($conn, $s);
    while($row=$result->fetch_assoc()){
        echo "<div class='dane'><b>Imię: </b>".$row['child_name']."</div><br>
        <div class='dane'><b>Wiek: </b>".$row['child_age']." lat</div><br>
        <div class='dane'><b>Data urodzenia: </b>".$row['birth_date']."</div><br>
        <div class='dane'><b>Płeć: </b>";
        if($row['child_gender']=="female"){
            echo "Dziewczynka </div>";
        }else{
            echo "Chłopiec </div>";
        }
    }
}
?>
</div>
</form>
   
   <form class="options">
       <div class="panel">Informacje</div>
       <div class="options_form">
           <div class="panel2">Monitoring wagi i wzrostu</div>
           <div class="monitoring">
           <b>Waga</b><br>
           <button class="chart_btn" onclick="callA(event);return false;">Dodane</button>
           <button class="chart_btn" onclick="funcB(event); return false;" >Miesięcznie</button>
           <button class="chart_btn" onclick="funcC(event)" >Centyle</button>
           <button class="add_data" onclick="showPopup(event)">Dodaj pomiar wagi</button>
           <div id="chart_block">
               <a name="chart"></a>

              <div id="chart"></div>
           <button class="add_data" onclick="showTable(event)">Szczegóły</button>
           <button class="add_data" onclick="hideChart(event)">Ukryj</button>
           </div>
           <br>
           <b>Wzrost</b><br>
           <button class="chart_btn" onclick="funcA_h(event);return false;">Dodane</button>
           <button class="chart_btn" onclick="funcB_h(event)" >Miesięcznie</button>
           <button class="chart_btn" onclick="funcC_h(event)" >Centyle</button>
           <button class="add_data" onclick="showPopup2(event)">Dodaj pomiar wzrostu</button>
           <div id="chart_block2">
               <a name="chart2"></a>
              <div id="chart2"></div>
           <button class="add_data" onclick="showTable_h(event)">Szczegóły</button>
           <button class="add_data" onclick="hideChart_h(event)">Ukryj</button>
           </div>
           
<?php
    include_once 'weight_chart.php';
    include_once 'height_chart.php';
               ?>
              
           </div>
       </div>
       
   </form>
   
   <form class="one_option">
   <a name="options"></a>
    <div class="panel">Szczegóły</div>
     <div class="options_form">
       <div id="table_form">
        <table style="width:100%" id="table">
  <tr>
    <th>Waga</th>
    <th>Data dodania</th> 
    <th>Zmiana</th>
  </tr>
  
   <?php
    for($i=0; $i<sizeof($php_array2); $i++){
        if($i==0){
            $change=0;
        }else{
            $change=$php_array2[$i]-$php_array2[$i-1];
        }
        
    echo '<tr><td>'.$php_array2[$i].'</td>
    <td>'.$php_array3[$i].'</td>';
    if($change>0){
    echo '<td><i class="fa fa-arrow-up" aria-hidden="true"></i> +'.$change.' kg</td></tr>';
    }else if($change<0){
        echo '<td><i class="fa fa-arrow-down" aria-hidden="true"></i> '.$change.' kg</td></tr>';
    }
    };
        ?>
</table>
    <br>
     </div>
     <div id="table_form2">
        <table style="width:100%" id="table2">
  <tr>
    <th>Wzrost</th>
    <th>Data dodania</th> 
    <th>Zmiana</th>
  </tr>
  
   <?php
    for($i=0; $i<sizeof($php_array2h); $i++){
        if($i==0){
            $change=0;
        }else{
            $change=$php_array2h[$i]-$php_array2h[$i-1];
        }
        
    echo '<tr><td>'.$php_array2h[$i].'</td>
    <td>'.$php_array3h[$i].'</td>';
    if($change>0){
    echo '<td><i class="fa fa-arrow-up" aria-hidden="true"></i> +'.$change.' kg</td></tr>';
    }else if($change<0){
        echo '<td><i class="fa fa-arrow-down" aria-hidden="true"></i> '.$change.' kg</td></tr>';
    }
    };
        ?>
</table>
     </div>
      </div>
   </form>
   
   <form class="one_option" >
       <a name="story"></a>
       <div class="panel">Historia chorób i leków</div>
       <div class="options_form" id="choroby">
       <div class="panel2">Przebyte choroby</div>
       <div class="monitoring">
           <div id="table_illness">
        <table style="width:100%" id="table">
  <tr>
    <th>Rodzaj choroby</th>
    <th>Data dodania</th> 
    <th>Czas trwania</th>
    <th>Lekarstwa</th>
    <th>Objawy</th>
    <th>Dodatkowe informacje</th>
  </tr>
    <?php
        $s="SELECT ill_name,length,meds,sympt,add_inf,DATE(add_date) AS add_date FROM ilness WHERE child_id='$ch_id' ORDER BY DATE(add_date) ASC, add_date ASC";
         $result=mysqli_query($conn, $s);
    while($row=$result->fetch_assoc()){ 
        echo '<tr><td>'.$row['ill_name'].'</td>
    <td>'.$row['add_date'].'</td> <td>'.$row['length'].' dni</td> <td>'.$row['meds'].'</td> <td>'.$row['sympt'].'</td> <td>'.$row['add_inf'].'</td></tr>';
    }
            ?>
               </table>
           </div>
           
    
           <button class="add_data" onclick="showPopup3(event,3)">Dodaj przebytą chorobę</button>
       </div>
       <div class="panel2">Historia leków</div>
       <div class="monitoring">
          <div id="table_meds">
        <table style="width:100%" id="table">
  <tr>
    <th>Nazwa leku</th>
    <th>Data rozpoczęcia</th> 
    <th>Czas stosowania</th>
    <th>Dawkowanie</th>
    <th>Reakcje niepożądane</th>
    <th>Dodatkowe informacje</th>
  </tr>
    <?php
        $s="SELECT name,use_time,react,dose,add_inf,DATE(add_date) AS add_date FROM meds WHERE child_id='$ch_id' ORDER BY DATE(add_date) ASC, add_date ASC";
         $result=mysqli_query($conn, $s);
    while($row=$result->fetch_assoc()){ 
        echo '<tr><td>'.$row['name'].'</td>
    <td>'.$row['add_date'].'</td> <td>'.$row['use_time'].' dni</td> <td>'.$row['dose'].'</td> <td>'.$row['react'].'</td> <td>'.$row['add_inf'].'</td></tr>';
    }
            ?>
               </table>
           </div>
          <button class="add_data" onclick="showPopup4(event)">Dodaj historię leków</button>
          
           </div>
       
       </div>
       
   </form>
   <form class="one_option">
    <div class="panel">Kalendarz</div>
     <div class="options_form">
   <?php
         echo '<a href="calendar.php?id='.$ch_id.'">Przejdź do kalendarza</a>';
         ?>
         <div class="panel2">Historia wizyt kontrolnych</div>
       <div class="monitoring">
          <div id="table_visit"><table style="width:100%" id="table">
  <tr>
    <th>Data wizyty</th> 
    <th>Typ wizyty</th>
    <th>Rozpoznanie</th>
    <th>Przepisane leki</th>
    <th>Zalecenia</th>
  </tr>
  
<?php
        $s="SELECT id,title,med_naz,roz_ser,zal_reak, DATE(start) AS start FROM events WHERE child_id='$ch_id' ORDER BY DATE(events.start) ASC, start ASC";
         $result=mysqli_query($conn, $s);
              $i=0;
              
    while($row=$result->fetch_assoc()){ 
        if(strtotime($row['start'])<strtotime("now") && $row['title'][0]!='S'){
            
        echo '<tr><td>'.$row['start'].'</td>
    <td>'.$row['title'].'</td>';
            
    if($row['roz_ser']==null){
        
        
    echo '<form action="update_event.php" method="POST"><td>
    <div id="'.$i.'" >
    <input type="button" class="add_data"  onclick="myFunc(event,'.$i.')" value="Dodaj dane"/></div>
    <div id="text'.$i.'" style="display: none;">
    <textarea rows=5 cols=5 name="'.$row['id'].'"></textarea>
    <input name="numer_id" value='.$row['id'].' style="display: none;" />
    <button type="submit" name="submit" >Dodaj</button>
    <input type="button" class="add_data"  onclick="hideMyFunc(event,'.$i.')" value="Ukryj"/>
    </div>
    
    </td></form>';
        
   
    }else{
        echo '<td>'.$row['roz_ser'].'</td>';
        
    }
            if($row['med_naz']==null){
                $j=$i+1000;
                 echo '<form action="update_event2.php" method="POST"><td>
    <div id="'.$j.'">
    <input type="button" class="add_data"  onclick="myFunc(event, '.$j.')" value="Dodaj dane"/></div>
    <div id="text'.$j.'" style="display: none;">
    <textarea rows=5 cols=5 name="'.$row['id'].'"></textarea>
    <input name="numer_id" value='.$row['id'].' style="display: none;" />
    <button type="submit" name="submit" >Dodaj</button>
    <input type="button" class="add_data"  onclick="hideMyFunc(event,'.$j.')" value="Ukryj"/>
    </div>
    </td></form>';
            }else{
                echo '<td>'.$row['med_naz'].'</td>';
            }
            
     if($row['zal_reak']==null){
                $k=$i+2000;
                 echo '<form action="update_event3.php" method="POST"><td>
    <div id="'.$k.'">
    <input type="button" class="add_data"  onclick="myFunc(event, '.$k.')" value="Dodaj dane" /></div>
    <div id="text'.$k.'" style="display: none;">
    <textarea rows=5 cols=5 name="'.$row['id'].'"></textarea>
    <input name="numer_id" value='.$row['id'].' style="display: none;" />
    <button type="submit" name="submit" >Dodaj</button>
    <input type="button" class="add_data"  onclick="hideMyFunc(event,'.$k.')" value="Ukryj"/>
    </div>
    </td></form>';
            }else{
                echo '<td>'.$row['zal_reak'].'</td>';
            }
    echo '</tr>';
    }
        $i=$i+1;
    }
            ?>
               </table>
       </div>
         </div>
       </div>
    </form>
    
    
    
   <form class="one_option">
    <div class="panel">Książeczka szczepień</div>
     
       <div class="monitoring">
       <div id="table_inj"><table style="width:100%" id="table">
        <tr>
    <th>Data szczepienia</th> 
    <th>Rodzaj szczepienia</th>
    <th>Seria szczepionki</th>
    <th>Nazwa szczepionki</th>
    <th>Reakcje</th>
  </tr>
          
<?php
        $s="SELECT id,title,med_naz,roz_ser,zal_reak, DATE(start) AS start FROM events WHERE child_id='$ch_id' ORDER BY DATE(events.start) ASC, start ASC";
         $result=mysqli_query($conn, $s);
              $i=0;
              
    while($row=$result->fetch_assoc()){ 
        if(strtotime($row['start'])<strtotime("now") && $row['title'][0]=='S'){
            
        echo '<tr><td>'.$row['start'].'</td>
    <td>'.$row['title'].'</td>';
            
            if($row['roz_ser']==null){
    echo '<form action="update_event.php" method="POST"><td>
    <div id="'.$i.'" >
    <input type="button" class="add_data"  onclick="myFunc(event,'.$i.')" value="Dodaj dane"/></div>
    <div id="text'.$i.'" style="display: none;">
    <textarea rows=5 cols=5 name="'.$row['id'].'"></textarea>
    <input name="numer_id" value='.$row['id'].' style="display: none;" />
    <button type="submit" name="submit" >Dodaj</button>
    <input type="button" class="add_data"  onclick="hideMyFunc(event,'.$i.')" value="Ukryj"/>
    </div>
    
    </td></form>';
        
   
    }else{
        echo '<td>'.$row['roz_ser'].'</td>';
        
    }
            if($row['med_naz']==null){
                $j=$i+1000;
                 echo '<form action="update_event2.php" method="POST"><td>
    <div id="'.$j.'">
    <input type="button" class="add_data"  onclick="myFunc(event, '.$j.')" value="Dodaj dane"/></div>
    <div id="text'.$j.'" style="display: none;">
    <textarea rows=5 cols=5 name="'.$row['id'].'"></textarea>
    <input name="numer_id" value='.$row['id'].' style="display: none;" />
    <button type="submit" name="submit" >Dodaj</button>
    <input type="button" class="add_data"  onclick="hideMyFunc(event,'.$j.')" value="Ukryj"/>
    </div>
    </td></form>';
            }else{
                echo '<td>'.$row['med_naz'].'</td>';
            }
            
     if($row['zal_reak']==null){
                $k=$i+2000;
                 echo '<form action="update_event3.php" method="POST"><td>
    <div id="'.$k.'">
    <input type="button" class="add_data"  onclick="myFunc(event, '.$k.')" value="Dodaj dane" /></div>
    <div id="text'.$k.'" style="display: none;">
    <textarea rows=5 cols=5 name="'.$row['id'].'"></textarea>
    <input name="numer_id" value='.$row['id'].' style="display: none;" />
    <button type="submit" name="submit" >Dodaj</button>
    <input type="button" class="add_data"  onclick="hideMyFunc(event,'.$k.')" value="Ukryj"/>
    </div>
    </td></form>';
            }else{
                echo '<td>'.$row['zal_reak'].'</td>';
            }
    echo '</tr>';
    }
        $i=$i+1;
    }          
            
?>
           </table>
           </div>
         </div>
        </form>
    
    
    <script>
    function myFunc(event,id){
        //document.getElementById(id).style.display='none';
        var t="text".concat(id);
        document.getElementById(t).style.display='block';
        document.getElementById(id).style.display='none';
        
    }
        function hideMyFunc(event,id){
             var t="text".concat(id);
        document.getElementById(t).style.display='none';
        document.getElementById(id).style.display='block';
        }
                                       
    
    </script>
    
   <?php
    include_once "popups/weight_popup.php";
    include_once "popups/height_popup.php";
    include_once "popups/illness_popup.php";
    include_once "popups/med_popup.php";
    ?>
    <script src="popup.js"></script>
    </body>
</html>


 <?php
    $child=$_SESSION['current_id'];
    $s="SELECT weight,DATE(add_date) AS add_date FROM weight WHERE child_id='$child' ORDER BY DATE(add_date) ASC, add_date ASC";
    $result=mysqli_query($conn, $s);
    
    $i=0;
    $php_array1=[];
    $php_array2=[];
$php_array3=[];
    while($row=$result->fetch_assoc
          ()){
        $php_array1[$i]=date("n", strtotime($row['add_date']));
        $php_array2[$i]=$row['weight'];
        $php_array3[$i]=$row['add_date'];
        $i=$i+1;
    }
//Do miesięcy        
    if($php_array2==null){
        echo "Nie dodano wagi";
    }else{
        $a=0;
        $month_array=[];
        $weight_array=[];
            for($x=0;$x<sizeof($php_array1);$x++){
        $year_prev=date("Y",strtotime($php_array3[$x]));
        $year_now=date("Y")-1;
        if($year_prev==$year_now){
            $month_array[$a]=$php_array1[$x];
            $weight_array[$a]=$php_array2[$x];
            $a=$a+1;
        }
    }
        if(sizeof($weight_array)==0){
            $weight_array[0]=0;
            $month_array[0]=date("d-m-Y");
        }
    $w=floatval($weight_array[0]);
    $k=0;
    $it=1;
    for($j=1;$j<sizeof($month_array); $j++){
        
        if($month_array[$j]==$month_array[$j-1] ){
            $w=$w+floatval($weight_array[$j]);
            $it=$it+1;
                
        }else{
            $tab1[$k]=$month_array[$j-1];
            $tab2[$k]=$w/$it;
            $w=floatval($weight_array[$j]);
                $k=$k+1;
            $it=1;
        }
    }
    $tab1[$k]=$month_array[sizeof($month_array)-1];
    $tab2[$k]=$w/$it;
        sort($php_array1);
    }
    
//Do centyli
   $s="SELECT child_gender,birth_date FROM children WHERE child_id='$child'";
    $result=mysqli_query($conn, $s);
    $i=0;
    while($row=$result->fetch_assoc
          ()){
        $gender=$row['child_gender'];
        $age=date("Y", strtotime($row['birth_date']));
    }
if($php_array3!=null){
    $w=0;
$current_age=1;
$cent_array=[];
    for($k=1; $k<sizeof($php_array3); $k++){
        $prev=date("Y", strtotime($php_array3[$k-1]));
        $now=date("Y", strtotime($php_array3[$k]));
    if($now!=$prev){
       if ($prev-$age==$current_age){
           $cent_array[$w]=$php_array2[$k-1];
           $w=$w+1;
           $current_age=$current_age+1;
       }else{
            $cent_array[$w]=null;
           $w=$w+1;
            $current_age=$current_age+1;
       }
        }
          if($current_age>5){
              break;
          }
    }
    if(sizeof($cent_array)<5){
        for($m=sizeof($cent_array);$m<5;$m++){
            $cent_array[$m]=null;
        }
    }

}
?>
   
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
function callA(event){
    var js_array2 = <?php echo json_encode($php_array2); ?>;
    if(js_array2.length!=null){
        funcA();
    }else{
        alert("Nie wprowadzono danych");
        return false;
    }
}
function funcA(){
google.charts.load('current', {'packages':['line']});
google.charts.setOnLoadCallback(drawChart);


event.preventDefault();
document.getElementById('chart_block').style.display = 'block';
function drawChart() {
      var data = new google.visualization.DataTable();
      data.addColumn('date', 'Data');
      data.addColumn('number', 'Waga');
    
    var js_array2 = <?php echo json_encode($php_array2); ?>;
    var js_array3 = <?php echo json_encode($php_array3); ?>;
        var iter=0;
    var table=[];
    var max=js_array3.length-20;
    for(var i=0; i<js_array3.length; i++){
        if(i>max){
        table[iter]=[new Date(js_array3[i]), parseFloat(js_array2[i])];
        iter=iter+1;
        }
    }
    

      data.addRows(table);

      var options = {
        chart: {
          title: 'Waga dziecka',
          subtitle: 'w kilogramach (kg)'
        },
        width: 600,
        height: 500,
        vAxis: {format: '#.###' },
        hAxis: {format: 'dd.MM.yyyy'}
      };

      var chart = new google.charts.Line(document.getElementById('chart'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    window.location='#chart';
    }
    //showPopup2(event);
}


     function funcB(event){
google.charts.load('current', {'packages':['line']});
google.charts.setOnLoadCallback(drawChart);


event.preventDefault();
         
document.getElementById('chart_block').style.display = 'block';
function drawChart() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Miesiąc');
      data.addColumn('number', 'Waga');
    var js_array1=<?php echo json_encode($tab1); ?>;
    var js_array2=<?php echo json_encode($tab2); ?>;
    var table1=new Array(js_array1.length);
    var max=0;
    if(js_array1.length<30){
        max=js_array1.length;
    }else{
        max=30;
    }
    for(var i=0; i<max; i++){
        
        table1[i]=[js_array1[i], parseFloat(js_array2[i] )];
    }
    

      data.addRows(table1);

      var options = {
        chart: {
          title: 'Średnia miesięczna waga w ubiegłym roku',
          subtitle: 'w kilogramach (kg)'
        },
        width: 600,
        height: 500,
          vAxis: {format: '#.###' }
      };

      var chart = new google.charts.Line(document.getElementById('chart'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    window.location='#chart';

    }
        
}
    
function hideChart(event){
    event.preventDefault();
    document.getElementById('chart_block').style.display = 'none';
     document.getElementById('table_form').style.display = 'none';
}

function showTable(event){
    event.preventDefault();
    document.getElementById('table_form').style.display = 'block';
    window.location='#options';
}

 function funcC(event){
     google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

event.preventDefault();
         
document.getElementById('chart_block').style.display = 'block';
    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Day');
      data.addColumn('number', '3');
      data.addColumn('number', '15');
      data.addColumn('number', '50');
         data.addColumn('number', '85');
         data.addColumn('number', '97');
        data.addColumn('number', 'Waga dziecka');
        
        var cent=<?php echo json_encode($cent_array); ?>;

        var gender='<?php echo $gender; ?>';
    if(gender=="female"){
         
      data.addRows([
        [1,  7.1, 7.9, 8.9 ,10.2,11.3,parseFloat(cent[0])],
        [2,  9.2, 10.1, 11.5,13.1,14.6,parseFloat(cent[1])],
        [3,  11,   12.1, 13.9, 15.9,17.8,parseFloat(cent[2])],
        [4,  12.5, 14, 16.1 ,18.6,21.1, parseFloat(cent[3])],
        [5,  14,15.7,18.2,21.3,24.4,parseFloat(cent[4])]
      ]);
        
        
    }else{
         data.addRows([
         [1,  7.8, 8.6,9.6,10.8,11.8, parseFloat(cent[0])],
        [2,  9.8, 10.8,12.2,13.7,15.1, parseFloat(cent[1])],
        [3,  11.4,12.7,14.3,16.3,18, parseFloat(cent[2])],
        [4,  12.9, 14.3,16.3,18.7,20.9,parseFloat(cent[3])],
        [5,  14.3, 16,18.3,21.1,23.8, parseFloat(cent[4])]
              ]);
    }

        
      var options = {
          pointSize: 10,
          interpolateNulls : true,
          chart: {
          title: 'Siatki centylowe'
        },
          legend: { position: 'top', alignment: 'start' },
          colors: ['#ffb3b3', '#b3c6ff', '#ffe066','#79d279','#999999','red'],
         width: 650,
        height: 500,
        vAxis: {format: '#.###' },
        hAxis: {
    gridlines: {
        count: 4
    }
            
},
          series:{
              1: {lineWidth: 0}
          }
        
      };
        
      var chart = new google.charts.Line(document.getElementById('chart'));

      chart.draw(data, google.charts.Line.convertOptions(options));

        window.location='#chart';
    }
        
}

</script>
    

   
   
    
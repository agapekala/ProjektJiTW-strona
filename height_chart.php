 <?php
    $child=$_SESSION['current_id'];
    $s="SELECT height,DATE(add_date) AS add_date FROM height WHERE child_id='$child' ORDER BY DATE(add_date) ASC, add_date ASC";
    $result=mysqli_query($conn, $s);
    
    $i=0;
    $php_array1h=[];
    $php_array2h=[];
$php_array3h=[];
    while($row=$result->fetch_assoc
          ()){
        $php_array1h[$i]=date("n", strtotime($row['add_date']));
        $php_array2h[$i]=$row['height'];
        $php_array3h[$i]=$row['add_date'];
        $i=$i+1;
    }
          
    if($php_array2h==null){
        echo "Nie dodano wzrostu";
        
    }else{
         $a=0;
        $month_arrayh=[];
        $weight_arrayh=[];
            for($x=0;$x<sizeof($php_array1h);$x++){
        $year_prev=date("Y",strtotime($php_array3h[$x]));
        $year_now=date("Y")-1;
        if($year_prev==$year_now){
            $month_arrayh[$a]=$php_array1h[$x];
            $weight_arrayh[$a]=$php_array2h[$x];
            $a=$a+1;
        }
    }
        if(sizeof($weight_array)==0){
            $weight_arrayh[0]=0;
            $month_arrayh[0]=date("d-m-Y");
        }
        $w=floatval($php_array2h[0]);
    $k=0;
    $it=1;
   for($j=1;$j<sizeof($month_arrayh); $j++){
        
        if($month_arrayh[$j]==$month_arrayh[$j-1] ){
            $w=$w+floatval($weight_arrayh[$j]);
            $it=$it+1;
                
        }else{
            $tab1h[$k]=$month_arrayh[$j-1];
            $tab2h[$k]=$w/$it;
            $w=floatval($weight_arrayh[$j]);
                $k=$k+1;
            $it=1;
        }
    }
    $tab1h[$k]=$month_arrayh[sizeof($month_arrayh)-1];
    $tab2h[$k]=$w/$it;
        sort($php_array1h);
    }

$s="SELECT child_gender,birth_date FROM children WHERE child_id='$child'";
    $result=mysqli_query($conn, $s);
    $i=0;
    while($row=$result->fetch_assoc
          ()){
        $gender=$row['child_gender'];
        $age=date("Y", strtotime($row['birth_date']));
    }
if($php_array3h!=null){
    $w=0;
$current_age=1;
$cent_arrayh=[];
    for($k=1; $k<sizeof($php_array3h); $k++){
        $prev=date("Y", strtotime($php_array3h[$k-1]));
        $now=date("Y", strtotime($php_array3h[$k]));
    if($now!=$prev){
       if ($prev-$age==$current_age){
           $cent_arrayh[$w]=$php_array2h[$k-1];
           $w=$w+1;
           $current_age=$current_age+1;
       }else{
            $cent_arrayh[$w]=null;
           $w=$w+1;
            $current_age=$current_age+1;
       }
        }
          if($current_age>5){
              break;
          }
    }
    if(sizeof($cent_arrayh)<5){
        for($m=sizeof($cent_arrayh);$m<5;$m++){
            $cent_arrayh[$m]=null;
        }
    }

}
    
?>
   
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts

function funcA_h(event){
google.charts.load('current', {'packages':['line']});
google.charts.setOnLoadCallback(drawChart);


event.preventDefault();
document.getElementById('chart_block2').style.display = 'block';
function drawChart() {
      var data = new google.visualization.DataTable();
      data.addColumn('date', 'Data');
      data.addColumn('number', 'Wzrost');
    
    var js_array2 = <?php echo json_encode($php_array2h); ?>;
    var js_array3 = <?php echo json_encode($php_array3h); ?>;
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
          title: 'Wzrost dziecka',
          subtitle: 'w centymetrach (cm)'
        },
        width: 600,
        height: 500,
        vAxis: {format: '#.###' },
        hAxis: {format: 'dd.MM.yyyy'}
      };

      var chart = new google.charts.Line(document.getElementById('chart2'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    window.location='#chart2';
    }
    //showPopup2(event);
}
    
     function funcB_h(event){
google.charts.load('current', {'packages':['line']});
google.charts.setOnLoadCallback(drawChart);


event.preventDefault();
         
document.getElementById('chart_block2').style.display = 'block';
function drawChart() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Miesiąc');
      data.addColumn('number', 'Wzrost');
    var js_array1=<?php echo json_encode($tab1h); ?>;
    var js_array2=<?php echo json_encode($tab2h); ?>;
    var table1=new Array(js_array1.length);
    for(var i=0; i<js_array1.length; i++){
        
        table1[i]=[js_array1[i], parseFloat(js_array2[i] )];
    }
    

      data.addRows(table1);

      var options = {
        chart: {
          title: 'Średni miesięczny wzorst w ubiegłym roku',
          subtitle: 'w centymetrach (cm)'
        },
        width: 600,
        height: 500,
          vAxis: {format: '#.###' }
      };

      var chart = new google.charts.Line(document.getElementById('chart2'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    window.location='#chart2';

    }
        
}
    
function hideChart_h(event){
    event.preventDefault();
    document.getElementById('chart_block2').style.display = 'none';
     document.getElementById('table_form2').style.display = 'none';
}

    function showTable_h(event){
    event.preventDefault();
    document.getElementById('table_form2').style.display = 'block';
    window.location='#options';
}

 function funcC_h(event){
     google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

event.preventDefault();
         
document.getElementById('chart_block2').style.display = 'block';
    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Day');
      data.addColumn('number', '3');
      data.addColumn('number', '15');
      data.addColumn('number', '50');
         data.addColumn('number', '85');
         data.addColumn('number', '97');
        data.addColumn('number', 'Wzrost dziecka');

         var cent=<?php echo json_encode($cent_arrayh); ?>;
        var gender='<?php echo $gender; ?>';
    if(gender=="female"){
         
      data.addRows([
        [1,  69.2, 71.3, 74 ,76.7,78.9,parseFloat(cent[0])],
        [2,  80.3, 83.1, 86.4,89.8,92.5,parseFloat(cent[1])],
        [3,  87.9,91.1, 95.1, 99,102.2,parseFloat(cent[2])],
        [4,  94.6, 98.3, 102.7 ,107.2,110.8, parseFloat(cent[3])],
        [5,  100.5,104.5,109.4,114.4,118.4,parseFloat(cent[4])]
      ]);
        
        
    }else{
         data.addRows([
         [1,  71.3, 73.3, 75.7,78.2,80.2,parseFloat(cent[0])],
        [2,  82.1, 84.6, 87.8,91,93.6,parseFloat(cent[1])],
        [3,  89.1,92.2, 96.1,99.9,103.1,parseFloat(cent[2])],
        [4,  95.4, 99,103.3 ,107.7,111.2,parseFloat(cent[3])],
        [5,  101.2, 105.2, 110,114.8,118.7,parseFloat(cent[4])]
              ]);
    }

        
      var options = {
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

      var chart = new google.charts.Line(document.getElementById('chart2'));

      chart.draw(data, google.charts.Line.convertOptions(options));

        window.location='#chart2';
    }
        
}

</script>
    
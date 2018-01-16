<aside id="popup">
	<div class="popup-inner" id="popup-inner">
    <div class="in">
	<a href="" class="close"><i class="fa fa-times fa-2x" ></i></a>	
    <script>document.querySelector("#popup .close").onclick = function (event) {
    event.preventDefault();
    document.getElementById("popup").style.display = "none";} </script>
    
    <h2>Dodaj pomiar wagi</h2>
     
<form action="includes/add_weight.inc.php" method="POST">
  <div class="imgcontainer">
    <img src="images/weight.jpeg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>Waga</b></label>
    <input type="text" placeholder="Dodaj wagę w kg" name="weight" required>

    <label><b>Data mierzenia</b></label><br>
    <select name="year" required>
       <option>Rok</option>
        <script>
        for (var i=2000; i<=(new Date()).getFullYear(); i++){
            document.write("<option >"+i+"</option>");
        }
        </script>
    </select>
    <select id="month" name="month" >
        <option value="month">Miesiąc</option>
        <option value="01">Styczeń</option>
        <option value="02">Luty</option>
        <option value="03">Marzec</option>
        <option value="04">Kwiecień</option>
        <option value="05">Maj</option>
        <option value="06">Czerwiec</option>
        <option value="07">Lipiec</option>
        <option value="08">Sierpień</option>
        <option value="09">Wrzesień</option>
        <option value="10">Październik</option>
        <option value="11">Listopad</option>
        <option value="12">Grudzień</option>
    </select>
         
           <script>
               var max=31;
             function selectMonth(){  
             var ddl=document.getElementById("month");
             var selected=ddl.options[ddl.selectedIndex].value;
                 if(selected=="luty"){
                     max=28;
                 }else{
                     max=31;
                 }
             }
          </script>
           <select name="day" required>
        <option value="day">Dzień</option>
            <script>
                for (var i=1; i<=max; i++){
            document.write("<option>"+i+"</option>");
        }
            </script>
         
      </select>
      <br>
       <button type="submit" name="submit">Dodaj</button>
  </div>
</form>
</div>
    </div>
    </aside>
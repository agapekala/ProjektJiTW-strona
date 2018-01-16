<aside id="popup3">
	<div class="popup-inner" id="popup-inner">
    <div class="in">
	<a href="" class="close"><i class="fa fa-times fa-2x" ></i></a>	
    <script>document.querySelector("#popup3 .close").onclick = function (event) {
    event.preventDefault();
    document.getElementById("popup3").style.display = "none"; }</script>
    
    <h2>Dodaj przebytą chorobę</h2>
     
<form action="includes/add_illness.inc.php" method="POST">
  <div class="imgcontainer">
    <img src="images/sick_child.jpeg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>Rodzaj choroby</b></label>
    <input type="text" placeholder="Wpisz nazwę choroby" name="illness" required>

    <label><b>Data rozpoczęcia</b></label><br>
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
      <br>
      <label><b>Czas trwania</b></label>
          <input type="text"  id="input1"  name="time" required> dni

      <br>
      <label><b>Lekarstwa</b></label>
       <input type="text" name=1 required>
       <div id="container" name="med_container"></div>
        <a href="#" class="chart_btn1" onclick="nextMed(event)">Więcej</a>
    <script>
        var s=1;
      function nextMed(event){
          s=s+1;
           var container = document.getElementById("container");
          container.appendChild(document.createTextNode(""));
                var input = document.createElement('input');
                input.type = "text";
                input.name=s;
                container.appendChild(input);
                container.appendChild(document.createElement("br"));
      }
      </script>
      <br><br>
    <label><b>Objawy</b></label><br>
    <textarea rows=5 cols=40 name="symptoms"></textarea>
    <br><br>
    <label><b>Dodatkowe informacje</b></label><br>
    <textarea rows=5 cols=40 name="add_inf"></textarea>
       <button type="submit" name="submit">Dodaj</button>
  </div>
</form>
</div>
    </div>
    </aside>
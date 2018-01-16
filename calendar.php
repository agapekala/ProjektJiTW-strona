<?php
session_start();
if($_SESSION['login']!=true){
    header("Location: ../projekt/projekt_main.php?nopermission");
}
?>
<!DOCTYPE html>
<html>
<head>
 
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>Książeczka szczepień onlilne</title>
	<link rel="Shortcut icon" href="images/strzykawka.jpg" />
	<meta charset="utf-8">
			<link rel="stylesheet" href="styles/projekt_main_print.css" media="print">

	<link id="pagestyle4" rel="stylesheet" href="styles/account.css">
   <link id="pagestyle3" rel="stylesheet" href="styles/popup.css">
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
    
    
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
    <link href='fullcalendar-3.8.0/fullcalendar.min.css' rel='stylesheet'/>
    <link href='fullcalendar-3.8.0/fullcalendar.print.css' rel='stylesheet' media='print'/>
    
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src='fullcalendar-3.8.0/lib/jquery.min.js'></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- bootbox code -->
    <script src="bootbox.min.js"></script>

  <script src='fullcalendar-3.8.0/lib/jquery.min.js'></script>
  <script src='fullcalendar-3.8.0/lib/moment.min.js'></script>
  <script src='fullcalendar-3.8.0/lib/jquery-ui.custom.min.js'></script>
  <script src='fullcalendar-3.8.0/fullcalendar.min.js'></script>
  <script src='fullcalendar-3.8.0/locale/pl.js'></script>
   <link id="pagestyle1" rel="stylesheet" href="styles/projekt_main.css">
<script>

    $(document).ready(function () {
      function fmt(date) {
        return date.format("YYYY-MM-DD HH:mm");
      }
      var date = new Date();
      var d = date.getDate();
      var m = date.getMonth();
      var y = date.getFullYear();
      var calendar = $('#calendar').fullCalendar({
        editable: true,
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        events: "events.php",
        // Convert the allDay from string to boolean
        eventRender: function (event, element, view) {
          if (event.allDay === 'true') {
            event.allDay = true;
          } else {
            event.allDay = false;
          }
            
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            document.getElementById('popup_add').style.display='block';
          //var title = prompt('Nazwa wydarzenia:');
          //if (title) {
            var start = fmt(start);
            var end = fmt(end);
            $.ajax({
              url: 'add_events2.php',
                //'title=' + title + 
              data: '&start=' + start + '&end=' + end,
              type: "POST",
              success: function (json) {
                //alert('Added Successfully');
              }
            });
            calendar.fullCalendar('renderEvent',
                {
                  title: title,
                  start: start,
                  end: end,
                  allDay: allDay
                },
                true // make the event "stick"
            );
          //}
          calendar.fullCalendar('unselect');
        },
        editable: true,
        eventDrop: function (event, delta) {
          var start = fmt(event.start);
          var end = fmt(event.end);
          $.ajax({
            url: 'update_events.php',
            data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
            type: "POST",
            success: function (json) {
              //alert("Updated Successfully");
            }
          });
        },
        eventClick: function (event) {
          var decision = confirm("Czy na pewno chcesz usunąć wydarzenie?\nWydarzenie zostanie także usunięte z historii");
          if (decision) {
            $.ajax({
              type: "POST",
              url: "delete_event.php",
              data: "&id=" + event.id,
              success: function (json) {
                $('#calendar').fullCalendar('removeEvents', event.id);
                //alert("Updated Successfully");
              }
            });
          }
        },
        eventResize: function (event) {
          var start = fmt(event.start);
          var end = fmt(event.end);
          $.ajax({
            url: 'update_events.php',
            data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
            type: "POST",
            success: function (json) {
              //alert("Updated Successfully");
            }
          });
        }
      });
    });
  </script>
<?php
    include 'header.php';
    ?>
</head>
<body>
    
    <form class="calendar_form">
     <div id='calendar'></div>
            
     </form>
    <aside id="popup_add">
        <div class="popup-inner" id="popup-inner" style="z-index:100000">
        <a href="" class="close"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>
           <script>document.querySelector("#popup_add .close").onclick = function (event) {
    event.preventDefault();
    document.getElementById("popup_add").style.display = "none"; </script>
           <h2>Dodaj wydarzenie</h2>
            <form method="post" class="pform" action="add_events.php">
            <div class="imgcontainer">
    <img src="images/clock.jpg" alt="Avatar" class="avatar">
  </div>
            <div id="container">
              
              <label><b>Typ wydarzenia</b></label><br>
      <input type="radio" name="event_type" value="Szczepienie"> Szczepienie<br>
      <input type="radio" name="event_type" value="Wizyta kontrolna"> Wizyta kontrolna<br><br>
               <label><b>Opis wydarzenia</b></label>
            
            <input type="text" placeholder="Wprowadź opis" name="title" required>
            
          

                <button id="but" class="test_button" type="submit">Dodaj</button>

           </div>
            </form> 
        </div>  
    </aside>

    <script src="popup.js"></script>
    
</body>
</html>
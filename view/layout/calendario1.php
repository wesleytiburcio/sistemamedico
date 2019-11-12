<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>datepicker demo</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  
  <script src="js/bootstrap-datepicker.pt-BR.min.js"></script>
</head>
<body>

<div id="datepicker"></div> 
<script type="text/javascript">
  $(document).ready(function(){

    $("#datepicker").datepicker({
        beforeShowDay: nonWorkingDates,

    });

    function nonWorkingDates(date){
        var day = date.getDay(), Sunday = 0, Monday = 1, Tuesday = 2, Wednesday = 3, Thursday = 4, Friday = 5, Saturday = 6;
        var closedDates = [[7, 29, 2019], [8, 25, 2019], [6, 25, 2019]];
        var closedDays = [[Sunday], [Saturday]];
        for (var i = 0; i < closedDays.length; i++) {
            if (day == closedDays[i][0]) {
                return [false];
            }
        }

        for (i = 0; i < closedDates.length; i++) {
            if (date.getMonth() == closedDates[i][0] - 1 &&
            date.getDate() == closedDates[i][1] &&
            date.getFullYear() == closedDates[i][2]) {
                return [false];
            }
        }

        return [true];
    }
  });
</script>

<hr>
<hr>
 
<!-- <div id="datepicker"></div> 
<script type="text/javascript">
$( "#datepicker" ).datepicker();

</script> -->
<form action="calendario1_submit" method="get" accept-charset="utf-8">
  <div id="requestShipDate"></div>
  
</form>

<script type="text/javascript">
var holidays = ["5/1/2019", "3/7/2019" , "6/25/2019", "7/9/2019", "10/12/2019", "11/2/2019", "11/15/2019", "12/24/2019", "12/25/2019"];

$( "#requestShipDate" ).datepicker({
  beforeShowDay: function(date){
    show = true;
    if(date.getDay() == 0 || date.getDay() == 6){show = false;}//No Weekends
    for (var i = 0; i < holidays.length; i++) {
      if (new Date(holidays[i]).toString() == date.toString()) {show = false;}//No Holidays
      }
      var display = [show,'',(show)?'':'No Weekends or Holidays'];//With Fancy hover tooltip!
      return display;
  }
});
</script>
 
</body>
</html>
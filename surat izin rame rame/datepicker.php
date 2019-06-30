<!DOCTYPE html>
<html>
<head>
  <title>Using Flatpickr</title>
<!--  Flatpicker Styles  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css">
</head>
<body>
  <img src="https://chmln.github.io/flatpickr/images/logo.png" alt="flatpickr">
  <h1>Flatpickr</h1>
  <hr>
  <div>
    <h2>Basic DateTime</h2>
    <input type="text" id="basicDate" placeholder="Please select Date Time" data-input>

    <h2>Range Datetime</h2>
    <input type="text" id="rangeDate" placeholder="Please select Date Range" data-input>

    <h2>Time Picker</h2>
    <input type="text" id="timePicker" placeholder="Please select Time">
  </div>
  <h2>Week Number with Reset Date</h2>
  <div class=resetDate>
    <input type="text" placeholder="Select Date.." data-input>
    <button class="input-button" title="clear" data-clear>RESET</button>
</div>
  <script>
  $("#basicDate").flatpickr({
    enableTime: true,
    dateFormat: "F, d Y H:i"
});
  </script>
    <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!--  Flatpickr  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kim's Hair Fashion</title>


    <!-- timepicker css -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/jquery.timepicker.min.css">
    <link rel="stylesheet" href="css/jquery.datetimepicker.min.css">

    <!-- font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Tangerine:wght@700&display=swap">

    <!-- standard css -->
    <link rel="stylesheet" href="css/style.css">

    

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>


    <!-- moment -->
    <script src="js/moment.js"></script>

    <!-- data time picker -->
    <script src="js/jquery.datetimepicker.full.min.js"></script>

    
    <script src="js/script.js"></script>

<script>
$(function() {
    $( "#datepicker" ).datepicker({
        minDate: 0,
        beforeShowDay: function(date) {
            var day = date.getDay();
            return [(day != 0), ''];
        },
        dateFormat: 'yy-mm-dd',
        showOn: "button",
        buttonImage: "img/calendar.gif",
        buttonImageOnly: true,
        buttonText: "Select date"
    });
});

$(function() {
    $("#timepicker").timepicker( {
        minTime: '9:00am',
        maxTime: '5:00pm',
        disableTextInput: true,
        disableTimeRanges: [['9:00am', '2:00pm']]
    });
});

$.datetimepicker.setDateFormatter({
    parseDate: function (date, format) {
        var d = moment(date, format);
        return d.isValid() ? d.toDate() : false;
    },

    formatDate: function (date, format) {
        return moment(date).format(format);
    },

    formatMask: function(format) {
        return formatDate
        .replace(/Y{4}/g, '9999')
        .replace(/Y{2}/g, '99')
        .replace(/M{2}/g, '19')
        .replace(/D{2}/g, '39')
        .replace(/H{2}/g, '29')
        .replace(/m{2}/g, '59')
        .replace(/s{2}/g, '59');
    }
});

$.datetimepicker.setDateFormatter('moment');

jQuery.datetimepicker.setLocale('en');

var checkPastTime = function(inputDateTime) {
    if (typeof (inputDateTime) != "undefined" && inputDateTime !== null) {
          var current = new Date();

      // check past year and month
      if (inputDateTime.getFullYear() < current.getFullYear()) {
          $('#datetimepicker').datetimepicker('reset');
          alert("Sorry! past date time not allow.");
      } else if ((inputDateTime.getFullYear() == current.getFullYear()) && (inputDateTime.getMonth() < current.getMonth())) {
            $('#datetimepicker').datetimepicker('reset');
            alert("Sorry! Past date time not allow.");
      }

      if (inputDateTime.getDate() == current.getDate()) {
          if (inputDateTime.getHours() < current.getHours()) {
              $('#datetimepicker').datetimepicker('reset');
          }
          this.setOptions({
              minTime: moment().add(1, 'h'),
              maxTime: '17:30'
          });
      } else {
          this.setOptions({
              minTime: '9:00',
              maxTime: '17:30'
          });
      }
    }
};

var currentYear = new Date();


  $(function () {
    $("#datetimepicker").datetimepicker( {
        format:'MM/DD/YYYY h:mm a',
        formatTime:'h:mm a',
        validateOnBlur: false,
        defaultDate: moment().add(1, 'h'),
        minDate : 0,
        yearStart : currentYear.getFullYear(), // Start value for current Year selector
        onChangeDateTime: checkPastTime,
        onShow: checkPastTime,
        step: 30
    });
  });


</script>
</head>
<body>
    <header>
        <h1><a href="" id="title">Kim's Hair Fashion</a></h1>
    </header>

    <nav>
        <ul>
            <li><a class="menu" href="#">Home</a></li> 
            <li><a class="menu" href="#">Appointment</a></li> 
            <li><a class="menu" href="#">Contact</a></li> 
        </ul>
    </nav>

    <div id="container">
        <h1 id="heading">Home</h1>

        <div id="home">
            This is home. <br>
            <img src="img/home.jpg" id="homeImage">
            <div id="photos"></div>
            <div id="photos2"></div>
            <div id="photos3"></div>
        </div>

        <div id="appointment">
            <form id="please">
                <h1>Book an appointment</h1>
                <label for="firstName">First Name:</label><br>
                <input type="text" id="firstName" name="firstName" maxlength="20"><br>

                <label for="lastName">Last Name:</label><br>
                <input type="text" id="lastName" name="lastName" maxlength="20"><br>

                <label for="email">Email Address:</label><br>
                <input type="text" id="email" name="email" maxlength="40"><br>

                <label for="phoneNumber">Phone Number:</label><br>
                <input type="tel" id="phoneNumber" name="phoneNumber"><br>
                <p style="color: red;"><small>Format: 123-123-1234</small></p>

                <label for="date">Date:</label><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="datepicker" name="date" readonly><br>

                <label for="time">Time:</label><br>
                <input type="text" id="timepicker" name="time"><br>

                <label for="datetimepicker">TEST:</label><br>
                <input type="text" id="datetimepicker" name="datetimepicker"><br>

                <label for="notes">Notes:</label><br>
                <textarea id="notes" name="notes" placeholder="Optional" maxlength="255"></textarea><br>

                <input type="submit" id="submit" value="Submit">    
            </form>
            <div id="hair1"></div>
        </div>
        
        <div id="contact">
            <div id="hours">
                Salon Hours: <br>
                Sunday: CLOSED <br>
                Monday: 9am-5pm <br>
                Tuesday: 9am-5pm <br>
                Wednesday: 9am-5pm <br>
                Thursday: 9am-5pm <br>
                Friday: 9am-5pm <br>
                Saturday: 10am-5pm 
            </div>

            <div id="info">
                <b>Telephone:</b> 336-825-4098 | <b>Email:</b> test@email.com <br><br>
                <b>Location:</b> 308 College St, Toronto, ON M5T 1S3, Canada <br><br>
            </div>
        </div>
    </div>

    <footer>
            <p>Copyright &copy; Kim's Hair Fashion</p>
    </footer>
</body>
</html>

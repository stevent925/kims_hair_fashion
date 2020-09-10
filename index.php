
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kim's Hair Fashion</title>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/jquery.timepicker.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/script.js"></script>

  <script>
  $(function() {
    $( "#datepicker" ).datepicker({
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
          maxTime: '5:00pm'
      });
  });
  </script>
</head>
<body>
    <header>
        <h1>Kim's Hair Fashion</h1>
    </header>

    <nav>
        <ul>
            <li><a href="#">Home</a></li> 
            <li><a href="#">Appointment</a></li> 
            <li><a href="#">Contact</a></li> 
        </ul>
    </nav>

    <div id="container">
        <h1 id="heading">Home</h1>

        <div id="home">
            This is home. <br>
            <img src="img/home.jpg" id="homeImage">
        </div>

        <div id="appointment">

            <!-- <form action="results.php" method="GET" id="please"> -->
            <form id="please">
                <h1>Book an appointment</h1>
                <label for="firstName">First Name:</label><br>
                <input type="text" id="firstName" name="firstName"><br>

                <label for="lastName">Last Name:</label><br>
                <input type="text" id="lastName" name="lastName"><br>

                <label for="email">Email Address:</label><br>
                <input type="text" id="email" name="email"><br>

                <label for="phoneNumber">Phone Number:</label><br>
                <input type="text" id="phoneNumber" name="phoneNumber"><br>

                <label for="date">Date:</label><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="datepicker" name="date"><br>

                <label for="time">Time:</label><br>
                <input type="text" id="timepicker" name="time"><br>

                <label for="notes">Notes:</label><br>
                <input type="text" id="notes" name="notes"><br><br>

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


</body>
</html>

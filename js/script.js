$(document).ready(function() {
    $('nav a').on('click', function() {
       var x = $('h1#heading').text($(this).text());

       var home = document.getElementById('home');
       var appoint = document.getElementById('appointment');
       var contact = document.getElementById('contact');

       if (x.text() == 'Home') {
            home.style.display = 'block';
            appoint.style.display = 'none';
            contact.style.display = 'none';
        }
       if (x.text() == 'Appointment') {
            home.style.display = 'none';
            appoint.style.display = 'block';
            contact.style.display = 'none';
        }
        if (x.text() == 'Contact') {
            home.style.display = 'none';
            appoint.style.display = 'none';
            contact.style.display = 'block';
        }
    });

    $('#submit').on('click', function() {
        var fname = $('#firstName').val();
        var lname = $('#lastName').val();
        var email = $('#email').val();
        var phone = $('#phoneNumber').val();
        var date = $('#datepicker').val();
        var time = $('#timepicker').val();
        var notes = $('#notes').val();

        var dataString = `firstName=${fname}&lastName=${lname}&email=${email}&phoneNumber=${phone}&date=${date}&time=${time}&notes=${notes}`;

            // Validation
            if (fname == '' || lname == '' || email == '' || phone == '' || date == '' || time == '') {
                alert('Please fill in everything (besides notes)');
            } else if (!validateEmail(email)) {
                alert('Email not valid');
            } else if (!validatePhoneNumber(phone)) {
                alert('Phone number not valid');   
            } else {
                $.ajax({
                    async: false,
                    type: "POST",
                    url: "../kims_hair_fashion/admin.php",
                    data: dataString,
                    cache: false,
                    success: function(html) {
                        $('#please').trigger('reset');
                        alert('Appointment succesfully made');
                    }
                });

                $.ajax({
                    async: false,
                    type: "GET",
                    url: "../kims_hair_fashion/email.php",
                    data: dataString,
                    cache: false,
                    success: function(html) {
                        alert('Email sent');
                    }
                })
            }

        return false;
    });
});

function validateEmail(email) {
    var regex = /\S+@\S+\.\S+/;
    
    return regex.test(email);
}

function validatePhoneNumber(phone) {
    var regex = /^\(?([0-9]{3})\)?[-]?([0-9]{3})[-]?([0-9]{4})$/;

    return regex.test(phone);
}


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
        var date = $('#dateTime').val();
        var notes = $('#notes').val();

        var dataString = `firstName=${fname}&lastName=${lname}&email=${email}&phoneNumber=${phone}&dateTime=${date}&notes=${notes}`;

            // Validation
            if (fname == '' || lname == '' || email == '' || phone == '' || date == '') {
                alert('Please fill in everything (besides notes)');
            } else {
                $.ajax({
                    type: "POST",
                    url: "../kims_hair_fashion/admin.php",
                    data: dataString,
                    cache: false,
                    success: function(html) {
                        //$('#lol').append(html);
                        $('#please').trigger('reset');
                    }
                });
                alert('Appointment succesfully made');
            }

        return false;
    });

});
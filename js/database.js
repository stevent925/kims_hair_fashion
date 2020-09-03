var mysql = require('mysql');

var conn = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "earwax925",
    database: 'kims_hair_fashion'
});

conn.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");

    conn.query("SELECT * FROM appointments", function(err, results) {
        if (err) throw err;
        console.log(results);
    });
});
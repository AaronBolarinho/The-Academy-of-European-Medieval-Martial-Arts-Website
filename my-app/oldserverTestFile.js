const app = express();

const path = require('path');
const mysql = require('mysql');

// Serve the static files from the React app
app.use(express.static(path.join(__dirname, 'client/build')));

// An api endpoint that returns a short list of items
app.get('/api/getList', (req,res) => {
    var list = ["item1", "item2", "item3"];
    res.json(list);
    console.log('Sent list of items');
});

// Handles any requests that don't match the ones above
// app.get('*', (req,res) =>{
//     res.sendFile(path.join(__dirname+'/client/build/index.html'));
// });

// Aaron's test request
app.get("/user:id", (req,res) =>{
  console.log("fetching user with id" + req.params.id)

  const con = mysql.createConnection({
    host: "localhost",
    user: "aaron",
    password: "Starwars1",
    database: "AEMMA_database_2016"
  });

  con.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
  });


  connection.query("SELECT * FROM AaronTestTable", (err, rows, fields) => {
    console.log("I think we fetched the data")
    res.json(rows)
  })

  // res.end()
});

// const con = mysql.createConnection({
//   host: "localhost",
//   user: "aaron",
//   password: "Starwars1",
//   database: "AEMMA_database_2016"
// });

// con.connect(function(err) {
//   if (err) throw err;
//   console.log("Connected!");
// });

const port = process.env.PORT || 5000;
app.listen(port);

console.log('App is listening on port ' + port);
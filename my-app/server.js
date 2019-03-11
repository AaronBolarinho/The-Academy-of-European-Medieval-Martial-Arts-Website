const express = require('express')
const app = express()
const morgan =  require('morgan')
const mysql = require('mysql');
const bodyParser = require('body-parser')

app.use(bodyParser.urlencoded({extended: false}))
app.use(express.static('./public'))
app.use(morgan('short'))

app.use((req, res, next) => {
    res.append('Access-Control-Allow-Origin', ['*']);
    res.append('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE');
    res.append('Access-Control-Allow-Headers', 'Content-Type');
    next();
});

// These are all my routes
const router = require('./routes/user.js')

app.use(router)
//----------------------------------

// This is my functon to connect to the AEMMA Database
function getConnection() {
  return mysql.createConnection({
      host: 'localhost',
      user: 'aaron',
      password: 'Starwars1',
      database: 'AEMMA_database_2016'
    })
}
// -------------------------------------

app.get("/", (req, res) => {
  console.log("Responding to root route")
  res.send("Helloooo from route")
})

// localhost:3003
app.listen(3003, () => {
  console.log("Server is up an listening on port 3003...")
});

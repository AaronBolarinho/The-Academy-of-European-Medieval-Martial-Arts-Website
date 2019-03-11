// Will contain all of my user routes
const express = require('express')
const mysql = require('mysql')
const router = express.Router()

const connection = getConnection()

router.get('/messages', (req, res) => {
  console.log("this is the router response...")
  res.end()
})

router.get("/users", (req, res) => {
  const connection = getConnection()
  const queryString = "SELECT * FROM AaronTestTable"
  connection.query(queryString, (err, rows, fields) => {
    if (err) {
      console.log("failed to get data" + err)
      res.sendStatus(500)
      return
    }
    res.json(rows)
  })
})

router.get('/user/:id', (req, res) => {
console.log("Fetching user with id:" + req.params.id)

const userId = req.params.id
const queryString = "SELECT * FROM AaronTestTable WHERE id = ?"
connection.query(queryString, [userId], (err, rows, fields) => {
  if (err) {
    console.log("Failed to query" + err)
    res.sendStatus(500)
    res.end()
    return
  }
  console.log("I think we got the data")
  res.json(rows)
})

// res.end()
})

router.post('/user_create', (req, res) => {
console.log("Trying to create a new record...")
console.log("how do we get the form data?")

console.log("First Name: " + req.body.createFirstName)
const firstName = req.body.createFirstName
const middleName = req.body.createMiddleName
const lastName =  req.body.createLastName

const queryString =  "INSERT INTO AaronTestTable (firstname, middleinitial, lastname) VALUES (?, ?, ?)"
getConnection().query(queryString, [firstName, middleName, lastName], (err, results, fields) => {
      if (err) {
        console.log("Failed to add a new user" + err)
        res.sendStatus(500)
        return
      }

      console.log("inserted a new user!")
      res.end()
  })

res.end()
})

// const pool = mysql.createPool({
//   connectionLimit: 10,
//   host: 'localhost',
//   user: 'aaron',
//   password: 'Starwars1',
//   database: 'AEMMA_database_2016'
// })

// This is my functon to connect to the AEMMA Database
function getConnection() {

  const pool = mysql.createPool({
  connectionLimit: 10,
  host: 'localhost',
  user: 'aaron',
  password: 'Starwars1',
  database: 'AEMMA_database_2016'
})

  return pool
}
// -------------------------------------

module.exports = router
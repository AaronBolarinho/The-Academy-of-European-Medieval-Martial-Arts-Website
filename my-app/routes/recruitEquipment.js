// Will contain all of my user routes
const express = require('express')
const mysql = require('mysql')
const router1 = express.Router()

const connection = getConnection()

router1.get('/runningShoesTest', (req, res) => {
  console.log("this is the router1 response...")
  res.end()
})

router1.get("/runningShoesProducts", (req, res) => {
  const connection = getConnection()
  const queryString = "SELECT * FROM Recruit_Equip_Running_Shoes"
  connection.query(queryString, (err, rows, fields) => {
    if (err) {
      console.log("failed to get data" + err)
      res.sendStatus(500)
      return
    }
    res.json(rows)
  })
})

router1.get("/runningShoesReviews", (req, res) => {
  const connection = getConnection()
  const queryString = "SELECT * FROM Recruit_Equip_Running_Shoes_Reviews"
  connection.query(queryString, (err, rows, fields) => {
    if (err) {
      console.log("failed to get data" + err)
      res.sendStatus(500)
      return
    }
    res.json(rows)
  })
})

// router1.get('/user/:id', (req, res) => {
// console.log("Fetching user with id:" + req.params.id)

// const userId = req.params.id
// const queryString = "SELECT * FROM AaronTestTable WHERE id = ?"
// connection.query(queryString, [userId], (err, rows, fields) => {
//   if (err) {
//     console.log("Failed to query" + err)
//     res.sendStatus(500)
//     res.end()
//     return
//   }
//   console.log("I think we got the data")
//   res.json(rows)
// })

// // res.end()
// })

router1.post('/runningShoesDataAdd', (req, res) => {
// console.log("Trying to create a new record...")
// console.log("how do we get the form data?")

// console.log("First Name: " + req.body.createFirstName)
const brandName = req.body.createBrandName
const webLink = req.body.createWebLink

const queryString =  "INSERT INTO Recruit_Equip_Running_Shoes (brand_name, web_link) VALUES (?, ?)"
getConnection().query(queryString, [brandName, webLink], (err, results, fields) => {
      if (err) {
        console.log("Failed to add a new data" + err)
        res.sendStatus(500)
        return
      }

      console.log("inserted new data!")
      res.end()
  })
res.redirect('http://localhost:3000/test');
res.end()
})

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

module.exports = router1
const express = require('express')
const mysql = require('mysql')
const router1 = express.Router()

const connection = getConnection()

// This was just a test
// router1.get('/runningShoesTest', (req, res) => {
//   console.log('this is the router1 response...')
//   res.end()
// })

// This gets the conventional shoes data from database
router1.get('/conventionalShoesProducts', (req, res) => {
  const connection = getConnection()
  const queryString = 'SELECT * FROM Recruit_Equip_Running_Shoes'
  connection.query(queryString, (err, rows, fields) => {
    if (err) {
      console.log('failed to get data' + err)
      res.sendStatus(500)
      return
    }
    res.json(rows)
  })
})

// This is my functon to connect to the AEMMA Database
router1.get('/conventionalShoesReviews', (req, res) => {
  const connection = getConnection()
  const queryString = 'SELECT * FROM Recruit_Equip_Running_Shoes_Reviews'
  connection.query(queryString, (err, rows, fields) => {
    if (err) {
      console.log('failed to get data' + err)
      res.sendStatus(500)
      return
    }
    res.json(rows)
  })
})

// This is my functon to connect to the AEMMA Database
router1.post('/conventionalShoesProductAdd', (req, res) => {
  const brandName = req.body.createBrandName
  const webLink = req.body.createWebLink

  const queryString = 'INSERT INTO Recruit_Equip_Running_Shoes (brand_name, web_link) VALUES (?, ?)'
  getConnection().query(queryString, [brandName, webLink], (err, results, fields) => {
    if (err) {
      console.log('Failed to add a new data' + err)
      res.sendStatus(500)
      return
    }

    console.log('inserted new data!')
    res.end()
  })
  res.redirect('http://localhost:3000/RecruitEquipment')
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

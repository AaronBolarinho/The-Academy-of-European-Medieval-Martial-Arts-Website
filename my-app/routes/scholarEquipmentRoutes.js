const express = require('express')
const mysql = require('mysql')
const router2 = express.Router()
// const exphpb = require('express-handlebars')
// const nodemailer = require('nodemailer')
// const path = require('path')

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

// This is my functon to connect to the AEMMA Database
const connection = getConnection()

// ----These Functions below are for Conventional Shoes

// This gets the conventional shoes product data from database
router2.get('/GambesonsProducts', (req, res) => {
  const connection = getConnection()
  const queryString = 'SELECT * FROM Scholar_Equip_Gambesons'
  connection.query(queryString, (err, rows, fields) => {
    if (err) {
      console.log('failed to get data' + err)
      res.sendStatus(500)
      return
    }
    res.json(rows)
  })
})

// This gets the conventional shoes reviews data from database
router2.get('/GambesonsReviews', (req, res) => {
  const connection = getConnection()
  const queryString = 'SELECT * FROM Scholar_Equip_Gambesons_Reviews'
  connection.query(queryString, (err, rows, fields) => {
    if (err) {
      console.log('failed to get data' + err)
      res.sendStatus(500)
      return
    }
    res.json(rows)
  })
})

// This is my functon to post data to the database for Conventional Shoes
router2.post('/GambesonsProductAdd', (req, res) => {
  const brandName = req.body.createBrandName
  const webLink = req.body.createWebLink

  const queryString = 'INSERT INTO Scholar_Equip_Gambesons(brand_name, web_link) VALUES (?, ?)'
  getConnection().query(queryString, [brandName, webLink], (err, results, fields) => {
    if (err) {
      console.log('Failed to add a new data' + err)
      res.sendStatus(500)
      return
    }

    console.log('inserted new data!')
    res.end()
  })
  // res.redirect('http://localhost:3000/RecruitEquipment')
  res.redirect('http://aemma.local/members_only/content/mo_equip_scholar.php')
  res.end()
})

// This is my functon to post data to the database for Conventional Shoes Reviews
router2.post('/GambesonsReviewsAdd', (req, res) => {
  const ProductNumber = req.body.createProductNumber
  const ReviewerName = req.body.createReviewerName
  const Rating = req.body.createRating
  const ReviewText = req.body.createReviewText

  const queryString = 'INSERT INTO Scholar_Equip_Gambesons_Reviews(product_number, reviewer_name, review_text, review_rating) VALUES (?, ?, ?, ?)'
  getConnection().query(queryString, [ProductNumber, ReviewerName, ReviewText, Rating], (err, results, fields) => {
    if (err) {
      console.log('Failed to add a new data' + err)
      res.sendStatus(500)
      return
    }
    console.log('inserted new data!')
    res.end()
  })
  // res.redirect('http://localhost:3000/RecruitEquipment')
  res.redirect('http://aemma.local/members_only/content/mo_equip_scholar.php')
  res.end()
})

// ----These Functions Above are for Conventional Shoes

module.exports = router2

const express = require('express')
const mysql = require('mysql')
const router1 = express.Router()
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
router1.get('/conventionalShoesProducts', (req, res) => {
  const connection = getConnection()
  const queryString = 'SELECT * FROM Recruit_Equip_Conventional_Shoes'
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
router1.get('/conventionalShoesReviews', (req, res) => {
  const connection = getConnection()
  const queryString = 'SELECT * FROM Recruit_Equip_Conventional_Shoes_Reviews'
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
router1.post('/conventionalShoesProductAdd', (req, res) => {
  const brandName = req.body.createBrandName
  const webLink = req.body.createWebLink

  const queryString = 'INSERT INTO Recruit_Equip_Conventional_Shoes(brand_name, web_link) VALUES (?, ?)'
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
  res.redirect('http://aemma.local/members_only/content/mo_equip_recruit.php')
  res.end()
})

// This is my functon to post data to the database for Conventional Shoes Reviews
router1.post('/conventionalShoesReviewsAdd', (req, res) => {
  const ProductNumber = req.body.createProductNumber
  const ReviewerName = req.body.createReviewerName
  const Rating = req.body.createRating
  const ReviewText = req.body.createReviewText

  const queryString = 'INSERT INTO Recruit_Equip_Conventional_Shoes_Reviews(product_number, reviewer_name, review_text, review_rating) VALUES (?, ?, ?, ?)'
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
  res.redirect('http://aemma.local/members_only/content/mo_equip_recruit.php')
  res.end()
})

// ----These Functions Above are for Conventional Shoes

// ----These Functions below are for Athletic Shoes

// This gets the Athletic shoes product data from database
router1.get('/AthleticShoesProducts', (req, res) => {
  const connection = getConnection()
  const queryString = 'SELECT * FROM Recruit_Equip_Athletic_Shoes'
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
router1.get('/AthleticShoesReviews', (req, res) => {
  const connection = getConnection()
  const queryString = 'SELECT * FROM Recruit_Equip_Athletic_Shoes_Reviews'
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
router1.post('/AthleticShoesProductAdd', (req, res) => {
  const brandName = req.body.createBrandName
  const webLink = req.body.createWebLink

  const queryString = 'INSERT INTO Recruit_Equip_Athletic_Shoes(brand_name, web_link) VALUES (?, ?)'
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
  res.redirect('http://aemma.local/members_only/content/mo_equip_recruit.php')
  res.end()
})

// This is my functon to post data to the database for Conventional Shoes Reviews
router1.post('/AthleticShoesReviewsAdd', (req, res) => {
  const ProductNumber = req.body.createProductNumber
  const ReviewerName = req.body.createReviewerName
  const Rating = req.body.createRating
  const ReviewText = req.body.createReviewText

  const queryString = 'INSERT INTO Recruit_Equip_Athletic_Shoes_Reviews(product_number, reviewer_name, review_text, review_rating) VALUES (?, ?, ?, ?)'
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
  res.redirect('http://aemma.local/members_only/content/mo_equip_recruit.php')
  res.end()
})

// ----These Functions Above are for Athletic Shoes

// ----These Functions below are for Period Shoes

// This gets the Period shoes product data from database
router1.get('/PeriodShoesProducts', (req, res) => {
  const connection = getConnection()
  const queryString = 'SELECT * FROM Recruit_Equip_Period_Shoes'
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
router1.get('/PeriodShoesReviews', (req, res) => {
  const connection = getConnection()
  const queryString = 'SELECT * FROM Recruit_Equip_Period_Shoes_Reviews'
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
router1.post('/PeriodShoesProductAdd', (req, res) => {
  const brandName = req.body.createBrandName
  const webLink = req.body.createWebLink

  const queryString = 'INSERT INTO Recruit_Equip_Period_Shoes(brand_name, web_link) VALUES (?, ?)'
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
  res.redirect('http://aemma.local/members_only/content/mo_equip_recruit.php')
  res.end()
})

// This is my functon to post data to the database for Conventional Shoes Reviews
router1.post('/PeriodShoesReviewsAdd', (req, res) => {
  const ProductNumber = req.body.createProductNumber
  const ReviewerName = req.body.createReviewerName
  const Rating = req.body.createRating
  const ReviewText = req.body.createReviewText

  const queryString = 'INSERT INTO Recruit_Equip_Period_Shoes_Reviews(product_number, reviewer_name, review_text, review_rating) VALUES (?, ?, ?, ?)'
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
  res.redirect('http://aemma.local/members_only/content/mo_equip_recruit.php')
  res.end()
})

// ----These Functions Above are for Period Shoes

// ----These Functions below are for White Shirts

// This gets the White Shirts product data from database
router1.get('/whiteShirtsProducts', (req, res) => {
  const connection = getConnection()
  const queryString = 'SELECT * FROM Recruit_Equip_White_Shirts'
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
router1.get('/whiteShirtsReviews', (req, res) => {
  const connection = getConnection()
  const queryString = 'SELECT * FROM Recruit_Equip_White_Shirts_Reviews'
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
router1.post('/whiteShirtsProductAdd', (req, res) => {
  const brandName = req.body.createBrandName
  const webLink = req.body.createWebLink

  const queryString = 'INSERT INTO Recruit_Equip_White_Shirts(brand_name, web_link) VALUES (?, ?)'
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
  res.redirect('http://aemma.local/members_only/content/mo_equip_recruit.php')
  res.end()
})

// This is my functon to post data to the database for Conventional Shoes Reviews
router1.post('/whiteShirtsReviewsAdd', (req, res) => {
  const ProductNumber = req.body.createProductNumber
  const ReviewerName = req.body.createReviewerName
  const Rating = req.body.createRating
  const ReviewText = req.body.createReviewText

  const queryString = 'INSERT INTO Recruit_Equip_White_Shirts_Reviews(product_number, reviewer_name, review_text, review_rating) VALUES (?, ?, ?, ?)'
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
  res.redirect('http://aemma.local/members_only/content/mo_equip_recruit.php')
  res.end()
})

// ----These Functions Above are for White Shirts

// ----These Functions below are for AEMMA Shirts

// This gets the AEMMA Shirts product data from database
router1.get('/AEMMAShirtsProducts', (req, res) => {
  const connection = getConnection()
  const queryString = 'SELECT * FROM Recruit_Equip_AEMMA_Shirts'
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
router1.get('/AEMMAShirtsReviews', (req, res) => {
  const connection = getConnection()
  const queryString = 'SELECT * FROM Recruit_Equip_AEMMA_Shirts_Reviews'
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
router1.post('/AEMMAShirtsProductAdd', (req, res) => {
  const brandName = req.body.createBrandName
  const webLink = req.body.createWebLink

  const queryString = 'INSERT INTO Recruit_Equip_AEMMA_Shirts(brand_name, web_link) VALUES (?, ?)'
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
  res.redirect('http://aemma.local/members_only/content/mo_equip_recruit.php')
  res.end()
})

// This is my functon to post data to the database for Conventional Shoes Reviews
router1.post('/AEMMAShirtsReviewsAdd', (req, res) => {
  const ProductNumber = req.body.createProductNumber
  const ReviewerName = req.body.createReviewerName
  const Rating = req.body.createRating
  const ReviewText = req.body.createReviewText

  const queryString = 'INSERT INTO Recruit_Equip_AEMMA_Shirts_Reviews(product_number, reviewer_name, review_text, review_rating) VALUES (?, ?, ?, ?)'
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
  res.redirect('http://aemma.local/members_only/content/mo_equip_recruit.php')
  res.end()
})

// ----These Functions Above are for White Shirts

module.exports = router1

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

router1.get('/conventionalShoesProducts', (req, res) => {
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
  // res.redirect('http://localhost:3000')
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

  const queryString1 = 'UPDATE Recruit_Equip_Conventional_Shoes SET Recruit_Equip_Conventional_Shoes.Averages = (SELECT AVG(review_rating) FROM Recruit_Equip_Conventional_Shoes_Reviews WHERE Recruit_Equip_Conventional_Shoes.id = Recruit_Equip_Conventional_Shoes_Reviews.product_number)'
  getConnection().query(queryString1, (err, results, fields) => {
    if (err) {
      console.log('Failed to add a new data' + err)
      res.sendStatus(500)
      return
    }
    console.log('updated based on new data!')
    res.end()
  })
  // res.redirect('http://localhost:3000/RecruitEquipment')
  res.redirect('http://aemma.local/members_only/content/mo_equip_recruit.php')
  res.end()
})

// ----These Functions Above are for Conventional Shoes

// ----These Functions below are for Athletic Shoes

// This gets the Athletic Shoes product data from database
router1.get('/AthleticShoesProducts', (req, res) => {
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

// This gets the Athletic Shoes reviews data from database
router1.get('/AthleticShoesReviews', (req, res) => {
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

// This is my functon to post data to the database for Athletic Shoes
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

// This is my functon to post data to the database for Athletic Shoes Reviews
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

    const queryString1 = 'UPDATE Recruit_Equip_Athletic_Shoes SET Recruit_Equip_Athletic_Shoes.Averages = (SELECT AVG(review_rating) FROM Recruit_Equip_Athletic_Shoes_Reviews WHERE Recruit_Equip_Athletic_Shoes.id = Recruit_Equip_Athletic_Shoes_Reviews.product_number)'
  getConnection().query(queryString1, (err, results, fields) => {
    if (err) {
      console.log('Failed to add a new data' + err)
      res.sendStatus(500)
      return
    }
    console.log('updated based on new data!')
    res.end()
  })
  // res.redirect('http://localhost:3000/RecruitEquipment')
  res.redirect('http://aemma.local/members_only/content/mo_equip_recruit.php')
  res.end()
})

// ----These Functions Above are for Athletic Shoes

// ----These Functions below are for Period Shoes

// This gets the Period Shoes product data from database
router1.get('/PeriodShoesProducts', (req, res) => {
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

// This gets the Period Shoes reviews data from database
router1.get('/PeriodShoesReviews', (req, res) => {
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

// This is my functon to post data to the database for Period Shoes
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

// This is my functon to post data to the database for Period Shoes Reviews
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

  const queryString1 = 'UPDATE Recruit_Equip_Period_Shoes SET Recruit_Equip_Period_Shoes.Averages = (SELECT AVG(review_rating) FROM Recruit_Equip_Period_Shoes_Reviews WHERE Recruit_Equip_Period_Shoes.id = Recruit_Equip_Period_Shoes_Reviews.product_number)'
  getConnection().query(queryString1, (err, results, fields) => {
    if (err) {
      console.log('Failed to add a new data' + err)
      res.sendStatus(500)
      return
    }
    console.log('updated based on new data!')
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

// This gets the White Shirts reviews data from database
router1.get('/whiteShirtsReviews', (req, res) => {
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

// This is my functon to post data to the database for White Shirts
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

// This is my functon to post data to the database for White Shirts Reviews
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

  const queryString1 = 'UPDATE Recruit_Equip_White_Shirts SET Recruit_Equip_White_Shirts.Averages = (SELECT AVG(review_rating) FROM Recruit_Equip_White_Shirts_Reviews WHERE Recruit_Equip_White_Shirts.id = Recruit_Equip_White_Shirts_Reviews.product_number)'
  getConnection().query(queryString1, (err, results, fields) => {
    if (err) {
      console.log('Failed to add a new data' + err)
      res.sendStatus(500)
      return
    }
    console.log('updated based on new data!')
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

// This gets the AEMMA Shirts reviews data from database
router1.get('/AEMMAShirtsReviews', (req, res) => {
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

// This is my functon to post data to the database for AEMMA Shirts
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

// This is my functon to post data to the database for AEMMA Shirts Reviews
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

  const queryString1 = 'UPDATE Recruit_Equip_AEMMA_Shirts SET Recruit_Equip_AEMMA_Shirts.Averages = (SELECT AVG(review_rating) FROM Recruit_Equip_AEMMA_Shirts_Reviews WHERE Recruit_Equip_AEMMA_Shirts.id = Recruit_Equip_AEMMA_Shirts_Reviews.product_number)'
  getConnection().query(queryString1, (err, results, fields) => {
    if (err) {
      console.log('Failed to add a new data' + err)
      res.sendStatus(500)
      return
    }
    console.log('updated based on new data!')
    res.end()
  })
  // res.redirect('http://localhost:3000/RecruitEquipment')
  res.redirect('http://aemma.local/members_only/content/mo_equip_recruit.php')
  res.end()
})

// ----These Functions Above are for AEMMA Shirts

// ----These Functions below are for Black Pants

// This gets the Black Pants product data from database
router1.get('/BlackPantsProducts', (req, res) => {
  const queryString = 'SELECT * FROM Recruit_Equip_Black_Pants'
  connection.query(queryString, (err, rows, fields) => {
    if (err) {
      console.log('failed to get data' + err)
      res.sendStatus(500)
      return
    }
    res.json(rows)
  })
})

// This gets the Black Pants reviews data from database
router1.get('/BlackPantsReviews', (req, res) => {
  const queryString = 'SELECT * FROM Recruit_Equip_Black_Pants_Reviews'
  connection.query(queryString, (err, rows, fields) => {
    if (err) {
      console.log('failed to get data' + err)
      res.sendStatus(500)
      return
    }
    res.json(rows)
  })
})

// This is my functon to post data to the database for Black Pants
router1.post('/BlackPantsProductAdd', (req, res) => {
  const brandName = req.body.createBrandName
  const webLink = req.body.createWebLink

  const queryString = 'INSERT INTO Recruit_Equip_Black_Pants(brand_name, web_link) VALUES (?, ?)'
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

// This is my functon to post data to the database for Black Pants Reviews
router1.post('/BlackPantsReviewsAdd', (req, res) => {
  const ProductNumber = req.body.createProductNumber
  const ReviewerName = req.body.createReviewerName
  const Rating = req.body.createRating
  const ReviewText = req.body.createReviewText

  const queryString = 'INSERT INTO Recruit_Equip_Black_Pants_Reviews(product_number, reviewer_name, review_text, review_rating) VALUES (?, ?, ?, ?)'
  getConnection().query(queryString, [ProductNumber, ReviewerName, ReviewText, Rating], (err, results, fields) => {
    if (err) {
      console.log('Failed to add a new data' + err)
      res.sendStatus(500)
      return
    }
    console.log('inserted new data!')
    res.end()
  })

  const queryString1 = 'UPDATE Recruit_Equip_Black_Pants SET Recruit_Equip_Black_Pants.Averages = (SELECT AVG(review_rating) FROM Recruit_Equip_Black_Pants_Reviews WHERE Recruit_Equip_Black_Pants.id = Recruit_Equip_Black_Pants_Reviews.product_number)'
  getConnection().query(queryString1, (err, results, fields) => {
    if (err) {
      console.log('Failed to add a new data' + err)
      res.sendStatus(500)
      return
    }
    console.log('updated based on new data!')
    res.end()
  })
  // res.redirect('http://localhost:3000/RecruitEquipment')
  res.redirect('http://aemma.local/members_only/content/mo_equip_recruit.php')
  res.end()
})

// ----These Functions Above are for Black Pants

// ----These Functions below are for Leather Gloves

// This gets the Leather Gloves product data from database
router1.get('/LeatherGlovesProducts', (req, res) => {
  const queryString = 'SELECT * FROM Recruit_Equip_Leather_Gloves'
  connection.query(queryString, (err, rows, fields) => {
    if (err) {
      console.log('failed to get data' + err)
      res.sendStatus(500)
      return
    }
    res.json(rows)
  })
})

// This gets the Leather Gloves reviews data from database
router1.get('/LeatherGlovesReviews', (req, res) => {
  const queryString = 'SELECT * FROM Recruit_Equip_Leather_Gloves_Reviews'
  connection.query(queryString, (err, rows, fields) => {
    if (err) {
      console.log('failed to get data' + err)
      res.sendStatus(500)
      return
    }
    res.json(rows)
  })
})

// This is my functon to post data to the database for Leather Gloves
router1.post('/LeatherGlovesProductAdd', (req, res) => {
  const brandName = req.body.createBrandName
  const webLink = req.body.createWebLink

  const queryString = 'INSERT INTO Recruit_Equip_Leather_Gloves(brand_name, web_link) VALUES (?, ?)'
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

// This is my functon to post data to the database for Leather Gloves Reviews
router1.post('/LeatherGlovesReviewsAdd', (req, res) => {
  const ProductNumber = req.body.createProductNumber
  const ReviewerName = req.body.createReviewerName
  const Rating = req.body.createRating
  const ReviewText = req.body.createReviewText

  const queryString = 'INSERT INTO Recruit_Equip_Leather_Gloves_Reviews(product_number, reviewer_name, review_text, review_rating) VALUES (?, ?, ?, ?)'
  getConnection().query(queryString, [ProductNumber, ReviewerName, ReviewText, Rating], (err, results, fields) => {
    if (err) {
      console.log('Failed to add a new data' + err)
      res.sendStatus(500)
      return
    }
    console.log('inserted new data!')
    res.end()
  })

  const queryString1 = 'UPDATE Recruit_Equip_Leather_Gloves SET Recruit_Equip_Leather_Gloves.Averages = (SELECT AVG(review_rating) FROM Recruit_Equip_Leather_Gloves_Reviews WHERE Recruit_Equip_Leather_Gloves.id = Recruit_Equip_Leather_Gloves.product_number)'
  getConnection().query(queryString1, (err, results, fields) => {
    if (err) {
      console.log('Failed to add a new data' + err)
      res.sendStatus(500)
      return
    }
    console.log('updated based on new data!')
    res.end()
  })
  // res.redirect('http://localhost:3000/RecruitEquipment')
  res.redirect('http://aemma.local/members_only/content/mo_equip_recruit.php')
  res.end()
})

// ----These Functions Above are for Leather Gloves

// ----These Functions below are for Period Gloves

// This gets the Period Gloves product data from database
router1.get('/PeriodGlovesProducts', (req, res) => {
  const queryString = 'SELECT * FROM Recruit_Equip_Period_Gloves'
  connection.query(queryString, (err, rows, fields) => {
    if (err) {
      console.log('failed to get data' + err)
      res.sendStatus(500)
      return
    }
    res.json(rows)
  })
})

// This gets the Period Gloves reviews data from database
router1.get('/PeriodGlovesReviews', (req, res) => {
  const queryString = 'SELECT * FROM Recruit_Equip_Period_Gloves_Reviews'
  connection.query(queryString, (err, rows, fields) => {
    if (err) {
      console.log('failed to get data' + err)
      res.sendStatus(500)
      return
    }
    res.json(rows)
  })
})

// This is my functon to post data to the database for Period Gloves
router1.post('/PeriodGlovesProductAdd', (req, res) => {
  const brandName = req.body.createBrandName
  const webLink = req.body.createWebLink

  const queryString = 'INSERT INTO Recruit_Equip_Period_Gloves(brand_name, web_link) VALUES (?, ?)'
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

// This is my functon to post data to the database for Period Gloves Reviews
router1.post('/PeriodGlovesReviewsAdd', (req, res) => {
  const ProductNumber = req.body.createProductNumber
  const ReviewerName = req.body.createReviewerName
  const Rating = req.body.createRating
  const ReviewText = req.body.createReviewText

  const queryString = 'INSERT INTO Recruit_Equip_Period_Gloves_Reviews(product_number, reviewer_name, review_text, review_rating) VALUES (?, ?, ?, ?)'
  getConnection().query(queryString, [ProductNumber, ReviewerName, ReviewText, Rating], (err, results, fields) => {
    if (err) {
      console.log('Failed to add a new data' + err)
      res.sendStatus(500)
      return
    }
    console.log('inserted new data!')
    res.end()
  })

  const queryString1 = 'UPDATE Recruit_Equip_Period_Gloves SET Recruit_Equip_Period_Gloves.Averages = (SELECT AVG(review_rating) FROM Recruit_Equip_Period_Gloves_Reviews WHERE Recruit_Equip_Period_Gloves.id = Recruit_Equip_Period_Gloves_Reviews.product_number)'
  getConnection().query(queryString1, (err, results, fields) => {
    if (err) {
      console.log('Failed to add a new data' + err)
      res.sendStatus(500)
      return
    }
    console.log('updated based on new data!')
    res.end()
  })
  // res.redirect('http://localhost:3000/RecruitEquipment')
  res.redirect('http://aemma.local/members_only/content/mo_equip_recruit.php')
  res.end()
})

// ----These Functions Above are for Period Gloves

// ----These Functions below are for Period Belts

// This gets the Period Belts product data from database
router1.get('/PeriodBeltsProducts', (req, res) => {
  const queryString = 'SELECT * FROM Recruit_Equip_Period_Belts'
  connection.query(queryString, (err, rows, fields) => {
    if (err) {
      console.log('failed to get data' + err)
      res.sendStatus(500)
      return
    }
    res.json(rows)
  })
})

// This gets the Period Belts reviews data from database
router1.get('/PeriodBeltsReviews', (req, res) => {
  const queryString = 'SELECT * FROM Recruit_Equip_Period_Belt_Reviews'
  connection.query(queryString, (err, rows, fields) => {
    if (err) {
      console.log('failed to get data' + err)
      res.sendStatus(500)
      return
    }
    res.json(rows)
  })
})

// This is my functon to post data to the database for Period Belts
router1.post('/PeriodBeltsProductAdd', (req, res) => {
  const brandName = req.body.createBrandName
  const webLink = req.body.createWebLink

  const queryString = 'INSERT INTO Recruit_Equip_Period_Belts(brand_name, web_link) VALUES (?, ?)'
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

// This is my functon to post data to the database for Period Belts Reviews
router1.post('/PeriodBeltsReviewsAdd', (req, res) => {
  const ProductNumber = req.body.createProductNumber
  const ReviewerName = req.body.createReviewerName
  const Rating = req.body.createRating
  const ReviewText = req.body.createReviewText

  const queryString = 'INSERT INTO Recruit_Equip_Period_Belt_Reviews(product_number, reviewer_name, review_text, review_rating) VALUES (?, ?, ?, ?)'
  getConnection().query(queryString, [ProductNumber, ReviewerName, ReviewText, Rating], (err, results, fields) => {
    if (err) {
      console.log('Failed to add a new data' + err)
      res.sendStatus(500)
      return
    }
    console.log('inserted new data!')
    res.end()
  })

  const queryString1 = 'UPDATE Recruit_Equip_Period_Belts SET Recruit_Equip_Period_Belts.Averages = (SELECT AVG(review_rating) FROM Recruit_Equip_Period_Belt_Reviews WHERE Recruit_Equip_Period_Belts.id = Recruit_Equip_Period_Belt_Reviews.product_number)'
  getConnection().query(queryString1, (err, results, fields) => {
    if (err) {
      console.log('Failed to add a new data' + err)
      res.sendStatus(500)
      return
    }
    console.log('updated based on new data!')
    res.end()
  })
  // res.redirect('http://localhost:3000/RecruitEquipment')
  res.redirect('http://aemma.local/members_only/content/mo_equip_recruit.php')
  res.end()
})

// ----These Functions Above are for Period Belts

// ----These Functions below are for Masks

// This gets the Masks product data from database
router1.get('/FencingMasksProducts', (req, res) => {
  const queryString = 'SELECT * FROM Recruit_Equip_Fencing_Masks'
  connection.query(queryString, (err, rows, fields) => {
    if (err) {
      console.log('failed to get data' + err)
      res.sendStatus(500)
      return
    }
    res.json(rows)
  })
})

// This gets the Masks reviews data from database
router1.get('/FencingMasksReviews', (req, res) => {
  const queryString = 'SELECT * FROM Recruit_Equip_Fencing_Masks_Reviews'
  connection.query(queryString, (err, rows, fields) => {
    if (err) {
      console.log('failed to get data' + err)
      res.sendStatus(500)
      return
    }
    res.json(rows)
  })
})

// This is my functon to post data to the database for Masks
router1.post('/FencingMasksProductAdd', (req, res) => {
  const brandName = req.body.createBrandName
  const webLink = req.body.createWebLink

  const queryString = 'INSERT INTO Recruit_Equip_Fencing_Masks(brand_name, web_link) VALUES (?, ?)'
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

// This is my functon to post data to the database for Masks Reviews
router1.post('/FencingMasksReviewsAdd', (req, res) => {
  const ProductNumber = req.body.createProductNumber
  const ReviewerName = req.body.createReviewerName
  const Rating = req.body.createRating
  const ReviewText = req.body.createReviewText

  const queryString = 'INSERT INTO Recruit_Equip_Fencing_Masks_Reviews(product_number, reviewer_name, review_text, review_rating) VALUES (?, ?, ?, ?)'
  getConnection().query(queryString, [ProductNumber, ReviewerName, ReviewText, Rating], (err, results, fields) => {
    if (err) {
      console.log('Failed to add a new data' + err)
      res.sendStatus(500)
      return
    }
    console.log('inserted new data!')
    res.end()
  })

  const queryString1 = 'UPDATE Recruit_Equip_Fencing_Masks SET Recruit_Equip_Fencing_Masks.Averages = (SELECT AVG(review_rating) FROM Recruit_Equip_Fencing_Masks_Reviews WHERE Recruit_Equip_Fencing_Masks.id = Recruit_Equip_Fencing_Masks_Reviews.product_number)'
  getConnection().query(queryString1, (err, results, fields) => {
    if (err) {
      console.log('Failed to add a new data' + err)
      res.sendStatus(500)
      return
    }
    console.log('updated based on new data!')
    res.end()
  })
  // res.redirect('http://localhost:3000/RecruitEquipment')
  res.redirect('http://aemma.local/members_only/content/mo_equip_recruit.php')
  res.end()
})

// ----These Functions Above are for Masks

// ----These Functions below are for Swords

// This gets the Swords product data from database
router1.get('/SwordsProducts', (req, res) => {
  const queryString = 'SELECT * FROM Recruit_Equip_Swords'
  connection.query(queryString, (err, rows, fields) => {
    if (err) {
      console.log('failed to get data' + err)
      res.sendStatus(500)
      return
    }
    res.json(rows)
  })
})

// This gets the Swords reviews data from database
router1.get('/SwordsReviews', (req, res) => {
  const queryString = 'SELECT * FROM Recruit_Equip_Swords_Reviews'
  connection.query(queryString, (err, rows, fields) => {
    if (err) {
      console.log('failed to get data' + err)
      res.sendStatus(500)
      return
    }
    res.json(rows)
  })
})

// This is my functon to post data to the database for Swords
router1.post('/SwordsProductAdd', (req, res) => {
  const brandName = req.body.createBrandName
  const webLink = req.body.createWebLink

  const queryString = 'INSERT INTO Recruit_Equip_Swords(brand_name, web_link) VALUES (?, ?)'
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

// This is my functon to post data to the database for Swords Reviews
router1.post('/SwordsReviewsAdd', (req, res) => {
  const ProductNumber = req.body.createProductNumber
  const ReviewerName = req.body.createReviewerName
  const Rating = req.body.createRating
  const ReviewText = req.body.createReviewText

  const queryString = 'INSERT INTO Recruit_Equip_Swords_Reviews(product_number, reviewer_name, review_text, review_rating) VALUES (?, ?, ?, ?)'
  getConnection().query(queryString, [ProductNumber, ReviewerName, ReviewText, Rating], (err, results, fields) => {
    if (err) {
      console.log('Failed to add a new data' + err)
      res.sendStatus(500)
      return
    }
    console.log('inserted new data!')
    res.end()
  })

  const queryString1 = 'UPDATE Recruit_Equip_Swords SET Recruit_Equip_Swords.Averages = (SELECT AVG(review_rating) FROM Recruit_Equip_Swords_Reviews WHERE Recruit_Equip_Swords.id = Recruit_Equip_Swords_Reviews.product_number)'
  getConnection().query(queryString1, (err, results, fields) => {
    if (err) {
      console.log('Failed to add a new data' + err)
      res.sendStatus(500)
      return
    }
    console.log('updated based on new data!')
    res.end()
  })
  // res.redirect('http://localhost:3000/RecruitEquipment')
  res.redirect('http://aemma.local/members_only/content/mo_equip_recruit.php')
  res.end()
})

// ----These Functions Above are for Swords

module.exports = router1

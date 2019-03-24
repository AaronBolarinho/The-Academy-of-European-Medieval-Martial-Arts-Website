const express = require('express')
const mysql = require('mysql')
const router1 = express.Router()
// const exphpb = require('express-handlebars')
// const nodemailer = require('nodemailer')
// const path = require('path')

const connection = getConnection()

// This gets the conventional shoes data from database
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

// This is my functon to connect to the AEMMA Database
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

// async function main(){
//   const emailMsg = `<p>Someone added a conventional shoes product</p>`

//     // create reusable transporter object using the default SMTP transport
//   let transporter = nodemailer.createTransport({
//     host: "localhost",
//     port: 3003,
//     secure: false, // true for 465, false for other ports
//     auth: {
//       user: 'aaron.bolarinho@gmail.com', // generated ethereal user
//       pass: 'Finkelthehero' // generated ethereal password
//     },
//     tls:{
//       rejectUnauthorized:false
//     }
//   });

//   // setup email data with unicode symbols
//   let mailOptions = {
//     from: '"Aaron Foo 👻" <aaron.bolarinho@gmail.com>', // sender address
//     to: "aaron.bolarinho@gmail.com", // list of receivers
//     subject: "Hello ✔", // Subject line
//     text: "A product was added to conventional shoes", // plain text body
//     html: emailMsg // html body
//   };

//   // send mail with defined transport object
//   let info = await transporter.sendMail(mailOptions)

//   console.log("Message sent: %s", info.messageId);
//   // Preview only available when sending through an Ethereal account
//   console.log("Preview URL: %s", nodemailer.getTestMessageUrl(info));

//   // Message sent: <b658f8ca-6296-ccf4-8306-87d57a0b4321@example.com>
//   // Preview URL: https://ethereal.email/message/WaQKMgKddxQDoou...
// }
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
  res.redirect('http://localhost:3000/RecruitEquipment')
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

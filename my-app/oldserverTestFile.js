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



getTableBodyAsReactElement() {
  let inv = this.state.products;
  console.log('inv: ', inv);

  // let heroes = this.state.heroes;
  // console.log('These are the heroes', heroes);

  // var marvelHeroes =  heroes.filter(function(hero) {
  //   return hero.franchise == 'Marvel';
  // });

  // console.log('This is the hero filter working ', marvelHeroes);

  return (
   <tbody>
   {inv.map(({id, brand_name, web_link}) => {

      let reviews = this.state.reviews;
      console.log('this is the reviews: ', reviews);

      // let productID = {id}.id
      // console.log("this is the individual product id", productID)

      var specificReviews =  reviews.filter(function(review) {
        return review.product_number == productID;
      });
      console.log('This is the aaron filter working ', specificReviews);

      // var togglefunc = '';

      // if (productID === 1) {

      //   var togglefunc = this.toggle1()

      // } else if (productID === 2) {

      //   var togglefunc = this.toggle2()

      // } else if (productID === 3) {

      //   var togglefunc = this.toggle3()

      // } else {
      //   console.log ("the for loop finished")
      //   return;
      // }

      // const toggleID = "toggle" + productID.toString()
      // console.log("this is the toggle id", toggleID)

      // let toggleID = ''
      // console.log("this is the toggle id", toggleID)


      // const modalID = "modal" + productID.toString()
      // console.log("this is the modal id", modalID)

      const testtoggle = this.toggle
      const testmodal = this.state.modal
      // const testmodal = this.state[modalID]

      // console.log("this is normal toggle id", testtoggle)
      // console.log("this is normal modal id", testmodal)
      // // console.log("this is new toggle id", toggleID)
      // console.log("this is new modal id", this.state[modalID])

      return (
        <tr>
          <td key={id}>{id}</td>
          <td key={id}>{brand_name}</td>
          <td key={id}><a href={web_link}>Link</a></td>
          <td key={id}>
            <Button color="danger" onClick={testtoggle}>Ratings and Reviews</Button>
            <Modal isOpen={testmodal} toggle={testtoggle} className={this.props.className}>
            <ModalHeader toggle={testtoggle}>Modal title</ModalHeader>
            <ModalBody>
              <tbody>
                {specificReviews.map(({id, product_number, reviewer_name, review_text, review_rating}) => {
                    return (
                      <tr>
                        <td key={id}>{id}</td>
                        <td key={id}>{product_number}</td>
                        <td key={id}>{reviewer_name}</td>
                        <td key={id}>{review_text}</td>
                        <td key={id}>{review_rating}</td>
                      </tr>
                    )
                })}
              </tbody>
            </ModalBody>
            <ModalFooter>
              <Button color="primary" onClick={testtoggle}>Do Something</Button>{' '}
              <Button color="secondary" onClick={testtoggle}>Cancel</Button>
            </ModalFooter>
          </Modal>
        </td>
        </tr>
      )
  })}
  </tbody>
  )

}
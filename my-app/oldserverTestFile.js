// --------------------------------------------
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
// --------------------------------------------

// --------------------------------------------
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
// --------------------------------------------


// --------------------------------------------
<form action="/runningShoesDataAdd" method="POST" className="form">
  <input placeholder="Brand Name" name="createBrandName" className="formFields"/>
  <input placeholder="Web Link" name="createWebLink" className="formFields"/>
  <button onSubmit={this.submitForm} className="formButton">Add a Product</button>
</form>
// ---------------------------------
// ---------------------------------
    <tbody>
     {this.state.products.map(({id, brand_name, web_link}) => {

        let productID = {id}.id

        let reviews = this.state.reviews;

        var specificReviews =  reviews.filter(function(review) {
          return review.product_number == productID;
        });

        return (
          <tr>
            <td key={id}>{id}</td>
            <td key={id}>{brand_name}</td>
            <td key={id}><a href={web_link}>Link</a></td>
            <td key={id}>
              <ModalToggle filteredRevs={specificReviews} tableKey={productID}/>
            </td>
          </tr>
        )
      })}
    </tbody>
// ---------------------------------


{this.state.products.map(({id, brand_name, web_link}) => {

        let productID = {id}.id

        let reviews = this.state.reviews;

        var specificReviews =  reviews.filter(function(review) {
          return review.product_number == productID;
        });


            })}



<tbody>
        <tr>
          <th scope="row" key={id}>{id}</th>
          <td key={id}>{brand_name}</td>
          <td key={id}><a href={web_link}>Link</a></td>
          <td key={id}>rating</td>
          <td key={id}>
            <ModalToggle filteredRevs={specificReviews} tableKey={productID}/>
          </td>
        </tr>
      </tbody>




    <Table hover>
      <thead>
        <tr>
          <th>#</th>
          <th>Product Name</th>
          <th>Website Link</th>
          <th>Overall Rating</th>
          <th>Reviews and Ratings</th>
        </tr>
      </thead>
      <tbody>
      {this.state.products.map(({id, brand_name, web_link}) => {

        let productID = {id}.id

        let reviews = this.state.reviews;

        var specificReviews =  reviews.filter(function(review) {
          return review.product_number == productID;
        });
        <div>
        <tr>
          <th scope="row" key={id}>{id}</th>
          <td key={id}>{brand_name}</td>
          <td key={id}><a href={web_link}>Link</a></td>
          <td key={id}>rating</td>
          <td key={id}>
            <ModalToggle filteredRevs={specificReviews} tableKey={productID}/>
          </td>
        </tr>
        </div>
        })}
      </tbody>
    </Table>
//-----------------------------
    <Table hover>
      <thead>
        <tr>
          <th>#</th>
          <th>Product Name</th>
          <th>Website Link</th>
          <th>Overall Rating</th>
          <th>Reviews and Ratings</th>
        </tr>
      </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
    </Table>
//-----------------------------


{this.state.products.map(({id, brand_name, web_link}) => {

        let productID = {id}.id
        console.log("This is product ID", productID)

        let reviews = this.state.reviews;
        console.log("This is reviews", reviews)

        var specificReviews =  reviews.filter(function(review) {
          return review.product_number == productID;
        });
        console.log("This is specificReviews", specificReviews)


{this.state.products.map(({id, brand_name, web_link}) => {

        let productID = {id}.id
        console.log("This is product ID", productID)

        let reviews = this.state.reviews;
        console.log("This is reviews", reviews)

        var specificReviews =  reviews.filter(function(review) {
          return review.product_number == productID;
        });
        console.log("This is specificReviews", specificReviews)
  })}


// This is the function that maps each tab's table data
getTableBodyAsReactElement() {

      let products = this.state.products
      console.log("these are the products", products)

        return (
          <div>
            {products.map(products =>
            <h4 key={products.id}>
              {products.id}
            </h4>
            )}
          </div>
        )
}
//-----------------------------------------------------


      products.forEach(function (arrayItem) {
          var x = arrayItem.id;
          console.log("this is the prodcuts values", x)
      });


  overallRating(filteredReviews, itemId) {

    var rv = {};

    function toObject(arr) {
      for (var i = 0; i < arr.length; ++i)
        rv[i] = arr[i];
      return rv;
    }

    const totalRating = [0]

    toObject(filteredReviews);

    console.log("these are the filtered reviews as an object", rv)

    for (let elem in rv) {

      let singleObject = rv[elem]

      console.log("these are the individal review objects", rv[elem] )

      totalRating.push(singleObject.review_rating);
      console.log("these are the total ratings array", totalRating )
    }

    let total = this.getAverage(totalRating)

    console.log("this is the final total", total)

    return total
  }

                  <Form action='/runningShoesDataAdd' method='POST'>
                    <FormGroup>
                      <Label for='exampleEmail'>Product Name</Label>
                      <Input type='textarea'
                        name='createBrandName'
                        id='exampleText'
                        placeholder='REEBOK ENDLESS ROAD'/>
                      <FormText>Please Indicate the Name of the Product</FormText>
                    </FormGroup>
                    <FormGroup>
                      <Label for='examplePassword'>Website Link</Label>
                      <Input type='textarea'
                        name='createWebLink'
                        id='exampleText'
                        placeholder='https://www.reebok.ca/en/reebok-endless-road/CN6429.html'/>
                      <FormText>Copy and Paste an Accurate Website Link</FormText>
                    </FormGroup>
                    <div className='addProductFormButton'>
                      <Button onSubmit={this.submitForm}>Submit</Button>
                    </div>
                  </Form>



{specificReviews.map(({ id, product_number, reviewer_name, review_text, review_rating }) => {
                return (
                  <tr>
                    <td key={id}>{id}</td>
                    <td key={id}>{product_number}</td>
                    <td key={id}>{reviewer_name}</td>
                    <td key={id}>{review_text}</td>
                    <td key={id}>{review_rating}</td>
                  </tr>

  <Table striped className='flexy table-bordered'>
              <thead className="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Review</th>
                  <th scope="col">Rating</th>
                </tr>
              </thead>
              <tbody>
                {specificReviews.map(({ id, product_number, reviewer_name, review_text, review_rating }) => {
                  return (
                    <tr>
                      <th scope="row"></th>
                      <td key={id}>{reviewer_name}</td>
                      <td key={id} colspan="2">{review_text}</td>
                      <td key={id}>{review_rating}</td>
                    </tr>
                  )
                })}
              </tbody>
            </Table>

    console.log('this is now the state of this modal', this.state.productNumer)

    this.setState(state => ({ productNumer: { product_number } })
                    )
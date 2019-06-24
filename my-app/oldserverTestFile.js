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

    -------------------------

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

---------------

// more test data

// ----- This component is the main component for the Recruit Equipment page.

// import React, { Component } from 'react'
// import { TabContent, TabPane } from 'reactstrap'
// // ------These Are the Shoes Components
// import NavTabsShoes from './Shoes/NavTabsShoes.js'
// import GeneralInfoShoesTab from './Shoes/GeneralInfoShoesTab.js'
// import ConventionalShoesTab from './Shoes/ConventionalShoesTab.js'
// import AthleticShoesTab from './Shoes/AthleticShoesTab.js'
// import PeriodShoesTab from './Shoes/PeriodShoesTab.js'
// // ------These Are the Shirts Components
// import NavTabsShirts from './Shirts/NavTabsShirts.js'
// import GeneralInfoShirtsTab from './Shirts/GeneralInfoShirtsTab.js'
// import WhiteShirtsTab from './Shirts/WhiteShirtsTab.js'
// import AEMMAShirtsTab from './Shirts/AEMMAShirtsTab.js'
// // ------These Are the Pants Components
// import NavTabsPants from './Pants/NavTabsPants.js'
// import GeneralInfoPantsTab from './Pants/GeneralInfoPantsTab.js'
// import BlackPantsTab from './Pants/BlackPantsTab.js'
// // ------These Are the Gloves Components
// import NavTabsGloves from './Gloves/NavTabsGloves.js'
// import GeneralInfoGlovesTab from './Gloves/GeneralInfoGlovesTab.js'
// import LeatherGlovesTab from './Gloves/LeatherGlovesTab.js'
// import PeriodGlovesTab from './Gloves/PeriodGlovesTab.js'
// // ------These Are the Belts Components
// import NavTabsBelts from './Belts/NavTabsBelts.js'
// import GeneralInfoBeltsTab from './Belts/GeneralInfoBeltsTab.js'
// import BeltsTab from './Belts/BeltsTab.js'
// // ------These Are the Masks Components
// import NavTabsMasks from './Masks/NavTabsMasks.js'
// import GeneralInfoMasksTab from './Masks/GeneralInfoMasksTab.js'
// import MasksTab from './Masks/MasksTab.js'
// // ------These Are the Swords Components
// import NavTabsSwords from './Swords/NavTabsSwords.js'
// import GeneralInfoSwordsTab from './Swords/GeneralInfoSwordsTab.js'
// import SwordsTab from './Swords/SwordsTab.js'
// // ------These are the css and images used on the main equip page
// import '../../../css/Equipment/Recruit/RecruitEquipment.css'
// import '../../../css/Equipment/Recruit/AddReviewsModal.css'
// import LongswordLeft from '../../../css/images/Equipment/longswordLeft.png'
// import LongswordRight from '../../../css/images/Equipment/longswordRight.png'
// // ------This is the main componant
// class RecruitEquipment extends Component {
//   constructor(props) {
//     super(props)
// 
//     this.toggleGp1 = this.toggleGp1.bind(this)
//     this.toggleGp2 = this.toggleGp2.bind(this)
//     this.toggleGp3 = this.toggleGp3.bind(this)
//     this.toggleGp4 = this.toggleGp4.bind(this)
//     this.toggleGp5 = this.toggleGp5.bind(this)
//     this.toggleGp6 = this.toggleGp6.bind(this)
//     this.toggleGp7 = this.toggleGp7.bind(this)
// 
//     this.state = {
//       activeTabGp1: '1',
//       activeTabGp2: '1',
//       activeTabGp3: '1',
//       activeTabGp4: '1',
//       activeTabGp5: '1',
//       activeTabGp6: '1',
//       activeTabGp7: '1'
//     }
//   }
// 
//   // These are the functions that govern the switching of tabs in each tabbed div
// 
//   toggleGp1(tab) {
//     if (this.state.activeTabGp1 !== tab) {
//       this.setState({
//         activeTabGp1: tab,
//         activeTabGp2: '1',
//         activeTabGp3: '1',
//         activeTabGp4: '1',
//         activeTabGp5: '1',
//         activeTabGp6: '1',
//         activeTabGp7: '1'
//       })
//     }
//   }
// 
//   toggleGp2(tab) {
//     if (this.state.activeTabGp2 !== tab) {
//       this.setState({
//         activeTabGp1: '1',
//         activeTabGp2: tab,
//         activeTabGp3: '1',
//         activeTabGp4: '1',
//         activeTabGp5: '1',
//         activeTabGp6: '1',
//         activeTabGp7: '1'
//       })
//     }
//   }
// 
//   toggleGp3(tab) {
//     if (this.state.activeTabGp3 !== tab) {
//       this.setState({
//         activeTabGp1: '1',
//         activeTabGp2: '1',
//         activeTabGp3: tab,
//         activeTabGp4: '1',
//         activeTabGp5: '1',
//         activeTabGp6: '1',
//         activeTabGp7: '1'
//       })
//     }
//   }
// 
//   toggleGp4(tab) {
//     if (this.state.activeTabGp4 !== tab) {
//       this.setState({
//         activeTabGp1: '1',
//         activeTabGp2: '1',
//         activeTabGp3: '1',
//         activeTabGp4: tab,
//         activeTabGp5: '1',
//         activeTabGp6: '1',
//         activeTabGp7: '1'
//       })
//     }
//   }
// 
//   toggleGp5(tab) {
//     if (this.state.activeTabGp5 !== tab) {
//       this.setState({
//         activeTabGp1: '1',
//         activeTabGp2: '1',
//         activeTabGp3: '1',
//         activeTabGp4: '1',
//         activeTabGp5: tab,
//         activeTabGp6: '1',
//         activeTabGp7: '1'
//       })
//     }
//   }
// 
//   toggleGp6(tab) {
//     if (this.state.activeTabGp6 !== tab) {
//       this.setState({
//         activeTabGp1: '1',
//         activeTabGp2: '1',
//         activeTabGp3: '1',
//         activeTabGp4: '1',
//         activeTabGp5: '1',
//         activeTabGp6: tab,
//         activeTabGp7: '1'
//       })
//     }
//   }
// 
//   toggleGp7(tab) {
//     if (this.state.activeTabGp7 !== tab) {
//       this.setState({
//         activeTabGp1: '1',
//         activeTabGp2: '1',
//         activeTabGp3: '1',
//         activeTabGp4: '1',
//         activeTabGp5: '1',
//         activeTabGp6: '1',
//         activeTabGp7: tab
//       })
//     }
//   }
// 
//   // -----------------------------------------------------
// 
//   componentDidMount() {}
// 
//   // Below is the render function; this is what displays
//   // the HTML on this page.
// 
//   render() {
//     return (
//       <div>
//         <div className='backgroundDiv1'>
//         </div>
//         <div className='backgroundDiv2'>
//         </div>
//         <div>
//           <h1 className='title'>Equipment Requirements:</h1>
//           <img src={LongswordLeft} className='swordLeft animated slideInLeft delay-1s' alt='Medieval Sword'/>
//           <h2 className='title1'>Recruits</h2>
//           <img src={LongswordRight} className='animated slideInRight delay-1s swordRight' alt='Medieval Sword'/>
//           <div className='d-flex intoTextDiv'>
//             <span className='introText col-4 animated fadeInLeft delay-2s'>
//               <p>
//             &nbsp;&nbsp;&nbsp;&nbsp;Equipment costs for recruits
//             in every AEMMA salle are relatively low. What gear you
//             do need will be provided for you during your first
//             few months; this will give you time to organize
//             your finances and your future purchases.
//               </p>
//             </span>
//             <span className='introText col-4 animated fadeInUp delay-2s'>
//               <p>
//             &nbsp;&nbsp;&nbsp;&nbsp;Below, you will find a list of
//             the gear you need, suggested versions of that gear, and
//             a broad purchasing timeline. As always, if you have
//             any questions please email <strong>websiteAdministrator@email.com</strong>,
//             ask your fellow salle members or pose
//             your question to AEMMA members online.
//               </p>
//             </span>
//             <span className='introText col-4 animated fadeInRight delay-2s'>
//               <p>
//             &nbsp;&nbsp;&nbsp;&nbsp;Talk to your salle's Free
//             Scholar and senior students when you are ready to start
//              purchasing gear. While you are encouraged to
//             make purchases yourself, there are semi-regular
//             group orders which you may have access to.
//               </p>
//             </span>
//           </div>
//           <h2 className='firstDay'><u>Needed For Your First Day:</u></h2>
// 
// 
//           <div className='shoes'>
//             <NavTabsShoes toggleGp1={this.toggleGp1}/>
//             <TabContent activeTab={this.state.activeTabGp1} className='animated fadeIn'>
//               <TabPane tabId='1'>
//                 <GeneralInfoShoesTab/>
//               </TabPane>
//               <TabPane tabId='2'>
//                 <ConventionalShoesTab/>
//               </TabPane>
//               <TabPane tabId='3'>
//                 <AthleticShoesTab/>
//               </TabPane>
//               <TabPane tabId='4'>
//                 <PeriodShoesTab/>
//               </TabPane>
//             </TabContent>
//           </div>
// 
//           <div className='shirts'>
//             <NavTabsShirts toggleGp2={this.toggleGp2}/>
//             <TabContent activeTab={this.state.activeTabGp2} className='animated fadeIn'>
//               <TabPane tabId='1'>
//                 <GeneralInfoShirtsTab/>
//               </TabPane>
//               <TabPane tabId='2'>
//                 <WhiteShirtsTab/>
//               </TabPane>
//               <TabPane tabId='3'>
//                 <AEMMAShirtsTab/>
//               </TabPane>
//             </TabContent>
//           </div>
// 
//           <div className='pants'>
//             <NavTabsPants toggleGp3={this.toggleGp3}/>
//             <TabContent activeTab={this.state.activeTabGp3} className='animated fadeIn'>
//               <TabPane tabId='1'>
//                 <GeneralInfoPantsTab/>
//               </TabPane>
//               <TabPane tabId='2'>
//                 <BlackPantsTab/>
//               </TabPane>
//             </TabContent>
//           </div>
// 
//           <h2 className='firstDay'><u>Needed Within Three Months</u></h2>
// 
//           <div className='gloves'>
//             <NavTabsGloves toggleGp4={this.toggleGp4}/>
//             <TabContent activeTab={this.state.activeTabGp4} className='animated fadeIn'>
//               <TabPane tabId='1'>
//                 <GeneralInfoGlovesTab/>
//               </TabPane>
//               <TabPane tabId='2'>
//                 <LeatherGlovesTab/>
//               </TabPane>
//               <TabPane tabId='3'>
//                 <PeriodGlovesTab/>
//               </TabPane>
//             </TabContent>
//           </div>
// 
//           <div className='belts'>
//             <NavTabsBelts toggleGp5={this.toggleGp5}/>
//             <TabContent activeTab={this.state.activeTabGp5} className='animated fadeIn'>
//               <TabPane tabId='1'>
//                 <GeneralInfoBeltsTab/>
//               </TabPane>
//               <TabPane tabId='2'>
//                 <BeltsTab/>
//               </TabPane>
//             </TabContent>
//           </div>
// 
//           <a name='FirstDay'></a>
//           <h2 className='firstDay'><u>Needed Within Six Months</u></h2>
// 
//           <div className='masks'>
//             <NavTabsMasks toggleGp6={this.toggleGp6}/>
//             <TabContent activeTab={this.state.activeTabGp6} className='animated fadeIn'>
//               <TabPane tabId='1'>
//                 <GeneralInfoMasksTab/>
//               </TabPane>
//               <TabPane tabId='2'>
//                 <MasksTab/>
//               </TabPane>
//             </TabContent>
//           </div>
// 
//           <div className='swords'>
//             <NavTabsSwords toggleGp7={this.toggleGp7}/>
//             <TabContent activeTab={this.state.activeTabGp7} className='animated fadeIn'>
//               <TabPane tabId='1'>
//                 <GeneralInfoSwordsTab/>
//               </TabPane>
//               <TabPane tabId='2'>
//                 <SwordsTab/>
//               </TabPane>
//             </TabContent>
//           </div>
// 
//         </div>
//       </div>
//     )
//   }
// }
// 
// export default RecruitEquipment



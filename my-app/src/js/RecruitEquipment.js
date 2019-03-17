import React, { Component } from 'react';
import '../css/RecruitEquipment.css';
import { TabContent, TabPane, Nav, NavItem, NavLink, Card, Button, CardTitle, CardText, Row, Col } from 'reactstrap';
import { Table } from 'reactstrap';
import { Form, FormGroup, Label, Input, FormText } from 'reactstrap';
import classnames from 'classnames';
import { BrowserRouter as Router, Route, Link } from "react-router-dom";
import { Modal, ModalHeader, ModalBody, ModalFooter } from 'reactstrap';
import ModalToggle from './ModalToggle.js';
import IntroImage from '../css/images/Knightstraining.jpg'
import ShoesExampleImage from '../css/images/shoesExample.jpg'

class RecruitEquipment extends Component {

  constructor(props) {
    super(props);

    this.toggleGp1 = this.toggleGp1.bind(this);
    this.toggleGp2 = this.toggleGp2.bind(this);
    this.toggleGp3 = this.toggleGp3.bind(this);
this.overallRating = this.overallRating.bind(this);
   this.getAverage = this.getAverage.bind(this);
   this.grabVariable = this.grabVariable.bind(this);

    this.state = {
             modal: false,
      activeTabGp1: '1',
      activeTabGp2: '3',
      activeTabGp3: '5',
      totalRatings: [],
    ratingsCounter: 3,
          products: [],
           reviews: [],
    };
  }

// These are the functions that govern the switching of tabs in each tabbed div
  toggleGp1(tab) {
    if (this.state.activeTabGp1 !== tab) {
      this.setState({
        activeTabGp1: tab
      });
    }
  }

  toggleGp2(tab) {
  if (this.state.activeTabGp2 !== tab) {
    this.setState({
      activeTabGp2: tab
    });
  }
}

  toggleGp3(tab) {
  if (this.state.activeTabGp3 !== tab) {
    this.setState({
      activeTabGp3: tab
    });
  }
}

  getAverage(array) {
    let count = array.length - 1;
    array = array.reduce((previous, current) => current += previous);
    array /= count;
    // console.log("this is the average number", array)
    return array
  }

  grabVariable(rating){

    let totalRatings = this.state.totalRatings

    console.log("this is the one old rating", rating)

    if ((rating != undefined) && (totalRatings.length <= 3)){
      this.setState(prevState => ({
        totalRatings: [...prevState.totalRatings, rating]
      }))
      console.log("this setstate ran!")
      console.log("this is the new total ratings", totalRatings)
      }

    // if (totalRatings.length < 4) {
    // console.log("these are the total ratings", totalRatings)

    // var x = rating

    // this.setState(prevState => ({
    //   totalRatings: [...prevState.totalRatings, rating]
    // }))

    // console.log("these are the total ratings", totalRatings)

    // }

    // if (this.state.ratingsCounter < 8){
    //   this.setState({ratingsCounter: this.state.ratingsCounter + 1})
    //   console.log("this is the new ratingscounter", this.state.ratingsCounter)
    //   }

    // let counter = this.state.ratingsCounter
    // console.log("this is the counter", counter)
    // return <td>{this.state.totalRatings[counter]}</td>

    // return <td>{this.state.activeTabGp1}</td>
  }

  overallRating(filteredReviews, itemId) {

    var rv = {};
    const totalRating = [0]

    function toObject(arr) {
      for (var i = 0; i < arr.length; ++i)
        rv[i] = arr[i];
      return rv;
    }

    toObject(filteredReviews);

    // console.log("these are the filtered reviews as an object", rv)

    for (let elem in rv) {

      let singleObject = rv[elem]

      // console.log("these are the individal review objects", rv[elem] )

      totalRating.push(singleObject.review_rating);
      // console.log("these are the total ratings array", totalRating )
    }

    let total = this.getAverage(totalRating)

    console.log("this is the final total", total)

    this.grabVariable(total)
  }

//-----------------------------------------------------

// This is the function that maps each tab's table data
getTableBodyAsReactElement() {

      let products = this.state.products
      console.log("these are the products", products)

      let reviews = this.state.reviews;

      let finalRatings = this.state.totalRatings
      // console.log("these are yo yo final ratings array", this.state.totalRatings)
      console.log("these are final ratings array", finalRatings)

        return (
          <>
            {products.map((products) =>

            <tr>
              <th scope="row" key={products.id}>{products.id}</th>
              <td>{products.brand_name}</td>
              <td><a href={products.web_link}>Link</a></td>
              {this.grabVariable()}
              <td>{finalRatings[products.id - 1]}</td>
              <td>
                <ModalToggle allReviews={reviews} tableKey={products.id} overallRating={this.overallRating} />
              </td>
            </tr>
            )}
          </>
        )
}
//-----------------------------------------------------

// This functon grabbs the database data as soon as possible in the react load cycle
componentWillMount() {

  function status(response) {
   if (response.status >= 200 && response.status < 300) {
     return Promise.resolve(response)
   } else {
     return Promise.reject(new Error(response.statusText))
   }
  }

  function json(response) {
   return response.json()
  }

  fetch('http://localhost:3003/runningShoesReviews')
   .then(status)
   .then(json)
   .then( (data) => {
   this.setState({ reviews: data })
   console.log("This is the component state after getting the reviews", this.state)
   }).catch(function(error) {
     console.log('Request failed', error);
   });

  fetch('http://localhost:3003/runningShoesProducts')
   .then(status)
   .then(json)
   .then( (data) => {
   this.setState({ products: data })
   console.log("This is the component state after getting the products", this.state)
   }).catch(function(error) {
     console.log('Request failed', error);
   });

}

//-----------------------------------------------------

// This function used to have all the fetches; but the data was being grabbed too slow.
componentDidMount() {}
//-----------------------------------------------------


// Below is the render function; this is what displays the HTML on this page. Note that each modal is a seperate componant, generated by the mapping function in getTableBodyAsReactElement

  render() {

    return (
      <div className="backgroundDiv">
        <h1 className="title">Equipment Requirements</h1>
        <p className="textFont introText">
        <img src={IntroImage} className="introImage"/>
        <br></br>
        &nbsp;&nbsp;&nbsp;&nbsp;Equipment costs for recruits in every AEMMA salle are relatively low. What gear you do need will be provided for you during your first few months; this will give you time to organise your finances and your future purchases.<br></br>
        &nbsp;&nbsp;&nbsp;&nbsp;Talk to your salle's Free Scholar and senior students when you are ready to start purchasing gear. While you are encouraged to make purchases yourself, there are semi-regular group orders which you may have access to.<br></br>
        &nbsp;&nbsp;&nbsp;&nbsp;Below, you will find a list of the gear you need, suggested versions of that gear, and a broad purchasing timeline. As always, if you have any questions, ask your fellow salle members or pose your question to AEMMA members online.
        </p>
        <h2 className="firstDay">Needed For Your First Day:</h2>
        <div className="shoes">
          <Nav tabs>
            <NavItem className="">
              <NavLink
                className={classnames({ active: this.state.activeTabGp1 === '1' })}
                onClick={() => { this.toggleGp1('1'); }}
              >
                General Info
              </NavLink>
            </NavItem>
            <NavItem>
              <NavLink
                className={classnames({ active: this.state.activeTabGp1 === '2' })}
                onClick={() => { this.toggleGp1('2'); }}
              >
                Running Shoes
              </NavLink>
            </NavItem>
          </Nav>
          <TabContent activeTab={this.state.activeTabGp1}>
            <TabPane tabId="1">
              <Row>
                <Col sm="12">
                  <span className="textFont introText">
                  <img src={ShoesExampleImage} className="shoesExample"/>
                  <br></br>
                  <h2>Indoor Footwear</h2>
                  <ul className="footwearList">
                  <li>
                    <i className="fas fa-chess-rook"></i>&nbsp;&nbsp;The footware you use should be reserved for use in class and not used outside.
                  </li>
                  <li>
                    <i className="fas fa-chess-knight"></i>&nbsp;&nbsp;There are three options for footware: Running Shoes, Athletic Shoes, Period Shoes.
                  </li>
                  <li>
                    <i className="fas fa-chess-rook"></i>&nbsp;&nbsp;Running Shoes will suffice; Athletic Shoes are better, Period Shoes are prefered.
                  </li>
                  </ul>
                  <span className="ClickTabsBanner">
                    <i className="fas fa-chess"></i>Click the Tabs above to find info on reccomended brands<i className="fas fa-chess"></i>
                  </span>
                  </span>
                </Col>
              </Row>
            </TabPane>
            <TabPane tabId="2">
              <Row>

                <Col sm="5">
                <p className="formTitle">Reccomend A Product!</p>
                  <Form action="/runningShoesDataAdd" method="POST">
                    <FormGroup>
                      <Label for="exampleEmail">Product Name</Label>
                      <Input type="textarea" name="createBrandName" id="exampleText" placeholder="REEBOK ENDLESS ROAD"/>
                    </FormGroup>
                    <FormGroup>
                      <Label for="examplePassword">Website Link</Label>
                      <Input type="textarea" name="createWebLink" id="exampleText" placeholder="https://www.reebok.ca/en/reebok-endless-road/CN6429.html"/>
                    </FormGroup>
                    <Button onSubmit={this.submitForm}>Submit</Button>
                  </Form>
                </Col>
                <Col sm="7">
                  <div>
                    <p className="formTitle">Reccomended Running Shoes</p>
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
                          {this.getTableBodyAsReactElement()}
                      </tbody>
                    </Table>
                  </div>
                </Col>
              </Row>
            </TabPane>
          </TabContent>
        </div>

        <div className="shirt">
          <Nav tabs>
            <NavItem>
              <NavLink
                className={classnames({ active: this.state.activeTabGp2 === '3' })}
                onClick={() => { this.toggleGp2('3'); }}
              >
                Tab1
              </NavLink>
            </NavItem>
            <NavItem>
              <NavLink
                className={classnames({ active: this.state.activeTabGp2 === '4' })}
                onClick={() => { this.toggleGp2('4'); }}
              >
                Moar Tabs
              </NavLink>
            </NavItem>
          </Nav>
          <TabContent activeTab={this.state.activeTabGp2}>
            <TabPane tabId="3">
              <Row>
                <Col sm="12">
                  <h4>Tab 1 Contents</h4>
                  <p>This is test text</p>
                  <p>This is test text</p>
                </Col>
              </Row>
            </TabPane>
            <TabPane tabId="4">
              <Row>
                <Col sm="6">
                  <Card body>
                    <CardTitle>Special Title Treatment</CardTitle>
                    <CardText>With supporting text below as a natural lead-in to additional content.</CardText>
                    <Button>Go somewhere</Button>
                  </Card>
                </Col>
                <Col sm="6">
                  <Card body>
                    <CardTitle>Special Title Treatment</CardTitle>
                    <CardText>With supporting text below as a natural lead-in to additional content.</CardText>
                    <Button>Go somewhere</Button>
                  </Card>
                </Col>
              </Row>
            </TabPane>
          </TabContent>
        </div>

      </div>
    );
  }
}

export default RecruitEquipment;



import React, { Component } from 'react';
import '../css/test.css';
import { TabContent, TabPane, Nav, NavItem, NavLink, Card, Button, CardTitle, CardText, Row, Col } from 'reactstrap';
import classnames from 'classnames';
import { BrowserRouter as Router, Route, Link } from "react-router-dom";
import { Modal, ModalHeader, ModalBody, ModalFooter } from 'reactstrap';
import ModalToggle from './ModalToggle.js';

class test extends Component {

  constructor(props) {
    super(props);

    this.toggleGp1 = this.toggleGp1.bind(this);
    this.toggleGp2 = this.toggleGp2.bind(this);
    this.toggleGp3 = this.toggleGp3.bind(this);

    this.state = {
             modal: false,
      activeTabGp1: '1',
      activeTabGp2: '3',
      activeTabGp3: '5',
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

// These are the functions that govern the switching of tabs in each tabbed div

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

      let productID = {id}.id
      console.log("this is the individual product id", productID)

      let reviews = this.state.reviews;
      console.log('this is the reviews: ', reviews);

      var specificReviews =  reviews.filter(function(review) {
        return review.product_number == productID;
      });
      console.log('This is the aaron filter working ', specificReviews);

      // this.setState({tableKey : productID})

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
  )

}

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

componentDidMount() {

}

  render() {

    return (
      <div>
        <div>
          Add A Product
          <form action="/runningShoesDataAdd" method="POST">
            <input placeholder="Brand Name" name="createBrandName"/>
            <input placeholder="Web Link" name="createWebLink"/>
            <button onSubmit={this.submitForm}>Submit</button>
          </form>
        </div>
        <h1 className="test textFont">Equipment Requirements</h1>
        <p className="textFont">&nbsp;&nbsp;&nbsp;&nbsp;Equipment costs for recruits in all AEMMA salles is quite low. What gear you do need will be provided for you during your first few months; this will give you time to organise your finances and your future purchases.</p>
        <p className="textFont">&nbsp;&nbsp;&nbsp;&nbsp;Talk to your salle's Free Scholar and senior students when you are ready to start purchasing gear. While you are encouraged to make purchases yourself, there are semi-regular group orders which you may have access to.</p>
        <p className="textFont">&nbsp;&nbsp;&nbsp;&nbsp;Below, you will find a list of the gear you need, suggested versions of that gear, and a broad purchasing timeline. As always, if you have any questions, ask your fellow salle members or pose your question to AEMMA members online.</p>
        <h2 className="textFont">Needed Your First Day:</h2>
        <div className="divBorder">
          <Nav tabs>
            <NavItem>
              <NavLink
                className={classnames({ active: this.state.activeTabGp1 === '1' })}
                onClick={() => { this.toggleGp1('1'); }}
              >
                Tab1
              </NavLink>
            </NavItem>
            <NavItem>
              <NavLink
                className={classnames({ active: this.state.activeTabGp1 === '2' })}
                onClick={() => { this.toggleGp1('2'); }}
              >
                Moar Tabs
              </NavLink>
            </NavItem>
          </Nav>
          <TabContent activeTab={this.state.activeTabGp1}>
            <TabPane tabId="1">
              <Row>
                <Col sm="12">
                  <h4>Tab 1 Contents</h4>
                  <p>This is test text</p>
                  <p>This is test text</p>
                  <table border="1">
                    {this.getTableBodyAsReactElement()}
                  </table>
                </Col>
              </Row>
            </TabPane>
            <TabPane tabId="2">
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

        <div className="divBorder">
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

export default test;



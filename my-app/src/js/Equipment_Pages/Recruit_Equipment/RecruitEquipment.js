import React, { Component } from 'react'
import '../../../css/Equipment/Recruit/RecruitEquipment.css'
import { TabContent, TabPane, Nav,
  NavItem, NavLink, Card, Button, CardTitle, CardText, Row, Col } from 'reactstrap'
import { Table } from 'reactstrap'
import { Form, FormGroup, Label, Input, FormText } from 'reactstrap'
import classnames from 'classnames'
import AddReviewsModal from './AddReviewsModal.js'
import IntroImage from '../../../css/images/Equipment/Knightstraining.jpg'
import ShoesExampleImage from '../../../css/images/Equipment/shoesExample.jpg'
import ConventionalShoeGeneric from '../../../css/images/Equipment/conventionalShoeGeneric.jpeg'
import AthleticShoesExample from '../../../css/images/Equipment/AthleticShoesExample.jpg'
import PeriodShoesExample from '../../../css/images/Equipment/periodShoesExample.jpg'

class RecruitEquipment extends Component {
  constructor(props) {
    super(props)

    this.toggleGp1 = this.toggleGp1.bind(this)
    this.toggleGp2 = this.toggleGp2.bind(this)
    this.toggleGp3 = this.toggleGp3.bind(this)
    this.overallRating = this.overallRating.bind(this)
    this.getAverage = this.getAverage.bind(this)
    this.grabVariable = this.grabVariable.bind(this)

    this.state = {
      modal: false,
      activeTabGp1: '1',
      activeTabGp2: '3',
      activeTabGp3: '5',
      totalRatings: [],
      products: [],
      reviews: []
    }
  }

  // These functions are used to achieve the list of averaged total ratings
  // in the main running shoes tab.

  getAverage(array) {
    let count = array.length - 1
    let arrayAverage = array
    arrayAverage = array.reduce((previous, current) => current += previous)
    arrayAverage /= count
    return arrayAverage
  }

  grabVariable(rating) {
    let totalRatings = this.state.totalRatings
    if ((rating !== undefined) && (totalRatings.length <= 3)) {
      this.setState(prevState => ({
        totalRatings: [...prevState.totalRatings, rating.toFixed(1)]
      }))
    }
  }

  overallRating(filteredReviews) {
    let rv = {}
    const totalRating = [0]

    function toObject(arr) {
      for (let i = 0; i < arr.length; i++) {
        rv[i] = arr[i]
      }
      return rv
    }

    toObject(filteredReviews)

    for (let elem in rv) {
      if (0 === 0) {
        let singleObject = rv[elem]
        totalRating.push(singleObject.review_rating);
      }
    }
    let total = this.getAverage(totalRating)
    this.grabVariable(total)
  }
  // -----------------------------------------------------

  // These are the functions that govern the switching of tabs in each tabbed div
  toggleGp1(tab) {
    if (this.state.activeTabGp1 !== tab) {
      this.setState({
        activeTabGp1: tab
      })
    }
  }

  toggleGp2(tab) {
    if (this.state.activeTabGp2 !== tab) {
      this.setState({
        activeTabGp2: tab
      })
    }
  }

  toggleGp3(tab) {
    if (this.state.activeTabGp3 !== tab) {
      this.setState({
        activeTabGp3: tab
      })
    }
  }

  // -----------------------------------------------------

  // This is the function that maps each tab's table data
  getTableBodyAsReactElement() {
    let products = this.state.products
    let reviews = this.state.reviews
    let finalRatings = this.state.totalRatings
    return (
      <>
        {products.map((products) => (
          <tr className='d-flex'>
            <th scope='row' className='col-2'>{products.id}</th>
            <td scope='row' className='col-2'>{products.brand_name}</td>
            <td scope='row' className='col-2'>
              <a href={products.web_link}
                target='_blank'
                rel='noopener noreferrer'>
                Link
              </a>
            </td>
            {this.grabVariable()}
            <td scope='row' className='col-2'>{finalRatings[products.id - 1]}</td>
            <td scope='row' className='col-4'>
              <AddReviewsModal allReviews={reviews}
                tableKey={products.id}
                overallRating={this.overallRating}
                productName={products.brand_name} />
            </td>
          </tr>
        ))}
      </>
    )
  }
  //  -----------------------------------------------------

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

    fetch('http://localhost:3003/conventionalShoesReviews')
      .then(status)
      .then(json)
      .then((data) => {
        this.setState({ reviews: data })
        console.log('This is the component state after getting the reviews', this.state)
      }).catch(function (error) {
        console.log('Request failed', error)
      })

    fetch('http://localhost:3003/conventionalShoesProducts')
      .then(status)
      .then(json)
      .then((data) => {
        this.setState({ products: data })
        console.log('This is the component state after getting the products', this.state)
      }).catch(function (error) {
        console.log('Request failed', error)
      })
  }

  // -----------------------------------------------------

  // This function used to have all the fetches; but the data was being grabbed too slow.
  componentDidMount() {}
  // -----------------------------------------------------


  // Below is the render function; this is what displays
  // the HTML on this page. Note that each modal is a
  // seperate componant, generated by the mapping function
  // in getTableBodyAsReactElement

  render() {
    return (
      <div className='backgroundDiv'>
        <h1 className='title'>Equipment Requirements</h1>
        <p className='textFont introText'>
          <img src={IntroImage} className='introImage'/>
          <br></br>
        &nbsp;&nbsp;&nbsp;&nbsp;Equipment costs for recruits
        in every AEMMA salle are relatively low. What gear you
        do need will be provided for you during your first
        few months; this will give you time to organise
        your finances and your future purchases.<br></br>
        &nbsp;&nbsp;&nbsp;&nbsp;Talk to your salle's Free
        Scholar and senior students when you are ready to
        start purchasing gear. While you are encouraged to
        make purchases yourself, there are semi-regular
        group orders which you may have access to.<br></br>
        &nbsp;&nbsp;&nbsp;&nbsp;Below, you will find a list of
        the gear you need, suggested versions of that gear, and
        a broad purchasing timeline. As always, if you have
        any questions, ask your fellow salle members or pose
        your question to AEMMA members online.
        </p>
        <h2 className='firstDay'>Needed For Your First Day:</h2>
        <div className='shoes'>
          <Nav tabs>
            <NavItem className=''>
              <NavLink
                className={classnames({ active: this.state.activeTabGp1 === '1' })}
                onClick={() => {
                  this.toggleGp1('1')
                }}
              >
                General Info
              </NavLink>
            </NavItem>
            <NavItem>
              <NavLink
                className={classnames({ active: this.state.activeTabGp1 === '2' })}
                onClick={() => {
                  this.toggleGp1('2')
                }}
              >
                Conventional Shoes
              </NavLink>
            </NavItem>
            <NavItem>
              <NavLink
                className={classnames({ active: this.state.activeTabGp1 === '3' })}
                onClick={() => {
                  this.toggleGp1('3')
                }}
              >
                Athletic Shoes
              </NavLink>
            </NavItem>
            <NavItem>
              <NavLink
                className={classnames({ active: this.state.activeTabGp1 === '4' })}
                onClick={() => {
                  this.toggleGp1('4')
                }}
              >
                Period Shoes
              </NavLink>
            </NavItem>
          </Nav>
          <TabContent activeTab={this.state.activeTabGp1} className='animated fadeIn'>
            <TabPane tabId='1'>
              <Row>
                <Col sm='12'>
                  <span className='textFont introText'>
                    <img src={ShoesExampleImage} className='shoesExample'/>
                    <br></br>
                    <h2>Indoor Footwear</h2>
                    <ul className='footwearList'>
                      <li>
                        <i className='fas fa-chess-rook'></i>
                        &nbsp;&nbsp;The footware you use should
                         be reserved for use in class and not
                          used outside.
                      </li>
                      <li>
                        <i className='fas fa-chess-knight'></i>
                        &nbsp;&nbsp;There are three options
                         for footware: Conventional Shoes, Athletic Shoes, Period Shoes.
                      </li>
                      <li>
                        <i className='fas fa-chess-rook'></i>
                        &nbsp;&nbsp;Conventional Shoes will
                         suffice; Athletic Shoes are better,
                          Period Shoes are prefered.
                      </li>
                    </ul>
                    <span className='ClickTabsBanner'>
                      <i className='fas fa-chess'></i>
                    Click the Tabs above to find info
                     on reccomended brands<i className='fas fa-chess'></i>
                    </span>
                  </span>
                </Col>
              </Row>
            </TabPane>
            <TabPane tabId='2'>
              <Row>
                <Col sm='12'>
                  <p className='textFont introText'>
                    <img src={ConventionalShoeGeneric} className='conventionalShoeImage'/>
                    <span className='generalAdviceTitle'>General Advice:</span><br></br>While conventional shoes are not ideal, they are what many people start with - usually because they already have a pair on hand.
                    <br></br> The major disadvantages of typical running
                  shoes are: potential clunkyness, and thick soles.
                  Big, heavy or clunky shoes make it difficult to
                  do proper footwork. A shoe with a think sole makes
                  it more diffult to move or turn on the balls of
                  your feet, as the shoe fights you to flatten your
                  foot to the ground.
                  </p>
                </Col>
                <Col sm='5'>
                  <p className='formTitle'>
                    <i class='fas fa-chess-pawn'></i>
                  Reccomend A Product!
                    <i class='fas fa-chess-pawn'></i>
                  </p>
                  <Form action='/conventionalShoesProductAdd' method='POST'>
                    <FormGroup>
                      <Label for='exampleEmail'>Product Name</Label>
                      <Input type='textarea'
                        name='createBrandName'
                        id='exampleText'
                        placeholder='REEBOK ENDLESS ROAD'
                        maxlength='49'
                        required/>
                      <FormText>Please Indicate the Name of the Product</FormText>
                    </FormGroup>
                    <FormGroup>
                      <Label for='examplePassword'>Website Link</Label>
                      <Input type='textarea'
                        name='createWebLink'
                        id='exampleText'
                        maxlength='199'
                        placeholder='https://www.reebok.ca/en/reebok-endless-road/CN6429.html'
                        required/>
                      <FormText>Copy and Paste an Accurate Website Link</FormText>
                    </FormGroup>
                    <div className='addProductFormButton'>
                      <Button onSubmit={this.submitForm}>Submit</Button>
                    </div>
                  </Form>
                </Col>
                <Col sm='7'>
                  <div>
                    <p className='formTitle'>
                      <i class='fas fa-chess-pawn'></i>
                    Reccomended Conventional Shoes
                      <i class='fas fa-chess-pawn'></i>
                    </p>
                    <div className='table-wrapper-scroll-y my-custom-scrollbar'>
                      <Table hover className=' tableProportions'>
                        <thead>
                          <tr className='d-flex'>
                            <th scope='col' className='col-2'>#</th>
                            <th scope='col' className='col-2'>Product Name</th>
                            <th scope='col' className='col-2'>Website Link</th>
                            <th scope='col' className='col-2'>Overall Rating</th>
                            <th scope='col' className='col-4'>Reviews and Ratings</th>
                          </tr>
                        </thead>
                        <tbody>
                          {this.getTableBodyAsReactElement()}
                        </tbody>
                      </Table>
                    </div>
                  </div>
                </Col>
              </Row>
            </TabPane>
            <TabPane tabId='3'>
            </TabPane>
            <TabPane tabId='4'>
            </TabPane>
          </TabContent>
        </div>
      </div>
    )
  }
}

export default RecruitEquipment



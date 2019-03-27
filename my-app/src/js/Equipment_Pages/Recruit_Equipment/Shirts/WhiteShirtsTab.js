import React, { Component } from 'react'
import { Form, FormGroup, Label, Input, FormText, Table, Button, Row, Col } from 'reactstrap'
import ConventionalShoesReviewsModal from './WhiteShirtsReviewsModal.js'
import WhiteShirt from '../../../../css/images/Equipment/WhiteShirt.jpeg'

class ConventionalShoes extends Component {
  constructor(props) {
    super(props)

    this.overallRating = this.overallRating.bind(this)
    this.getAverage = this.getAverage.bind(this)
    this.grabVariable = this.grabVariable.bind(this)

    this.state = {
      modal: false,
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

  // This is the function that maps each tab's table data
  getTableBodyAsReactElement() {
    let products = this.state.products
    let reviews = this.state.reviews
    let finalRatings = this.state.totalRatings
    return (
      <>
        {products.map((products) => (
          <tr className='d-flex container'>
            <th scope='row' className='col-2'>{products.id}</th>
            <td className='col-2'>{products.brand_name}</td>
            <td className='col-2'>
              <a href={products.web_link}
                target='_blank'
                rel='noopener noreferrer'>
                Link
              </a>
            </td>
            {this.grabVariable()}
            <td className='col-2'>{finalRatings[products.id - 1]}</td>
            <td className='col-4'>
              <ConventionalShoesReviewsModal allReviews={reviews}
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

  render() {
    return (
	   <div>
	     <Row>
	          <Col sm='7'>
	            <p className='ConventionalShoesAdvice'>
	              <span className='generalAdviceTitle'>General Advice:</span><br></br><br></br>While conventional shoes are not ideal, they are what many people start with - usually because they already have a pair on hand.
	              <br></br><br></br> The major disadvantages of typical running
	            shoes are: potential clunkyness, and thick soles.
	            Big, heavy or clunky shoes make it difficult to
	            do proper footwork. A shoe with a think sole makes
	            it more diffult to move or turn on the balls of
	            your feet, as the shoe fights you to flatten your
	            foot to the ground.
	            </p>
	          </Col>
          <Col sm='5'>
            <div className='tabImageDiv'>
              <img src={WhiteShirt} className='conventionalShoeImage' alt='Typical Running Shoe'/>
            </div>
            <div>
              <span className='imageLable'> Conventional Shoes</span>
            </div>
          </Col>
	        </Row>
	        <Row className='secondRow'>
	          <Col sm='7'>
	            <div>
	              <p className='formTitle'>
	                <i className='fas fa-chess-pawn'></i>
	              &nbsp;&nbsp;Reccomended Conventional Shoes&nbsp;&nbsp;
	                <i className='fas fa-chess-pawn'></i>
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
	          <Col sm='4'>
            <p className='formTitle'>
              <i className='fas fa-chess-pawn'></i>
            &nbsp;&nbsp;Reccomend A Product!&nbsp;&nbsp;
              <i className='fas fa-chess-pawn'></i>
            </p>
            <Form action='/conventionalShoesProductAdd' method='POST'>
              <FormGroup>
                <Label for='exampleEmail'>Product Name</Label>
                <Input type='textarea'
                  name='createBrandName'
                  id='exampleText'
                  placeholder='REEBOK ENDLESS ROAD'
                  maxLength='49'
                  required/>
                <FormText>Please Indicate the Name of the Product</FormText>
              </FormGroup>
              <FormGroup>
                <Label for='examplePassword'>Website Link</Label>
                <Input type='textarea'
                  name='createWebLink'
                  id='exampleText'
                  maxLength='199'
                  placeholder='https://www.reebok.ca/en/reebok-endless-road/CN6429.html'
                  required/>
                <FormText>Copy and Paste an Accurate Website Link</FormText>
              </FormGroup>
              <div className='addProductFormButton'>
                <Button type='submit' onSubmit={this.submitForm}
                >Submit</Button>
              </div>
            </Form>
          </Col>
	        </Row>
	    </div>
	  )
	 }
}

export default ConventionalShoes

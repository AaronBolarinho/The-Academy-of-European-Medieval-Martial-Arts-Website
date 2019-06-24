import React, { Component } from 'react'
import { Form, FormGroup, Label, Input, FormText, Table, Button, Row, Col } from 'reactstrap'
import PeriodGlovesReviewsModal from './PeriodGlovesReviewsModal.js'
import PeriodGlovesExample from '../../../../css/images/Equipment/PeriodGlovesExample.jpg'

class PeriodGlovesTab extends Component {
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
            <th scope='row' className='col-1'>{products.id}</th>
            <td className='col-4'>{products.brand_name}</td>
            <td className='col-2'>
              <a href={products.web_link}
                target='_blank'
                rel='noopener noreferrer'>
                Link
              </a>
            </td>
            {this.grabVariable()}
            <td className='col-2'>{finalRatings[products.id - 1]}</td>
            <td className='col-3'>
              <PeriodGlovesReviewsModal allReviews={reviews}
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

  // This function used to have all the fetches; but the data was being grabbed too slow.
  componentDidMount() {}
  // -----------------------------------------------------

  render() {
    return (
	   <div>
	     <Row>
	          <Col sm='7'>
	            <p className='ConventionalShoesAdvice'>
	              <span className='generalAdviceTitle'>General Advice:</span><br></br><br></br> Period gloves are very highly recommended for use by all AEMMA students.
              <br></br><br></br> The long cuff on period gloves provides reduces the discomfort of making training with the dagger, and provides good protection for the hand and wrist for training with the sword. Period gloves may be purchased from places which sell other period equipement - and typically cost from around $40 to $60 Canadian dollars.
	            </p>
	          </Col>
          <Col sm='5'>
            <div className='tabImageDiv'>
              <img src={PeriodGlovesExample} className='PeriodShoesImage' alt='Typical Running Shoe'/>
            </div>
            <div>
              <span className='imageLable'> Period Gloves</span>
            </div>
          </Col>
	        </Row>
	        <Row className='secondRow'>
	          <Col sm='8'>
	            <div>
	              <p className='formTitle'>
	                <i className='fas fa-chess-pawn'></i>
	              &nbsp;&nbsp;Recommended Period Gloves&nbsp;&nbsp;
	                <i className='fas fa-chess-pawn'></i>
	              </p>
	              <div className='table-wrapper-scroll-y my-custom-scrollbar'>
	                <Table hover className=' tableProportions'>
	                  <thead>
	                    <tr className='d-flex'>
                        <th scope='col' className='col-1'>#</th>
                        <th scope='col' className='col-4'>Product Name</th>
                        <th scope='col' className='col-2'>Website Link</th>
                        <th scope='col' className='col-2'>Overall Rating</th>
                        <th scope='col' className='col-3'>Reviews and Ratings</th>
                      </tr>
	                  </thead>
	                  <tbody>
	                    {this.getTableBodyAsReactElement()}
	                  </tbody>
	                </Table>
	              </div>
	            </div>
	          </Col>
	          <Col sm='3'>
            <p className='formTitle'>
              <i className='fas fa-chess-pawn'></i>
            &nbsp;&nbsp;Recommend A Product!&nbsp;&nbsp;
              <i className='fas fa-chess-pawn'></i>
            </p>
            <Form action='/PeriodGlovesProductAdd' method='POST'>
              <FormGroup>
                <Label for='exampleEmail'>Product Name</Label>
                <Input type='textarea'
                  name='createBrandName'
                  id='exampleText'
                  placeholder='AEMMA School Shirt'
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
                  placeholder='https://www.aemma.org/UniformShirtPlaceholderUrl'
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

export default PeriodGlovesTab

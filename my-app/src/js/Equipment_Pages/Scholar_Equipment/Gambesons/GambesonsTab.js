import React, { Component } from 'react'
import { Form, FormGroup, Label, Input, FormText, Table, Button, Row, Col } from 'reactstrap'
import GambesonsReviewsModal from './GambesonsReviewsModal.js'
import Gambeson from '../../../../css/images/Equipment/spes-gambeson.jpg'

class GambesonsTab extends Component {
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
  // in the Gambesons tab.

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
              <GambesonsReviewsModal allReviews={reviews}
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

    fetch('http://localhost:3003/GambesonsReviews')
      .then(status)
      .then(json)
      .then((data) => {
        this.setState({ reviews: data })
        console.log('This is the component state after getting the reviews', this.state)
      }).catch(function (error) {
        console.log('Request failed', error)
      })

    fetch('http://localhost:3003/GambesonsProducts')
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
            <p className='GambesonsAdvice'>
              <span className='generalAdviceTitle'>General Advice:</span><br></br><br></br> Though gambesons are made by many medieval
               clothing suppliers, not all are made with HEMA in mind.
               Consequently, some gambesons may be too thin or
               have design flaws like openings in the armpits. These are not
               acceptable for use at AEMMA. Vendors that sell gambesons with
               HEMA in mind will tend to have more appropriate products.
               Additionally, fabric around the neck area will not suffice to
               remove the need for a gorget, though it may complement a gorget.
              <br></br><br></br> Styles of gambesons tend to vary based on several factors including: type of ties, thickness, and flexibility in the shoulders. Ties vary from buttons to laces to velcro; buttons tend not to last long. Thickness - especially for newer fencers, may affect how much additional protection you choose to wear. Finally, not all gambesons have equal flexibility in the shoulders - excessive stiffness in the shoulders will negatively affect your fencing. Measure yourself before you buy!
            </p>
	          </Col>
          <Col sm='5'>
            <div className='tabImageDiv'>
              <img src={Gambeson} className='GambesonImage' alt='Gambeson from SPES'/>
            </div>
            <div>
              <span className='imageLable'> Gambesons</span>
            </div>
          </Col>
	        </Row>
	        <Row className='secondRow'>
	          <Col sm='8'>
	            <div>
	              <p className='formTitle'>
	                <i className='fas fa-chess-pawn'></i>
	              &nbsp;&nbsp;Recommended Gambesons&nbsp;&nbsp;
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
            <Form action='/GambesonsProductAdd' method='POST'>
              <FormGroup>
                <Label for='exampleEmail'>Product Name</Label>
                <Input type='textarea'
                  name='createBrandName'
                  id='exampleText'
                  placeholder='SPES Gambeson'
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
                  placeholder='https://medieval-market.com/details.php?id_towar=57&s=1'
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

export default GambesonsTab

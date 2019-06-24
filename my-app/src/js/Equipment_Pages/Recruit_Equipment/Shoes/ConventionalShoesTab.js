import React, { Component } from 'react'
import { Form, FormGroup, Label, Input, FormText, Table, Button, Row, Col } from 'reactstrap'
import ConventionalShoesReviewsModal from './ConventionalShoesReviewsModal.js'
import ConventionalShoeGeneric from '../../../../css/images/Equipment/conventionalShoeGeneric.jpeg'

class ConventionalShoes extends Component {
  constructor(props) {
    super(props)

    this.state = {
      modal: false
    }
  }

  // This is the function that maps each tab's table data
  getTableBodyAsReactElement() {
    return (
      <>
      </>
    )
  }
  //  -----------------------------------------------------

  componentDidMount() {
    console.log('this log ran', this.props)
  }

  render() {
    console.log('these are the conventionalShoesProps', this.props)
    // console.log('these are the conventionalShoesProps array', this.props.data.shoesTest)
    return (
	   <div>
	     <Row>
	          <Col sm='7'>
	            <p className='ConventionalShoesAdvice'>
	              <span className='generalAdviceTitle'>
                  General Advice:</span><br></br>
              <br></br>While conventional shoes are not
               ideal, they are what many people start
                with - usually because they already
                 have a pair on hand.
              <br></br><br></br> The major disadvantages
               of typical running shoes are: potential
              clunkiness, and thick soles. Big, heavy
              or clunky shoes make it difficult to
              do proper footwork. A shoe with a
              thick sole makes it more difficult to move
               or turn on the balls of your feet, as the
                shoe fights you to flatten your foot to
                 the ground.
	            </p>
	          </Col>
          <Col sm='5'>
            <div className='tabImageDiv'>
              <img src={ConventionalShoeGeneric} className='conventionalShoeImage' alt='Typical Running Shoe'/>
            </div>
            <div>
              <span className='imageLable'> Conventional Shoes</span>
            </div>
          </Col>
	        </Row>
	        <Row className='secondRow'>
	          <Col sm='8'>
	            <div>
	              <p className='formTitle'>
	                <i className='fas fa-chess-pawn'></i>
	              &nbsp;&nbsp;Recommended Conventional Shoes&nbsp;&nbsp;
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

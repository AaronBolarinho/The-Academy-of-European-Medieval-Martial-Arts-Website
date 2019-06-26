import React, { Component } from 'react'
import { Form, FormGroup, Label, Input, FormText, Table, Button, Row, Col } from 'reactstrap'
import PeriodShoesReviewsModal from './PeriodShoesReviewsModal.js'
import PeriodShoesExample from '../../../../css/images/Equipment/PeriodShoesExample.jpg'

class PeriodShoes extends Component {
  constructor(props) {
    super(props)

    this.state = {
      modal: false
    }
  }

  render() {
    return (
	   <div>
	     <Row>
	          <Col sm='7'>
	            <p className='ConventionalShoesAdvice'>
	              <span className='generalAdviceTitle'>General Advice:</span><br></br><br></br>Period shoes allow students to learn their footwork in shoes that require accuracy and discipline. The smoother soles on period shoes allow for certain important turns of the feet which are difficult to do in modern shoes.
	              <br></br><br></br> The disadvantages of
                 period shoes - when used on a smooth
                  wood or gym floor - is that they punish
                   poor footwork with slips and slides.
                    To train in period shoes is to take on this challenge.
	            </p>
	          </Col>
          <Col sm='5'>
          <div className='tabImageDiv'>
            <img src={PeriodShoesExample} className='conventionalShoeImage' alt='Typical Running Shoe'/>
            </div>
            <div>
              <span className='imageLable'> Period Shoes</span>
            </div>
          </Col>
	        </Row>
	        <Row className='secondRow'>
	          <Col sm='8'>
	            <div>
	              <p className='formTitle'>
	                <i className='fas fa-chess-pawn'></i>
	              &nbsp;&nbsp;Recommended Period Shoes&nbsp;&nbsp;
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
            <Form action='/PeriodShoesProductAdd' method='POST'>
              <FormGroup>
                <Label for='exampleEmail'>Product Name</Label>
                <Input type='textarea'
                  name='createBrandName'
                  id='exampleText'
                  placeholder='Revival Clothing Medieval Shoes'
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
                  placeholder='https://revivalclothing.com/product/tie-ankle-boots/'
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

export default PeriodShoes

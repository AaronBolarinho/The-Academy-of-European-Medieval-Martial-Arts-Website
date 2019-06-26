import React, { Component } from 'react'
import { Form, FormGroup, Label, Input, FormText, Table, Button, Row, Col } from 'reactstrap'
import AthleticShoesReviewsModal from './AthleticShoesReviewsModal.js'
import AthleticShoesExample from '../../../../css/images/Equipment/AthleticShoesExample.jpg'

class AthleticShoes extends Component {
  constructor(props) {
    super(props)

    this.state = {
      modal: false
    }
  }

  render() {
    console.log('These are the Tabs props', this.props)
    const products = this.props.data.AthleticShoesProducts
    const reviews = this.props.data.AthleticShoesReviews

    const ProductsTable = () => (
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
            {products.map((item, key) => {
              return (
                <tr className='d-flex container' key={key}>
                  <td scope='col' className='col-1'>{item.id}</td>
                  <td scope='col' className='col-4'>{item.brand_name}</td>
                  <td scope='col' className='col-2'>
                    <a href={item.web_link}
                      target='_blank'
                      rel='noopener noreferrer'>
                            Link
                    </a>
                  </td>
                  <td scope='col' className='col-2'>{item.Averages}</td>
                  <td scope='col' className='col-3'>
                    <AthleticShoesReviewsModal allReviews={reviews}
                      tableKey={item.id}
                      productName={item.brand_name} />
                  </td>
                </tr>
              )
            })}
          </tbody>
        </Table>
      </div>
    )

    return (
	   <div>
	     <Row>
	          <Col sm='7'>
	            <p className='ConventionalShoesAdvice'>
	              <span className='generalAdviceTitle'>General Advice:</span><br></br><br></br> Athletic shoes (like wrestling shoes) facilitate spritely footwork, unlike most conventional shoes. They are highly recommended over conventional shoes.
              <br></br><br></br> The disadvantage of athletic shoes is that they often have effective grip on their soles. Modern shoes with excellent grip allow students to perform footwork with a level of imprecision which would not suffice in period shoes. Modern shoes compensate for excessive energy or weight distribution - either of which would result in a slip or slide with period shoes.
	            </p>
	          </Col>
          <Col sm='5'>
            <div className='tabImageDiv'>
              <img src={AthleticShoesExample} className='conventionalShoeImage' alt='Typical Running Shoe'/>
            </div>
            <div>
              <span className='imageLable'> Athletic Shoes</span>
            </div>
          </Col>
	        </Row>
	        <Row className='secondRow'>
	          <Col sm='8'>
	            <div>
	              <p className='formTitle'>
	                <i className='fas fa-chess-pawn'></i>
	              &nbsp;&nbsp;Recommended Athletic Shoes&nbsp;&nbsp;
	                <i className='fas fa-chess-pawn'></i>
	              </p>
	              <ProductsTable />
	            </div>
	          </Col>
	          <Col sm='3'>
            <p className='formTitle'>
              <i className='fas fa-chess-pawn'></i>
            &nbsp;&nbsp;Recommend A Product!&nbsp;&nbsp;
              <i className='fas fa-chess-pawn'></i>
            </p>
            <Form action='/AthleticShoesProductAdd' method='POST'>
              <FormGroup>
                <Label for='exampleEmail'>Product Name</Label>
                <Input type='textarea'
                  name='createBrandName'
                  id='exampleText'
                  placeholder='ASICS MatFlex'
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
                  placeholder='https://www.asics.com/us/en-us/matflex-5/p/0010248140.9093'
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

export default AthleticShoes

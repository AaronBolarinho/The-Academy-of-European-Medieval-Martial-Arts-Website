import React from 'react'
import { Modal, ModalBody, Table, Collapse,
  CardBody, Card, Button, Col, Row,
  Form, FormGroup, Label, Input, FormText } from 'reactstrap'

class AthleticShoesReviewsModal extends React.Component {
  constructor(props) {
    super(props)

    this.state = {
      modal: false,
      collapse: false,
      productNumber: this.props.tableKey,
      value: 250
    }
  }

  handleChange = (event) => {
    let message = event.target.value
    this.setState({ value: 250 - message.length })
  }

  toggle = () => {
    console.log('Toggle ran')
    this.setState(prevState => ({
      modal: !prevState.modal
    }))
  }

  toggleReviewForm = () => {
    this.setState(state => ({ collapse: !state.collapse }))
  }

  render() {
    let allReviews = this.props.allReviews
    let tablekey = this.props.tableKey

    let specificReviews = allReviews.filter(function (review) {
      return review.product_number === tablekey
    })

    return (
      <div>
        <Button
          type='primary' onClick={this.toggle} className='reviewButton'>Rate and Review!
        </Button>
        <Modal isOpen={this.state.modal} toggle={this.toggle} className='modalShoes'>
          <div className='modalTitle'>
            {this.props.productName}: Ratings and Reviews
          </div>
          <ModalBody>
            <div className='table-wrapper-scroll-y my-custom-scrollbar'>
              <Table striped className='table-bordered tableProportions'>
                <thead>
                  <tr className='d-flex'>
                    <th scope='col' className='col-2'>Name</th>
                    <th scope='col' className='col-8'>Review</th>
                    <th scope='col' className='col-2'>Rating</th>
                  </tr>
                </thead>
                <tbody>
                  {specificReviews.map((item, key) => {
                    return (
                      <tr className='d-flex' key={key}>
                        <td className='col-2'>{item.reviewer_name}</td>
                        <td className='col-8'>{item.review_text}</td>
                        <td className='col-2'>{item.review_rating}</td>
                      </tr>
                    )
                  })}
                </tbody>
              </Table>
            </div>
            <Collapse isOpen={this.state.collapse}>
              <Card>
                <CardBody>
                  <Form action='/AthleticShoesReviewsAdd' method='POST'>
                    <Row form>
                      <Col md={6}>
                        <FormGroup className='productNumber'>
                          <Label for='Your Name'>Your Product Number</Label>
                          <Input type='select' name='createProductNumber' required>
                            <option>{this.state.productNumber}</option>
                          </Input>
                          <FormText>
                            Your First and Last Name
                          </FormText>
                        </FormGroup>
                        <FormGroup>
                          <Label for='Your Name'>Your Name</Label>
                          <Input type='textarea'
                            placeholder='John Smith'
                            name='createReviewerName'
                            maxlength='49'
                            required/>
                          <FormText>
                            Your First and Last Name
                          </FormText>
                        </FormGroup>
                      </Col>
                      <Col md={6}>
                        <FormGroup>
                          <Label for='Your Rating'>Your Rating</Label>
                          <Input type='select' name='createRating' id='exampleSelect' required>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                          </Input>
                        </FormGroup>
                      </Col>
                    </Row>
                    <FormGroup>
                      <Label for='Your Review'>Your Review</Label>
                      <Input onChange={this.handleChange}
                        type='textarea'
                        placeholder='This is a great product'
                        name='createReviewText'
                        maxlength='249'
                        required/>
                      <FormText>
                        250 Characters Max; Your review goes here. You have {this.state.value} characters left!
                      </FormText>
                    </FormGroup>
                    <Button onSubmit={this.submitForm}>Submit Review</Button>
                  </Form>
                </CardBody>
              </Card>
            </Collapse>
          </ModalBody>
          <Button className='reviewFormButton'
            color='primary'
            onClick={this.toggleReviewForm}>
            Click to add a review to this product!
          </Button>
        </Modal>
      </div>
    )
  }
}

export default AthleticShoesReviewsModal

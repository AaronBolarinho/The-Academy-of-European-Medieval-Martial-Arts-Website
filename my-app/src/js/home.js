import React, { Component } from 'react'
// import { BrowserRouter, Route, Switch} from "react-router-dom"

import {
  Collapse,
  Navbar,
  NavbarToggler,
  NavbarBrand,
  Nav,
  NavItem,
  NavLink,
  Container,
  Row,
  Col,
  Jumbotron,
  Button
} from 'reactstrap'

import { Form, FormGroup, Label, Input, FormText } from 'reactstrap'

import { connect } from 'react-redux'

class home extends Component {
  constructor(props) {
    super(props)
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  getData = (data) => {
    this.props.getData(data)
  }

  handleClick = () => {
    this.getData({ NewData: 'didItWork?' })
    console.log('handleClick ran')
  }

  handleSubmit(event) {
    event.preventDefault()
    const data = new FormData(event.target)

    fetch('/conventionalShoesProductAdd', {
      method: 'POST',
      body: data
    }).then(() => {
            alert('Selamat email anda sudah terdaftar!')
        })
  }

  componentDidMount() {
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

    fetch('http://localhost:3003/conventionalShoesProducts')
      .then(status)
      .then(json)
      .then((data) => {
        this.getData({ conventionalShoesProducts: data })
      }).catch(function (error) {
        console.log('Request failed', error)
      })

    let ratingsNumbers = {}

    // const toObject = (arr) => {
    //   for (let i = 0; i < arr.length; i++) {
    //     ratingsNumbers[i] = arr[i]
    //   }
    //   return ratingsNumbers
    // }
    // console.log('this is the prop I want', this.props.data.conventionalShoesProducts.conventionalShoesProducts)
    console.log('these are the ratings numbers', ratingsNumbers)
  }

  render() {
    console.log('these are the props', this.props)
    // console.log('these are the props', this.props.store.getState())
    return (
      <div>
        <Navbar color='inverse' light expand='md'>
          <NavbarBrand href='/'>reactstrap</NavbarBrand>
          <NavbarToggler />
          <Collapse navbar>
            <Nav className='ml-auto' navbar>
              <NavItem>
                <NavLink href='/components/'>Components</NavLink>
              </NavItem>
              <NavItem>
                <NavLink href='https://github.com/reactstrap/reactstrap'>Github</NavLink>
              </NavItem>
            </Nav>
          </Collapse>
        </Navbar>
        <Jumbotron>
          <Container>
            <Row>
              <Col>
                <h1>Welcome to React</h1>
                <p>
                  <Button
                    tag='a'
                    color='success'
                    size='large'
                    href='http://reactstrap.github.io'
                    target='_blank'
                  >
                    View Reactstrap Docs
                  </Button>
                </p>
              </Col>
            </Row>
          </Container>
        </Jumbotron>
        <Button onClick={this.handleClick}>
            Add more data; see the dynamic Update!
        </Button>
        <div>
            This is a test
          {JSON.stringify(this.props)}
        </div>
        <div>
            This is another test
          {JSON.stringify(this.state)}
        </div>
        // this is the form test
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
            <Button type='submit' onSubmit={this.handleSubmit}
            >Submit</Button>
          </div>
        </Form>
        //this is the form test
        <div>
            This is the data manipulation test
        </div>
        <div>
        </div>
        <div>
            This is the data manipulation test
        </div>
      </div>
    )
  }
}

const mapStateToProps = (state) => {
  return {
    data: state
  }
}

const mapDispatchToProps = (dispatch) => {
  return {
    getData: (data) => {
      console.log('This is the dispatch data', data)
      dispatch({ type: 'GET_DATA', data: data })
    }
  }
}

export default connect(mapStateToProps, mapDispatchToProps)(home)

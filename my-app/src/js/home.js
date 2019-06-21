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

import { connect } from 'react-redux'

class home extends Component {
  constructor(props) {
    super(props)

    this.state = {
      NewData: ''
    }
  }

  handleClick = () => {
    this.setState({ NewData: 'didItWork?' })
  }


  componentDidMount() {
    const getData = () => {
      this.props.getData(this.state)
    }

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
        this.setState({ products: data })
        getData()
      }).catch(function (error) {
        console.log('Request failed', error)
      })
  }

  render() {
    console.log('these are the props', this.props)
    // console.log('these are the props', this.props.store.getState())
    return (
      <div>
        <Navbar color='inverse' light expand='md'>
          <NavbarBrand href='/'>reactstrap</NavbarBrand>
          <NavbarToggler onClick={this.toggle} />
          <Collapse isOpen={this.state.isOpen} navbar>
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

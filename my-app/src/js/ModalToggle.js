import React, { Component } from 'react';
import { TabContent, TabPane, Nav, NavItem, NavLink, Card, Button, CardTitle, CardText, Row, Col } from 'reactstrap';
import { Modal, ModalHeader, ModalBody, ModalFooter } from 'reactstrap';

class ModalToggle extends React.Component {

  constructor(props) {
    super(props);

    this.state = {
          modal: false,
    };

    this.toggle = this.toggle.bind(this);
  }

  toggle() {

    // const newRevs = this.props.filteredRevs
    // console.log("these are the props-in-a-variable reviews", newRevs)

    console.log('Toggle ran');
      this.setState(prevState => ({
        modal: !prevState.modal
      }));
    }

  componentDidMount() {

  }

  render() {
    // const Modal = this.props.modal;
    return (
      <div>
        <Button type="primary" onClick={this.toggle}>click me!</Button>
          <Modal isOpen={this.state.modal} toggle={this.toggle} className={this.props.className}>
          <ModalHeader toggle={this.toggle}>Modal title</ModalHeader>
          <ModalBody>
              <tbody>
                {this.props.filteredRevs.map(({id, product_number, reviewer_name, review_text, review_rating}) => {
                    return (
                      <tr>
                        <td key={id}>{id}</td>
                        <td key={id}>{product_number}</td>
                        <td key={id}>{reviewer_name}</td>
                        <td key={id}>{review_text}</td>
                        <td key={id}>{review_rating}</td>
                      </tr>
                    )
                })}
              </tbody>
            </ModalBody>
          <ModalFooter>
            <Button color="primary" onClick={this.toggle}>Do Something</Button>{' '}
            <Button color="secondary" onClick={this.toggle}>Cancel</Button>
          </ModalFooter>
        </Modal>
      </div>
    );
  }
}

export default ModalToggle;
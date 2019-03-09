import React, { Component } from 'react';
import '../css/test.css';
import { TabContent, TabPane, Nav, NavItem, NavLink, Card, Button, CardTitle, CardText, Row, Col } from 'reactstrap';
import classnames from 'classnames';

class test extends Component {

  constructor(props) {
    super(props);

    this.toggleGp1 = this.toggleGp1.bind(this);
    this.toggleGp2 = this.toggleGp2.bind(this);
    this.toggleGp3 = this.toggleGp3.bind(this);

    this.state = {
      activeTabGp1: '1',
      activeTabGp2: '3',
      activeTabGp3: '5',
         nameFirst: '',
        nameMiddle: '',
          nameLast: ''
    };
  }

  toggleGp1(tab) {
    if (this.state.activeTabGp1 !== tab) {
      this.setState({
        activeTabGp1: tab
      });
    }
  }

    toggleGp2(tab) {
    if (this.state.activeTabGp2 !== tab) {
      this.setState({
        activeTabGp2: tab
      });
    }
  }

    toggleGp3(tab) {
    if (this.state.activeTabGp3 !== tab) {
      this.setState({
        activeTabGp3: tab
      });
    }
  }

  componentDidMount() {
    // fetch('/users')
    //   .then(res => res.json())
    //   .then(users => this.setState({ users }));
    //   console.log(this.state.users)
    //   console.log(this.state.activeTabGp3)
  }

  render() {
    return (

      <div>
        <h1 className="test textFont">Equipment Requirements</h1>
        <p className="textFont">&nbsp;&nbsp;&nbsp;&nbsp;Equipment costs for recruits in all AEMMA salles is quite low. What gear you do need will be provided for you during your first few months; this will give you time to organise your finances and your future purchases.</p>
        <p className="textFont">&nbsp;&nbsp;&nbsp;&nbsp;Talk to your salle's Free Scholar and senior students when you are ready to start purchasing gear. While you are encouraged to make purchases yourself, there are semi-regular group orders which you may have access to.</p>
        <p className="textFont">&nbsp;&nbsp;&nbsp;&nbsp;Below, you will find a list of the gear you need, suggested versions of that gear, and a broad purchasing timeline. As always, if you have any questions, ask your fellow salle members or pose your question to AEMMA members online.</p>
        <h2 className="textFont">Needed Your First Day:</h2>
        <div className="divBorder">
          <Nav tabs>
            <NavItem>
              <NavLink
                className={classnames({ active: this.state.activeTabGp1 === '1' })}
                onClick={() => { this.toggleGp1('1'); }}
              >
                Tab1
              </NavLink>
            </NavItem>
            <NavItem>
              <NavLink
                className={classnames({ active: this.state.activeTabGp1 === '2' })}
                onClick={() => { this.toggleGp1('2'); }}
              >
                Moar Tabs
              </NavLink>
            </NavItem>
          </Nav>
          <TabContent activeTab={this.state.activeTabGp1}>
            <TabPane tabId="1">
              <Row>
                <Col sm="12">
                  <h4>Tab 1 Contents</h4>
                  <p>This is test text</p>
                  <p>This is test text</p>
                  <table className="width">
                    <tr>
                      <th>FirstName</th>
                      <th>MiddleName</th>
                      <th>LastName</th>
                    </tr>
                    <tr>
                      <td>Jill</td>
                      <td>Smith</td>
                      <td>50</td>
                    </tr>
                   </table>
                </Col>
              </Row>
            </TabPane>
            <TabPane tabId="2">
              <Row>
                <Col sm="6">
                  <Card body>
                    <CardTitle>Special Title Treatment</CardTitle>
                    <CardText>With supporting text below as a natural lead-in to additional content.</CardText>
                    <Button>Go somewhere</Button>
                  </Card>
                </Col>
                <Col sm="6">
                  <Card body>
                    <CardTitle>Special Title Treatment</CardTitle>
                    <CardText>With supporting text below as a natural lead-in to additional content.</CardText>
                    <Button>Go somewhere</Button>
                  </Card>
                </Col>
              </Row>
            </TabPane>
          </TabContent>
        </div>

        <div className="divBorder">
          <Nav tabs>
            <NavItem>
              <NavLink
                className={classnames({ active: this.state.activeTabGp2 === '3' })}
                onClick={() => { this.toggleGp2('3'); }}
              >
                Tab1
              </NavLink>
            </NavItem>
            <NavItem>
              <NavLink
                className={classnames({ active: this.state.activeTabGp2 === '4' })}
                onClick={() => { this.toggleGp2('4'); }}
              >
                Moar Tabs
              </NavLink>
            </NavItem>
          </Nav>
          <TabContent activeTab={this.state.activeTabGp2}>
            <TabPane tabId="3">
              <Row>
                <Col sm="12">
                  <h4>Tab 1 Contents</h4>
                  <p>This is test text</p>
                  <p>This is test text</p>
                </Col>
              </Row>
            </TabPane>
            <TabPane tabId="4">
              <Row>
                <Col sm="6">
                  <Card body>
                    <CardTitle>Special Title Treatment</CardTitle>
                    <CardText>With supporting text below as a natural lead-in to additional content.</CardText>
                    <Button>Go somewhere</Button>
                  </Card>
                </Col>
                <Col sm="6">
                  <Card body>
                    <CardTitle>Special Title Treatment</CardTitle>
                    <CardText>With supporting text below as a natural lead-in to additional content.</CardText>
                    <Button>Go somewhere</Button>
                  </Card>
                </Col>
              </Row>
            </TabPane>
          </TabContent>
        </div>

      </div>
    );
  }
}

export default test;

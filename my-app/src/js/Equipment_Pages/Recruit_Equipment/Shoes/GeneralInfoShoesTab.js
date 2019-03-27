import React, { Component } from 'react'
import { Row, Col } from 'reactstrap'
import ShoesExampleImage from '../../../../css/images/Equipment/shoesExample.jpg'

class GeneralInfoShoesTab extends Component {
  render() {
    return (
	   <div>
	   	<Row>
          <Col sm='12'>
            <span className='textFont introText'>
              <img src={ShoesExampleImage} className='shoesExample' alt='Medieval Shoe'/>
              <br></br>
              <h2>Indoor Footwear</h2>
              <ul className='footwearList'>
                <li>
                  <i className='fas fa-chess-rook'></i>
                  &nbsp;&nbsp;The footwear you use should
                   be reserved for use in class and not
                    used outside.
                </li>
                <li>
                  <i className='fas fa-chess-knight'></i>
                  &nbsp;&nbsp;There are three options
                   for footwear: Conventional Shoes, Athletic Shoes, Period Shoes.
                </li>
                <li>
                  <i className='fas fa-chess-rook'></i>
                  &nbsp;&nbsp;Conventional Shoes will
                   suffice; Athletic Shoes are better,
                    Period Shoes are preferred.
                </li>
              </ul>
              <span className='ClickTabsBanner'>
                <i className='fas fa-chess'></i>
              Click the Tabs above to find info
               on recommended brands<i className='fas fa-chess'></i>
              </span>
            </span>
          </Col>
        </Row>
	    </div>
	  )
	 }
}

export default GeneralInfoShoesTab

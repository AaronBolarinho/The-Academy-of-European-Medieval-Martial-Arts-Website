import React, { Component } from 'react'
import { Row, Col } from 'reactstrap'
import BlackPantsExample from '../../../../css/images/Equipment/blackPantsExample.png'

class GeneralInfoPantsTab extends Component {
  render() {
    return (
	   <div>
	   	<Row>
          <Col sm='12'>
            <span className='textFont introText'>
              <img src={BlackPantsExample} className='pantsExample' alt='White Shirt'/>
              <br></br>
              <h2>Uniform Pants</h2>
              <ul className='footwearList'>
                <li>
                  <i className='fas fa-chess-rook'></i>
                  &nbsp;&nbsp;AEMMA Uniform for all students includes a plain white t-shirt and black athletic pants.
                </li>
                <li>
                  <i className='fas fa-chess-knight'></i>
                  &nbsp;&nbsp;Students may purchase black athletic pants from most clothing stores that sell track pants, sweat pants, or other such workout pants.
                </li>
                <li>
                  <i className='fas fa-chess-rook'></i>
                  &nbsp;&nbsp;Alternatives to black pants (for example, black shorts in summer) may only be worn on a case by case basis as per your chapter's rules.
                </li>
              </ul>
              <div className='ClickTabsBanner'>
                <i className='fas fa-chess'></i>
              &nbsp;&nbsp;Click the Tabs above to find info
               on reccomended brands &nbsp;&nbsp;<i className='fas fa-chess'></i>
              </div>
            </span>
          </Col>
        </Row>
	    </div>
	  )
	 }
}

export default GeneralInfoPantsTab

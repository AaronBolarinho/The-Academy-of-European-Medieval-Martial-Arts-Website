import React, { Component } from 'react'
import { Row, Col } from 'reactstrap'
import BeltsExample from '../../../../css/images/Equipment/BeltsExample.png'

class GeneralInfoBeltsTab extends Component {
  render() {
    return (
	   <div>
	   	<Row>
          <Col sm='12'>
            <span className='textFont introText'>
              <img src={BeltsExample} className='pantsExample' alt='Medieval Belt'/>
              <br></br>
              <h2>Period Belts</h2>
              <ul className='footwearList'>
                <li>
                  <i className='fas fa-chess-rook'></i>
                  &nbsp;&nbsp;Belts are encouraged to be purchased and worn by AEMMA students.
                </li>
                <li>
                  <i className='fas fa-chess-knight'></i>
                  &nbsp;&nbsp;Students may purchase period belts from most places which sell other period cloths or gear.
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

export default GeneralInfoBeltsTab

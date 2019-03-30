import React, { Component } from 'react'
import { Row, Col } from 'reactstrap'
import PeriodGlovesExample from '../../../../css/images/Equipment/PeriodGlovesExample.png'

class GeneralInfoGlovesTab extends Component {
  render() {
    return (
	   <div>
	   	<Row>
          <Col sm='12'>
            <span className='textFont introText'>
              <img src={PeriodGlovesExample} className='glovesExample' alt='White Shirt'/>
              <br></br>
              <h2>Light Gloves</h2>
              <ul className='footwearList'>
                <li>
                  <i className='fas fa-chess-rook'></i>
                  &nbsp;&nbsp;Leather gloves of some form are highly reccomended for standard AEMMA practice.
                </li>
                <li>
                  <i className='fas fa-chess-knight'></i>
                  &nbsp;&nbsp;Students may purchase basic leather gloves - made often of pig, goat, cow hide - from stores that sell them for gardening purposes.
                </li>
                <li>
                  <i className='fas fa-chess-rook'></i>
                  &nbsp;&nbsp;Period gloves - which include a long cuff which covers the wrist - are even better, though they tend to be more expensive.
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

export default GeneralInfoGlovesTab

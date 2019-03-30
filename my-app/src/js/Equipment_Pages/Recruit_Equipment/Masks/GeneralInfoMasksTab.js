import React, { Component } from 'react'
import { Row, Col } from 'reactstrap'
import MaskExample from '../../../../css/images/Equipment/MaskExample.png'

class GeneralInfoMasksTab extends Component {
  render() {
    return (
	   <div>
	   	<Row>
          <Col sm='12'>
            <span className='textFont introText'>
              <img src={MaskExample} className='pantsExample' alt='Fencing Mask'/>
              <br></br>
              <h2>Fencing Masks</h2>
              <ul className='footwearList'>
                <li>
                  <i className='fas fa-chess-rook'></i>
                  &nbsp;&nbsp;Fencing masks are a required purchase for all AEMMA students.
                </li>
                <li>
                  <i className='fas fa-chess-knight'></i>
                  &nbsp;&nbsp;Students may purchase fencing masks from a variety of vendors though AEMMA recommends certin brands and vendors over others.
                </li>
                <li>
                  <i className='fas fa-chess-rook'></i>
                  &nbsp;&nbsp;Fencing masks range from aroudn 50 - 150 dollars, growing more expensive the better the quality and the more accessories are added. Specialized masks for HEMA are now availible from most vendors.
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

export default GeneralInfoMasksTab

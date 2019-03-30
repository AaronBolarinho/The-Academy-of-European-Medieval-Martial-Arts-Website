import React, { Component } from 'react'
import { Row, Col } from 'reactstrap'
import LongswordExample from '../../../../css/images/Equipment/LongswordExample.png'

class GeneralInfoSwordsTab extends Component {
  render() {
    return (
	   <div>
	   	<Row>
          <Col sm='12'>
            <span className='textFont introText'>
              <img src={LongswordExample} className='swordsExample' alt='Steel Longsword'/>
              <br></br>
              <h2>Steel Longswords</h2>
              <ul className='footwearList'>
                <li>
                  <i className='fas fa-chess-rook'></i>
                  &nbsp;&nbsp;A steel longsword is required for AEMMA recruit training.
                </li>
                <li>
                  <i className='fas fa-chess-knight'></i>
                  &nbsp;&nbsp;Students may purchase a sword on their own or as part of a group order(to save on tax).
                </li>
                <li>
                  <i className='fas fa-chess-rook'></i>
                  &nbsp;&nbsp;While AEMMA currently has only one approved longsword vendor and model, this may change in the future and so we will permit recommendations and reviews.
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

export default GeneralInfoSwordsTab

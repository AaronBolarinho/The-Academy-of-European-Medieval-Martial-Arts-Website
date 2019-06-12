import React, { Component } from 'react'
import { Row, Col } from 'reactstrap'
import GambesonExample from '../../../../css/images/Equipment/gambeson-example.png'

class GeneralInfoGambesonsTab extends Component {
  render() {
    return (
	   <div>
	   	<Row>
          <Col sm='12'>
            <span className='textFont introText'>
              <img src={GambesonExample} className='swordsExample' alt='Gambeson'/>
              <br></br>
              <h2>Gambesons</h2>
              <ul className='footwearList'>
                <li>
                  <i className='fas fa-chess-rook'></i>
                  &nbsp;&nbsp;A thick cloth or linen gambeson is required for
                  full speed fencing and training.
                </li>
                <li>
                  <i className='fas fa-chess-knight'></i>
                  &nbsp;&nbsp;There are many vendors with many styles of
                  gambeson which are fit to be used at AEMMA; as a
                  consequence, the prices will also vary. Prices tend to
                  range from $150 to $300 Canadian dollars and up; as a
                   general rule, you get what you pay for.
                </li>
                <li>
                  <i className='fas fa-chess-rook'></i>
                  &nbsp;&nbsp;Do not order a gambeson without checking
                  your relevant body measurements; do not trust standard
                  sizing(small-medium-large) to fit you accurately.
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

export default GeneralInfoGambesonsTab

// ----- This component is the main component for the Recruit Equipment page.

import React, { Component } from 'react'
import { TabContent, TabPane } from 'reactstrap'
// ------These are the css and images used on the main equip page
import '../../../css/Equipment/Scholar/ScholarEquipment.css'
import '../../../css/Equipment/Recruit/AddReviewsModal.css'
import LongswordLeft from '../../../css/images/Equipment/longswordLeft.png'
import LongswordRight from '../../../css/images/Equipment/longswordRight.png'
// ------This is the main componant
class ScholarEquipment extends Component {
  constructor(props) {
    super(props)

    this.toggleGp1 = this.toggleGp1.bind(this)

    this.state = {
      activeTabGp1: '1',
    }
  }

  // These are the functions that govern the switching of tabs in each tabbed div

  toggleGp1(tab) {
    if (this.state.activeTabGp1 !== tab) {
      this.setState({
        activeTabGp1: tab,
        activeTabGp2: '1',
        activeTabGp3: '1',
        activeTabGp4: '1',
        activeTabGp5: '1',
        activeTabGp6: '1',
        activeTabGp7: '1'
      })
    }
  }

  // -----------------------------------------------------

  componentDidMount() {}

  // Below is the render function; this is what displays
  // the HTML on this page.

  render() {
    return (
      <div>
        <div className='backgroundDiv1'>
        </div>
        <div className='backgroundDiv2'>
        </div>
        <div>
          <h1 className='title'>Equipment Requirements:</h1>
          <img src={LongswordLeft} className='swordLeft animated slideInLeft delay-1s' alt='Medieval Sword'/>
          <h2 className='title1'>Scholars</h2>
          <img src={LongswordRight} className='animated slideInRight delay-1s swordRight' alt='Medieval Sword'/>
          <div className='d-flex intoTextDiv'>
            <span className='introText col-4 animated fadeInLeft delay-2s'>
              <p>
            &nbsp;&nbsp;&nbsp;&nbsp;Equipment costs for Scholars and
            prospective Scholars represent the first major financial
            commitment that AEMMA students are invited to make.
              </p>
            </span>
            <span className='introText col-4 animated fadeInUp delay-2s'>
              <p>
            &nbsp;&nbsp;&nbsp;&nbsp;Below, you will find a list of
            the gear you need, suggested versions of that gear, and
            a broad purchasing timeline. As always, if you have
            any questions please email <strong>websiteAdministrator@email.com</strong>,
            ask your fellow salle members or pose
            your question to AEMMA members online.
              </p>
            </span>
            <span className='introText col-4 animated fadeInRight delay-2s'>
              <p>
            &nbsp;&nbsp;&nbsp;&nbsp;Before you order a piece of gear,
            see if you can save some money on shipping through
            a group order with your fellow students.
              </p>
            </span>
          </div>
          <h2 className='firstDay'><u>Needed For Your First Day:</u></h2>

        </div>
      </div>
    )
  }
}

export default ScholarEquipment



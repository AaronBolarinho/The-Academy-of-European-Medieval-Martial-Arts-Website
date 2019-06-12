// ----- This component is the main component for the Scholar Equipment page.

import React, { Component } from 'react'
import { TabContent, TabPane } from 'reactstrap'
// ------These Are the Gambesons Components
import NavTabsGambesons from './Gambesons/NavTabsGambesons.js'
import GeneralInfoGambesonsTab from './Gambesons/GeneralInfoGambesonsTab.js'
import GambesonsTab from './Gambesons/GambesonsTab.js'
// ------These are the css and images used on the main equip page
import '../../../css/Equipment/Scholar/ScholarEquipment.css'
import '../../../css/Equipment/Recruit/AddReviewsModal.css'
import DaggerLeft from '../../../css/images/Equipment/Auray-Rondel-Dagger-transparent-left.png'
import DaggerRight from '../../../css/images/Equipment/Auray-Rondel-Dagger-transparent-right.png'
// ------This is the main componant
class ScholarEquipment extends Component {
  constructor(props) {
    super(props)

    this.toggleGp1 = this.toggleGp1.bind(this)
    this.toggleGp2 = this.toggleGp2.bind(this)

    this.state = {
      activeTabGp1: '1',
      activeTabGp2: '1'
    }
  }

  // These are the functions that govern the switching of tabs in each tabbed div

  toggleGp1(tab) {
    if (this.state.activeTabGp1 !== tab) {
      this.setState({
        activeTabGp1: tab,
        activeTabGp2: '1'
      })
    }
  }

  toggleGp2(tab) {
    if (this.state.activeTabGp2 !== tab) {
      this.setState({
        activeTabGp1: '1',
        activeTabGp2: tab
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
          <div className='titleDiv'>
          	<img src={DaggerLeft} className='swordLeft animated slideInLeft delay-1s' alt='Medieval Sword'/>
            <h2 className='title1'>Scholars</h2>
            <img src={DaggerRight} className='animated slideInRight delay-1s swordRight' alt='Medieval Sword'/>
          </div>
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
            the gear you need and suggested versions of that gear.
            As always, if you have
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
          <div>
          	<h2 className='firstDay'><u>Required by all Scholars</u></h2>
          	<div>
          		<div className='recruitLink'>
          			<p>
         			All gear listed on the Recruit Equipment page is required
         			for scholars.
          			</p>
          			<p>
         			You can view that gear <a href='http://aemma.local/members_only/content/mo_equip_recruit.php' target="_blank">here</a>
          			</p>
          			<p>
         			Scholars also require each of the items
         			listed immediatly below:
          			</p>
          			<p>
         			gambeson - missing, coif - missing, gorget - missing, hard gloves - missing
          			</p>
          		</div>

          		<div className='gambesons'>
	            <NavTabsGambesons toggleGp1={this.toggleGp1}/>
	            <TabContent activeTab={this.state.activeTabGp1} className='animated fadeIn'>
	              <TabPane tabId='1'>
	                <GeneralInfoGambesonsTab/>
	              </TabPane>
	              <TabPane tabId='2'>
	                <GambesonsTab/>
	              </TabPane>
	            </TabContent>
	          </div>
          	</div>
          </div>

        </div>
      </div>
    )
  }
}

export default ScholarEquipment



// ----- This component is the main component for the Recruit Equipment page.

import React, { Component } from 'react'
import { TabContent, TabPane } from 'reactstrap'
// ------These Are the Shoes Components
import NavTabsShoes from './Shoes/NavTabsShoes.js'
import GeneralInfoShoesTab from './Shoes/GeneralInfoShoesTab.js'
import ConventionalShoesTab from './Shoes/ConventionalShoesTab.js'
import AthleticShoesTab from './Shoes/AthleticShoesTab.js'
import PeriodShoesTab from './Shoes/PeriodShoesTab.js'
// ------These Are the Shirts Components
import NavTabsShirts from './Shirts/NavTabsShirts.js'
import GeneralInfoShirtsTab from './Shirts/GeneralInfoShirtsTab.js'
import WhiteShirtsTab from './Shirts/WhiteShirtsTab.js'
import AEMMAShirtsTab from './Shirts/AEMMAShirtsTab.js'
// ------These are the css and images used on the main equip page
import '../../../css/Equipment/Recruit/RecruitEquipment.css'
import '../../../css/Equipment/Recruit/AddReviewsModal.css'
import LongswordLeft from '../../../css/images/Equipment/longswordLeft.png'
import LongswordRight from '../../../css/images/Equipment/longswordRight.png'
// ------This is the main componant
class RecruitEquipment extends Component {
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
        activeTabGp1: tab
      })
    }
  }

  toggleGp2(tab) {
    if (this.state.activeTabGp2 !== tab) {
      this.setState({
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
        <div className='backgroundDiv'>
        </div>
        <div>
          <h1 className='title'>Equipment Requirements:</h1>
          <img src={LongswordLeft} className='swordLeft animated slideInLeft delay-1s' alt='Medieval Sword'/>
          <h2 className='title1'>Recruits</h2>
          <img src={LongswordRight} className='animated slideInRight delay-1s swordRight' alt='Medieval Sword'/>
          <div className='d-flex intoTextDiv'>
            <span className='introText col-4 animated fadeInLeft delay-2s'>
              <p>
            &nbsp;&nbsp;&nbsp;&nbsp;Equipment costs for recruits
            in every AEMMA salle are relatively low. What gear you
            do need will be provided for you during your first
            few months; this will give you time to organize
            your finances and your future purchases.
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
            &nbsp;&nbsp;&nbsp;&nbsp;Talk to your salle's Free
            Scholar and senior students when you are ready to start
             purchasing gear. While you are encouraged to
            make purchases yourself, there are semi-regular
            group orders which you may have access to.
              </p>
            </span>
          </div>
          <h2 className='firstDay'>Needed For Your First Day:</h2>


          <div className='shoes'>
            <NavTabsShoes toggleGp1={this.toggleGp1}/>
            <TabContent activeTab={this.state.activeTabGp1} className='animated fadeIn'>
              <TabPane tabId='1'>
                <GeneralInfoShoesTab/>
              </TabPane>
              <TabPane tabId='2'>
                <ConventionalShoesTab/>
              </TabPane>
              <TabPane tabId='3'>
                <AthleticShoesTab/>
              </TabPane>
              <TabPane tabId='4'>
                <PeriodShoesTab/>
              </TabPane>
            </TabContent>
          </div>

          <div className='shirts'>
            <NavTabsShirts toggleGp2={this.toggleGp2}/>
            <TabContent activeTab={this.state.activeTabGp2} className='animated fadeIn'>
              <TabPane tabId='1'>
                <GeneralInfoShirtsTab/>
              </TabPane>
              <TabPane tabId='2'>
                <WhiteShirtsTab/>
              </TabPane>
              <TabPane tabId='3'>
                <AEMMAShirtsTab/>
              </TabPane>
            </TabContent>
          </div>

        </div>
      </div>
    )
  }
}

export default RecruitEquipment



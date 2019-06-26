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
// ------These Are the Pants Components
import NavTabsPants from './Pants/NavTabsPants.js'
import GeneralInfoPantsTab from './Pants/GeneralInfoPantsTab.js'
import BlackPantsTab from './Pants/BlackPantsTab.js'
// ------These Are the Gloves Components
import NavTabsGloves from './Gloves/NavTabsGloves.js'
import GeneralInfoGlovesTab from './Gloves/GeneralInfoGlovesTab.js'
import LeatherGlovesTab from './Gloves/LeatherGlovesTab.js'
import PeriodGlovesTab from './Gloves/PeriodGlovesTab.js'
// ------These Are the Belts Components
import NavTabsBelts from './Belts/NavTabsBelts.js'
import GeneralInfoBeltsTab from './Belts/GeneralInfoBeltsTab.js'
import BeltsTab from './Belts/BeltsTab.js'
// ------These Are the Masks Components
import NavTabsMasks from './Masks/NavTabsMasks.js'
import GeneralInfoMasksTab from './Masks/GeneralInfoMasksTab.js'
import MasksTab from './Masks/MasksTab.js'
// ------These Are the Swords Components
import NavTabsSwords from './Swords/NavTabsSwords.js'
import GeneralInfoSwordsTab from './Swords/GeneralInfoSwordsTab.js'
import SwordsTab from './Swords/SwordsTab.js'
// ------These are the css and images used on the main equip page
import '../../../css/Equipment/Recruit/RecruitEquipment.css'
import '../../../css/Equipment/Recruit/AddReviewsModal.css'
import LongswordLeft from '../../../css/images/Equipment/longswordLeft.png'
import LongswordRight from '../../../css/images/Equipment/longswordRight.png'
// -------This is my React-Redux connection
import { connect } from 'react-redux'
// ------This is the main componant
class RecruitEquipment extends Component {
  constructor(props) {
    super(props)

    this.state = {
      RecruitEquipment: {
        tabs: { activeTabGp1: '1',
          activeTabGp2: '1',
          activeTabGp3: '1',
          activeTabGp4: '1',
          activeTabGp5: '1',
          activeTabGp6: '1',
          activeTabGp7: '1' },
        data: {},
        isDataFetched: false
      }
    }
  }

  // These are the functions that govern the switching of tabs in each tabbed div

  toggleGp1 = (tab) => {
    if (this.state.RecruitEquipment.tabs.activeTabGp1 !== tab) {
      this.setState(prevState => ({
        ...prevState,
        RecruitEquipment: {
          ...prevState.RecruitEquipment,
          tabs: { activeTabGp1: tab,
            activeTabGp2: '1',
            activeTabGp3: '1',
            activeTabGp4: '1',
            activeTabGp5: '1',
            activeTabGp6: '1',
            activeTabGp7: '1' }
        }
      }))
    }
  }

  toggleGp2 = (tab) => {
    if (this.state.RecruitEquipment.tabs.activeTabGp2 !== tab) {
      this.setState(prevState => ({
        ...prevState,
        RecruitEquipment: {
          ...prevState.RecruitEquipment,
          tabs: { activeTabGp1: '1',
            activeTabGp2: tab,
            activeTabGp3: '1',
            activeTabGp4: '1',
            activeTabGp5: '1',
            activeTabGp6: '1',
            activeTabGp7: '1' }
        }
      }))
    }
  }

  toggleGp3 = (tab) => {
    if (this.state.RecruitEquipment.tabs.activeTabGp3 !== tab) {
      this.setState(prevState => ({
        ...prevState,
        RecruitEquipment: {
          ...prevState.RecruitEquipment,
          tabs: { activeTabGp1: '1',
            activeTabGp2: '1',
            activeTabGp3: tab,
            activeTabGp4: '1',
            activeTabGp5: '1',
            activeTabGp6: '1',
            activeTabGp7: '1' }
        }
      }))
    }
  }

  toggleGp4 = (tab) => {
    if (this.state.RecruitEquipment.tabs.activeTabGp4 !== tab) {
      this.setState(prevState => ({
        ...prevState,
        RecruitEquipment: {
          ...prevState.RecruitEquipment,
          tabs: { activeTabGp1: '1',
            activeTabGp2: '1',
            activeTabGp3: '1',
            activeTabGp4: tab,
            activeTabGp5: '1',
            activeTabGp6: '1',
            activeTabGp7: '1' }
        }
      }))
    }
  }

  toggleGp5 = (tab) => {
    if (this.state.RecruitEquipment.tabs.activeTabGp5 !== tab) {
      this.setState(prevState => ({
        ...prevState,
        RecruitEquipment: {
          ...prevState.RecruitEquipment,
          tabs: { activeTabGp1: '1',
            activeTabGp2: '1',
            activeTabGp3: '1',
            activeTabGp4: '1',
            activeTabGp5: tab,
            activeTabGp6: '1',
            activeTabGp7: '1' }
        }
      }))
    }
  }

  toggleGp6 = (tab) => {
    if (this.state.RecruitEquipment.tabs.activeTabGp6 !== tab) {
      this.setState(prevState => ({
        ...prevState,
        RecruitEquipment: {
          ...prevState.RecruitEquipment,
          tabs: { activeTabGp1: '1',
            activeTabGp2: '1',
            activeTabGp3: '1',
            activeTabGp4: '1',
            activeTabGp5: '1',
            activeTabGp6: tab,
            activeTabGp7: '1' }
        }
      }))
    }
  }

  toggleGp7 = (tab) => {
    if (this.state.RecruitEquipment.tabs.activeTabGp7 !== tab) {
      this.setState(prevState => ({
        ...prevState,
        RecruitEquipment: {
          ...prevState.RecruitEquipment,
          tabs: { activeTabGp1: '1',
            activeTabGp2: '1',
            activeTabGp3: '1',
            activeTabGp4: '1',
            activeTabGp5: '1',
            activeTabGp6: '1',
            activeTabGp7: tab }
        }
      }))
    }
  }

  // This is involved in the redux element of the component
  getData = (data) => {
    this.props.getData(data)
  }


  // -----------------------------------------------------

  componentDidMount() {
    // these fetch calls get all the data from the database
    Promise.all([fetch('http://localhost:3003/conventionalShoesProducts'), fetch('http://localhost:3003/conventionalShoesReviews'), fetch('http://localhost:3003/AthleticShoesProducts'), fetch('http://localhost:3003/AthleticShoesReviews'), fetch('http://localhost:3003/PeriodShoesProducts'), fetch('http://localhost:3003/PeriodShoesReviews'), fetch('http://localhost:3003/whiteShirtsProducts'), fetch('http://localhost:3003/whiteShirtsReviews'), fetch('http://localhost:3003/AEMMAShirtsProducts'), fetch('http://localhost:3003/AEMMAShirtsReviews'), fetch('http://localhost:3003/BlackPantsProducts'), fetch('http://localhost:3003/BlackPantsReviews'), fetch('http://localhost:3003/LeatherGlovesProducts'), fetch('http://localhost:3003/LeatherGlovesReviews'), fetch('http://localhost:3003/PeriodGlovesProducts'), fetch('http://localhost:3003/PeriodGlovesReviews'), fetch('http://localhost:3003/PeriodBeltsProducts'), fetch('http://localhost:3003/PeriodBeltsReviews'), fetch('http://localhost:3003/FencingMasksProducts'), fetch('http://localhost:3003/FencingMasksReviews'), fetch('http://localhost:3003/SwordsProducts'), fetch('http://localhost:3003/SwordsReviews')])
      .then(([res1, res2, res3, res4, res5, res6, res7, res8, res9, res10, res11, res12, res13, res14, res15, res16, res17, res18, res19, res20, res21, res22]) => {
        return Promise.all([res1.json(), res2.json(), res3.json(), res4.json(), res5.json(), res6.json(), res7.json(), res8.json(), res9.json(), res10.json(), res11.json(), res12.json(), res13.json(), res14.json(), res15.json(), res16.json(), res17.json(), res18.json(), res19.json(), res20.json(), res21.json(), res22.json()])
      })
      .then(([res1, res2, res3, res4, res5, res6, res7, res8, res9, res10, res11, res12, res13, res14, res15, res16, res17, res18, res19, res20, res21, res22]) => {
        this.setState(prevState => ({
          ...prevState,
          RecruitEquipment: {
            ...prevState.RecruitEquipment,
            data: { conventionalShoesProducts: res1,
              conventionalShoesReviews: res2, AthleticShoesProducts: res3,
              AthleticShoesReviews: res4, PeriodShoesProducts: res5,
              PeriodShoesReviews: res6, whiteShirtsProducts: res7,
              whiteShirtsReviews: res8, AEMMAShirtsProducts: res9,
              AEMMAShirtsReviews: res10, BlackPantsProducts: res11,
              BlackPantsReviews: res12, LeatherGlovesProducts: res13,
              LeatherGlovesReviews: res14, PeriodGlovesProducts: res15,
              PeriodGlovesReviews: res16, PeriodBeltsProducts: res17,
              PeriodBeltsReviews: res18, FencingMasksProducts: res19,
              FencingMasksReviews: res20, SwordsProducts: res21,
              SwordsReviews: res22 }
          }
        }))
        // This sends the fetched data to the component store
        this.getData(this.state)

        this.setState(prevState => ({
          ...prevState,
          RecruitEquipment: {
            ...prevState.RecruitEquipment,
            isDataFetched: true
          }
        }))
      })
  }

  // Below is the render function; this is what displays
  // the HTML on this page.

  render() {
    if (this.state.RecruitEquipment.isDataFetched) {
      console.log('These are the component state', this.state)
      console.log('These are the component props', this.props)
      return (
        <div>
          <div className='backgroundDiv1'>
          </div>
          <div className='backgroundDiv2'>
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
            <h2 className='firstDay'><u>Needed For Your First Day:</u></h2>


            <div className='shoes'>
              <NavTabsShoes toggleGp1={this.toggleGp1}/>
              <TabContent activeTab={this.state.RecruitEquipment.tabs.activeTabGp1} className='animated fadeIn'>
                <TabPane tabId='1'>
                  <GeneralInfoShoesTab/>
                </TabPane>
                <TabPane tabId='2'>
                  <ConventionalShoesTab data={this.props.data.RecruitEquipment.RecruitEquipment.data}/>
                </TabPane>
                <TabPane tabId='3'>
                  <AthleticShoesTab data={this.props.data.RecruitEquipment.RecruitEquipment.data}/>
                </TabPane>
                <TabPane tabId='4'>
                  <PeriodShoesTab data={this.props.data.RecruitEquipment.RecruitEquipment.data}/>
                </TabPane>
              </TabContent>
            </div>

            <div className='shirts'>
              <NavTabsShirts toggleGp2={this.toggleGp2}/>
              <TabContent activeTab={this.state.RecruitEquipment.tabs.activeTabGp2} className='animated fadeIn'>
                <TabPane tabId='1'>
                  <GeneralInfoShirtsTab />
                </TabPane>
                <TabPane tabId='2'>
                  <WhiteShirtsTab data={this.props.data.RecruitEquipment.RecruitEquipment.data}/>
                </TabPane>
                <TabPane tabId='3'>
                  <AEMMAShirtsTab data={this.props.data.RecruitEquipment.RecruitEquipment.data}/>
                </TabPane>
              </TabContent>
            </div>

            <div className='pants'>
              <NavTabsPants toggleGp3={this.toggleGp3}/>
              <TabContent activeTab={this.state.RecruitEquipment.tabs.activeTabGp3} className='animated fadeIn'>
                <TabPane tabId='1'>
                  <GeneralInfoPantsTab />
                </TabPane>
                <TabPane tabId='2'>
                  <BlackPantsTab data={this.props.data.RecruitEquipment.RecruitEquipment.data}/>
                </TabPane>
              </TabContent>
            </div>

            <h2 className='firstDay'><u>Needed Within Three Months</u></h2>

            <div className='gloves'>
              <NavTabsGloves toggleGp4={this.toggleGp4}/>
              <TabContent activeTab={this.state.RecruitEquipment.tabs.activeTabGp4} className='animated fadeIn'>
                <TabPane tabId='1'>
                  <GeneralInfoGlovesTab/>
                </TabPane>
                <TabPane tabId='2'>
                  <LeatherGlovesTab data={this.props.data.RecruitEquipment.RecruitEquipment.data}/>
                </TabPane>
                <TabPane tabId='3'>
                  <PeriodGlovesTab data={this.props.data.RecruitEquipment.RecruitEquipment.data}/>
                </TabPane>
              </TabContent>
            </div>

            <div className='belts'>
              <NavTabsBelts toggleGp5={this.toggleGp5}/>
              <TabContent activeTab={this.state.RecruitEquipment.tabs.activeTabGp5} className='animated fadeIn'>
                <TabPane tabId='1'>
                  <GeneralInfoBeltsTab/>
                </TabPane>
                <TabPane tabId='2'>
                  <BeltsTab data={this.props.data.RecruitEquipment.RecruitEquipment.data}/>
                </TabPane>
              </TabContent>
            </div>

            <a name='FirstDay'></a>
            <h2 className='firstDay'><u>Needed Within Six Months</u></h2>

            <div className='masks'>
              <NavTabsMasks toggleGp6={this.toggleGp6}/>
              <TabContent activeTab={this.state.RecruitEquipment.tabs.activeTabGp6} className='animated fadeIn'>
                <TabPane tabId='1'>
                  <GeneralInfoMasksTab/>
                </TabPane>
                <TabPane tabId='2'>
                  <MasksTab data={this.props.data.RecruitEquipment.RecruitEquipment.data}/>
                </TabPane>
              </TabContent>
            </div>

            <div className='swords'>
              <NavTabsSwords toggleGp7={this.toggleGp7}/>
              <TabContent activeTab={this.state.RecruitEquipment.tabs.activeTabGp7} className='animated fadeIn'>
                <TabPane tabId='1'>
                  <GeneralInfoSwordsTab/>
                </TabPane>
                <TabPane tabId='2'>
                  <SwordsTab data={this.props.data.RecruitEquipment.RecruitEquipment.data}/>
                </TabPane>
              </TabContent>
            </div>

          </div>
        </div>
      ) } else {
      return (
        <div>
          <div className='backgroundDiv1'>
          </div>
          <div className='backgroundDiv2'>
          </div>
          <div>
            <h1 className='title'>Equipment Requirements:</h1>
            <img src={LongswordLeft} className='swordLeft animated slideInLeft delay-1s' alt='Medieval Sword'/>
            <h2 className='title1'>Recruits</h2>
            <img src={LongswordRight} className='animated slideInRight delay-1s swordRight' alt='Medieval Sword'/>
          </div>
        </div>
      )
    }}}

const mapStateToProps = (state) => {
  return {
    data: state
  }
}

const mapDispatchToProps = (dispatch) => {
  return {
    getData: (data) => {
      // console.log('This is the dispatch data', data)
      dispatch({ type: 'GET_DATA', data: data })
    }
  }
}

export default connect(mapStateToProps, mapDispatchToProps)(RecruitEquipment)

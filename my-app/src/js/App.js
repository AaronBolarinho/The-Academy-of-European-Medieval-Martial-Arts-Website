import React, { Component } from 'react'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import NavBar from './navBar.js'
import RecruitEquipment from './Equipment_Pages/Recruit_Equipment/RecruitEquipment.js'
import ScholarEquipment from './Equipment_Pages/Scholar_Equipment/ScholarEquipment.js'
import Home from './home.js'
import Error from './error.js'

import { connect } from 'react-redux'

class App extends Component {
  render() {
    console.log('this is the store from the provider', this.props)
    return (
      <BrowserRouter>
        <div>
          <NavBar/>
          <Switch>
            <Route path='/' component={Home} exact/>
            <Route path='/RecruitEquipment' component={RecruitEquipment}/>
            <Route path='/ScholarEquipment' component={ScholarEquipment}/>
            <Route component={Error}/>
          </Switch>
        </div>
      </BrowserRouter>
    )
  }
}

export default connect()(App)

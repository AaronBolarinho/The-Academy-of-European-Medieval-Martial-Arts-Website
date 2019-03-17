import React, { Component } from 'react';
import { BrowserRouter, Route, Switch} from "react-router-dom";
import NavBar from './navBar.js';
import RecruitEquipment from './RecruitEquipment.js';
import Home from './home.js';
import Error from './error.js';

class App extends Component {

  render() {
    return (
      <BrowserRouter>
        <div>
          <NavBar/>
          <Switch>
            <Route path="/" component={Home} exact/>
            <Route path="/RecruitEquipment" component={RecruitEquipment}/>
            <Route component={Error}/>
          </Switch>
        </div>
      </BrowserRouter>
    );
  }
}

export default App;
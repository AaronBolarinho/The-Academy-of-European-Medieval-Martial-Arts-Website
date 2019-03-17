import React, { Component } from 'react';
import {NavLink} from "react-router-dom";
import '../css/navBar.css';

class navBar extends Component {
  constructor(props) {
    super(props);
    this.state = {
    }

    }

    render() {
        return (
            <div className="hidden">
              <p>This is the nav bar</p>
              <NavLink to="/">Home</NavLink>
              <NavLink to="/RecruitEquipment">Recruit Equipment</NavLink>
            </div>
        );
    }
}

export default navBar;


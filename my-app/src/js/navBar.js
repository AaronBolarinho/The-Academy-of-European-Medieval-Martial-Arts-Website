import React, { Component } from 'react';
import {NavLink} from "react-router-dom";

class navBar extends Component {
  constructor(props) {
    super(props);
    this.state = {
    }

    }

    render() {
        return (
            <div>
              <p>This is the nav bar</p>
              <NavLink to="/">Home</NavLink>
              <NavLink to="/test">Test</NavLink>
            </div>
        );
    }
}

export default navBar;


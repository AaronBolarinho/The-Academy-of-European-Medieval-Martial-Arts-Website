import React, { Component } from 'react'
import { Nav, NavItem, NavLink } from 'reactstrap'
import classnames from 'classnames'

class NavTabsGambesons extends Component {
  render() {
    return (
    	<div>
	    	<Nav tabs>
	    	  <NavItem className='naveTitle'>
	              Gambesons:
	          </NavItem>
	          <NavItem className='naveItem'>
	            <NavLink
	              className={classnames({ active: this.props.activeTabGp1 === '1' })}
	              onClick={() => {
	                this.props.toggleGp1('1')
	              }}
	            >
	              General Info
	            </NavLink>
	          </NavItem>
	          <NavItem className='naveItem'>
	            <NavLink
	              className={classnames({ active: this.props.activeTabGp1 === '2' })}
	              onClick={() => {
	                this.props.toggleGp1('2')
	              }}
	            >
	              Gambesons
	            </NavLink>
	          </NavItem>
	        </Nav>
      </div>
	  )
	 }
}

export default NavTabsGambesons

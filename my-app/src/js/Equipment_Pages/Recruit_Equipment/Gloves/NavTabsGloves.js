import React, { Component } from 'react'
import { Nav, NavItem, NavLink } from 'reactstrap'
import classnames from 'classnames'

class NavTabsGloves extends Component {
  render() {
    return (
    	<div>
	    	<Nav tabs>
	    	  <NavItem className='naveTitle'>
	              Light Gloves:
	          </NavItem>
	          <NavItem className='naveItem'>
	            <NavLink
	              className={classnames({ active: this.props.toggleGp4 === '1' })}
	              onClick={() => {
	                this.props.toggleGp4('1')
	              }}
	            >
	              General Info
	            </NavLink>
	          </NavItem>
	          <NavItem className='naveItem'>
	            <NavLink
	              className={classnames({ active: this.props.toggleGp4 === '2' })}
	              onClick={() => {
	                this.props.toggleGp4('2')
	              }}
	            >
	              Leather Gloves
	            </NavLink>
	          </NavItem>
	          <NavItem className='naveItem'>
	            <NavLink
	              className={classnames({ active: this.props.toggleGp4 === '3' })}
	              onClick={() => {
	                this.props.toggleGp4('3')
	              }}
	            >
	              Period Gloves
	            </NavLink>
	          </NavItem>
	        </Nav>
      </div>
	  )
	 }
}

export default NavTabsGloves

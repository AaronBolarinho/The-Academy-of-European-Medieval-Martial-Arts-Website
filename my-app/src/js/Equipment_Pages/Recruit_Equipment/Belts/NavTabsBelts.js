import React, { Component } from 'react'
import { Nav, NavItem, NavLink } from 'reactstrap'
import classnames from 'classnames'

class NavTabsBelts extends Component {
  render() {
    return (
    	<div>
	    	<Nav tabs>
	    	  <NavItem className='naveTitle'>
	            Period Belts:
	          </NavItem>
	          <NavItem className='naveItem'>
	            <NavLink
	              className={classnames({ active: this.props.toggleGp5 === '1' })}
	              onClick={() => {
	                this.props.toggleGp5('1')
	              }}
	            >
	              General Info
	            </NavLink>
	          </NavItem>
	          <NavItem className='naveItem'>
	            <NavLink
	              className={classnames({ active: this.props.toggleGp5 === '2' })}
	              onClick={() => {
	                this.props.toggleGp5('2')
	              }}
	            >
	              Belts
	            </NavLink>
	            </NavItem>
	        </Nav>
      </div>
	  )
	 }
}

export default NavTabsBelts

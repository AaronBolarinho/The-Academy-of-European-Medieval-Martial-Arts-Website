import React, { Component } from 'react'
import { Nav, NavItem, NavLink } from 'reactstrap'
import classnames from 'classnames'

class NavTabsMasks extends Component {
  render() {
    return (
    	<div>
	    	<Nav tabs>
	    	  <NavItem className='naveTitle'>
	            Fencing Masks:
	          </NavItem>
	          <NavItem className='naveItem'>
	            <NavLink
	              className={classnames({ active: this.props.toggleGp6 === '1' })}
	              onClick={() => {
	                this.props.toggleGp6('1')
	              }}
	            >
	              General Info
	            </NavLink>
	          </NavItem>
	          <NavItem className='naveItem'>
	            <NavLink
	              className={classnames({ active: this.props.toggleGp6 === '2' })}
	              onClick={() => {
	                this.props.toggleGp6('2')
	              }}
	            >
	              Masks
	            </NavLink>
	            </NavItem>
	        </Nav>
      </div>
	  )
	 }
}

export default NavTabsMasks

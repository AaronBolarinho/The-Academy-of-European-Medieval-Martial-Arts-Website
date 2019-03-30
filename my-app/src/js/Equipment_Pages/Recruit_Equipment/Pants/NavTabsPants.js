import React, { Component } from 'react'
import { Nav, NavItem, NavLink } from 'reactstrap'
import classnames from 'classnames'

class NavTabsPants extends Component {
  render() {
    return (
    	<div>
	    	<Nav tabs>
	    	  <NavItem className='naveTitle'>
	              Uniform Pants:
	          </NavItem>
	          <NavItem className='naveItem'>
	            <NavLink
	              className={classnames({ active: this.props.toggleGp3 === '1' })}
	              onClick={() => {
	                this.props.toggleGp3('1')
	              }}
	            >
	              General Info
	            </NavLink>
	          </NavItem>
	          <NavItem className='naveItem'>
	            <NavLink
	              className={classnames({ active: this.props.toggleGp3 === '2' })}
	              onClick={() => {
	                this.props.toggleGp3('2')
	              }}
	            >
	              Black Pants
	            </NavLink>
	            </NavItem>
	        </Nav>
      </div>
	  )
	 }
}

export default NavTabsPants

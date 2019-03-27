import React, { Component } from 'react'
import { Nav, NavItem, NavLink } from 'reactstrap'
import classnames from 'classnames'

class NavTabsShoes extends Component {
  render() {
    return (
    	<div>
	    	<Nav tabs>
	    	  <NavItem className='naveTitle'>
	              Uniform Shirts:
	          </NavItem>
	          <NavItem className='naveItem'>
	            <NavLink
	              className={classnames({ active: this.props.toggleGp2 === '1' })}
	              onClick={() => {
	                this.props.toggleGp2('1')
	              }}
	            >
	              General Info
	            </NavLink>
	          </NavItem>
	          <NavItem className='naveItem'>
	            <NavLink
	              className={classnames({ active: this.props.toggleGp2 === '2' })}
	              onClick={() => {
	                this.props.toggleGp2('2')
	              }}
	            >
	              White Shirts
	            </NavLink>
	          </NavItem>
	          <NavItem className='naveItem'>
	            <NavLink
	              className={classnames({ active: this.props.toggleGp2 === '3' })}
	              onClick={() => {
	                this.props.toggleGp2('3')
	              }}
	            >
	              AEMMA Shirts
	            </NavLink>
	          </NavItem>
	        </Nav>
      </div>
	  )
	 }
}

export default NavTabsShoes

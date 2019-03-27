import React, { Component } from 'react'
import { Nav, NavItem, NavLink } from 'reactstrap'
import classnames from 'classnames'

class NavTabsShoes extends Component {
  render() {
    return (
    	<div>
	    	<Nav tabs>
	    	  <NavItem className='naveTitle'>
	              Indoor Footwear:
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
	              Conventional Shoes
	            </NavLink>
	          </NavItem>
	          <NavItem className='naveItem'>
	            <NavLink
	              className={classnames({ active: this.props.activeTabGp1 === '3' })}
	              onClick={() => {
	                this.props.toggleGp1('3')
	              }}
	            >
	              Athletic Shoes
	            </NavLink>
	          </NavItem>
	          <NavItem className='naveItem'>
	            <NavLink
	              className={classnames({ active: this.props.activeTabGp1 === '4' })}
	              onClick={() => {
	                this.props.toggleGp1('4')
	              }}
	            >
	              Period Shoes
	            </NavLink>
	          </NavItem>
	        </Nav>
      </div>
	  )
	 }
}

export default NavTabsShoes

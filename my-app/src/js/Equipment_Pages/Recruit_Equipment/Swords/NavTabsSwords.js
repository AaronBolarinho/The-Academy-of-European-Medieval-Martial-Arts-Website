import React, { Component } from 'react'
import { Nav, NavItem, NavLink } from 'reactstrap'
import classnames from 'classnames'

class NavTabsSwords extends Component {
  render() {
    return (
    	<div>
	    	<Nav tabs>
	    	  <NavItem className='naveTitle'>
	            Steel Longswords:
	          </NavItem>
	          <NavItem className='naveItem'>
	            <NavLink
	              className={classnames({ active: this.props.toggleGp7 === '1' })}
	              onClick={() => {
	                this.props.toggleGp7('1')
	              }}
	            >
	              General Info
	            </NavLink>
	          </NavItem>
	          <NavItem className='naveItem'>
	            <NavLink
	              className={classnames({ active: this.props.toggleGp7 === '2' })}
	              onClick={() => {
	                this.props.toggleGp7('2')
	              }}
	            >
	              Swords
	            </NavLink>
	            </NavItem>
	        </Nav>
      </div>
	  )
	 }
}

export default NavTabsSwords

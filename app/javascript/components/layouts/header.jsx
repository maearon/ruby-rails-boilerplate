import React, { Component } from 'react'
import ReactDOM from 'react-dom'

import PropTypes from 'prop-types';

class wish extends Component {

  constructor(props) {
    super(props);

    this.state = { autoCompleteResults: 0 };

    $.getJSON('/api/v1/wish')
      .then(response => this.setState({ autoCompleteResults: response }))
  }

  render(){
    return (

<header class="navbar navbar-fixed-top navbar-inverse">
  <div class="container">
    <a id="logo" href="/">sample app</a>
    <nav>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="/wish">
            <i class="fas fa-heart">{this.state.autoCompleteResults}</i>
          </a>
        </li>
        <li>
          <a href="/cart">
            <i class="fas fa-shopping-bag"></i>
          </a>
        </li>
        <li><a href="/products">Products</a></li>
        <li><a href="/">Home</a></li>
        <li><a href="/help">Help</a></li>
        <li><a href="/admin">Admin</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Account <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="/my-account">Profile</a></li>
            <li><a href="/my-account/profile">Settings</a></li>
            <li class="divider"></li>
            <li>
              <a rel="nofollow" data-method="delete" href="/logout">Log out</a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</header>

    )
  }
}

export default wish;

document.addEventListener('DOMContentLoaded', () => {
  ReactDOM.render(
    <wish />,
    document.body.appendChild(document.createElement('div')),
  )
});

import React, { Component } from 'react'
import ReactDOM from 'react-dom'

import PropTypes from 'prop-types';

class index extends Component {

  constructor(props) {
    super(props);

    this.state = {
      term: '',
      autoCompleteResults: [],
      itemSelected: {},
      showItemSelected: false
    };

    $.getJSON('/api/v1/products?q=' + this.state.term)
      .then(response => this.setState({ autoCompleteResults: response.products }))
  }

  getAutoCompleteResults(e){
    this.setState({
      term: e.target.value
    }, () => {
      $.getJSON('/api/v1/products?q=' + this.state.term)
        .then(response => this.setState({ autoCompleteResults: response.products }))
    });
  }

  render(){
    let autoCompleteList = this.state.autoCompleteResults.map((response) => {
      return <ol class="products">
        <li id={'product'+response.id}>
          <a href={response.url_edit}><img alt={response.name} class="gravatar" src={response.image_url} height="50" width="50" /></a>
          <span class="user"><a href={response.url_edit}>{response.name}</a></span>
          <span class="content">
            | <a data-confirm="You sure?" rel="nofollow" data-method="delete" href={response.url} data-remote="true">delete</a>
          </span>
        </li>
      </ol>
    });

    return (
      <div>
        <input ref={ (input) => { this.searchBar = input } } value={ this.state.term } onChange={ this.getAutoCompleteResults.bind(this) } type='search' placeholder='Search Name' class='form-control' />
        { autoCompleteList }
      </div>
    )
  }
}

export default index;

document.addEventListener('DOMContentLoaded', () => {
  ReactDOM.render(
    <index />,
    document.body.appendChild(document.createElement('div')),
  )
});

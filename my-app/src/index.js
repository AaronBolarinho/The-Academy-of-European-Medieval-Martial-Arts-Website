import React from 'react'
import ReactDOM from 'react-dom'
import './css/index.css'
import App from './js/App.js'
import 'bootstrap/dist/css/bootstrap.min.css'

// These are my Redux imports
import { createStore } from 'redux'
import { Provider } from 'react-redux'
import rootReducer from './reducers/rootReducer.js'

const store = createStore(rootReducer)

ReactDOM.render(<Provider store={store}><App /></Provider>, document.getElementById('root'))


// These are my Redux imports
// import { createStore } from 'redux'
// 
// 
// const initState = {
//   recruitEquipData: ['testData'],
//   scholarEquipData: []
// }
// 
// function myReducer(state = initState, action) {
//   if (action.type === 'ADD_DATA') {
//   	return {
//   		...state,
//   		recruitEquipData: [...state.recruitEquipData, action.recruitEquipData]
//   	}
//   }
// }
// 
// const store = createStore(myReducer)
// 
// store.subscribe(() => {
//   console.log('state updated')
//   console.log(store.getState())
// })
// 
// const recruitAction = { type: 'ADD_DATA', recruitEquipData: 'moreData' }
// 
// store.dispatch(recruitAction)
// 
// ReactDOM.render(<App RandomProp='TheRandomProp'/>, document.getElementById('root'))
const MyVariable = ['MyShoes!!!']

const initState = {
  shoesTest: MyVariable
}

const rootReducer = (state = initState, action) => {
  console.log('this is the action from the root reducer', action)
  if (action.type === 'GET_DATA') {
  		console.log('this is the action.data from the dispatch', action.data)
  		return {
  			...state,
  			myData: action.data
  		}
  }
  return state
}

export default rootReducer

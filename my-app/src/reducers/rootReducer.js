const MyVariable = ['MyShoes!!!']

const initState = {
  shoesTest: MyVariable
}

const rootReducer = (state = initState, action) => {
  // console.log('this is the action from the root reducer', action)
  if (action.type === 'GET_DATA') {
  		let objectKeys = Object.keys(action.data)
  		let dataKey = objectKeys[0]
  		return {
  			...state,
  			[dataKey]: action.data
  		}
  }
  return state
}

export default rootReducer

const setUser = (state,data) => {
    state.user.data = data;
};

const setToken = (state,token) => {
    state.user.token = token;

    if (token) {
        sessionStorage.setItem("TOKEN",token);
    } else {
        sessionStorage.removeItem("TOKEN");
    }
};

const setFoods = (state,[data,loading]) => {
    state.foods.data = data;
    state.foods.loading = loading;
}; 

const setFoodMenus = (state,[data,loading]) => {
    state.foodMenus.data = data;
    state.foodMenus.loading = loading;
}; 

export {
    setUser,
    setToken,
    setFoods,
    setFoodMenus,
}
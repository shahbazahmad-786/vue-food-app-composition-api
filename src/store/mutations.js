// import state from "./state";

const setUser = (state,data) => {
    state.user.data = data;
};

const setFoods = (state,data) => {
    state.foods.data = data;
};

const setToken = (state,token) => {
    state.user.token = token;

    if (token) {
        sessionStorage.setItem("TOKEN",token);
    } else {
        sessionStorage.removeItem("TOKEN");
    }
};

export {
    setUser,
    setFoods,
    setToken
}
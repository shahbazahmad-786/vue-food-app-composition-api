// import state from "./state";

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

export {
    setUser,
    setToken
}
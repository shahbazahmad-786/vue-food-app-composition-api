// import state from "./state";

const setUSer = (state,data) => {
    state.user.data = data || null;
};

const setToken = (state,token) => {
    state.user.token = token;

    if (token) {
        sessionStorage.setItem("TOKEN",token);
    } else {
        sessionStorage.removeItem("TOKEN");
    }
};

const removeToken = (state) => {
    sessionStorage.removeItem("TOKEN");
};

export {
    setUSer,
    setToken,
    removeToken
}
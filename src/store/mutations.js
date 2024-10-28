const setUser = (state, data) => {
    // Ensure state.user is initialized
    if (!state.user) {
        state.user = {};
    }
    state.user.data = data;
};

const setToken = (state, access_token) => {
    state.user.access_token = access_token;

    // Store token in sessionStorage
    if (access_token) {
        sessionStorage.setItem("TOKEN", access_token);
    } else {
        sessionStorage.removeItem("TOKEN");
    }
};

const removeToken = (state) => {
    state.user.access_token = null; // Clear the access token in the state
    sessionStorage.removeItem("TOKEN"); // Remove token from sessionStorage
};

export {
    setUser,
    setToken,
    removeToken, 
};

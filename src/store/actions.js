import axiosClient from "@/axios";

const register = ({commit},data) => {
    return axiosClient.post("/register",data).then(({data})=>{
        commit("setUser",data.user);
        commit("setToken",data.token);

        return data;
    });
}

const login = ({commit},data) => {
    return axiosClient.post("/login",data).then(({data})=>{
        commit("setUser",data.user);
        commit("setToken",data.token);

        return data;
    });
}

const logout = ({commit}) => {
    return axiosClient.post("/logout").then((response)=>{
        commit("setToken",null);

        return response;
    });
}

const user = ({commit}) => {
    return axiosClient.get("/user").then(({data})=>{
        commit("setUser",data.user);

        return data;
    });
};

const foods = ({commit}) => {
    commit("setFoods",[[],true]);
    return axiosClient.get("/foods").then(({data})=>{
        commit("setFoods",[data,false]);

        return data;
    });
};

const foodMenus = ({commit}) => {
    commit("setFoodMenus",[[],true]);
    return axiosClient.get("/food-menues").then(({data})=>{
        commit("setFoodMenus",[data,false]);

        return data;
    });
};

const foodMenusByFood = ({commit},slug) => {
    commit("setFoodMenus",[[],true]);
    return axiosClient.get(`/food-menus/${slug}`).then(({data})=>{
        commit("setFoodMenus",[data,false]);

        return data;
    });
};


const foodMenusBySearch = ({ commit }, search) => {
    commit("setFoodMenus", [[], true]); // Reset foodMenus while loading
    return axiosClient
   .get(`/food-menus/${search}`) // Check the API URL
        .then(({ data }) => {
            commit("setFoodMenus", [data, false]);
            return data;
        })
        .catch(() => {
            commit("setFoodMenus", [[], false]); // Handle errors
});
};
export const submitOrder = async ({ commit }, orderData) => {
    commit("SET_LOADING", true);
    commit("SET_ERROR", null);

    try {
        const response = await axiosClient.post("/order", orderData);
        commit("ADD_ORDER", response.data.order); // Add the new order to the state
        alert("Order placed successfully!");
    } catch (error) {
        const errorMessage = error.response?.data?.message || "Failed to place order.";
        commit("SET_ERROR", errorMessage);
        console.error("Error placing order:", error);
        alert(errorMessage);
    } finally {
        commit("SET_LOADING", false);
    }
};
export {
    register,
    login,
    logout,
    user,
    foods,
    foodMenus,
    foodMenusByFood,
    foodMenusBySearch
}
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

export {
    register,
    login,
    logout,
    user,
    foods,
    foodMenus,
    foodMenusByFood
}
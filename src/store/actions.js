import axiosClient from "@/axios";
import { routerKey } from "vue-router";

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

const foods = ({ commit }) => {
    return axiosClient.get("/foods").then(({ data }) => {
        console.log('Fetched data:', data);  // Add this line for debugging
        commit("setFoods", data.food);
        return data;
    });
};
export {
    register,
    login,
    logout,
    user,
    foods
}

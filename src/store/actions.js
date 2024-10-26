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

export {
    register,
    login,
    logout
}
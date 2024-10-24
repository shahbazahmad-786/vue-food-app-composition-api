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


const logout = ({commit},data) => {
    return axiosClient.post("/logout",data).then(({data})=>{
        commit("setUser",null);
        commit("setToken",null);

        return data;
    });
}
export {
    register,
    login,
    logout
}
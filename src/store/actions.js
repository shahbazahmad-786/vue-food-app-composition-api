import axiosClient from "@/axios";

const register = ({commit},data) => {
    return axiosClient.post("/register",data).then(({data})=>{
        commit("setUser",data.user);
        commit("setToken",data.access_token);

        return data;
    });
}

export {
    register
}
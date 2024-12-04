import FoodMenu from "@/components/FoodMenu.vue";
import Foods from "@/components/Foods.vue";

export default {
    user:{
        token:sessionStorage.getItem("TOKEN"),
        data:{},
    },
    Foods:{
        data:[],
        loading:false,
    },
    FoodMenus:{
        data:[],
        loading:false,
    },

}
import FoodMenu from "@/components/FoodMenu.vue";
import Foods from "@/components/Foods.vue";

export default {
    user:{
        token:sessionStorage.getItem("TOKEN"),
        data:{},
    },
    foods:{
        data:[],
        loading:false
    },
    foodMenus:{
        data:[],
        loading:false
    },
}
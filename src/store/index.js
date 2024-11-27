import { createStore } from "vuex";
import state from "./state";
import * as mutations from "./mutations";
import * as actions from "./actions";
import axios from "axios";

const store = createStore({
    state,
    getters:{},
    mutations,
    actions
});

export default store;
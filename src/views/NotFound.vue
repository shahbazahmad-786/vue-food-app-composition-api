<script setup></script>

<template>
    <div class="main">
        <div>
            <h1>Page Not Found</h1>
            <router-link :to="{name:'Home'}">Go to home page</router-link>
        </div>
    </div>
</template>

<style scoped>
.main{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 65vh;

    div{
        display: flex;
        flex-direction: column;
        align-items: center;

        a{
            margin-top: 10px;
        }
    }
}
</style>
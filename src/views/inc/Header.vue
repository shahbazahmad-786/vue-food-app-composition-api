<script setup></script>

<template>
     <!-- Navbar Section Starts Here -->
     <section class="navbar">
        <div class="container">
            <div class="logo">
                <router-link :to="{name:'Home'}" title="Logo">
                    <img src="/images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </router-link>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <router-link :to="{name:'Home'}">Home</router-link>
                    </li>
                    <li>
                        <router-link :to="{name:'Categories'}">Categories</router-link>
                    </li>
                    <li>
                        <router-link :to="{name:'Foods'}">Foods</router-link>
                    </li>
                    <li>
                        <a href="https://github.com/shahbazahmad-786" target="__blank">About</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->
</template>
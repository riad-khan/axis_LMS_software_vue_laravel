<template>
<div>
   <header class="header_section">
        <!-- Top navbar -->
        <div class="top_navbar">
            <div class="tork-container">
                <div class="tork-row">
                    <div class="tork-col-md-8">
                        <div class="contact_info tork-d-flex">
                            <a href="#"><span class="icon-phone-square"></span> +0880 18 44 25 44 10</a>
                            <a href="#"><span class="icon-envelope-open"></span> info@domain.com</a>
                        </div>
                    </div>
                    <div class="tork-col-md-4">
                        <div class="social_link tork-d-flex tork-justify-c-end">
                            <a href="#"><span class="icon-facebook-square"></span></a>
                            <a href="#"><span class="icon-twitter-square"></span></a>
                            <a href="#"><span class="icon-linkedin"></span></a>
                            <a href="#"><span class="icon-instagram-square"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main nav -->
        <nav class="main_nav">
            <div class="tork-container">
                <div class="tork-row">
                    <div class="tork-col-lg-3 tork-col-sm-4" >
                        <div class="logo">
                            <router-link to="/">
                                <img class="tork-img-fluid" :src="logo" alt="Logo">
                            </router-link>
                        </div>
                    </div>
                    <div class="tork-col-md-8">
                        <!-- Menu itens -->
                        <div class="menu_items">
                            <ul class="tork-d-flex tork-justify-c-end tork-items-center">
                                <router-link to="/" class="nav_link active">Home</router-link>
                                <li class="nav_link dropdown tork-position-relative">Classes <span
                                    class="tork-pl-1 icon-angle-down"></span>
                                    <ul class="dropdown_menu">
                                        <li><a href="all-courses.html">All Courses</a></li>
                                        <li><a href="#">Bangla</a></li>
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">Accounting</a></li>
                                        <li><a href="#">Finance</a></li>
                                        <li><a href="#">Marketing</a></li>
                                    </ul>
                                </li>
                                <li class="nav_link"><router-link to="">How to enroll</router-link></li>

                                <router-link to="/about-us" class="nav_link">About Us</router-link>
                                <li class="nav_btn">
                                    <router-link to="/auth/sign-up" class="tork-btn tork-btn-primary">Join Now</router-link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</div>
</template>

<script>
import logo from '../../../../images/logo.png';
export default {

    data(){
        return{
            logo:logo,
        }
    },

}
</script>

<style scoped src='../../../../../public/dashboard/css/main.css'>

@import url('../../../../../public/dashboard/icons/icons.css');

</style>

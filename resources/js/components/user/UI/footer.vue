<template>
<div>
    <!-- Footer section -->
    <footer class="footer_section">
        <div class="tork-container">
            <div class="tork-row">
                <div class="tork-col-md-4">
                    <div class="details">
                        <div class="logo">
                            <img :src="logo" alt="">
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                    </div>
                </div>
                <div class="tork-col-md-2">
                    <h4>Mobile app</h4>
                    <ul>
                        <li><a href="#">Features</a></li>
                        <li><a href="#">Live share</a></li>
                        <li><a href="#">Video record</a></li>
                    </ul>
                </div>
                <div class="tork-col-md-2">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">How to Enroll</a></li>
                    </ul>
                </div>
                <div class="tork-col-md-2">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">History</a></li>
                    </ul>
                </div>
            </div>
            <!-- copyright -->
            <div class="copyright">
                <div class="tork-d-flex tork-justify-c-space-between tork-items-center">
                    <p>&copy; All Copyright, <a href="#">Synapse Medical Academy</a>. 2021</p>
                    <ul class="social_links tork-d-flex">
                        <li><a href="#"><span class="icon-facebook-square"></span></a></li>
                        <li><a href="#"><span class="icon-twitter-square"></span></a></li>
                        <li><a href="#"><span class="icon-instagram-square"></span></a></li>
                        <li><a href="#"><span class="icon-linkedin"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <div class="circle_1"></div>
    <div class="circle_2"></div>
</div>
</template>

<script>
import logo from '../../../../images/logo.png';
export default {

    data(){
        return{
            logo:logo,
        }
    }
}
</script>

<style scoped src='../../../../../public/dashboard/css/main.css'>

@import url('../../../../../public/dashboard/icons/icons.css');

</style>

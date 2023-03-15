<template>
    <div>
        <button id="closeBtn" class="close_btn tork-btn">
            <span class="icon-cancel"></span>
        </button>
        <div class="user">
            <img :src="photo" alt="">
            <div class="user_info">
                <h3 class="tork-text-capitalize"></h3>
                <p class="tork-text-uppercase">{{ name }}</p>
            </div>
        </div>
        <div class="nav_links">
            <router-link to="/home" :class="$route.path === '/home' ? 'link active' : 'link'">
                <span class="icon-grid-ms"></span>
                <h2>dashboad</h2>
            </router-link>
            <router-link :class="$route.path === '/notices' ? 'link active' : 'link'" to="/notices" >
                <span class="icon-mic"></span>
                <h2>Notice</h2>
            </router-link>
            <router-link to="/all-schedules" :class="$route.path === '/all-schedules' ? 'link active' : 'link'">
                <span class="icon-calendar-alt"></span>
                <h2>Schedule</h2>
            </router-link>
            <router-link to="/courses" :class="$route.path === '/courses' ? 'link active' : 'link'">
                <span class="icon-book-user"></span>
                <h2>Courses</h2>
            </router-link>
            <router-link to="/classes" :class="$route.path === '/classes' ? 'link active' : 'link'">
                <span class="icon-teaching"></span>
                <h2>Class</h2>
            </router-link>
            <router-link to="/resources" :class="$route.path === '/resources' ? 'link active' : 'link'">
                <span class="icon-stack"></span>
                <h2>Resources</h2>
            </router-link>
            <router-link to="/all-exams" :class="$route.path === '/all-exams' ? 'link active' : 'link'">
                <span class="icon-list-card"></span>
                <h2>Exams</h2>
            </router-link>
            <router-link to="/results" :class="$route.path === '/results' ? 'link active' : 'link'">
                <span class="icon-list-card"></span>
                <h2>Result</h2>
            </router-link>

            <router-link to="" class="link" >
                <span class="icon-pie"></span>
                <h2>Analysis</h2>
            </router-link>
            <router-link to="/complain-box" :class="$route.path === '/complain-box' ? 'link active' : 'link'">
                <span class="icon-box"></span>
                <h2>Complaint Box</h2>
            </router-link>
            <router-link to="" class="link">
                <span class="icon-gear"></span>
                <h2>Setings</h2>
            </router-link>
            <router-link to="/profile" :class="$route.path === '/profile' ? 'link active' : 'link'">
                <span class="icon-user"></span>
                <h2>Profile</h2>
            </router-link>
            <router-link to="/logout" :class="$route.path === '/logout' ? 'link active' : 'link'">
                <span class="icon-log-out"></span>
                <h2>Log Out</h2>
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "navs",
    created() {
      this.name = localStorage.getItem('name');
      this.photo = localStorage.getItem('photo');
    },
    data(){
        return{
            name:'',
            photo:'',
        }
    }
}
</script>

<style scoped src='../../../../../public/dashboard/css/style.css'>

@import url('../../../../../public/dashboard/icons/icons.css');
@import '../../../../../public/dashboard/css/style.scss';
</style>

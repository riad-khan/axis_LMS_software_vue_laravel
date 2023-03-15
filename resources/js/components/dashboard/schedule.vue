<template>
    <div>
        <main>
            <section class="dashboad tork-d-flex">
                <div class="left_sidebar">
                    <dashboard-navs></dashboard-navs>
                </div>
                <div class="dashboad_body">
                    <!-- Header -->
                    <div class="header">
                        <div class="title tork-d-flex tork-justify-c-space-between tork-items-center">
                            <h2 v-if="$route.path.includes('/schedules/')">Course Schedules</h2>
                            <h2 v-else>Schedules</h2>
                            <button id="togglerBtn" class="toggler tork-btn">
                                <span class="icon-th-menu"></span>
                            </button>
                        </div>
                        <div class="tork-d-flex tork-justify-c-space-between tork-flex-wrap">
                            <div class="search_input">
                                <input class="tork-form-control" placeholder="Search Here" type="text">
                                <span class="icon-search"></span>
                            </div>
                            <div class="notificaton">
                                <div class="alert_icon">
                                    <span class="icon-alarm"></span>
                                    <span class="badge">15</span>
                                </div>
                                <div class="alert_icon">
                                    <span class="icon-envelope"></span>
                                    <span class="badge">05</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- main body content -->
                    <div class="schedule">


                        <div class="tork-row">

                            <div class="tork-col-md-8">
                                <!-- item one -->

                                <div v-for="(course , index) in schedules " v-if="course.schedules.length > 0 && $route.path.includes('/all-schedules')"
                                     :key="index" class="schedule-single-item" style="margin-bottom: 50px">

                                    <div class="course_container">
                                        <div>
                                            <h2 class="title">{{ course.course_title }}</h2>
                                        </div>
                                    </div>
                                    <div v-for="(schedule , index) in course.schedules " :key="index"
                                         class="schedule_container tork-mt-3 tork-d-flex">
                                        <div class="tork-card">
                                            <div
                                                class="card_inner tork-d-flex tork-items-center tork-justify-c-lg-space-between">
                                                <img :src="schedule.banner" alt="" class="thumb-img">
                                                <div class="info tork-ml-4">
                                                    <h4>{{ schedule.title }}</h4>
                                                    <p>{{ schedule.course_title }} | {{ schedule.subject_title }}</p>
                                                </div>
                                                <div class="date_time_btn">
                                                    <p>{{ schedule.date }}</p>
                                                    <a v-if="schedule.button == true" :href="schedule.button_url"
                                                       class="tork-btn tork-btn-outline-primary tork-rounded-pill">{{
                                                            schedule.button_text
                                                        }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div  v-for="(course , index) in schedules " v-if="$route.path.includes('/schedules/')"
                                     :key="index" class="schedule-single-item" style="margin-bottom: 50px">

                                    <div class="course_container">
                                        <div>
                                            <h2 class="title">{{ course.course_title }}</h2>
                                        </div>
                                    </div>
                                    <div v-for="(schedule , index) in course.schedules " :key="index"
                                         class="schedule_container tork-mt-3 tork-d-flex">
                                        <div class="tork-card">
                                            <div
                                                class="card_inner tork-d-flex tork-items-center tork-justify-c-lg-space-between">
                                                <img :src="schedule.banner" alt="" class="thumb-img">
                                                <div class="info tork-ml-4">
                                                    <h4>{{ schedule.title }}</h4>
                                                    <p>{{ schedule.course_title }} | {{ schedule.subject_title }}</p>
                                                </div>
                                                <div class="date_time_btn">
                                                    <p>{{ schedule.date }}</p>
                                                    <a v-if="schedule.button == true" :href="schedule.button_url"
                                                       class="tork-btn tork-btn-outline-primary tork-rounded-pill">{{
                                                            schedule.button_text
                                                        }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>





                            </div>
                            <upcoming></upcoming>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <div class="circle_1"></div>
        <div class="circle_2"></div>
    </div>
</template>

<script>
export default {
    created() {
        const course_id = this.$route.params.id
        var url='/api/schedule';
        if(course_id){
            url=url+'?course_id='+course_id;
        }
        var _this = this;
        // console.log(this.schedules);
        if (!User.loggedIn()) {
            this.$router.push('/auth/login')
        } else {
            axios.get(url)
                .then(function (response) {
                    _this.schedules = response.data;

                })
                .catch();
        }


    },
    data() {
        return {
            schedules: [],
            searchTerm: '',
        }
    },

}
</script>

<style scoped src='../../../../public/dashboard/css/style.css'>

@import url('../../../../public/dashboard/icons/icons.css');
@import '../../../../public/dashboard/css/style.scss';
</style>

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
                        <h2  v-if="$route.path.includes('/notices')">All Notice</h2>
                        <h2 v-else>Course Notice</h2>
                        <button id="togglerBtn" class="toggler tork-btn">
                            <span class="icon-th-menu"></span>
                        </button>
                    </div>
                    <div class="tork-d-flex tork-justify-c-space-between tork-flex-wrap">
                        <div class="search_input">
                            <input v-model="searchTerm" class="tork-form-control" placeholder="Search Here" type="text">
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
                <div class="notice">
                    <div class="tork-row">
                        <div class="tork-col-lg-9">



                                 <div v-if="$route.path.includes('/notices')" v-for="(notice, index) in filterNotice" :key="index" class="tork-card notice_card left_notice_card">
                                            <div class="toggle_header tork-d-flex tork-justify-c-space-between tork-items-center">
                                                <div class="alart_icon">
                                                    <span class="icon-i" onclick="clickToggleBtn(this, '.notice_card', '.toggle_info')"></span>
                                                </div>
                                                <div class="info">
                                                    <h4>{{ notice.title }}</h4>
                                                    <p>8th Grade  |  11th Chapter</p>
                                                </div>
                                                <div class="toggle_btn tork-d-flex">
                                                    <p class="date_time"><span class="icon-clock"></span> {{ notice.date }} at
                                                        {{ notice.time }}</p>
                                                    <span class="icon-angle-down" onclick="clickToggleBtn(this, '.notice_card', '.toggle_info')"></span>
                                                </div>
                                            </div>
                                            <div class="toggle_info">
                                                <p>{{
                                                        notice.description
                                                    }}</p>
                                                <a v-if="notice.button === 1 " :href="notice.button_url!=''? notice.button_url:'#'" class="go_btn tork-btn tork-btn-primary tork-rounded-pill">{{ notice.button_text }} </a>
                                            </div>
                                        </div>



                            <div v-if="$route.path.includes('/notice/')" v-for="(notice, index) in filterNotice" :key="index" class="tork-card notice_card left_notice_card">
                                <div class="toggle_header tork-d-flex tork-justify-c-space-between tork-items-center">
                                    <div class="alart_icon">
                                        <span class="icon-i" onclick="clickToggleBtn(this, '.notice_card', '.toggle_info')"></span>
                                    </div>
                                    <div class="info">
                                        <h4>{{ notice.title }}</h4>
                                        <p>8th Grade  |  11th Chapter</p>
                                    </div>
                                    <div class="toggle_btn tork-d-flex">
                                        <p class="date_time"><span class="icon-clock"></span> {{ notice.date }} at
                                            {{ notice.time }}</p>
                                        <span class="icon-angle-down" onclick="clickToggleBtn(this, '.notice_card', '.toggle_info')"></span>
                                    </div>
                                </div>
                                <div class="toggle_info">
                                    <p>{{
                                            notice.description
                                        }}</p>
                                    <a v-if="notice.button === 1 " :href="notice.button_url!=''? notice.button_url:'#'" class="go_btn tork-btn tork-btn-primary tork-rounded-pill">{{ notice.button_text }} </a>
                                </div>
                            </div>






                                    </div>
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
                    var url='/api/notice';
                    if(course_id){
                        url=url+'?course_id='+course_id;
                    }
                    if(!User.loggedIn()){
                        this.$router.push('/auth/login')
                    }else{
                        axios.get(url)
                            .then(({data})=>(this.notices = data))
                            .catch()
                    }


                },
                data(){
                    return{
                        notices:[],
                        searchTerm:'',
                    }
                },
                computed: {
                    filterNotice() {
                        return this.notices.filter(notice => {
                            return notice.description.toUpperCase().match(this.searchTerm.toUpperCase())
                        })
                    }
                },
            }
            </script>

<style scoped src='../../../../public/dashboard/css/style.css'>

@import url('../../../../public/dashboard/icons/icons.css');
@import '../../../../public/dashboard/css/style.scss';
</style>

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
                        <h2>Classes</h2>
                        <button id="togglerBtn" class="toggler tork-btn">
                            <span class="icon-th-menu"></span>
                        </button>
                    </div>
                    <div class="tork-d-flex tork-justify-c-space-between tork-flex-wrap">
                        <div class="search_input">
                            <input type="text" class="tork-form-control" placeholder="Search Here">
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
                <div class="classes">
                    <!-- Live Classes -->
                    <div class="section_heading">
                        <div class="tork-row">
                            <div class="tork-col-md-6">
                                <h2 class="title">Live Classes</h2>
                            </div>
                            <div class="tork-col-md-3">
                                <div class="custom_dropdown">
                                    <input id="dropdownInput" type="text" onclick="customDropdown(this)" class="dropdown_input"
                                           placeholder="Pathology">
                                    <ul class="dropdown list-unstyled">
                                        <li>Dubling mor</li>
                                        <li>Chadghaw</li>
                                        <li>Paslish</li>
                                        <li>Kotuali</li>
                                        <li>Chockbazar</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tork-col-md-3">
                                <div class="custom_dropdown">
                                    <input id="dropdownInput" type="text" onclick="customDropdown(this)" class="dropdown_input"
                                           placeholder="Pathology">
                                    <ul class="dropdown list-unstyled">
                                        <li>Dubling mor</li>
                                        <li>Chadghaw</li>
                                        <li>Paslish</li>
                                        <li>Kotuali</li>
                                        <li>Chockbazar</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="class_list tork-mt-4">
                        <div class="tork-row">
                            <div class="tork-col-md-4" v-for="(live_class, index) in live_classes":key="live_class.id">
                                <router-link :to="{name:'WatchClass',params:{id:live_class.id}}">
                                    <div class="tork-card tork-p-0">
                                        <img :src="live_class.banner" class="tork-w-100" alt="" >
                                        <div class="class_info tork-p-3">
                                            <div class="class_title tork-d-flex tork-justify-c-space-between">
                                                <h3>{{ live_class.title }}</h3>
                                                <p class="live"><span class="icon-live"></span> Live </p>
                                            </div>
                                            <p>{{ live_class.course_title }} | {{live_class.subject_title}}</p>
                                            <p class="date_time"><span class="icon-clock"></span> {{ live_class.date }}</p>
                                        </div>
                                    </div>
                                </router-link>
                            </div>

                        </div>
                    </div>
                    <!-- Upcomming Classes-->
                    <div class="section_heading">
                        <div class="tork-row">
                            <div class="tork-col-md-6">
                                <h2 class="title">Upcomming Classes</h2>
                            </div>
                            <div class="tork-col-md-3">
                                <div class="custom_dropdown">
                                    <input id="dropdownInput" type="text" onclick="customDropdown(this)" class="dropdown_input"
                                           placeholder="Pathology">
                                    <ul class="dropdown list-unstyled">
                                        <li>Dubling mor</li>
                                        <li>Chadghaw</li>
                                        <li>Paslish</li>
                                        <li>Kotuali</li>
                                        <li>Chockbazar</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tork-col-md-3">
                                <div class="custom_dropdown">
                                    <input id="dropdownInput" type="text" onclick="customDropdown(this)" class="dropdown_input"
                                           placeholder="Pathology">
                                    <ul class="dropdown list-unstyled">
                                        <li>Dubling mor</li>
                                        <li>Chadghaw</li>
                                        <li>Paslish</li>
                                        <li>Kotuali</li>
                                        <li>Chockbazar</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="class_list tork-mt-4">
                        <div class="tork-row">
                            <div class="tork-col-md-4" v-for="(upcoming_class, index) in upcoming_classes":key="upcoming_class.id">
                                <router-link :to="{name:'WatchClass',params:{id:upcoming_class.id}}">
                                    <div class="tork-card tork-p-0">
                                        <img :src="upcoming_class.banner" class="tork-w-100" alt="" >
                                        <div class="class_info tork-p-3">
                                            <div class="class_title tork-d-flex tork-justify-c-space-between">
                                                <h3>{{ upcoming_class.title }}</h3>
                                                <p class="live"><span class="icon-live"></span> Upcoming </p>
                                            </div>
                                            <p>{{ upcoming_class.course_title }} | {{upcoming_class.subject_title}}</p>
                                            <p class="date_time"><span class="icon-clock"></span> {{ upcoming_class.date }}</p>
                                        </div>
                                    </div>
                                </router-link>
                            </div>

                        </div>
                    </div>
                    <!-- Previous Classes-->
                    <div class="section_heading">
                        <div class="tork-row">
                            <div class="tork-col-md-6">
                                <h2 class="title">Previous Classes</h2>
                            </div>
                            <div class="tork-col-md-3">
                                <div class="custom_dropdown">
                                    <input id="dropdownInput" type="text" onclick="customDropdown(this)" class="dropdown_input"
                                           placeholder="Pathology">
                                    <ul class="dropdown list-unstyled">
                                        <li>Dubling mor</li>
                                        <li>Chadghaw</li>
                                        <li>Paslish</li>
                                        <li>Kotuali</li>
                                        <li>Chockbazar</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tork-col-md-3">
                                <div class="custom_dropdown">
                                    <input id="dropdownInput" type="text" onclick="customDropdown(this)" class="dropdown_input"
                                           placeholder="Pathology">
                                    <ul class="dropdown list-unstyled">
                                        <li>Dubling mor</li>
                                        <li>Chadghaw</li>
                                        <li>Paslish</li>
                                        <li>Kotuali</li>
                                        <li>Chockbazar</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="class_list tork-mt-4">
                        <div class="tork-row">
                            <div class="tork-col-md-4" v-for="(previous_class, index) in previous_classes":key="previous_class.id">
                                <router-link :to="{name:'WatchClass',params:{id:previous_class.id}}">
                                    <div class="tork-card tork-p-0">
                                        <img :src="previous_class.banner" class="tork-w-100" alt="" >
                                        <div class="class_info tork-p-3">
                                            <div class="class_title tork-d-flex tork-justify-c-space-between">
                                                <h3>{{ previous_class.title }}</h3>
                                                <p class="live"><span class="icon-live"></span> Previous </p>
                                            </div>
                                            <p>{{ previous_class.course_title }} | {{previous_class.subject_title}}</p>
                                            <p class="date_time"><span class="icon-clock"></span> {{ previous_class.date }}</p>
                                        </div>
                                    </div>
                                </router-link>
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
        if(!User.loggedIn()){
            this.$router.push('/auth/login')
        }else{
            axios.get('/api/classes')
               .then((response) =>{
                    this.live_class = response.data.live_classes
                    this.upcoming_classes = response.data.upcoming_classes
                 this.previous_classes = response.data.previous_classes



               })
                .catch()



        }


    },

    data(){
        return{
             live_classes:[],
            upcoming_classes:[],
            previous_classes:[],
        }
    }
}
</script>

<style scoped src='../../../../public/dashboard/css/style.css'>

@import url('../../../../public/dashboard/icons/icons.css');
@import '../../../../public/dashboard/css/style.scss';
</style>

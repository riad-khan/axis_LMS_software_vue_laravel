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
                            <h2>Courses</h2>
                            <button id="togglerBtn" class="toggler tork-btn">
                                <span class="icon-th-menu"></span>
                            </button>
                        </div>
                        <div class="tork-d-flex tork-justify-c-space-between tork-flex-wrap">
                            <div class="search_input">
                                <input v-model="searchTerm" class="tork-form-control" placeholder="Search Courses Here"
                                       type="text">
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
                    <!-- courses card items -->
                    <div class="courses">
                        <div class="tork-row">
                            <div class="tork-col-md-8">

                                <!--course section started -->

                                <div class="card_1002" v-for="(course , index ) in filterCourses" :key="course.id">
                                    <div  class="card_1002_container tork-card">
                                        <div class="tork-d-flex tork-justify-c-start tork-flex-wrap tork-items-center">
                                            <div class="thumbnail">
                                                <img :src="course.banner" alt="">
                                            </div>
                                            <div class="course_info">
                                                <h3>{{ course.title }}</h3>
                                                <p>{{ course.catagory_title }} | {{ course.merit }} </p>
                                                <div class="tork-d-flex tork-justify-c-space-between tork-items-center">



                                                    <div class="progress">
                                                        <div aria-valuemax="20" aria-valuemin="0"
                                                             aria-valuenow="20" class="progress_done "
                                                             role="progressbar"
                                                             data-done="2%"
                                                             style="width: 100%"></div>

                                                    </div> &nbsp;
                                                    <span>50%</span>
                                                </div>

                                            </div>
                                            <router-link style="margin-top: 4rem;margin-left: 2rem;" class="tork-btn tork-btn-primary tork-rounded-pill" :to="{name:'course_preview',params:{id:course.id}}">View Details</router-link>
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
        if (!User.loggedIn()) {
            this.$router.push('/auth/login')
        }else {
            axios.get('/api/my-courses')
                .then(({data}) => (this.courses = data))
                .catch()
        }


        this.upComingClasses();

    },
    data() {
        return {
            courses: [],
            searchTerm: '',
            upcoming_classes: [],
        }
    },
    computed: {
        filterCourses() {
            return this.courses.filter(course => {
                return course.title.toUpperCase().match(this.searchTerm.toUpperCase())
            })
        }
    },
    methods: {
        upComingClasses() {
            axios.get('/api/classes')
                .then((response) => {
                    this.upcoming_classes = response.data.upcoming_classes
                })
                .catch()
        },




    }
}
</script>

<style scoped src='../../../../public/dashboard/css/style.css'>

@import url('../../../../public/dashboard/icons/icons.css');
@import '../../../../public/dashboard/css/style.scss';
</style>

<template>
    <div>

        <main class="all_courses_page">
            <!-- Page Header -->
            <section class="page_header">
                <div class="tork-container">
                    <div class="page_heading">
                        <h2>All Courses</h2>
                        <span>Home / All Courses</span>
                    </div>
                </div>
            </section>
            <!-- End: Page Header -->

            <!-- Course Filter -->
            <section class="courses_page_filter_section">
                <div class="tork-container">
                    <div class="tork-row">
                        <div class="tork-col-md-3">
                            <div class="custom_dropdown">
                                <input id="dropdownInput" type="text" onclick="customDropdown(this)" class="dropdown_input"
                                       placeholder="8th Grade">
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
                                       placeholder="Select your Subject">
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
                            <p class="live-class"><span class="icon-live"></span> Live Classes</p>
                        </div>
                        <div class="tork-col-md-3">
                            <div class="search_box">
                                <input v-model="searchTerm" type="text" class="search_input tork-form-control" placeholder="Search here...">
                                <span class="icon-search"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End: Course Filter -->

            <!-- Courses Section -->
            <section class="courses_section tork-position-relative">
                <div class="tork-container">
                    <!-- courses items -->
                    <div class="tork-row course_items">
                        <div class="tork-col-md-4" v-for="(course, index) in filterCourses " :key="index">
                            <div class="course_card">
                                <div class="course_item">
                                    <div class="course_thumb">
                                        <img :src="course.banner" alt="">
                                    </div>
                                    <div class="course_info">
                                        <a href="#">
                                            <h3>{{ course.title}}</h3>
                                        </a>
                                        <div class="sub_info tork-d-flex tork-justify-c-space-between">
                                            <span>{{ course.grade }} | {{ course.chapter }}</span>
                                            <div class="rating tork-d-flex">
                                                <span class="icon-star"></span>
                                                <span class="icon-star"></span>
                                                <span class="icon-star"></span>
                                                <span class="icon-star"></span>
                                                <span class="icon-star inactive"></span>
                                                <span class="count_rating">{{course.overall_review}}</span>
                                            </div>
                                        </div>
                                        <!-- price -->
                                        <div class="price">
                                            <h4 class="tork-d-inline-block">{{course.offer_price}}</h4>
                                            <del class="tork-d-inline-block">{{ course.regular_price }}</del>
                                        </div>
                                    </div>
                                </div>
                                <div class="course_hover">
                                    <div class="course_info">
                                        <a href="#">
                                            <h3>The Complete<br> Financial Analytic Course</h3>
                                        </a>
                                        <div class="sub_info tork-d-flex tork-justify-c-space-between">
                                            <span>{{ course.grade }} | {{ course.chapter }}</span>
                                            <div class="rating tork-d-flex">
                                                <span class="icon-star"></span>
                                                <span class="icon-star"></span>
                                                <span class="icon-star"></span>
                                                <span class="icon-star"></span>
                                                <span class="icon-star inactive"></span>
                                                <span class="count_rating">{{course.overall_review}}</span>
                                            </div>
                                        </div>
                                        <!-- price -->
                                        <div class="price">
                                            <h4 class="tork-d-inline-block">{{course.offer_price}}</h4>
                                            <del class="tork-d-inline-block">{{ course.regular_price }}</del>
                                        </div>
                                    </div>
                                    <p class="course_description">
                                        {{ course.description}}
                                    </p>
                                    <div class="action_btn tork-d-flex tork-justify-c-space-between">
                                        <router-link :to="{name:'course_details',params:{id:course.id}}" class="tork-btn tork-btn-primary tork-rounded-pill">Course Preview</router-link>
                                        <a href="#" @click="courseStorage(index)" class="tork-btn tork-btn-outline-primary tork-rounded-pill">Enroll Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>

                </div>
                <div class="circle_1"></div>
                <div class="circle_2"></div>
            </section>
            <!-- End: Courses Section -->


        </main>
        <!-- Footer section -->


        <div class="circle_1"></div>
        <div class="circle_2"></div>
    </div>
</template>

<script>
export default {
    name: "all-courses.vue",

    data(){
        return{
            courses:[],
            searchTerm:'',

        }
    },
    created() {
        axios.get('/api/courses')
            .then((response) =>{
                this.courses = response.data


            })
    },

    computed: {
        filterCourses() {
            return this.courses.filter(course => {
                return course.title.toUpperCase().match(this.searchTerm.toUpperCase())
            })
        }
    },
    methods:{
        courseStorage(index){
             var course_iteam  = {course_title: this.courses[index].title,banner:this.courses[index].banner,id:this.courses[index].id, price:this.courses[index].offer_price_price}
            var store = JSON.parse(localStorage.getItem("enroll_courses")) || [];
            store.push(course_iteam);

            localStorage.setItem("enroll_courses", JSON.stringify(store));

            Toast.fire({
                icon: 'success',
                title: 'enrolled  successfully'
            })
            this.$router.push('/check-out')
        }
    }
}
</script>

<style scoped src='../../../../../public/dashboard/css/main.css'>

@import url('../../../../../public/dashboard/icons/icons.css');

</style>

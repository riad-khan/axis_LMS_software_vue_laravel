<template>
    <div>

        <main>
            <!-- Page Header -->
            <section class="page_header">
                <div class="tork-container">
                    <div class="page_heading">
                        <h2>Course Details</h2>
                        <span>Home / All Courses/ Course Details</span>
                    </div>
                </div>
            </section>
            <!-- End: Page Header -->

            <!-- Course details -->
            <section class="course_details tork-position-relative">
                <div class="tork-container">
                    <div class="tork-row">
                        <!-- Content body -->
                      <div class="tork-col-lg-8">
                        <div class="course_details_inner">
                            <div class="course_banner">
                                <img src="" alt="">
                            </div>
                            <div class="course_info">
                                <div class="title">
                                    <h2>{{details.title}}</h2>
                                    <span>Category Titile : {{ details.catagory_title }} | Course Credit : {{ details.course_credit }} | Class Time : {{ details.class_time }} </span>
                                </div>
                                <div class="nav_tabs tork-mb-4 tork-rounded">
                                    <ul class="btn_group tork-d-flex tork-flex-wrap tork-justify-c-space-between">
                                        <li><button @click="switchCourse()"  :class="tab_index === 0 ? 'tork-btn active' : 'tork-btn'">Course Overview</button></li>
                                        <li><button @click="switchSchedule()" :class="tab_index === 1 ? 'tork-btn active' : 'tork-btn'">Schedule</button></li>
                                        <li><button @click="switchInstructor()" :class="tab_index === 2 ? 'tork-btn active' : 'tork-btn'">Instructor</button></li>
                                        <li><button @click="switchReviews()" :class="tab_index === 3 ? 'tork-btn active' : 'tork-btn'">Reviews</button></li>
                                    </ul>
                                </div>
                                <!-- Course Overview -->
                                <div :class="tab_index === 0 ? 'course_overview' :'course_overview tork-d-none'">
                                    <div class="description">
                                        <p>
                                         {{details.description}}
                                        </p>

                                       
                                    </div>
                                   <div class="requirment" v-for="(feature, index) in details.features">
                                        <h3>{{ feature.title }}:</h3>
                                        <ul v-for="( feature_details , index) in feature.items">
                                            <li><span>&#10148;</span> {{ feature_details }}</li>
                                        </ul>
                                    </div>

                                   
                                    <div class="enroll_btn">
                                        <a href="#" class="tork-btn tork-btn-primary">Enroll Now</a>
                                    </div>
                                </div>

                                <!-- Course Schedule -->
                                <div :class="tab_index === 1 ? 'course_schedule' :'course_schedule tork-d-none'">
                                    <div class="description">
                                        <p>
                                            Ullamcorper vulputate aliquam orci nulla mauris blandit viverra tincidunt.
                                            Dignissim id a nisl, in adipiscing suspendisse ac, et. Elit, convallis
                                            ullamcorper a amet, morbi. Commodo at vitae at nisl massa. Bibendum amet.
                                        </p>
                                    </div>
                                    <div class="requirment">
                                        <h3>Schedule:</h3>
                                        <ul>
                                            <li><span>&#10148;</span> Sat: 9:00 PM (Eletronics)</li>
                                            <li><span>&#10148;</span> Mon: 8:00 AM (FCPS Major)</li>
                                            <li><span>&#10148;</span> Tue: 10:00 PM (MBBS Major)</li>
                                            <li><span>&#10148;</span> Thus: 5:00 AM (Biology)</li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <!-- Instructor profile -->
                                <div :class="tab_index === 2 ? 'instructor_profile tork-mt-5' : 'instructor_profile tork-mt-5 tork-d-none'">
                                    <div class="instructor_info tork-my-4">
                                        <div class="tork-d-flex tork-items-center">
                                            <div class="profile_img">
                                                <img src="" class="tork-rounded-circle tork-img-fluid" alt="user img">
                                            </div>
                                            <div class="info">
                                                <h4>{{instructor}}</h4>
                                                <span>{{instructor_subject}} <span>{{instructor_rating}} <i class="icon-star"></i></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="description">
                                        <p>
                                          {{about_instructor}}
                                        </p>

                                      
                                    </div>
                                    <div class="requirment">
                                        <h3>Experties:</h3>
                                        <ul v-for="">
                                            <li><span>&#10148;</span> Dignissim id a nisl ullamcorper a amet</li>
                                           
                                        </ul>
                                    </div>
                                    <div class="benifits">
                                        <h3>History:</h3>
                                        <ul>
                                            <li><span>&#10148;</span> Dignissim id a nisl ullamcorper a amet</li>
                                            <li><span>&#10148;</span> convallis ullamcorper at vitae at nisl massa. Bibendum amet.</li>
                                            <li><span>&#10148;</span> feugiat morbi nec Pulvinar at egestas vitae ut feugiat morbi nec.</li>
                                            <li><span>&#10148;</span> Ullamcorper vulputate aliquam</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Reviews -->
                                <div :class="tab_index === 3 ? 'review': 'review tork-d-none'">
                                    <div class="tork-card tork-p-5">
                                        <div class="tork-row">
                                            <div class="tork-col-lg-5">
                                                <div class="left_box tork-text-center">
                                                    <h2>5.0</h2>
                                                    <ul class="course_rating tork-d-flex tork-justify-c-center">
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                    </ul>
                                                    <p>Rated 5 out of 3 Ratings</p>
                                                </div>
                                            </div>
                                            <div class="tork-col-lg-7">
                                                <div class="right_box tork-mt-5 tork-mt-md-0">
                                                    <ul>
                                                        <li class="rating-5">
                                                            <i class="icon-star"></i> 5
                                                            <span class="rating_bar">
                                                                <span class="bar" style="width: 100%"></span>
                                                            </span>
                                                            <span>100%</span>
                                                        </li>
                                                        <li class="rating-4">
                                                            <i class="icon-star"></i> 4
                                                            <span class="rating_bar">
                                                                <span class="bar" style="width: 40%"></span>
                                                            </span>
                                                            <span>40%</span>
                                                        </li>
                                                        <li class="rating-3">
                                                            <i class="icon-star"></i> 3
                                                            <span class="rating_bar">
                                                                <span class="bar" style="width: 20%"></span>
                                                            </span> 
                                                            <span>20%</span>                                                   
                                                        </li>
                                                        <li class="rating-2">
                                                            <i class="icon-star"></i> 2
                                                            <span class="rating_bar">
                                                                <span class="bar" style="width: 0"></span>
                                                            </span>
                                                            <span>0%</span>
                                                        </li>
                                                        <li class="rating-1">
                                                            <i class="icon-star"></i> 1
                                                            <span class="rating_bar">
                                                                <span class="bar" style="width: 0"></span>
                                                            </span>
                                                            <span>0%</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- Right Sidebar -->
                        <div class="tork-col-lg-4">
                            <div class="right_sidebar">
                                <div class="related_courses">
                                    <h3>Related Courses</h3>
                                    <ul>
                                        <li v-for="(related_course,index) in details.related_courses" :key="related_course.id">
                                            <a href="#">{{ related_course.title }}</a>
                                            <span>{{ related_course.grade }}  |  {{ related_course.chapterphp }}</span>
                                        </li>

                                    </ul>
                                </div>
                                <!-- Course Status -->
                                <div class="course_status">
                                    <h3>Course Status</h3>
                                    <div class="tork-row">
                                        <div class="tork-col-6">
                                            <div class="item tork-d-flex tork-justify-c-start">
                                                <span class="icon-calendar-alt"></span>
                                                <div class="info">
                                                    <h5>{{ details.admission_opening }}</h5>
                                                    <p>Starting Date</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tork-col-6">
                                            <div class="item tork-d-flex tork-justify-c-start">
                                                <span class="icon-calendar-alt"></span>
                                                <div class="info">
                                                    <h5>{{ details.admission_deadline }}</h5>
                                                    <p>Application Ends</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tork-col-6">
                                            <div class="item tork-d-flex">
                                                <span class="icon-access_time"></span>
                                                <div class="info">
                                                    <h5>{{ details.course_duration }}</h5>
                                                    <p>Course Duration</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tork-col-6">
                                            <div class="item tork-d-flex tork-justify-c-start">
                                                <span class="icon-users"></span>
                                                <div class="info">
                                                    <h5>{{ details.total_students }}</h5>
                                                    <p>Total Students</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tork-col-6">
                                            <div class="item tork-d-flex tork-justify-c-start">
                                                <span class="icon-video_library"></span>
                                                <div class="info">
                                                    <h5>{{ details.total_videos }}</h5>
                                                    <p>Total Videos</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tork-col-6">
                                            <div class="item tork-d-flex tork-justify-c-start">
                                                <span class="icon-list-card"></span>
                                                <div class="info">
                                                    <h5>{{ details.total_exams }}</h5>
                                                    <p>Total Exams</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tork-col-6">
                                            <div class="item tork-d-flex tork-justify-c-start">
                                                <span class="icon-award"></span>
                                                <div class="info">
                                                    <h5>{{ details.course_includes }}</h5>
                                                    <p>Course Includes</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tork-col-6">
                                            <div class="item tork-d-flex tork-justify-c-start">
                                                <span class="icon-award"></span>
                                                <div class="info">
                                                    <h5>{{ details.total_hours }}</h5>
                                                    <p>Total Hours</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="circle_1"></div>
                <div class="circle_2"></div>
            </section>
            <!-- End: Course details -->


        </main>
        <!-- Footer section -->



    </div>
</template>

<script>
export default {
  created() {
      const course_id = this.$route.params.id;
      axios.get('/api/course/'+course_id)
      .then((response )=>{
          this.details = response.data
      })
  },
    data(){
      return{
          details:'',
          tab_index : 0,
          instructor:'ethan',
          instructor_subject:'english',
          instructor_rating:'4.2',
          about_instructor:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis neque quisque varius eget nulla. Donec vitae aliquam nunc, et hendrerit montes. Ullamcorper vulputate aliquam orci nulla mauris blandit viverra tincidunt',
      

      }
    },
    methods:{
        switchSchedule(){
            this.tab_index = 1
        },
         switchCourse(){
            this.tab_index = 0
        },
         switchInstructor(){
            this.tab_index = 2
        },
         switchReviews(){
            this.tab_index = 3
        }
    }
}
</script>

<style scoped src='../../../../../public/dashboard/css/main.css'>

@import url('../../../../../public/dashboard/icons/icons.css');

</style>


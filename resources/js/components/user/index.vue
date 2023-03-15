<template>
 <div>

  <main>
         <!-- Hero Section  -->
         <section class="hero_section">
             <div class="tork-container">
                 <div class="tork-row">
                     <div class="tork-col-md-6 tork-d-flex tork-items-center">
                         <div class="hero_text_inner">
                             <h3 class="sub_heading">World Best Online </h3>
                             <h1 class="heading">Learning Platform</h1>
                             <p class="description">
                                 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut magnis morbi eu libero, velit id sed. Tortor
                                 sed gravida nisl pretium mauris, vitae.
                             </p>
                             <a href="#" class="hero_btn tork-btn tork-btn-primary">Go to Classes</a>
                         </div>
                     </div>
                     <div class="tork-col-md-6">
                         <div class="hero_img">
                            <img :src="headerImage" alt="">
                         </div>
                     </div>
                 </div>
             </div>
         </section>
         <!-- End: Hero Section  -->

          <!-- Feature section -->
         <section class="feature_section">
             <div class="tork-container">
                 <div class="feature_inner tork-bg-white tork-rounded-5">
                     <div class="tork-row">
                         <div class="tork-col-md-4">
                             <div class="tork-d-flex tork-items-center">
                                 <div class="icon_img">
                                  <img :src="classIcon" alt="">
                                 </div>
                                 <div class="info">
                                     <h2>Class Materials</h2>
                                     <p>Explore a variety of fresh topics.</p>
                                 </div>
                             </div>
                         </div>
                         <div class="tork-col-md-4">
                             <div class="tork-d-flex tork-items-center">
                                 <div class="icon_img">
                                  <img :src="classIcon2" alt="">
                                 </div>
                                 <div class="info">
                                     <h2>Class Materials</h2>
                                     <p>Explore a variety of fresh topics.</p>
                                 </div>
                             </div>
                         </div>
                         <div class="tork-col-md-4">
                             <div class="tork-d-flex tork-items-center">
                                 <div class="icon_img">
                                  <img :src="classIcon3" alt="">
                                 </div>
                                 <div class="info">
                                     <h2>Class Materials</h2>
                                     <p>Explore a variety of fresh topics.</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </section>
         <!-- End: Feature section -->

   <!-- Courses Section -->
         <section class="courses_section tork-position-relative">
             <div class="tork-container">
                 <div class="course_heading tork-text-center">
                     <h2 class="tork-text-dark">Our Populer <span class="tork-text-primary">Courses</span></h2>
                     <p class="description tork-text-info">Lorem Ipsum is simply dummy text of the printing and typesetting
                         industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                         printer took a galley of type and scrambled it to make a type specimen book. It has survived.</p>
                 </div>
                 <!-- Filter nav -->
                 <div class="filter_nav">
                     <ul class="tork-d-flex filter_item">
                         <li class="active" data-filter="*">Physics</li>
                         <li data-filter=".sociology">Sociology</li>
                         <li data-filter=".biochemistry">Biochemistry</li>
                         <li data-filter=".computer">Computer</li>
                         <li data-filter=".biology">Biology</li>
                         <li data-filter=".english">English</li>
                     </ul>
                 </div>
                 <!-- courses items -->
                 <div class="tork-row course_items">
                     <div class="computer sociology tork-col-md-4" v-for="(course , index) in courses" :key="index.id">
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
                                     <router-link :to="{name:'course_details',params:{id:course.id}}">
                                         <h3>{{ course.title}}</h3>
                                     </router-link>
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
                                         <h4 class="tork-d-inline-block">{{course.offer_price_price}}</h4>
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

    <!-- Testimonial Section -->
    <section class="testimonial_section tork-position-relative">
      <div class="tork-container">
        <div class="testimonial_heading tork-text-center">
          <h2 class="tork-text-dark">Whats Our <span class="tork-text-primary">Customer Says</span></h2>
          <p class="description tork-text-info">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived.</p>
        </div>
        <div class="tork-row">
          <div class="tork-col-md-4">
            <div class="testimonial_item tork-d-flex">
              <div class="client_img">
                <img src="" alt="">
              </div>
              <div class="review">
                <h4 class="name">John WIck</h4>
                <span class="position">9th Grade Student</span>
                <p class="comments">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown.</p>
              </div>
              <div class="quote tork-position-absolute">
                <img src="" alt="">
              </div>
            </div>
          </div>
          <div class="tork-col-md-4">
            <div class="testimonial_item middle tork-d-flex">
              <div class="client_img">
                <img src="" alt="">
              </div>
              <div class="review">
                <h4 class="name">John WIck</h4>
                <span class="position">9th Grade Student</span>
                <p class="comments">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown.</p>
              </div>
              <div class="quote tork-position-absolute">
                <img src="" alt="">
              </div>
            </div>
          </div>
          <div class="tork-col-md-4">
            <div class="testimonial_item tork-d-flex">
              <div class="client_img">
                <img src="" alt="">
              </div>
              <div class="review">
                <h4 class="name">John WIck</h4>
                <span class="position">9th Grade Student</span>
                <p class="comments">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown.</p>
              </div>
              <div class="quote tork-position-absolute">
                <img src="" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="circle_1"></div>
      <div class="circle_2"></div>
    </section>
    <!-- End: Testimonial Section -->

    <!-- countdown section -->
    <section class="countdown_section">
      <div class="tork-container">
        <div class="countdown_inner tork-bg-white tork-rounded-5">
          <div class="tork-row">
            <div class="tork-col-md-4">
              <div class="tork-d-flex tork-items-center tork-justify-c-center">
                <div class="icon_img">
                  <img src="" alt="">
                </div>
                <div class="info">
                  <h2>100+</h2>
                  <p>Expart Teacher</p>
                </div>
              </div>
            </div>
            <div class="tork-col-md-4">
              <div class="tork-d-flex tork-items-center tork-justify-c-center">
                <div class="icon_img">
                  <img src="" alt="">
                </div>
                <div class="info">
                  <h2>9000+</h2>
                  <p>Srudents Enroll</p>
                </div>
              </div>
            </div>
            <div class="tork-col-md-4">
              <div class="tork-d-flex tork-items-center tork-justify-c-center">
                <div class="icon_img">
                  <img src="" alt="">
                </div>
                <div class="info">
                  <h2>500+</h2>
                  <p>Parents Join with us</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End: countdown section -->

    <!-- News letter Section -->
    <section class="newsletter_section tork-position-relative">
      <div class="tork-container">
        <div class="newsletter_heading tork-text-center">
          <h2 class="tork-text-dark">Subscribe to Get <span class="tork-text-primary">Our Newsletter</span></h2>
          <p class="description tork-text-info">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived.</p>
      </div>
      <div class="tork-row">
        <div class="newsletter_col tork-col-md-6">
          <div class="newsletter_feild tork-d-flex">
            <input type="email" class="tork-form-control newsletter_input" placeholder="Enter your Email">
            <button class="tork-btn tork-btn-primary newsletter_btn">Subscribe</button>
          </div>
        </div>
      </div>
      </div>
      <div class="circle_1"></div>
      <div class="circle_2"></div>
    </section>
    <!-- End: News letter Section -->
  </main>



 </div>
</template>

<script>
import headerImage from '../../../images/home-page-header-avater.png';
import classIcon from '../../../images/about-course-icon-6.png'
import classIcon2 from '../../../images/about-course-icon-5.png'
import classIcon3 from '../../../images/about-course-icon-2.png'
export default {
    data(){
        return{
            headerImage:headerImage,
            classIcon:classIcon,
            classIcon3:classIcon3,
            classIcon2:classIcon2,
            courses:[],

        }
    },
    created() {
        axios.get('/api/courses')
        .then((response) =>{
            this.courses = response.data

        })
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

<style scoped src='../../../../public/dashboard/css/main.css'>

@import url('../../../../public/dashboard/icons/icons.css');

</style>

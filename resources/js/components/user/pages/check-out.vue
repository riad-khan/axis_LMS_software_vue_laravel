<template>
    <div>

    <main class="all_courses_page">
        <!-- Page Header -->
        <section class="page_header">
            <div class="tork-container">
                <div class="page_heading">
                    <h2>Checkout</h2>
                    <span>Courses / Checkout</span>
                </div>
            </div>
        </section>
        <!-- End: Page Header -->

        <!-- Checkout Section -->
        <section class="checkout_section tork-position-relative">
            <div class="tork-container">
                <div class="tork-row">
                    <div class="tork-col-8">
                        <div class="signup">
                            <h2 v-if="token == null">Sign Up</h2>
                              <h2 v-else>Account Info</h2>
                            <form action="#" v-if="token == null">
                                <div class="form_group tork-mt-4">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="tork-form-control tork-mt-2">
                                </div>
                                <div class="form_group tork-mt-4">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" class="tork-form-control tork-mt-2">
                                </div>
                                <div class="form_group tork-mt-4">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" id="phone" class="tork-form-control tork-mt-2">
                                </div>
                                <div class="form_group tork-mt-4">
                                    <label for="password">Password</label>
                                    <input type="text" id="password" class="tork-form-control tork-mt-2">
                                </div>
                                <div class="form_group tork-mt-4">
                                    <label for="cPass">Confirm Password</label>
                                    <input type="text" id="cPass" class="tork-form-control tork-mt-2">
                                </div>
                                <label class="tork-checkbox">
                                    I agree to stoke terms and privacy policy
                                    <input type="checkbox" checked="checked">
                                    <span class="tork-checkmark"></span>
                                </label>
                            </form>

                            <h3 v-else>account info here</h3>
                        </div>
                    </div>
                    <!-- Total ammount -->
                    <div class="tork-col-md-4">
                        <div class="selected_courses">
                            <h2>Selected Courses</h2>
                            <div class="course_item" v-for="(course,index) in courses" :key="course.id" >
                                <div class="tork-d-flex">
                                    <div class="course_thumb">
                                        <img :src="course.banner" alt="">
                                    </div>
                                    <div class="course_info">
                                        <h3>{{ course.course_title }}</h3>
                                        <h4>{{course.price}}</h4>
                                        <span @click="removeCourse(index)">Remove Item</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="selected_courses tork-mt-5">
                            <h2 class="tork-mb-5">Payment Details</h2>
                            <div class="payment_details">
                                <div class="tork-d-flex tork-justify-c-space-between">
                                    <h5>Orginal Price</h5>
                                    <h5>{{coursePrice}}</h5>
                                </div>
                                <div class="tork-d-flex tork-justify-c-space-between">
                                    <h5>Coupon Discount:</h5>
                                    <h5> -{{coupon}}</h5>
                                </div>
                                <div class="total_price tork-d-flex tork-justify-c-space-between">
                                    <h6>Total:</h6>
                                    <h6>{{totalPrice}}</h6>
                                </div>

                                <a href="#" @click="orderDone" class="enroll_btn tork-btn tork-btn-block tork-btn-primary">Enroll Now</a><br>

                                <router-link to="/all-courses" class="">Enroll More Courses</router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="circle_1"></div>
            <div class="circle_2"></div>
        </section>
        <!-- End: Checkout Section -->


    </main>
    <!-- Footer section -->

    </div>
</template>
<script>

export default {
    created(){
          this.token = localStorage.getItem('token')
          this.courses = JSON.parse(localStorage.getItem('enroll_courses'))
    },
    data(){
        return{
            token:null,
            courses:[],
            coupon:500,
        }
    },
    computed:{
        coursePrice: function(){
            var sum = 0;
            this.courses.forEach(e =>{
                sum +=e.price
            });
            return sum;
        },
        totalPrice: function(){
             var sum = 0;
            this.courses.forEach(e =>{
                sum +=e.price
            });
          let total_price = sum - this.coupon
          return total_price;
        }
    },
    methods:{
        getCourse(){

       // console.log(this.courses[0]);
        },
        removeCourse(index){
            this.courses.splice(this.courses.indexOf(index),1)
            localStorage.setItem('enroll_courses',JSON.stringify(this.courses))
        },
        orderDone(){
            // axios.post('/api/check-out',this.courses)
            // .then((response)=>{
            //     console.log(response.data)
            // })
            // .catch()

            console.log(this.courses)
        }
    },



}
</script>

<style scoped src='../../../../../public/dashboard/css/main.css'>

@import url('../../../../../public/dashboard/icons/icons.css');

</style>

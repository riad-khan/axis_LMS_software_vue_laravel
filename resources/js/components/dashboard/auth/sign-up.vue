<template>
 <div>
     <main>
         <section class="signup_form_container">
             <div class="tork-row">
                 <div class="tork-col-lg-6">
                     <div class="left_box">
                         <div class="welcome_text">
                             <h2>Welcome to Tork</h2>
                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Enim quisque aenean sociis eu
                                 euismod in. </p>
                         </div>
                     </div>
                     <div class="social_links">
                         <ul>
                             <li>
                                 <a href="#"><span class="icon-facebook-square"></span></a>
                             </li>
                             <li>
                                 <a href="#"><span class="icon-twitter-square"></span></a>
                             </li>
                             <li>
                                 <a href="#"><span class="icon-linkedin"></span></a>
                             </li>
                             <li>
                                 <a href="#"><span class="icon-instagram-square"></span></a>
                             </li>
                         </ul>
                     </div>
                 </div>
                 <div class="tork-col-lg-6">
                     <div class="right_box">
                         <div class="signup">
                             <h2>Sign Up</h2>
                             <form action="" @submit.prevent="SignUp">

                                 <input type="text" v-model="form.name" class="tork-form-control" id="name" placeholder="Name">
                                 <small class="tork-text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
                                 <input type="text" v-model="form.email" class="tork-form-control" id="name" placeholder="Email">
                                 <small class="tork-text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
                                 <input type="text" v-model="form.phone" class="tork-form-control" id="name" placeholder="Phone Number">
                                 <small class="tork-text-danger" v-if="errors.name">{{ errors.phone[0] }}</small>
                                 <input type="password" v-model="form.password" class="tork-form-control" id="name" placeholder="Password">
                                 <small class="tork-text-danger" v-if="errors.name">{{ errors.password[0] }}</small>
                                 <input type="password" v-model="form.password_confirmation" class="tork-form-control" id="name" placeholder="Confirm Password">
                                 <small class="tork-text-danger" v-if="errors.password">{{ errors.password[0] }}</small>
                                 <label class="tork-checkbox">
                                     I agree to stoke terms and privacy policy
                                     <input type="checkbox" checked="checked">
                                     <span class="tork-checkmark"></span>
                                 </label>
                                 <button type="submit" class="tork-btn tork-btn-primary tork-rounded-pill">
                                     Get Started Now
                                 </button>
                             </form>
                             <p>
                                 Exiting user?
                                 <router-link to="/auth/login">Log in</router-link>
                             </p>
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
    created(){
        if(User.loggedIn()){
            this.$router.push('/home')
        }
    },
    data(){
        return{
            form:{
                name:'',
                email:'',
                password:'',
                password_confirmation:'',
                phone:'',
            },
            errors:{},
        }
    },
    methods:{
        SignUp(){
            axios.post('/api/auth/register',this.form)
                .then((response)=>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Signed in successfully'
                    })
                    this.$router.push('/auth/login')
                })
                   .catch(error => this.errors = error.response.data.errors)

        },
    }
}
</script>

<style scoped src='../../../../../public/dashboard/css/style.css'>

@import url('../../../../../public/dashboard/icons/icons.css');
@import '../../../../../public/dashboard/css/style.scss';
</style>

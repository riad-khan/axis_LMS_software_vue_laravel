<template>
<div>
    <main>
        <section class="login_form_container">
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
                            <h2>Log In</h2>
                            <form action="#" @submit.prevent="login">
                                <input type="text" class="tork-form-control" v-model="form.email" id="name" placeholder="Email">
                                <small class="text-danger" v-if="errors.email" >{{errors.email[0]}}</small>


                                <input type="password" v-model="form.password" class="tork-form-control" id="name" placeholder="Password">
                                <small class="text-danger" v-if="errors.password" >{{errors.password[0]}}</small>
                                <button type="submit" class="tork-btn tork-btn-primary tork-rounded-pill">
                                    Login
                                </button>
                            </form>
                            <p>
                                Create new accout
                                <router-link to="/auth/sign-up">Sign Up</router-link>
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
            this.$router.push('/courses')
        }
    },
    data(){
        return{
            form:{
                email:null,
                password: null
            },
            errors:{}
        }
    },
    methods:{
        login(){
            axios.post('/api/auth/login',this.form)
                .then(response => {
                    User.responseAfterLogin(response)
                    if(response){
                        Toast.fire({
                            icon: 'success',
                            title: 'Signed in successfully'
                        })
                        this.$router.push('/courses')
                    }
                })

                .catch(error => this.errors =
                    Toast.fire({
                    icon: 'error',
                    title: 'email or password incorrect'
                })
                )
        }
    }
}
</script>


<style scoped src='../../../../../public/dashboard/css/style.css'>

@import url('../../../../../public/dashboard/icons/icons.css');
@import '../../../../../public/dashboard/css/style.scss';
</style>


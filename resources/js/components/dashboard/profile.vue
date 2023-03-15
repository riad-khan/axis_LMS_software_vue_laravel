<template>
    <main>
        <section class="dashboad tork-d-flex">
            <div class="left_sidebar">
              <dashboard-navs></dashboard-navs>
            </div>
            <div class="dashboad_body">
                <!-- Header -->
                <div class="header">
                    <div class="title tork-d-flex tork-justify-c-space-between tork-items-center">
                        <h2>Profile</h2>
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
                <!-- main body content -->
                <div class="user_profile">
                    <form action=""@submit.prevent="updateProfile" enctype="multipart/form-data">
                        <div class="tork-mb-3 tork-row">
                            <label for="name" class="tork-col-md-2 tork-col-form-label">Name</label>
                            <div class="tork-col-md-7">
                                <input type="text" class="tork-form-control" :value="form.name" id="name">
                            </div>
                        </div>
                        <div class="tork-mb-3 tork-row">
                            <label for="name" class="tork-col-md-2 tork-col-form-label">Email Address</label>
                            <div class="tork-col-md-7">
                                <input type="text" class="tork-form-control" id="name" :value="form.email">
                            </div>
                        </div>
                        <div class="tork-mb-3 tork-row">
                            <label for="name" class="tork-col-md-2 tork-col-form-label">Phone Number</label>
                            <div class="tork-col-md-7">
                                <input type="text" class="tork-form-control" id="name" v-model="form.phone">
                            </div>
                        </div>

                    <h3>Change Password</h3>

                        <div class="tork-mb-3 tork-row">
                            <label for="oldPass" class="tork-col-md-2 tork-col-form-label">Old Password</label>
                            <div class="tork-col-md-7">
                                <input type="password" v-model="form.current_password" class="tork-form-control" id="oldPass" value="12554444">
                            </div>
                        </div>
                        <div class="tork-mb-3 tork-row">
                            <label for="newPass" class="tork-col-md-2 tork-col-form-label">New Password</label>
                            <div class="tork-col-md-7">
                                <input type="password" v-model="form.new_password" class="tork-form-control" id="newPass" value="255444556">
                            </div>
                        </div>
                        <div class="tork-mb-3 tork-row">
                            <label for="resetPass" class="tork-col-md-2 tork-col-form-label">Reset Password</label>
                            <div class="tork-col-md-7">
                                <input type="password"  v-model="form.new_confirm_password" class="tork-form-control" id="resetPass" value="12544">
                            </div>
                        </div>

                        <div class="submit_btns">
                            <button  class="tork-btn tork-btn-primary">Submit</button>

                        </div>
                    </form>

                </div>
            </div>
        </section>
    </main>
</template>

<script>
export default {
    created() {
        if(!User.loggedIn()){
            this.$router.push('/auth/login')
        }else{
            this.user();
        }

    },
    data(){
        return{


            form:{
                name:'',
                email:'',
                phone:null,
                current_password:'',
                new_password:'',
                new_confirm_password:'',
            },
            errors:{},
        }
    },

    methods:{

        user(){
            axios.get('/api/profile')
                .then((response) => {

                    this.form.name = response.data.name
                    this.form.email = response.data.email
                    this.form.phone = response.data.phone
                })
                .catch(e => {
                    this.errors = e;
                });
        },

        updateProfile(){
            axios.post('/api/profile-update',this.form)
                .then(() =>{

                    Toast.fire({
                        icon: 'success',
                        title: 'profile Updated Successfully'
                    })

                })
        },
    }
}
</script>

<style scoped src='../../../../public/dashboard/css/style.css'>

@import url('../../../../public/dashboard/icons/icons.css');
@import '../../../../public/dashboard/css/style.scss';
</style>

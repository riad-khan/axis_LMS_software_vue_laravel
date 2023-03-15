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
                        <h2>Complaint Box</h2>
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
                <div class="complaint_box">
                    <div class="tork-row">
                        <div class="tork-col-lg-8">
                            <div class="heading_info">
                                <h2>Complaint Policy</h2>
                                <p>
                                    In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to
                                    demonstrate the visual form of a document or a typeface without relying on
                                    meaningful content. Lorem ipsum may be used as a placeholder before final copy is
                                    available.
                                </p>
                            </div>

                            <form action="" @submit.prevent="complainInsert" >
                                <div class="tork-mb-3 tork-row">
                                    <input type="hidden" :value="form.user_id"  class="tork-form-control" id="name" placeholder="Name" >
                                </div>

                                <div class="tork-mb-3 tork-row">
                                    <input type="text" v-model="form.name"  class="tork-form-control" id="name" placeholder="Name">
                                </div>

                                <div class="tork-mb-3 tork-row">
                                    <input v-model="form.subject" type="text" class="tork-form-control" id="name" placeholder="Subject">
                                </div>

                                <div class="tork-mb-3 tork-row">
                                    <textarea v-model="form.complain" class="tork-form-control" name="address" id="address" cols="30" rows="5"
                                              placeholder="Type your Massage"></textarea>
                                </div>
                                <div class="submit_btn">
                                    <button  class="tork-btn tork-btn-primary tork-rounded-pill">Send</button>
                                </div>
                            </form>
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
            this.user();
        }

    },
    data(){
       return{
           form:{
               subject:'',
               name:'',
               complain:'',

               user_id:'',
           },

           errors:{},
       }
   },
    methods:{
       user(){
           axios.post('/api/auth/me')
               .then((response) => {

                   this.user_id = response.data.id
               })
                 .catch(e => {
               this.errors = e;
           });
       },

        complainInsert(){
            axios.post('/api/complain',this.form)
            .then(() =>{

                    Toast.fire({
                        icon: 'success',
                        title: 'Complain saved ! we will inform you soon'
                    })

            })
        }
    }
}
</script>

<style scoped src='../../../../public/dashboard/css/style.css'>

@import url('../../../../public/dashboard/icons/icons.css');
@import '../../../../public/dashboard/css/style.scss';
</style>

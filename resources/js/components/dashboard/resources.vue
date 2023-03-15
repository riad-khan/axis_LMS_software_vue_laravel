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
                            <h2 v-if="$route.path.includes('/class-resources/')">Course Resources</h2>
                            <h2 v-else>Resources</h2>
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
                    <div class="resources">
                        <div class="tork-row">
                            <div class="tork-col-lg-10">
                                <div class="tork-card tork-mt-5" v-if="$route.path.includes('/resources')">
                                    <h3>Todays Classes</h3>
                                    <div class="tork-card resources_item"  v-for="(today_class,index) in todays_resources">
                                        <div
                                            class="tork-d-flex tork-justify-c-lg-space-between tork-justify-c-center tork-flex-wrap tork-items-center">
                                            <h4>{{ today_class.title }}</h4>
                                            <div class="download_box tork-d-flex tork-justify-c-space-between">
                                                <p>{{ today_class.file_type }}</p>
                                                <a :href="today_class.download_url" class="tork-btn tork-btn-primary tork-rounded-pill"><span
                                                    class="icon-download" download></span> Download</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="tork-card tork-mt-5" v-if="$route.path.includes('/class-resources/')">
                                    <h3>Todays Classes</h3>
                                    <div class="tork-card resources_item"  v-for="(today_class,index) in todays_resources">
                                        <div
                                            class="tork-d-flex tork-justify-c-lg-space-between tork-justify-c-center tork-flex-wrap tork-items-center">
                                            <h4>{{ today_class.title }}</h4>
                                            <div class="download_box tork-d-flex tork-justify-c-space-between">
                                                <p>{{ today_class.file_type }}</p>
                                                <a :href="today_class.download_url" class="tork-btn tork-btn-primary tork-rounded-pill"><span
                                                    class="icon-download" download></span> Download</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="tork-card tork-mt-5" v-if="$route.path.includes('/resources')">
                                    <h3>Previous Classes</h3>
                                    <div class="tork-card resources_item"  v-for="(previous_resource,index) in previous_class_resources">
                                        <div
                                            class="tork-d-flex tork-justify-c-lg-space-between tork-justify-c-center tork-flex-wrap tork-items-center">
                                            <h4>{{ previous_resource.title }}</h4>
                                            <div class="download_box tork-d-flex tork-justify-c-space-between">
                                                <p>{{ previous_resource.file_type }}</p>
                                                <button  class="tork-btn tork-btn-primary tork-rounded-pill" @click="downloadFile(previous_resource.download_url)"><span
                                                    class="icon-download" ></span> Download</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="tork-card tork-mt-5" v-if="$route.path.includes('/class-resources/')">
                                    <h3>Previous Classes</h3>
                                    <div class="tork-card resources_item"  v-for="(previous_resource,index) in previous_class_resources">
                                        <div
                                            class="tork-d-flex tork-justify-c-lg-space-between tork-justify-c-center tork-flex-wrap tork-items-center">
                                            <h4>{{ previous_resource.title }}</h4>
                                            <div class="download_box tork-d-flex tork-justify-c-space-between">
                                                <p>{{ previous_resource.file_type }}</p>
                                                <button  class="tork-btn tork-btn-primary tork-rounded-pill" @click="downloadFile(previous_resource.download_url)"><span
                                                    class="icon-download" ></span> Download</button>
                                            </div>
                                        </div>
                                    </div>

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
        const course_id = this.$route.params.id
        var url='/api/class-resources';
        if(course_id){
            url=url+'?course_id='+course_id;
        }

        if(!User.loggedIn()){
            this.$router.push('/auth/login')
        }else{
            axios.get(url)
               .then((response) =>{
                    this.todays_resources = response.data.today_class_resources
                   this.previous_class_resources = response.data.previous_class_resources
               })
                .catch()
        }


            this.id = course_id
        console.log(this.id)

    },
    data(){
        return{
            todays_resources:[],
            previous_class_resources:[],


        }
    },
    methods:{
        downloadFile(link){
          axios({
              url:link,
              method:'GET',
              responseType:'blob',

          }).then((response) =>{
              var fileUrl = window.URL.createObjectURL(new Blob([response.data]))
              var fileLink = document.createElement('a')
              fileLink.href =fileUrl

              fileLink.setAttribute('download','image.png')
              document.body.appendChild(fileLink)
              fileLink.click()
          })
        }
    }


}
</script>

<style scoped src='../../../../public/dashboard/css/style.css'>

@import url('../../../../public/dashboard/icons/icons.css');
@import '../../../../public/dashboard/css/style.scss';
</style>

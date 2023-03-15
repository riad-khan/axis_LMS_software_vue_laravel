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
                        <h2  v-if="$route.path.includes('/results')" >All Results</h2>
                        <h2 v-else>Exam Result</h2>
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
                <div class="result_overall">
                    <div class="tork-row">
                        <div class="tork-col-lg-10">
                            <!-- overall result -->

                            <!-- Your result  -->


                            <!-- previous result -->
                            <div class="previews_result">

                                <div class="tork-card result_items" v-if="$route.path.includes('/results')">
                                    <div class="result_item tork-d-flex">
                                        <h4>Exam</h4>
                                        <h4 class="cgpa">Total Marks</h4>
                                        <h4 class="sl">My Marks</h4>
                                        <h4 class="comment">Details</h4>
                                    </div>
                                    <!-- item one -->
                                    <div class="result_item tork-d-flex" v-for="(result, index) in results":key="index">
                                        <h4>{{ result.exam_title }}</h4>
                                        <p class="cgpa">{{ result.total_marks }}</p>
                                        <p class="sl">{{ result.total_gain_marks }}</p>

                                        <router-link :to="{name:'result',params:{id:result.exam_id}}" class="tork-btn tork-btn-primary tork-rounded-pill">See Details</router-link>

                                    </div>

                                    <!-- item one -->

                                </div>

                                <div class="tork-card result_items" v-if="$route.path.includes('/exam-results/')">
                                    <div class="result_item tork-d-flex">
                                        <h4>Exam</h4>
                                        <h4 class="cgpa">Total Marks</h4>
                                        <h4 class="sl">My Marks</h4>
                                        <h4 class="comment">Details</h4>
                                    </div>
                                    <!-- item one -->
                                    <div class="result_item tork-d-flex" v-for="(result, index) in results":key="index">
                                        <h4>{{ result.exam_title }}</h4>
                                        <p class="cgpa">{{ result.total_marks }}</p>
                                        <p class="sl">{{ result.total_gain_marks }}</p>

                                        <router-link :to="{name:'result',params:{id:result.exam_id}}" class="tork-btn tork-btn-primary tork-rounded-pill">See Details</router-link>

                                    </div>

                                    <!-- item one -->

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
        var url='/api/userResults';
        if(course_id){
            url=url+'?course_id='+course_id;
        }
        if(!User.loggedIn()){
            this.$router.push('/auth/login')
        }else{
            axios.get(url)
                .then(({data})=>(this.results = data))
                .catch()
        }


    },
    data(){
        return{
            results:[],
        }
    }
}
</script>

<style scoped src='../../../../public/dashboard/css/style.css'>

@import url('../../../../public/dashboard/icons/icons.css');
@import '../../../../public/dashboard/css/style.scss';
</style>

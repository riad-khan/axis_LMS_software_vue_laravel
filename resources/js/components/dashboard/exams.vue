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
                        <h2>Exams</h2>
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
                <div class="exams" v-if="$route.path.includes('/all-exams')" >
                    <div class="section_heading">
                        <div class="tork-row">
                            <div class="tork-col-md-6">
                                <h2 class="title" >Course Exams</h2>

                            </div>
                            <div class="tork-col-md-3">
                                <div class="custom_dropdown">
                                    <input id="dropdownInput" type="text" onclick="customDropdown(this)"
                                           class="dropdown_input" placeholder="Pathology">
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
                                    <input id="dropdownInput" type="text" onclick="customDropdown(this)"
                                           class="dropdown_input" placeholder="Pathology">
                                    <ul class="dropdown list-unstyled">
                                        <li>Dubling mor</li>
                                        <li>Chadghaw</li>
                                        <li>Paslish</li>
                                        <li>Kotuali</li>
                                        <li>Chockbazar</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- courses card items -->
                    <div class="tork-row"v-for="(allExam, index) in exams" :key="allExam.id">

                           <div class="tork-col-md-5" v-for="(exam, index) in allExam" :key="exam.id" >
                               <div class="card_1003">
                                   <div class="card_1003_container tork-card">
                                       <div class="exam_info">
                                           <h3>{{ exam.title }}</h3>
                                           <p>Question-{{ exam.total_question }} | Mark-{{ exam.total_question * exam.marks_per_question }}</p>
                                           <p v-if="exam.highest_mark">Merit-{{ exam.my_merit }}th | Highest Mark-{{ exam.highest_mark }}</p>
                                           <div class="tork-d-flex tork-mt-3 tork-justify-c-space-between">
                                               <div class="time">
                                                   <span class="icon-clock tork-mr-1"></span>
                                                   <span>{{ exam.duration }}</span>
                                               </div>


                                               <router-link class="tork-btn tork-btn-primary tork-btn-sm tork-rounded-pill tork-px-5"  :to="{name:'single_exam',params:{id:exam.id}}">Start Exam</router-link>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>


                    </div>

                    <!-- Previous Exam -->


                    <!-- courses card items -->

                </div>


                <div class="exams" v-if="$route.path.includes('/exams/')" >
                    <div class="section_heading">
                        <div class="tork-row">
                            <div class="tork-col-md-6">
                                <h2 class="title" >Course Exams</h2>

                            </div>
                            <div class="tork-col-md-3">
                                <div class="custom_dropdown">
                                    <input id="dropdownInput" type="text" onclick="customDropdown(this)"
                                           class="dropdown_input" placeholder="Pathology">
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
                                    <input id="dropdownInput" type="text" onclick="customDropdown(this)"
                                           class="dropdown_input" placeholder="Pathology">
                                    <ul class="dropdown list-unstyled">
                                        <li>Dubling mor</li>
                                        <li>Chadghaw</li>
                                        <li>Paslish</li>
                                        <li>Kotuali</li>
                                        <li>Chockbazar</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- courses card items -->
                    <div class="tork-row"v-for="(allExam, index) in exams" :key="allExam.id">

                        <div class="tork-col-md-5" v-for="(exam, index) in allExam" :key="exam.id" >
                            <div class="card_1003">
                                <div class="card_1003_container tork-card">
                                    <div class="exam_info">
                                        <h3>{{ exam.title }}</h3>
                                        <p>Question-{{ exam.total_question }} | Mark-{{ exam.total_question * exam.marks_per_question }}</p>
                                        <p v-if="exam.highest_mark">Merit-{{ exam.my_merit }}th | Highest Mark-{{ exam.highest_mark }}</p>
                                        <div class="tork-d-flex tork-mt-3 tork-justify-c-space-between">
                                            <div class="time">
                                                <span class="icon-clock tork-mr-1"></span>
                                                <span>{{ exam.duration }}</span>
                                            </div>


                                            <router-link class="tork-btn tork-btn-primary tork-btn-sm tork-rounded-pill tork-px-5"  :to="{name:'single_exam',params:{id:exam.id}}">Start Exam</router-link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- Previous Exam -->


                    <!-- courses card items -->

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
        const course_id = this.$route.params.id;
        var url='/api/exams';
        if(course_id){
            url=url+'?course_id='+course_id;
        }

        if(!User.loggedIn()){
            this.$router.push('/auth/login')
        }else{
            axios.get(url)
                .then(({data})=>(this.exams = data))
                .catch()
        }


    },
    data(){
        return{
            exams:[],
        }
    }
}
</script>

<style scoped src='../../../../public/dashboard/css/style.css'>

@import url('../../../../public/dashboard/icons/icons.css');
@import '../../../../public/dashboard/css/style.scss';
</style>

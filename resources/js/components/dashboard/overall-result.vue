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
                        <h2>Overall Result</h2>
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
                            <div class="overall_result">
                                <div class="tork-card">
                                    <h2>Overall Result</h2>
                                    <div class="subject_title tork-d-flex tork-justify-c-space-between">
                                        <h3>{{ exam_title }}</h3>
                                        <p>Monday, 28th February</p>
                                    </div>
                                    <div class="result_info tork-row">
                                        <div class="tork-col-md-6">
                                            <div class="tork-d-flex tork-items-center tork-mb-3">
                                                <span class="icon-users"></span>
                                                <p class="tork-ml-2">{{ total_participants }} Total Participants</p>
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="tork-d-flex tork-items-center tork-mb-3">
                                                <span class="icon-user-graduate"></span>
                                                <p class="tork-ml-2">{{ passed_participants }} Passed Participants</p>
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="tork-d-flex tork-items-center tork-md-mb-0 tork-mb-3">
                                                <span class="icon-signal"></span>
                                                <p class="tork-ml-2">{{ total_merit }} Total Marit</p>
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="tork-d-flex tork-items-center tork-md-mb-0 tork-mb-3">
                                                <span class="icon-frown1"></span>
                                                <p class="tork-ml-2">{{ total_failed }} Total Failed</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Your result  -->
                            <div class="overall_result your_result">
                                <div class="tork-card">
                                    <h2>Your Result</h2>
                                    <div class="subject_title tork-d-flex tork-justify-c-space-between">
                                        <h3>{{ exam_title }}</h3>
                                        <p>Monday, 28th February</p>
                                    </div>
                                    <div class="result_info tork-row">
                                        <div class="tork-col-md-6">
                                            <div class="tork-d-flex tork-items-center tork-mb-3">
                                                <span class="icon-cross"></span>
                                                <p class="tork-ml-2">{{ total_wrong }} Wrong Answers</p>
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="tork-d-flex tork-items-center tork-mb-3">
                                                <span class="icon-not-equal"></span>
                                                <p class="tork-ml-2">{{not_answer}} Not Answer</p>
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="tork-d-flex tork-items-center tork-md-mb-0 tork-mb-3">
                                                <span class="icon-checkmark"></span>
                                                <p class="tork-ml-2">{{ total_correct }} Correct Answer</p>
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="tork-d-flex tork-items-center tork-md-mb-0 tork-mb-3">
                                                <span class="icon-sum"></span>
                                                <p class="tork-ml-2">{{ total_gain_marks }} (Out of 50) Total Marks</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="icon_box tork-d-flex tork-flex-wrap tork-justify-c-space-evenly tork-items-center">
                                        <div class="icon tork-text-center">
                                            <span class="icon-frown"></span>
                                            <p>Very Bad</p>
                                        </div>
                                        <div class="icon tork-text-center">
                                            <span class="icon-grin-squint"></span>
                                            <p>Bad</p>
                                        </div>
                                        <div class="icon tork-text-center">
                                            <span class="icon-neutral"></span>
                                            <p>Neutral</p>
                                        </div>
                                        <div class="icon active tork-text-center">
                                            <span class="icon-smile"></span>
                                            <p>Good</p>
                                        </div>
                                        <div class="icon tork-text-center">
                                            <span class="icon-laugh"></span>
                                            <p>Very Good</p>
                                        </div>
                                    </div>
                                    <div class="see_result_btn tork-text-center">
                                        <router-link  :to="{name:'result',params:{id:exam_id}}" class="tork-btn tork-btn-primary tork-rounded-pill">See Correct Answers</router-link>
                                    </div>
                                </div>
                            </div>
                            <!-- previous result -->
                            <div class="previews_result">
                                <div class="title tork-d-flex tork-items-center">
                                    <h2>All Results</h2>
                                    <span>{{ all_results.length }} students</span>
                                </div>
                                <div class="tork-card result_items">
                                    <!-- item one -->
                                    <!-- <div class="result_item tork-d-flex">
                                        <h4>Rank</h4>
                                         <h4>Name</h4>
                                         <h4>Registration No</h4>
                                        <h4>Exam Name</h4>
                                        <h4 class="cgpa">Total Marks</h4>
                                        <h4 class="cgpa">Total Position</h4>
                                        <h4 class="sl">Wrong Answer</h4>
                                         <h4 class="sl">Correct Answer</h4>
                                         <h4 class="sl">No Answer</h4>
                                          <h4 class="sl">Percentage</h4>

                                    </div>
                                
                                    <div class="result_item tork-d-flex" v-for="(all_result,index) in all_results">
                                        <p>{{ all_result.exam_rank }}</p>
                                        <p class="cgpa">{{ all_result.exam_name }}</p>
                                        <p class="sl">{{total_marks}}</p>
                                        <p class="comment">{{all_result.total_gain_marks}}</p>
                                    </div> -->

                                       <table class="table">
                                            <thead>
                                                <tr>
                                                <th scope="col">Rank</th>
                                                <th scope="col">Student Name</th>
                                                <th scope="col">Exam Name</th>
                                                <th scope="col">Total Marks</th>
                                                <th scope="col">Total Position</th>
                                                 <th scope="col">Wrong Answer</th>
                                                  <th scope="col">Correct Answer</th>
                                                   <th scope="col">No Answer</th>
                                                    <th scope="col">Percentage</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(all_result,index) in all_results">
                                                <th scope="row">{{ all_result.exam_rank }}</th>
                                                <td>{{ all_result.user_name }}</td>
                                                <td>{{ all_result.exam_name }}</td>
                                               <td>{{ all_result.total_question * all_result.marks_per_question }}</td>
                                               <td>undefined</td>
                                                <td>{{ all_result.total_wrong }}</td>
                                                <td>{{ all_result.total_correct }}</td>
                                                <td>{{ all_result.not_answer }}</td>
                                                 <td>{{ all_result.mark_percentege }}</td>
                                                
                                               
                                                </tr>
                                               
                                            </tbody>
                                            </table><br>

                                             <router-link style="float:right;" :to="{name:'print_result',params:{id:exam_id}}" class="tork-btn tork-btn-primary tork-rounded-pill">Print Result</router-link>

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
        if(!User.loggedIn()){
            this.$router.push('/auth/login')
        }else{
            const exam_id = this.$route.params.id
          axios.post('/api/exam/'+exam_id+'/getExamOverAllResult')
            .then((response)=>{
                this.exam_title = response.data.title
                this.total_participants = response.data.total_participants
                this.passed_participants = response.data.passed_participants
                this.total_merit = response.data.total_merit
                this.total_failed = response.data.total_failed
                this.total_wrong = response.data.total_wrong
                this.not_answer = response.data.not_answer
                this.total_gain_marks = response.data.total_gain_marks
                this.total_correct = response.data.total_correct
                this.total_marks = response.data.total_marks
                this.all_results = response.data.all_results

            })

            console.log(this.all_results)
            this.exam_id = exam_id;

        }

    },
    data(){
        return{
            exam_id:'',
            exam_title:{},
            total_participants:{},
            passed_participants:{},
            total_merit:{},
            total_failed:{},
            total_wrong:{},
            not_answer:{},
            total_correct:{},
            total_gain_marks:{},
            all_results:[],
        }
    }
}
</script>

<style scoped src='../../../../public/dashboard/css/style.css'>


@import url('../../../../public/dashboard/icons/icons.css');
@import '../../../../public/dashboard/css/style.scss';
</style>

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
                           <h2>Result</h2>
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
                   <div class="result">
                       <div class="tork-row">
                           <div class="tork-col-lg-10">
                               <div class="your_result">
                                   <div class="tork-card">
                                       <h2>Your Result</h2>
                                       <div class="subject_title tork-d-flex tork-justify-c-space-between">
                                           <h3>{{ title }}</h3>
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
                                                   <p class="tork-ml-2">{{ gain_marks }} (Out of
                                                       {{ marks_per_question * total_question }}) Total Marks</p>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="icon_box tork-d-flex tork-flex-wrap tork-justify-c-space-evenly tork-items-center">
                                           <div class="icon tork-text-center" :class="gain_marks <=10 ? 'active' : ''">
                                               <span class="icon-frown"></span>
                                               <p>Very Bad</p>
                                           </div>
                                           <div class="icon tork-text-center" :class="gain_marks > 20 ? 'active' : ''">
                                               <span class="icon-grin-squint"></span>
                                               <p>Bad</p>
                                           </div>
                                           <div class="icon tork-text-center":class="gain_marks > 40 ? 'active' : ''">
                                               <span class="icon-neutral"></span>
                                               <p>Neutral</p>
                                           </div>
                                           <div class="icon  tork-text-center" :class="gain_marks > 70 ? 'active' : ''">
                                               <span class="icon-smile"></span>
                                               <p>Good</p>
                                           </div>
                                           <div class="icon tork-text-center":class="gain_marks  > 90 ? 'active' : ''">
                                               <span class="icon-laugh"></span>
                                               <p>Very Good</p>
                                           </div>
                                       </div>
                                       <div class="see_result_btn tork-text-center">
                                           <router-link :to="{name:'overAllResult',params:{id:exam_id}}" class="tork-btn tork-btn-primary tork-rounded-pill">See Overall Results</router-link>
                                       </div>
                                   </div>
                               </div>
                               <div class="currect_answers">
                                   <h2>Currect Answers</h2>
                                   <div class="question_item" v-for = "(question,index) in get_questions.questions":key="index" >
                                        <h3>{{ question.question_text }}?</h3>


                                       <div class="tork-row">
                                           <div class="tork-col-md-6" v-for="(option,index) in question.options">
                                               <label class="tork-rodio-container">{{ option.option_text }}
                                                   <input type="radio" :checked="option.id == question.correct_ans" name="question_1">
                                                   <span class="tork-rodio"></span><br><br>
                                                   <div class="explanation">
                                                       <h5>Explanation</h5>
                                                       <p>{{ option.explanation }}</p>
                                                   </div>

                                               </label>
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
        if(!User.loggedIn()){
            this.$router.push('/auth/login')
        }else{
            const exam_id = this.$route.params.id;
            axios.get('/api/exam/'+exam_id+'/getResultWithCorrectAnswer')
               .then((response) =>{
                   this.title = response.data.title
                   this.total_wrong = response.data.total_wrong
                   this.not_answer = response.data.not_answer
                   this.total_correct = response.data.total_correct
                   this.gain_marks = response.data.total_gain_marks

                   this.marks_per_question = response.data.exam.marks_per_question
                   this.total_question =  response.data.exam.total_question

                   this.get_questions = response.data
                   this.exam_id = response.data.exam_id


               })
        }



    },
    data(){
        return{
            exam_id:null,
            title:'',
            total_wrong: '',
            not_answer:'',
            total_correct:'',
            gain_marks : '',
            get_questions:{},
            marks_per_question:'',
            total_question:'',

        }
    }
}
</script>

<style scoped src='../../../../public/dashboard/css/style.css'>

@import url('../../../../public/dashboard/icons/icons.css');
@import '../../../../public/dashboard/css/style.scss';
</style>

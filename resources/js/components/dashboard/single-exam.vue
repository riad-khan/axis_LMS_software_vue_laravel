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
                        <div class="exam_page_heading">
                            <h2>{{ exam_details.title }}</h2>
                            <div class="tork-d-flex tork-justify-c-space-between">
                                <p>Question-{{ exam_details.total_questions }}  |  Mark-{{ exam_details.total_marks }}</p>
                                <p><span class="icon-timer"></span> {{ timeLeft }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- main body content -->
                    <div class="single_exam" v-if="this.data_load==true && this.show_all_questions ===false">
                        <div class="pagination">
                            <div class="pagination_nav tork-text-right">
                                <span class="icon-angle-left"></span>
                                <span class="icon-angle-right"></span>
                            </div>
                            <ul class="pagination_lists">
                                <li :class="active_index==index?'active':''"  v-for="(question, index) in exam_details.questions"><a @click="selectActiveQuestion(index)">{{ index+1 }}</a></li>

                            </ul>
                        </div>
                        <div class="exam_infomation">
                            <h3>{{ exam_details.questions[active_index].question_text }}?</h3>
                            <div class="tork-row">
                                <div class="tork-col-md-10" v-for="(option ,index) in exam_details.questions[active_index].options" :key="index">
                                    <div>
                                        <label v-if="exam_details.questions[active_index].is_true_false === 1"><strong v-if="option.option_letter!=''">{{ option.option_letter }} . </strong>{{ option.option_text }}
                                            <input type="radio" value="1" :id="'true' + active_index + index"  v-model="form.user_answers[active_index].user_ans[index]"> <label :for="'true' + active_index + index" ><b>True</b></label>
                                            <input type="radio" value="0" :id="'false' + active_index + index" v-model="form.user_answers[active_index].user_ans[index]"> <label :for="'false' + active_index + index" ><b>False</b></label>
                                            <span class="tork-rodio"></span>
                                        </label>

                                         <label v-else> <input type="radio" :value="option.id" :id="option.id"  v-model="form.user_answers[active_index].user_ans[0]"><label :for="option.id"><strong v-if="option.option_letter!=''">{{ option.option_letter }} . </strong>{{ option.option_text }}
                                           
                                        
                                            </label>
                                        </label>

                                    </div>
                                </div>

                            </div>
                            <div class="single_exam_btns tork-d-flex tork-justify-c-space-between tork-flex-wrap">
                                <button v-if="active_index > 0" @click="previousClicked" class="tork-btn tork-btn-outline-primary tork-rounded-pill">Previous</button>

                                <button @click="submitAnswer()" class="tork-btn tork-btn-primary tork-rounded-pill" v-if="active_index>=total_question-1 && isDone == true" >Submit</button>


                                <button @click="nextClicked()" class="tork-btn tork-btn-primary tork-rounded-pill" v-else-if="isDone == true" >Next</button>

                                 <button @click="showQuestion()" class="tork-btn tork-btn-primary tork-rounded-pill" v-if="show_all_questions === false"  >Show Question</button>

                                  <button @click="hideQuestion()" class="tork-btn tork-btn-primary tork-rounded-pill" v-if="show_all_questions === true"  >Hide Question</button>


                                <!-- Modal -->
                                <div ref="modal" id="torkModal" class="tork-modal" @click="closeModal">
                                    <div class="tork-modal-dialog" v-if="renderComponent">
                                        <div class="tork-modal-body">
                                            <div class="heading_info">
                                                <h2>{{ gain_marks }}</h2>
                                                <p>out of {{ total_marks }}</p>
                                                <h3 class="tork-text-white">Congratulations</h3>

                                            </div>
                                            <div class="body_info">
                                                <h4>Total Wrong Answer : {{ wrong_ans }} </h4>
                                                 <h4>Total Correct Answer : {{ correct_ans }} </h4>
                                                <div class="rating tork-d-flex">
                                                    <span class="active icon-star"></span>
                                                    <span class="active icon-star"></span>
                                                    <span class="active icon-star"></span>
                                                    <span class="inactive icon-star"></span>
                                                    <span class="inactive icon-star"></span>
                                                </div>
                                                <router-link :to="{name:'result',params:{id:exam_id}}" class="tork-btn tork-btn-primary">See Answer Sheet</router-link>
                                                <router-link :to="{name:'overAllResult',params:{id:exam_id}}" class="tork-btn tork-btn-info">See Overall Result</router-link>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                <!-- view and hide question -->


                     <div class="single_exam" v-if="this.show_all_questions ===true && this.data_load === true">
                        <div class="pagination">
                            <div class="pagination_nav tork-text-right">
                                <span class="icon-angle-left"></span>
                                <span class="icon-angle-right"></span>
                            </div>
                            <ul class="pagination_lists">
                                <!-- <li :class="active_index==index?'active':''"  v-for="(question, index) in exam_details.questions"><a @click="selectActiveQuestion(index)">{{ index+1 }}</a></li> -->

                            </ul>
                        </div>
                        

                        <div class="exam_infomation" v-for="(allQuestion , q_index) in exam_details.questions" :key="q_index" >
                             <h3>{{ allQuestion.question_text }}</h3>
                            <div class="tork-row">
                                <div class="tork-col-md-10" v-for="(option, index) in allQuestion.options" :key="index">
                                    <div class="radio_box">
                                        <label v-if="allQuestion.is_true_false === 1">
                                            <strong v-if="option.option_letter!=''">{{ option.option_letter }} . </strong>
                                            {{ option.option_text }}
                                            
                                            <input type="radio" :id="'true' + q_index + index"  :name="option.id" value="1"  v-model="form.user_answers[q_index].user_ans[index]"> 
                                            <label :for="'true' + q_index + index"><b>True</b></label>
                                            <input  type="radio" :id="'false' + q_index + index"  :name="option.id"  value="0"  v-model="form.user_answers[q_index].user_ans[index]"> 
                                            <label :for="'false' + q_index + index" ><b>False</b></label>
                                            
                                        </label>    


                                         <label v-else>
                                             <input type="radio" :value="option.id" :id="option.id"  v-model="form.user_answers[q_index].user_ans[0]">
                                             <label :for="option.id">
                                            <strong v-if="option.option_letter!=''">{{ option.option_letter }} . </strong>
                                            {{ option.option_text }}
                                            
                                            <!-- <input type="radio" :id="'true' + q_index + index"  :name="option.id" value="1"  v-model="form.user_answers[q_index].user_ans[index]"> 
                                            <label :for="'true' + q_index + index"><b>True</b></label>
                                            <input  type="radio" :id="'false' + q_index + index"  :name="option.id"  value="0"  v-model="form.user_answers[q_index].user_ans[index]"> 
                                            <label :for="'false' + q_index + index" ><b>False</b></label> -->
                                         
                                             </label>
                                        </label> 

                                
                                       

                                           <!-- <label v-else>
                                            <strong v-if="option.option_letter!=''">{{ option.option_letter }} . </strong>
                                            {{ option.option_text }}
                                            
                                            <input type="radio" style="margin-left: 2rem;" :name="option.id" value="1"  v-model="form.user_answers[q_index].user_ans[index]"> 
                                            <strong>True</strong>
                                            <input type="radio" style="margin-left: 2rem;" :name="option.id"  value="0"  v-model="form.user_answers[q_index].user_ans[index]"> 
                                            <strong>False</strong>
                                            <span class="tork-rodio"></span>
                                        </label>    -->

                                    </div>
                                </div>
                            </div>
                            <div class="single_exam_btns tork-d-flex tork-justify-c-space-between tork-flex-wrap">
                                <!-- <button v-if="active_index > 0" @click="previousClicked" class="tork-btn tork-btn-outline-primary tork-rounded-pill">Previous</button> -->

                               
                                


                                <!-- <button @click="nextClicked()" class="tork-btn tork-btn-primary tork-rounded-pill" v-else-if="isDone == true" >Next</button> -->


                            
                            </div>
                        </div>

                        
    <!-- Modal -->
                                <div ref="modal" id="torkModal" class="tork-modal" @click="closeModal">
                                    <div class="tork-modal-dialog" v-if="renderComponent">
                                        <div class="tork-modal-body">
                                            <div class="heading_info">
                                                <h2>{{ gain_marks }}</h2>
                                                <p>out of {{ total_marks }}</p>
                                                <h3 class="tork-text-white">Congratulations</h3>

                                            </div>
                                            <div class="body_info">
                                                <h4>Total Wrong Answer : {{ wrong_ans }} </h4>
                                                 <h4>Total Correct Answer : {{ correct_ans }} </h4>
                                                <div class="rating tork-d-flex">
                                                    <span class="active icon-star"></span>
                                                    <span class="active icon-star"></span>
                                                    <span class="active icon-star"></span>
                                                    <span class="inactive icon-star"></span>
                                                    <span class="inactive icon-star"></span>
                                                </div>
                                                <router-link :to="{name:'result',params:{id:exam_id}}" class="tork-btn tork-btn-primary">See Answer Sheet</router-link>
                                                <router-link :to="{name:'overAllResult',params:{id:exam_id}}" class="tork-btn tork-btn-info">See Overall Result</router-link>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <button @click="hideQuestion()" class="tork-btn tork-btn-primary tork-rounded-pill" v-if="show_all_questions === true"  >Back to Single Question</button>

                    </div>

                <!--- end view hide section -->


                </div>
            </section>
        </main>


    </div>
</template>

<script>

var intervalTimer;
export default {

    components:{


    },
    created() {
        if(!User.loggedIn()){
            this.$router.push('/auth/login')
        }else{


            const exam_id = this.$route.params.id;
            this.exam_id=exam_id;

            this.form.user_id = localStorage.getItem('user_id')

            axios.get('/api/exam/'+exam_id+'/questions')
                .then((response) =>{
                    this.exam_details = response.data;
                    this.data_load=true;
                   
                    this.active_index=0;
                    this.total_question= this.exam_details.questions.length;

                    for (var i=0;i<this.total_question;i++){

                        // console.log(this.exam_details.questions[i]);

                        this.form.user_answers.push({'question_id': this.exam_details.questions[i].id, 'user_ans':[]});

                    }

                })
                .catch()

            setInterval(() => {
                this.canBeShown = !this.canBeShown
            }, 5000)
        }

        // this.timeLeft();
        this.id = this.$route.params.id

    },
    data(){
        return{
          
            renderComponent:true,
            show_all_questions:false,
            picked:'',
            data_load:false,
            active_index:0,
            total_question:0,
            exam_details:[],
            exam_id:'',
            total_marks:0,
            gain_marks:0,
            isDone: true,
            canBeShown: false,
            form:{
                user_id:'',
                user_answers:[],
            },
            errors:{},
            selectedTime: 0,
            timeLeft: '00:00',
            endTime: '0',
            seconds:3600,
            wrong_ans:0,
            correct_ans:0,

        }
    },

    mounted() {
        this.setTime();

    },
    methods:{
        log(){
            console.log(this.form.user_answers)
        },
        showQuestion(){
            this.show_all_questions =true 
        },
        hideQuestion(){
            this.show_all_questions =false
        },

        forceRerender() {
            // Remove my-component from the DOM
            this.renderComponent = false;

            this.$nextTick(() => {
                // Add the component back in
                this.renderComponent = true;

            });
        },

        // changeTrueFalse(question_index,index,value){
        //
     
        //     console.log(question_index+' && '+index+' && '+value);
        //
        // },
        setTime(){
            clearInterval(intervalTimer);
            this.timer(this.seconds);

        },

        timer() {
            const seconds = this.seconds
            const now = Date.now();
            const end = now + seconds * 1000;
            this.displayTimeLeft(seconds);

            this.selectedTime = seconds;
            // this.initialTime = seconds;
            this.displayEndTime(end);
            this.countdown(end);
        },

        countdown(end) {
            // this.initialTime = this.selectedTime;
            intervalTimer = setInterval(() => {
                const secondsLeft = Math.round((end - Date.now()) / 1000);
                //     console.log(secondsLeft)
                if(secondsLeft === 0) {
                    this.endTime = 0;
                }

                if(secondsLeft < 0) {
                    clearInterval(intervalTimer);
                    this.submitAnswer();
                    return;
                }
                this.displayTimeLeft(secondsLeft)
            }, 1000);
        },
        displayTimeLeft(secondsLeft) {
            const minutes = Math.floor(secondsLeft / 60);
            //   console.log(minutes)
            const hour =  Math.floor(minutes / 60);

            this.timeLeft = `${zeroPadded(hourConvert(hour))}:${zeroPadded(minuteConvert(minutes))}:${zeroPadded(secondConvert(secondsLeft))}`;
        },

        displayEndTime(timestamp) {
            const end = new Date(timestamp);
            const hour = end.getHours();
            const minutes = end.getMinutes();
            const seconds = end.getSeconds();
            console.log()

            this.endTime = `${zeroPadded(hour)}:${zeroPadded(minutes)}:${zeroPadded(seconds)}`;
        },



        previousClicked(){
            this.active_index--;
        },
        nextClicked(){
            this.active_index++;
        },
        selectActiveQuestion(index){
            this.active_index=index;
        },

        submitAnswer(){
            this.isDone = false
         

            axios.post('/api/exam/'+this.exam_id+'/submit', this.form)
                .then((response) =>{
                         this.total_marks = response.data.total_marks;
                         this.exam_id = response.data.exam_id
                         this.gain_marks = response.data.total_gain_marks;
                         this.wrong_ans = response.data.total_wrong;
                         this.correct_ans = response.data.total_correct;
                         // this.forceRerender();
                         this.showModal();



                });

        },
        showModal(){
            this.$refs.modal.classList.add('show_tork_modal')
        },
        closeModal(event){
            event.target.classList.remove('show_tork_modal')
        }








    },

}
function zeroPadded(num) {
    // 4 --> 04
    return num < 10 ? `0${num}` : num;
}

function hourConvert(hour) {
    // 15 --> 3
    return (hour % 12);
}

function minuteConvert(minutes) {
    return (minutes % 60) || 60;
}

function secondConvert(seconds) {
    return (seconds % 60);
}

</script>

<style scoped src='../../../../public/dashboard/css/style.css'>

@import url('../../../../public/dashboard/icons/icons.css');
@import '../../../../public/dashboard/css/style.scss';
</style>

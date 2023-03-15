<template>

    <div class="tork-col-md-4">
        <div class="upcoming_notice tork-mt-md-3 tork-mt-4 tork-card">
            <h3>Upcoming Class</h3>


            <div v-for="(upcoming_class, index) in upcoming_classes" :key="upcoming_class.id"
                 class="notice_info tork-mt-4">
                <p>{{ upcoming_class.course_title }} | {{ upcoming_class.subject_title }}</p>
                <h4>{{ upcoming_class.title }}</h4>
                <div class="time_btn tork-d-flex tork-justify-c-space-between tork-items-center">
                    <p><span class="icon-clock"></span> {{ upcoming_class.date }}</p>
                    <router-link :to="{name:'WatchClass',params:{id:upcoming_class.id}}"
                                 class="tork-btn tork-btn-primary tork-rounded-pill">Go to Class
                    </router-link>
                </div>
            </div>

        </div>
        <div class="upcoming_notice tork-mt-md-3 tork-mt-4 tork-card">
            <h3>Upcoming Exam</h3>
            <div class="notice_info tork-mt-4" v-for="(exam, index) in upcoming_exam" :key="exam.id">
                <p>{{ exam.subject_name }} | {{ exam.chapter }}</p>
                <h4>{{exam.title}}</h4>
                <div class="time_btn tork-d-flex tork-justify-c-space-between tork-items-center">
                    <p><span class="icon-clock"></span> {{ exam.date }}</p>
                    <a class="tork-btn tork-btn-primary tork-rounded-pill" href="#">Go to Exam</a>
                </div>
            </div>

        </div>
    </div>

</template>


<script>
export default {
    mounted() {
        axios.get('/api/classes')
            .then((response) => {
                this.upcoming_classes = response.data.previous_classes
            })
            .catch();

        axios.get('/api/exams')
        .then((response)=>{
            this.upcoming_exam = response.data.upcoming_exams
        })
            .catch();


    },
    data() {
        return {
            upcoming_classes: [],
            upcoming_exam:[],
        }
    }
}
</script>

<style scoped src='../../../../public/dashboard/css/style.css'>

@import url('../../../../public/dashboard/icons/icons.css');
@import '../../../../public/dashboard/css/style.scss';
</style>

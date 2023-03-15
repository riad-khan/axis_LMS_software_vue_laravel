<template>
    <div>
<!--        <router-view></router-view>-->
        <home v-if="!['login','sign_up','payment','zoom_live','home','courses','all_schedule','schedules','classes','WatchClass','notices','notice','course_preview','class_resources','class_resources','exams','exam','single_exam','complain','results','exam_results','result','profile','overAllResult','course_details','membership','about_us','all_courses','privacy_policy','contact_us','check_out','course_preview','index','print_result'].includes($route.name)" ></home>
        <router-view ></router-view>


    </div>
</template>

<script>
export default {
    name: "app.vue"
}
</script>

<style scoped>

</style>

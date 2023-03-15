const login = require('./components/dashboard/auth/login').default;
const  home = require('./components/dashboard/home').default;
const logout = require('./components/dashboard/auth/logout').default;
const courses = require('./components/dashboard/courses').default;
const schedule = require('./components/dashboard/schedule').default;
const classes = require('./components/dashboard/classes').default;
const watch_class = require('./components/dashboard/watch-class').default;
const notice = require('./components/dashboard/notice').default;
const class_resources = require('./components/dashboard/resources').default;
const exams  = require('./components/dashboard/exams').default;
const single_exam  = require('./components/dashboard/single-exam').default;
const complain  = require('./components/dashboard/complain-box').default;
const exam_result = require('./components/dashboard/result-list').default;
const result = require('./components/dashboard/result').default;
const profile = require('./components/dashboard/profile').default
const overAllResult = require('./components/dashboard/overall-result').default;
const sign_up = require('./components/dashboard/auth/sign-up').default;
const index = require('./components/user/index').default;
const course_details = require('./components/user/pages/course_details').default;
const  membership = require('./components/user/pages/membership-form').default;
const about_us = require('./components/user/pages/about-us').default;
const all_courses = require('./components/user/pages/all-courses').default;
const privacy_policy = require('./components/user/pages/privacy-policy').default;
const contact_us = require('./components/user/pages/contact-us').default;
const check_out = require('./components/user/pages/check-out.vue').default;
const course_preview = require('./components/dashboard/course-preview').default;
const print_result = require('./components/dashboard/print_result').default;
const zoom_live = require('./components/dashboard/Join-Class.vue').default;
const payment = require('./components/user/pages/payment.vue').default;


export const routes = [

    { path: '/auth/login', component:login, name: 'login' },
    { path: '/auth/sign-up', component:sign_up, name: 'sign_up' },
    { path: '/home', component:home, name: 'home' },
    { path: '/logout', component:logout, name: 'logout' },
    { path: '/courses', component:courses, name: 'courses' },
    { path: '/all-schedules', component:schedule, name: 'all_schedule' },
    { path: '/schedules/:id', component:schedule, name: 'schedules' },
    { path: '/classes', component:classes, name: 'classes' },
    { path: '/watch-class/:id', component:watch_class, name: 'WatchClass' },
    { path: '/notices', component:notice, name: 'notices' },
    { path: '/notice/:id', component:notice, name: 'notice' },
    { path: '/class-resources/:id', component:class_resources, name: 'class_resources' },
    { path: '/resources', component:class_resources, name: 'class_resources' },
    { path: '/all-exams', component:exams, name: 'exams' },
    { path: '/exams/:id', component:exams, name: 'exam' },
    { path: '/single-exam/:id', component:single_exam, name: 'single_exam' },
    { path: '/complain-box', component:complain, name: 'complain' },
    { path: '/results', component:exam_result, name: 'results' },
    { path: '/exam-results/:id', component:exam_result, name: 'exam_results' },
    { path: '/result/:id', component:result, name: 'result' },
    { path: '/profile', component:profile, name: 'profile' },
    { path: '/join-class', component:zoom_live, name: 'zoom_live' },
    { path: '/payments', component:payment, name: 'payment' },
    
    { path: '/overall-result/:id', component:overAllResult, name: 'overAllResult' },

    { path: '/course-details/:id', component:course_details, name: 'course_details' },
    { path: '/application-form', component:membership, name: 'membership' },
    { path: '/about-us', component:about_us, name: 'about_us' },
    { path: '/all-courses', component:all_courses, name: 'all_courses' },
    { path: '/privacy-policy', component:privacy_policy, name: 'privacy_policy' },
    { path: '/contact-us', component:contact_us, name: 'contact_us' },
    { path: '/check-out', component:check_out, name: 'check_out' },
    { path: '/print-result/:id', component:print_result, name: 'print_result' },
    { path: '/course-preview/:id', component:course_preview, name: 'course_preview' },






]

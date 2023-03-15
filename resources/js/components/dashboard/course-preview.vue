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
                            <h2>Course Peripherals</h2>
                            <button id="togglerBtn" class="toggler tork-btn">
                                <span class="icon-th-menu"></span>
                            </button>
                        </div>
                        <div class="tork-d-flex tork-justify-c-space-between tork-flex-wrap">
                            <div class="search_input">
                                <input class="tork-form-control" placeholder="Search Here" type="text">
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
                                <div class="tork-card tork-mt-5">
                                    <h3>Resources</h3>
                                    <div class="tork-card resources_item">
                                        <div
                                            class="tork-d-flex tork-justify-c-lg-space-between tork-justify-c-center tork-flex-wrap tork-items-center">
                                            <h4>All Course Related Resources Are Here</h4>
                                            <div class="download_box tork-d-flex tork-justify-c-space-between">
                                                <router-link :to="{name:'class_resources',params:{id:id}}"
                                                             class="tork-btn tork-btn-primary tork-rounded-pill"
                                                             style="float: right;">View Resources
                                                </router-link>

                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="tork-card tork-mt-5">
                                    <h3>Exams</h3>
                                    <div class="tork-card resources_item">
                                        <div
                                            class="tork-d-flex tork-justify-c-lg-space-between tork-justify-c-center tork-flex-wrap tork-items-center">
                                            <h4>All Course Related Exams Are Here</h4>
                                            <div class="download_box tork-d-flex tork-justify-c-space-between">
                                                <router-link :to="{name:'exam',params:{id:id}}"
                                                             class="tork-btn tork-btn-primary tork-rounded-pill"
                                                             style="float: right;">View Exams
                                                </router-link>

                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="tork-card tork-mt-5">
                                    <h3>Notices</h3>
                                    <div class="tork-card resources_item">
                                        <div
                                            class="tork-d-flex tork-justify-c-lg-space-between tork-justify-c-center tork-flex-wrap tork-items-center">
                                            <h4>All Course Related Notice Are Here</h4>
                                            <div class="download_box tork-d-flex tork-justify-c-space-between">
                                                <router-link :to="{name:'notice',params:{id:id}}"
                                                             class="tork-btn tork-btn-primary tork-rounded-pill"
                                                             style="float: right;">View Notice
                                                </router-link>

                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="tork-card tork-mt-5">
                                    <h3>Schedules</h3>
                                    <div class="tork-card resources_item">
                                        <div
                                            class="tork-d-flex tork-justify-c-lg-space-between tork-justify-c-center tork-flex-wrap tork-items-center">
                                            <h4>All Course Related Schedules Are Here</h4>
                                            <div class="download_box tork-d-flex tork-justify-c-space-between">
                                                <router-link :to="{name:'schedules',params:{id:id}}"
                                                             class="tork-btn tork-btn-primary tork-rounded-pill"
                                                             style="float: right;">View Schedules
                                                </router-link>

                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="tork-card tork-mt-5">
                                    <h3>Results</h3>
                                    <div class="tork-card resources_item">
                                        <div
                                            class="tork-d-flex tork-justify-c-lg-space-between tork-justify-c-center tork-flex-wrap tork-items-center">
                                            <h4>All Course Related Results Are Here</h4>
                                            <div class="download_box tork-d-flex tork-justify-c-space-between">
                                                <router-link :to="{name:'exam_results',params:{id:id}}"
                                                             class="tork-btn tork-btn-primary tork-rounded-pill"
                                                             style="float: right;">View Schedules
                                                </router-link>

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
        if (!User.loggedIn()) {
            this.$router.push('/auth/login')
        }
        const id = this.$route.params.id

        this.id = id
        this.upComingClasses();

    },
    data() {
        return {
            id: 0,
        }
    }

}
</script>

<style scoped src='../../../../public/dashboard/css/style.css'>

@import url('../../../../public/dashboard/icons/icons.css');
@import '../../../../public/dashboard/css/style.scss';
</style>


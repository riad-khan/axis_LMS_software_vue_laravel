<template>
    <div>

        <main>
            <!-- Page Header -->
            <section class="page_header">
                <div class="tork-container">
                    <div class="page_heading">
                        <h2 class="tork-mb-1">Application Form</h2>
                        <span>Home / Application Form</span>
                    </div>
                </div>
            </section>
            <!-- End: Page Header -->

            <!-- Form Steps -->
            <section class="form_nav_section tork-position-relative">
                <div class="tork-container">
                    <div class="tork-row">
                        <div class="tork-col-12">
                            <ul class="steps">
                                <li class="personal_info active">Personal Details</li>
                                <li ref="edu_details" class="edu_details ">Education Details</li>
                                <li ref="additonal_details" class="additonal_details">Additional Details</li>
                                <li ref="complete" class="complete">Complete</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="circle_1"></div>
                <div class="circle_2"></div>
            </section>
            <!-- End: Form Steps -->

            <!-- Form -->
            <section class="form_section tork-position-relative">
                <div class="tork-container">
                    <div class="tork-row">
                        <div class="tork-col-lg-8">
                            <form @submit.prevent="memberShipSubmit">
                                <!-- Step one: Personal info -->
                                <div id="personalInfo" ref="personal_info" class="personal_info">
                                    <div class="tork-row">
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="cName">Course Name</label>
                                                <input id="cName" v-model="form.course_name" class="tork-form-control"
                                                       type="text">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="subject">Subject</label>
                                                <input id="subject" v-model="form.subject" class="tork-form-control"
                                                       type="text">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="dName">Doctor's Name</label>
                                                <input id="dName" v-model="form.doctors_name" class="tork-form-control"
                                                       type="text">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="bmdcNo">BMDC No</label>
                                                <input id="bmdcNo" v-model="form.bmdc_no" class="tork-form-control"
                                                       type="text">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="medicalCollege">Medical College</label>
                                                <input id="medicalCollege" v-model="form.medical_college"
                                                       class="tork-form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="session">Session</label>
                                                <input id="session" class="tork-form-control" v-model="form.year"
                                                       type="text">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="jobDescr">Job Description</label>
                                                <input id="jobDescr" class="tork-form-control"
                                                       v-model="form.job_description" type="text">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="contact">Contact Number</label>
                                                <input id="contact" v-model="form.contact_number"
                                                       class="tork-form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="fName">Father's Name</label>
                                                <input id="fName" v-model="form.fathers_name" class="tork-form-control"
                                                       type="text">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="fprof">Father’s Profession</label>
                                                <input id="fprof" v-model="form.fathers_profession"
                                                       class="tork-form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="mName">Mother's Name</label>
                                                <input id="mName" v-model="form.mothers_name" class="tork-form-control"
                                                       type="text">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="name">Mother’s Profession</label>
                                                <input id="name" v-model="form.mothers_profession"
                                                       class="tork-form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="sName">Spouse Name</label>
                                                <input id="sName" v-model="form.spouse_name" class="tork-form-control"
                                                       type="text">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="sProf">Spouse Profession</label>
                                                <input id="sProf" v-model="form.spouse_profession"
                                                       class="tork-form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="email">Email Address</label>
                                                <input id="email" v-model="form.email" class="tork-form-control"
                                                       type="email">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="facebookId">Facebook ID</label>
                                                <input id="facebookId" v-model="form.facebook_id"
                                                       class="tork-form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="name">Important Contact</label>
                                                <input id="name" v-model="form.important_contact"
                                                       class="tork-form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="name">Relation</label>
                                                <input id="name" v-model="form.relation" class="tork-form-control"
                                                       type="text">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-12">
                                            <div class="form_group tork-mt-4">
                                                <label for="mAddress">Mailing Address</label>
                                                <textarea id="mAddress" v-model="form.mailing_address"
                                                          class="tork-form-control" cols="30"
                                                          rows="1"></textarea>
                                            </div>
                                        </div>
                                        <div class="tork-col-md-12">
                                            <a class="next_btn tork-btn tork-btn-primary tork-mt-4"
                                               href="javascript:void(0)"
                                               @click="showEducation">Next</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End: Step one: Personal info -->

                                <!-- Eductional Details -->
                                <div id="eduDetails" ref="eduDetails" class="eductional_details">
                                    <div class="tork-row">
                                        <!-- HSC Result -->
                                        <div class="tork-col-md-12">
                                            <h3>HSC Result</h3>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="instituteName">Institute Name</label>
                                                <input id="instituteName" v-model="form.institute_name"
                                                       class="tork-form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="result">Result Name (GPA)</label>
                                                <input id="result" v-model="form.result_name" class="tork-form-control"
                                                       type="text">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="passingYear">Passing Year</label>
                                                <input id="passingYear" v-model="form.passing_year"
                                                       class="tork-form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="eduBoad">Education Boad</label>
                                                <input id="eduBoad" v-model="form.education_board"
                                                       class="tork-form-control" type="text">
                                            </div>
                                        </div>

                                        <!-- MBBS Result -->
                                        <div class="tork-col-md-12">
                                            <h3 class="tork-mt-5">MBBS Result</h3>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="instituteName">Institute Name</label>
                                                <input id="instituteName" v-model="form.mbbs_institute_name"
                                                       class="tork-form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="result">Result Name</label>
                                                <input id="result" v-model="form.mbbs_result_name"
                                                       class="tork-form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="passingYear">Passing Year</label>
                                                <input id="passingYear" v-model="form.mbbs_passing_year"
                                                       class="tork-form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="eduBoad">Education Boad</label>
                                                <input id="eduBoad" v-model="form.mbbs_education_board"
                                                       class="tork-form-control" type="text">
                                            </div>
                                        </div>

                                        <!-- FCPS-P-I/MD/M.Phil/Diploma Result -->
                                        <div class="tork-col-md-12">
                                            <h3 class="tork-mt-5">FCPS-P-I/MD/M.Phil/Diploma</h3>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="instituteName">Institute Name</label>
                                                <input id="instituteName" v-model="form.fcps_institute_name"
                                                       class="tork-form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="result">Result Name</label>
                                                <input id="result" class="tork-form-control" type="text"
                                                       v-model="form.fcps_result_name">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="passingYear">Passing Year</label>
                                                <input id="passingYear" class="tork-form-control" type="text"
                                                       v-model="form.fcps_passing_year">
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label for="eduBoad">Education Boad</label>
                                                <input id="eduBoad" class="tork-form-control"
                                                       v-model="form.fcps_education_board" type="text">
                                            </div>
                                        </div>

                                        <!-- Next Button -->
                                        <div class="tork-col-md-12">
                                            <a class="next_btn tork-btn tork-btn-primary tork-mt-4"
                                               href="javascript:void(0)"
                                               @click="showAdditional">Next</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End: Eductional Details -->

                                <!-- Additional Details -->
                                <div id="additionalDatails" ref="additionalDetails"
                                     class="addition_details tork-d-none">
                                    <div class="tork-row">
                                        <!-- How did you hear about us -->
                                        <div class="tork-col-md-12">
                                            <h3 class="tork-text-capitalize">How did you hear about us?</h3>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label class="tork-checkbox">Facebook/ Online
                                                    <input type="checkbox" value="facebook"
                                                           v-model="form.hearing_source">
                                                    <span class="tork-checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label class="tork-checkbox">Poster/ Leaflet
                                                    <input type="checkbox" value="poster" v-model="form.hearing_source">
                                                    <span class="tork-checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label class="tork-checkbox" value="through a mentor"
                                                       v-model="form.hearing_source">Through a Mentor
                                                    <input type="checkbox">
                                                    <span class="tork-checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label class="tork-checkbox" value="through a student"
                                                       v-model="form.hearing_source">Through a Student
                                                    <input type="checkbox">
                                                    <span class="tork-checkmark"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Were you enrolled in our any Course Previewsly?  -->
                                        <div class="tork-col-md-12">
                                            <h3 class="tork-text-capitalize tork-mt-5">Were you enrolled in our any
                                                Course Previewsly?</h3>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label class="tork-checkbox">Yes
                                                    <input type="checkbox" value="1" v-model="form.enrolled_courses">
                                                    <span class="tork-checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label class="tork-checkbox">No
                                                    <input type="checkbox" v-model="form.enrolled_courses" value="0">
                                                    <span class="tork-checkmark"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Have you joined our facebook group ?-->
                                        <div class="tork-col-md-12">
                                            <h3 class="tork-text-capitalize tork-mt-5">Have you joined our facebook
                                                group?</h3>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label class="tork-checkbox">Yes
                                                    <input type="radio" name="join_fb" v-model="form.join" value="1">
                                                    <span class="tork-checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="tork-col-md-6">
                                            <div class="form_group tork-mt-4">
                                                <label class="tork-checkbox">No
                                                    <input type="radio" v-model="form.join" name="join_fb" value="0">
                                                    <span class="tork-checkmark"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Next Button -->
                                        <div class="tork-col-md-12">
                                            <a class="next_btn tork-btn tork-btn-primary tork-mt-4"
                                               href="javascript:void(0)"
                                               @click="showComplete">Next</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End: Additional Details -->

                                <!-- Complete  -->
                                <div id="showComplete" ref="showComplete" class="complete_form">
                                    <!-- Upload Image -->
                                    <div class="tork-col-md-12">
                                        <div class="student_img tork-mt-3">
                                            <img :src="form.photo" id="studentImg" alt="Upload 250 X 250"/>
                                        </div>
                                        <div class="tork-file-input">
                                            <input id="file" class="tork-form-control " @change="onFileSelected"
                                                   type="file">
                                            <label for="file">Browse</label>
                                        </div>
                                    </div>

                                    <div class="tork-col-md-6">
                                        <div class="form_group tork-mt-5">
                                            <label class="tork-checkbox">I agree with all <a href="privacy-policy.html"><strong
                                                class="tork-text-primary">Terms and Conditions</strong></a>
                                                <input type="checkbox">
                                                <span class="tork-checkmark"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Submit button -->
                                    <div class="tork-col-md-12">
                                        <button class="next_btn tork-btn tork-btn-primary tork-mt-4" type="submit">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                                <!-- End: Complete  -->
                            </form>
                        </div>

                        <!-- Right sidebar FAQ -->
                        <div class="tork-col-lg-4">
                            <div class="faq_box">
                                <h3>FAQ</h3>
                                <!-- Item -->
                                <div class="question_item">
                                    <h4><strong>Q.</strong> What is Lorem Ipsum?</h4>
                                    <p>
                                        <strong>A.</strong>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                        1500s,
                                    </p>
                                </div>
                                <!-- item -->
                                <div class="question_item">
                                    <h4><strong>Q.</strong> What is Lorem Ipsum?</h4>
                                    <p>
                                        <strong>A.</strong>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                        1500s,
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="circle_1"></div>
                <div class="circle_2"></div>
            </section>
            <!-- End: Form -->


        </main>
        <!-- Footer section -->



    </div>
</template>

<script>

export default {

    created() {
        if (!User.loggedIn()) {
            this.$router.push('/auth/login')
        }
    },
    data() {
        return {
            form: {
                course_name: '',
                subject: '',
                doctors_name: '',
                bmdc_no: '',
                medical_college: '',
                year: '',
                job_description: '',
                contact_number: '',
                fathers_name: '',
                fathers_profession: '',
                mothers_name: '',
                mothers_profession: '',
                spouse_name: '',
                spouse_profession: '',
                email: '',
                facebook_id: '',
                important_contact: '',
                relation: '',
                mailing_address: '',
                institute_name: '',
                result_name: '',
                passing_year: '',
                education_board: '',
                mbbs_education_board: '',
                mbbs_institute_name: '',
                mbbs_passing_year: '',
                mbbs_result_name: '',
                fcps_education_board: '',
                fcps_institute_name: '',
                fcps_passing_year: '',
                fcps_result_name: '',
                hearing_source:'',
                enrolled_courses:'',
                join:'',
                photo: null,
            }

        }
    },
    methods: {
        onFileSelected(event) {
            let file = event.target.files[0];
            if (file.size > 1048770) {
                Toast.fire({
                    icon: 'error',
                    title: 'Photos bellow 1MB are allowed to Upload'
                })
            } else {
                let reader = new FileReader();
                reader.onload = event => {
                    this.form.photo = event.target.result
                };
                reader.readAsDataURL(file);
            }
        },
        showEducation() {
            this.$refs.personal_info.style.display = 'none'
            this.$refs.eduDetails.style.display = 'block'
            this.$refs.edu_details.classList.add('active')
        },
        showAdditional() {
            this.$refs.eduDetails.style.display = 'none'
            this.$refs.additionalDetails.setAttribute('style', 'display:block !important')
            this.$refs.additonal_details.classList.add('active')

        },
        showComplete() {
            this.$refs.additionalDetails.style.display = 'none'
            this.$refs.showComplete.setAttribute('style', 'display:block !important')
            this.$refs.complete.classList.add('active');
        },
        memberShipSubmit() {
           axios.post('/api/submitApplicationDetails',this.form)
            .then((response)=>{
                Toast.fire({
                    icon: 'success',
                    title: 'Form Submitted Successfully'
                })
            })
        }

    }
}
</script>

<style scoped src='../../../../../public/dashboard/css/main.css'>

@import url('../../../../../public/dashboard/icons/icons.css');

</style>

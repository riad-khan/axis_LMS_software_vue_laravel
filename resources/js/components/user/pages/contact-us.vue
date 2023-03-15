<template>
    <div>

        <main>
            <!-- Page Header -->
            <section class="page_header">
                <div class="tork-container">
                    <div class="page_heading">
                        <h2 class="tork-mb-1">Contact</h2>
                        <span>Home / Contact</span>
                    </div>
                </div>
            </section>
            <!-- End: Page Header -->

            <!-- Privacy policy -->
            <section class="contact_section tork-position-relative">
                <div class="tork-container">
                    <div class="tork-row">
                        <div class="tork-col-md-6">
                            <h3>Where does it come from?</h3>
                            <p class="tork-mb-5">
                                It is a long established fact that a reader will be distracted by the readable content of a
                                page when looking at its layout. The point of using Lorem Ipsum is that it has a
                                more-or-less normal.
                            </p>

                            <div class="tork-row">
                                <div class="tork-col-md-6">
                                    <div class="contact_info">
                                        <span class="icon-map-marker-alt"></span>
                                        <p><strong>Address</strong> <br>
                                            {{ street_address }} <br>
                                            {{ city_address }}
                                        </p>
                                    </div>
                                </div>
                                <div class="tork-col-md-6">
                                    <div class="contact_info">
                                        <span class="icon-clock"></span>
                                        <p><strong>Opening Hours</strong>  </p>

                                        <p v-for="(hour , index) in opening_hours">{{ hour.time }}</p>

                                    </div>
                                </div>
                                <div class="tork-col-md-6">
                                    <div class="contact_info">
                                        <span class="icon-envelope"></span>
                                        <p><strong>Email Address</strong> </p>
                                        <p v-for="(email , index) in email_addresses">{{ email.email }}</p>
                                    </div>
                                </div>
                                <div class="tork-col-md-6">
                                    <div class="contact_info">
                                        <span class="icon-phone"></span>
                                        <p><strong>Contact Number</strong></p>

                                        <p v-for="(number , index) in contact_numbers">{{ number.number }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tork-col-md-6">
                            <div class="contact_form">
                                <div class="form_heading">
                                    <h3>Drop Us a Line</h3>
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page.</p>
                                </div>
                                <form action="" enctype="multipart/form-data" @submit.prevent="submitMessage" >
                                    <div class="form_group tork-mt-4">
                                        <label for="eduBoad">Your Name</label>
                                        <input type="text" v-model="form.name" id="eduBoad" class="tork-form-control">
                                    </div>
                                    <div class="form_group tork-mt-4">
                                        <label for="eduBoad">Email</label>
                                        <input type="email" v-model="form.email" id="eduBoad" class="tork-form-control">
                                    </div>
                                    <div class="form_group tork-mt-4">
                                        <label for="mAddress">Message</label>
                                        <textarea id="mAddress" v-model="form.message" class="tork-form-control" cols="30"
                                                  rows="2"></textarea>
                                    </div>
                                    <div class="button">
                                        <button type="submit" class="sent_btn tork-btn">Send Message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="circle_1"></div>
                <div class="circle_2"></div>
            </section>
            <!-- End: Privecy policy -->

            <!-- Google map -->
            <section class="google_map">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.0780974080035!2d90.38991961499306!3d23.744594294915032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8be76cb0a87%3A0xab2f4982309cbb28!2sDilara%20Tower%2C%20Sonargaon%20Road%2C%20Dhaka%201205!5e0!3m2!1sen!2sbd!4v1620202814999!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </section>


        </main>
        <!-- Footer section -->

    </div>
</template>

<script>
export default {
    created(){
        axios.get('/api/contactDetails')
        .then((response)=>{
            //
        })
        .catch()
    },
    data(){
        return{
            street_address:'demo heist street',
            city_address:'dhaka,bangladesh',
            opening_hours:[{time:'Monday - Friday 10am to 3pm'},{time:'Satuday - Sunday 2pm to 9am'}],
            email_addresses:[{email:'demo@email.com'},{email:'demo@email.com'}],
            contact_numbers:[{number:'01564236984'},{number: '01789645426'}],
            form:{
                name:'',
                email:'',
                message:'',
            }

        }
    },
    methods:{
        submitMessage(){
            axios.post('/api/message',this.form)
                .then(()=>{
                    //
                })
                .catch()
        }
    }
}
</script>

<style scoped src='../../../../../public/dashboard/css/main.css'>

@import url('../../../../../public/dashboard/icons/icons.css');

</style>

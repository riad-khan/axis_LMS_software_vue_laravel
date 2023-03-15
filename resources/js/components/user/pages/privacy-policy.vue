<template>
    <div>

        <main>
            <!-- Page Header -->
            <section class="page_header">
                <div class="tork-container">
                    <div class="page_heading">
                        <h2 class="tork-mb-1">Privecy Policy</h2>
                        <span>Home / Privecy Policy</span>
                    </div>
                </div>
            </section>
            <!-- End: Page Header -->

            <!-- Privacy policy -->
            <section class="privacy_policy tork-position-relative">
                <div class="tork-container">
                    <p> {{ privacy_title }}</p>

                    <div class="benifits">
                        <h3>Benifits:</h3>
                        <ul v-for="(benifit, index) in benifits">
                            <li><span>&#10148;</span> {{benifit.title}}</li>

                        </ul>
                    </div>

                    <p> {{ description }}</p>


                </div>
                <div class="circle_1"></div>
                <div class="circle_2"></div>
            </section>
            <!-- End: Privecy policy -->


        </main>
        <!-- Footer section -->

    </div>
</template>

<script>
export default {
    created() {
        axios.get('/api/privacyPolicies')
        .then((response)=>{
            console.log('data needed')
        })
    },
    data(){
        return{
            privacy_title:'this is privacy title',
            benifits:[{title:'benifit 1'}, {title:'benifit 2'}],
            description:'dummy description',
        }
    }
}
</script>

<style scoped src='../../../../../public/dashboard/css/main.css'>

@import url('../../../../../public/dashboard/icons/icons.css');

</style>

<template>
<div>

</div>

     <!-- <button @click="startMeeting">Join Meeting</button> -->
</template>

<script>



 import { ZoomMtg } from "../../../../node_modules/@zoomus/websdk";
export default{
  
   
  created () {
    ZoomMtg.setZoomJSLib('https://source.zoom.us/1.9.5/lib', '/av');
    ZoomMtg.preLoadWasm();
    ZoomMtg.prepareJssdk();
    this.startMeeting();
  },
  mounted() {
    ZoomMtg.inMeetingServiceListener("onUserJoin", (data) => {
      console.log("inMeetingServiceListener onUserJoin", data);
    });

  },
  data () {
    return {
      apiKey: "wuG25BXKSt6X33HXGk_d-A",
      leaveUrl: "http://localhost:8080",
      meetingNumber: "8131951687",
      passWord: "2i6Zsi",
      role: 1,
      signatureEndpoint: "http://localhost:4000",
      userEmail: "",
      userName: "Vue.js"
    }
  },
  methods: {
    startMeeting() {
      var signature='d3VHMjVCWEtTdDZYMzNIWEdrX2QtQS44MTMxOTUxNjg3LjE2MjI2NDQ1MTgwMDAuMC5POXJabE1mclE2dms3eHFDZ0hBdWNFR3pxa2JDVXJHRStrd1ZVNGZ3Nk9rPQ';
      document.getElementById("zmmtg-root").style.display = "block";

     ZoomMtg.init({
        leaveUrl: this.leaveUrl,
        isSupportAV: false,
        success: (success) => {
          console.log(success);
          ZoomMtg.join({
            meetingNumber: this.meetingNumber,
            userName: this.userName,
            signature: signature,
            apiKey: this.apiKey,
            userEmail: this.userEmail,
            passWord: this.passWord,
            success: (success) => {
              console.log(success);
            },
            error: (error) => {
              console.log(error);
            }
          });
        },
        error: (error) => {
          console.log(error);
        }
      });
    }
  }
}
</script>


<style scoped>

body {
    /* display: none !important; */
  overflow: hidden !important;
}
#zmmtg-root {
  display: block;
}
</style>
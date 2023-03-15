<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatorkble" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initorkal-scale=1.0" />
    <title>Axis Learning Management System</title>
    <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap"
    
    rel="stylesheet" />
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
    <link rel="stylesheet" href="{{asset('/dashboard/icons/icons.css')}}">
     <link rel="stylesheet" href="{{asset('/zoom/design-issues.css')}}">


<style>

body {
  font-family: "Montserrat", sans-serif;
  font-size: 0.875rem;
  font-weight: 400;
  color: #374a5e;
  line-height: 1.4;
}
</style>
</head>

<body>
<div id="app">

 <header-menu v-if="!['login','zoom_live','payment','sign_up','home','courses','all_schedule','schedules','classes','WatchClass','notices','notice','course_preview','class_resources','class_resources','exams','exam','single_exam','complain','results','exam_results','result','profile','overAllResult','print_result'].includes($route.name)"></header-menu>
    <app></app>
    <footer-part v-if="!['login','zoom_live','payment','sign_up','home','courses','all_schedule','schedules','classes','WatchClass','notices','notice','course_preview','class_resources','class_resources','exams','exam','single_exam','complain','results','exam_results','result','profile','overAllResult','print_result'].includes($route.name)"></footer-part>

</div>
<script src="{{asset('js/app.js')}}"></script>
   <script src="{{asset('./dashboard/js/plugins/tork/tork_progress_bar.js')}}"></script>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
{{--<script src="{{asset('./dashboard/js/layout.js')}}"></script>--}}
<script src="{{asset('./dashboard/js/main.js')}}"></script>
<script src="{{asset('./dashboard/js/sections/course.js')}}"></script>
{{--<script src="{{asset('./dashboard/js/sections/watching-class.js')}}"></script>--}}

<script src="{{asset('./dashboard/js/sections/notice.js')}}"></script>
<script src="{{asset('./dashboard/js/plugins/tork/tork-custom-selectbox.js')}}"></script>
<script src="{{asset('./dashboard/js/plugins/tork/tork_modal_popup.js')}}"></script>
<script src="{{asset('./vendors/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('./vendors/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('./dashboard/js/home.js')}}"></script>

<script>
   
   // window.location.reload();

   // window.onhashchange = function() {
   //       alert('test');
   // }

  
</script>


</body>

</html>

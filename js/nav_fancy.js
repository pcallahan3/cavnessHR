$(document).ready(function()
{
   if ($(location).attr('pathname') == '/webSite/') {
        $('#homelink').addClass('current');
   }
   if ($(location).attr('pathname') == '/webSite/services') {
        $('#serviceslink').addClass('current');
   }
   if ($(location).attr('pathname') == '/webSite/about') {
        $('#aboutlink').addClass('current');
   }
   if ($(location).attr('pathname') == '/webSite/contact') {
        $('#contactlink').addClass('current');
   }
});

///* When pushing to live use the below script.  The script above is used to test on a
// * local set up and will not work on the live site.
// *
// * $(document).ready(function()
//{
//   if ($(location).attr('pathname') == '/') {
//        $('#homelink').addClass('current');
//   }
//   if ($(location).attr('pathname') == '/services') {
//        $('#serviceslink').addClass('current');
//   }
//   if ($(location).attr('pathname') == '/about') {
//        $('#aboutlink').addClass('current');
//   }
//   if ($(location).attr('pathname') == '/contact') {
//        $('#contactlink').addClass('current');
//   }
//});
//
// * Test features ->
// * alert($(location).attr('pathname') == '/webSite/'))  <- t/f on page in quotes
// * alert($(location).attr('pathname')) <-findout the path of current page
// *
// * /

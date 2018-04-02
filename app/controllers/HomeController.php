<?php
    
    class HomeController extends Controller {

        function __construct(){
            $this->_f3 = Base::instance();
        }

        function home(){
            $this->loadDefaultView('public/home.html', 'CavnessHR');
        }


        function about(){
            $this->loadDefaultView('public/about.html', 'About');
        }

        function contact(){
            $this->loadDefaultView('public/contact.html', 'Contact Us');
        }

        function services(){
            $this->loadDefaultView('public/services.html', 'What we offer');
        }

        function partners(){
            $this->loadDefaultView('public/partners.html', 'Our Partners');
        }
        
        function emp_book_form(){
            $this->loadDefaultView('public/emp_book_form.html', 'Employee Handbook');
        }

        function ehbTest(){
            $this->loadDefaultView('public/ehb_test.html', 'Employee Handbook Form');
        }

        function podcasts(){
            $this->_f3->set('podcast_source', '//html5-player.libsyn.com/embed/episode/id/5771364/height/90/width/640/theme/custom/autonext/no/thumbnail/yes/autoplay/no/preload/no/no_addthis/no/direction/backward/render-playlist/no/custom-color/87A93A/');
            $this->loadDefaultView('public/podcasts.html', 'Podcasts');
        }
    }
?>

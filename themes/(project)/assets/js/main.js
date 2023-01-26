(function($, root){
    $(function(){
        'use strict'
        
        window.main = {
            init(){
                
                this.matchHeight();
                this.sliders();
                this.events();
                this.navbar();

            },
            events(){
                console.log('-- EVENTS --');
            },
            onLoad(){
                console.log('-- ON LOAD --');

                $('#preloader').addClass('hide');
                setTimeout(function(){
                    $('#preloader').remove();
                }, 1000);
                
                AOS.init({
                    duration: 900,
                    easing: 'ease',
                    offset: 200,
                    once: true
                });

                $('.site-main').css('min-height', $(window).height() - $('.site-navigation').outerHeight() - $('.site-footer').outerHeight());

                
            },
            sliders(){
                console.log('-- SLIDERS --');

            },
            matchHeight(){
                const elements = [
                    { 'querySelector': '.example' },
                ];
                for (let i = 0; i < elements.length; i++) {
                    const byRow = (elements[i].byRow) ? elements[i].byRow : true;
                    $(elements[i].querySelector).matchHeight({byRow: byRow});
                }
            },

            navbar(){

                $(document).scroll(function () {
                    var $nav = $(".navbar");
                    $nav.toggleClass('scrolled', $(this).scrollTop() - 100 > $nav.height());
                });

                $(document).on('click', '.dropdown-toggle', function(){
                    window.location.href = $(this).attr('href');
                });

                $('#mainNavigation .menu-item a').each(function(){
                    const $this = $(this);
                    if(window.location == $this.attr('href')){
                        $this.addClass('current-url');
                    }
                });
            }
        }


        main.init();
        $(window).load(function(){
            main.onLoad();
        });

    });
})(jQuery, this);
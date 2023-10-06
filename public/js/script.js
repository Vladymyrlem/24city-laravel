jQuery.noConflict();
jQuery(window).on('load', function () {

    jQuery('.acf-editor-wrap').prepend('<p class="caption">Напишите что произошло, где, когда это было. В своем сообщении укажите настоящие имена и фамилии, или предоставьте фото документов или писем если речь идет о взаимодействии с органами власти или коммерческими структурами. Если есть видео в текст сообщения вставьте ссылку для размещения видеоматериала. Что бы ускорить процесс проверки сообщите ваш номер меседжера или профиль в соц сети для связи с вами если возникнут дополнительные вопросы</p>');
});
jQuery(document).ready(function ($) {
    // $('#vip').checkToggler({
    //     labelOn:'On',
    //     labelOff:'Off',
    // }).on('click', function () {
    //     let url = "http://bizov.com.ua/vip/";
    //     $(location).attr('href', url);
    // });

    $('li li:has(li)').find('a:first').addClass('arrow');

    $('div.breadcrumbs i.fa.fa-arrow-right:first-child').css('display', 'none');


});
try {
    var el = document.getElementById('menu-left-menu').getElementsByTagName('a');
    var url = document.location.href;
    for (var i = 0; i < el.length; i++) {
        if (url == el[i].href) {
            el[i].className += ' act';
        }
        ;
    }
    ;
} catch (e) {
}

jQuery(document).ready(function ($) {
    $('.toggle-nav').click(function () {
        $("aside#left-main-sidebar").animate({
            width: "toggle"
        });
    });
// Dropdown toggle
    $('.category-toggle-nav').click(function () {
        $(this).next('section.fr-catalog div#primary div.navigation aside.widget-area').toggle();
    });
    $('.copy_link').click(function () {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($('#page-link').text()).select();
        document.execCommand("copy");
        $temp.remove();

        $(this).text('Тест скопирован!');
    });
    var footerHeight, $footer = $('div.footer'),
        $main = $('section#primary');
    $(window).resize(function () {
        // вешаем обработчик на изменение размеров страницы - т.е. если меняется ширина страницы,
        // или высота, даже если в футер кто то потом аяксом что то подгрузит -
        // сработает ресайз и все сам поменяет
        footerHeight = $footer.height('auto').height();
        // важный момент - чтобы "снять" правильную высоту элемента - надо чтобы поток документа сам
        // назначил верную высоту футеру. а для этого сделаем её "auto". даже если забыли/не захотели убрать
        // из стилей жестко прописаную высоту - инлайн стиль перебивает весом, и поэтому высота
        // будет такая "как надо". потом снимаем мерку, и юзаем её
        $main.css({
            'paddingBottom': (footerHeight + 15)
        });
        // не забываем кемел-кейс для значений-через-дефис
        $footer.css({
            'height': footerHeight,
            'marginTop': (footerHeight * -1)
        })
    }).trigger('resize'); // после навешивания обработчиков насильно запускаем первый ресайз
});

function copytext(el) {
    var $tmp = jQuery("<input>");
    jQuery("body").append($tmp);
    $tmp.val(jQuery(el).text()).select();
    document.execCommand("copy");
    $tmp.remove();
}

function sum($url, $id) {
    var counter = 0;

    /* facebook */
    $.getJSON('http://api.facebook.com/restserver.php?method=links.getStats&amp;amp;amp;urls=' + $url + '&amp;amp;amp;callback=?&amp;amp;amp;format=json', function (data) {
        counter = counter + data[0].like_count;
        $('.voices-' + $id).html(counter);
    });

    /* vkontakte */
    $.getJSON('https://api.vkontakte.ru/method/likes.getList?type=sitepage&amp;amp;amp;owner_id=2409412&amp;amp;amp;item_id=' + $id + '&amp;amp;amp;format=json&amp;amp;amp;callback=?', function (data) {
        counter = counter + data.response.count;
        $('.voices-' + $id).html(counter);
    });

    /* twitter */
    $.getJSON('http://urls.api.twitter.com/1/urls/count.json?url=' + $url + '&amp;amp;amp;callback=?', function (data2) {
        counter = counter + data2.count;
        $('.voices-' + $id).html(counter);
    });
}


//var swiper = new Swiper('.swiper-container');
jQuery('.carousel[data-type="multi"] .item').each(function () {
    var next = jQuery(this).next();
    if (!next.length) {
        next = jQuery(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo(jQuery(this));

    for (let i = 0; i < 2; i++) {
        next = next.next();
        if (!next.length) {
            next = jQuery(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));
    }
});
jQuery(document).ready(function ($) {
    // Call the event handler on #text
    jQuery("a.drop-btn, ul.item-menu").hover(function () {
        jQuery(this).parent().find(".item-menu").addClass("hoverstate");

    }, function () {
        jQuery(this).parent().find(".item-menu").removeClass('hoverstate');
    });

    jQuery(".sub-btn").click(function () {
        jQuery(this).parent().find(".sub-menu").addClass("hoverstate");

    }, function () {
        jQuery(this).parent().find(".sub-menu").removeClass('hoverstate');
    });
    jQuery("ul.foot-buttons-group>li.foot-item a").hover(function () {
        jQuery(this).parent().find("div.foot-item-title").addClass("hoverstate");
    }, function () {
        jQuery(this).parent().find("div.foot-item-title").removeClass('hoverstate');

    });
    // if($('li.first').find('ul.sub-menu').length > 0){
    //     $('li.first').find('.sub-btn').addClass('sdsfdfsf');
    // }
    $('li.first').each(function ($) {
        var content = jQuery(this).children('ul.sub-menu');
        jQuery('button.sub-btn', this).click(function () {
            content.slideToggle('slow');
        });
    });
    jQuery.each(jQuery('li.first'), function (idx, ele) {
        if (jQuery(ele).find('ul.sub-menu').length == 0) {
            jQuery(ele).find('.sub-btn').css({"display": "none"});
        }
    });

    jQuery('.foot-modals-group a#btn').click(function () {
        $('ul.foot-buttons-group').slideToggle('slow');
    });
});
jQuery(document).ready(function ($) {
    jQuery(".contests-category-list").collapsorz({
        minimum: 3,
        showText: "Развернуть список >>>",
        hideText: "Свернуть список <<<"
    });
    jQuery("#company-contacts").collapsorz({
        minimum: 1
        , showText: "Показать телефоны"
        , hideText: ""
    });

    jQuery(".company-adr-links").collapsorz({
        minimum: 3,
        showText: "Показать все <i class='fal fa-map-marker-check'></i>",
        hideText: ""
    });
    jQuery(".region-products-list").collapsorz({
        minimum: 3,
        showText: "Показать все <i class='fal fa-map-marker-check'></i>",
        hideText: ""
    });
//     $('#imagemodal').hide();
//     $("div.zoom-in-photo a").click(function() {
//         let src = $(this).parent().parent().find("div.concurs-image img").attr('src');
//         $('.imagepreview').attr('src', src);
//         $('#imagemodal').show();
//     });

    jQuery('.top-news').owlCarousel({
        items: 1,
        dots: false,
        loop: true,
        rewind: false,
        margin: 0,
        // Включаем стандартные кнопки
        nav: true,

        // Можно еще задать тексты кнопок
        navText: [
            '<i class="fas fa-chevron-down"></i>',
            '<i class="fas fa-chevron-up"></i>'
        ],
        autoplay: false,
        autoplayTimeout: 1500,
        autoWidth: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: true
            },
            1000: {
                items: 1,
                nav: true,
                loop: false
            }
        }
    });


});

jQuery(document).ready(function ($) {

    jQuery("#section-ads-list ul").paginathing({
        perPage: 10,
        limitPagination: 5,
        prevNext: true,
        firstLast: true,
        prevText: '<',
        nextText: '>',
        firstText: '<<',
        lastText: '>>',
        activeClass: 'active',
    });
    // jQuery("#companies-list #all-posts").paginathing({
    //     perPage: 10,
    //     limitPagination: 5,
    //     prevNext: true,
    //     firstLast: true,
    //     prevText: '<',
    //     nextText: '>',
    //     firstText: '<<',
    //     lastText: '>>',
    //     activeClass: 'active',
    // });
    jQuery("#company-categories tbody").paginathing({
        perPage: 20,
        limitPagination: 5,
        prevNext: true,
        firstLast: true,
        prevText: '<',
        nextText: '>',
        firstText: '<<',
        lastText: '>>',
        activeClass: 'active',
    });
    jQuery("#main-news-list").paginathing({
        perPage: 10,
        limitPagination: 5,
        prevNext: true,
        firstLast: true,
        prevText: '<',
        nextText: '>',
        firstText: '<<',
        lastText: '>>',
        activeClass: 'active',
    });
    jQuery("#searches-result").paginathing({
        perPage: 8,
        limitPagination: 5,
        prevNext: true,
        firstLast: true,
        prevText: '<',
        nextText: '>',
        firstText: '<<',
        lastText: '>>',
        activeClass: 'active',
    });

    jQuery("#section-affiche-list").paginathing({
        perPage: 10,
        limitPagination: 5,
        prevNext: true,
        firstLast: true,
        prevText: '<',
        nextText: '>',
        firstText: '<<',
        lastText: '>>',
        activeClass: 'active',
    });
    jQuery("#section-shares-list").paginathing({
        perPage: 10,
        limitPagination: 5,
        prevNext: true,
        firstLast: true,
        prevText: '<',
        nextText: '>',
        firstText: '<<',
        lastText: '>>',
        activeClass: 'active',
    });
});
if (jQuery(window).width() < 425) {
    jQuery(document).ready(function ($) {
        jQuery("#section-ads-list").paginathing({
            perPage: 10,
            limitPagination: 5,
            prevNext: true,
            firstLast: true,
            prevText: '<',
            nextText: '>',
            firstText: '<<',
            lastText: '>>',
            activeClass: 'active',
        });
        // jQuery("#main-news-list").paginathing({
        //     num_page_links_to_display: 2,
        // });
        // jQuery("#section-affiche-list").pajinate({
        //     num_page_links_to_display: 2,
        // });
        // jQuery("#section-shares-list").pajinate({
        //     num_page_links_to_display: 2,
        // });
    });
}
jQuery(document).ready(function ($) {
    if ($('table.company-excerpt>tr>td.excerpt-company').html() == "") {
        $(this).css('background-color', 'yellow');
        $('table.company-excerpt>tr>td:first-child').setAttribute("colspan", "2");
    }
    $('td.excerpt-company').each(function () {
        if ($(this).html() == '') {
            $(this).css('backgroundColor', 'red');
        }
    });
});

jQuery(document).ready(function () {

    jQuery('table.company-excerpt tr').each(function () {
        var tr = this;
        var counter = 0;
        var strLookupText = '';

        jQuery('td.excerpt-company', tr).each(function (index, value) {
            var td = jQuery(this);

            if ((td.text() == strLookupText) || (td.text() == "")) {
                counter++;
                td.prev().attr('colSpan', '' + parseInt(counter + 1, 10) + '').css({textAlign: 'center'});
                td.remove();
            } else {
                counter = 0;
            }

            // Sets the strLookupText variable to hold the current value. The next time in the loop the system will check the current value against the previous value.
            strLookupText = td.text();

        });

    });
});
// var maxHeight = -1;
// jQuery('.slick-slide').each(function () {
//     if (jQuery(this).height() > maxHeight) {
//         maxHeight = jQuery(this).height();
//     }
// });
// jQuery('.slick-slide').each(function ($) {
//     if ($(this).height() < maxHeight) {
//         $(this).css('margin', Math.ceil((maxHeight - $(this).height()) / 2) + 'px 0');
//     }
// });

jQuery(document).ready(function ($) {
    jQuery('div.front-slider').slick(
        {
            adaptiveHeight: true,
            vertical: true,
            verticalSwiping: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 300000,
            prevArrow: "<button type='button' class='slick-prev pull-top'></button>",
            nextArrow: "<button type='button' class='slick-next pull-bottom'></button>",
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    /* jQuery('div.first-front-slider-block .single-item').slick(
         {
         adaptiveHeight: true,
         vertical: true,
         verticalSwiping: true,
         slidesToShow: 3,
         slidesToScroll: 1,
         infinite: true,
         autoplay: true,
         autoplaySpeed: 3000,
         prevArrow:"<button type='button' class='slick-prev pull-top'></button>",
         nextArrow:"<button type='button' class='slick-next pull-bottom'></button>",
         responsive: [
         {
           breakpoint: 768,
           settings: {
             slidesToShow: 2,
           }
         },
         {
           breakpoint: 480,
           settings: {
             slidesToShow: 1,
           }
         }
     ]
    });*/
    jQuery('div#posts-carousel .single-item').slick(
        {
            adaptiveWidth: true,
            adaptiveHeight: true,
//        verticalSwiping: true,
            slidesToShow: 6,
            slidesToScroll: 1,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3000,
            prevArrow: "<button type='button' class='slick-prev pull-top'><i class='fas fa-arrow-circle-left'></i></button>",
            nextArrow: "<button type='button' class='slick-next pull-bottom'><i class='fas fa-arrow-circle-right'></i></button>",
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 5,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    /*
      (function() {

      // store the slider in a local variable
      var $window = $(window),
          flexslider = { vars:{} };

      // tiny helper function to add breakpoints
      function getGridSize() {
        return (window.innerWidth < 425) ? 1 :
               (window.innerWidth < 768) ? 2 :
               (window.innerWidth < 1000) ? 3 : 3;
      }

      $(function() {
        //SyntaxHighlighter.all();
      });
    */
    /*jQuery(window).load(function() {
      jQuery('.related-post-slider').flexslider({
        animation: "slide",
        animationLoop: true,
        slideshow: false,
        itemWidth: 320,
        itemMargin: 20,
        minItems: getGridSize(), // use function to pull in initial value
        maxItems: getGridSize(), // use function to pull in initial value
        controlNav: false,
        touch: true,
      prevText: "Previous",
          nextText: "Next",
      });

    });

    // check grid size on resize event
    $window.resize(function() {
      var gridSize = getGridSize();

      flexslider.vars.minItems = gridSize;
      flexslider.vars.maxItems = gridSize;
    });
  }());
  */


    /*
    jQuery('div.variants .single-item').slick(
         {
  adaptiveHeight: true,
         vertical: false,
         verticalSwiping: false,
         slidesToShow: 3,
         arrows: true,
         dots: false,
         slidesToScroll: 1,
         infinite: false,
         autoplay: false,
         autoplaySpeed: 3000,
       centerMode: true,
       centerPadding:'15px',
       variableWidth: true,
               prevArrow:"<button type='button' class='slick-prev pull-top'><i class='fas fa-arrow-circle-left'></i></button>",
         nextArrow:"<button type='button' class='slick-next pull-bottom'><i class='fas fa-arrow-circle-right'></i></button>",
               responsive: [
         {
           breakpoint: 768,
           settings: {
             slidesToShow: 3,
           }
         },
         {
           breakpoint: 425,
           settings: {
 arrows: false,
         centerMode: true,
         centerPadding: '15px',
         slidesToShow: 2
           }
         }
     ]
    });*/
    /*jQuery('div.related-post-slider .related-slider').slick(
        {
        adaptiveHeight: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        autoplay: true,
        centerMode: true,
        infinite: true,
        autoplaySpeed: 3000,
        variableWidth: true,
        prevArrow:"<button type='button' class='slick-prev'><i class='fas fa-chevron-left'></i></button>",
        nextArrow:"<button type='button' class='slick-next'><i class='fas fa-chevron-right'></i></button>",
        responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
              centerMode: false
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
          }
        }
    ]
   });*/
    jQuery('div.related-news.related-slider').slick(
        {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 300000,
            dots: false,
            prevArrow: "<button type='button' class='slick-prev'></button>",
            nextArrow: "<button type='button' class='slick-next'></button>",
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    // jQuery('div.related-news.related-slider').owlCarousel({
    //     items: 3,
    //     dots: false,
    //     loop: true,
    //     rewind: false,
    //     margin: 0,
    //     // Включаем стандартные кнопки
    //     nav: true,
    //
    //     // Можно еще задать тексты кнопок
    //     navText: [
    //         '<i class="fas fa-chevron-down"></i>',
    //         '<i class="fas fa-chevron-up"></i>'
    //     ],
    //     autoplay: false,
    //     autoplayTimeout: 1500,
    //     autoWidth: false,
    //     responsiveClass: true,
    //     responsive: {
    //         0: {
    //             items: 1,
    //             nav: true
    //         },
    //         600: {
    //             items: 1,
    //             nav: true
    //         },
    //         1000: {
    //             items: 1,
    //             nav: true,
    //             loop: false
    //         }
    //     }
    // });

});
//    jQuery('.slider-nav > div').click(function() {
// 	jQuery('#full-posts-carousel').slick('slickGoTo',$(this).index());
// });

jQuery(window).on('load', function () {

    var windowWidth = jQuery(window).width();
    if (windowWidth >= 560) {
        // jQuery('div.related-news.related-slider').owlCarousel({
        //     items: 3,
        //     dots: false,
        //     loop: true,
        //     rewind: false,
        //     margin: 0,
        //     // Включаем стандартные кнопки
        //     nav: true,
        //
        //     // Можно еще задать тексты кнопок
        //     navText: [
        //         '<i class="fas fa-chevron-down"></i>',
        //         '<i class="fas fa-chevron-up"></i>'
        //     ],
        //     autoplay: false,
        //     autoplayTimeout: 1500,
        //     autoWidth: false,
        //     responsiveClass: true,
        //     responsive: {
        //         0: {
        //             items: 1,
        //             nav: true
        //         },
        //         600: {
        //             items: 1,
        //             nav: true
        //         },
        //         1000: {
        //             items: 1,
        //             nav: true,
        //             loop: false
        //         }
        //     }
        // });
        // jQuery('div.related-post-slider .related-slider').slick(
        //     {
        //         adaptiveHeight: true,
        //         slidesToShow: 3,
        //         slidesToScroll: 1,
        //         autoplay: true,
        //         centerMode: true,
        //         infinite: true,
        //         autoplaySpeed: 3000,
        //         variableWidth: true,
        //         prevArrow: "<button type='button' class='slick-prev'><i class='fas fa-chevron-left'></i></button>",
        //         nextArrow: "<button type='button' class='slick-next'><i class='fas fa-chevron-right'></i></button>",
        //         responsive: [
        //             {
        //                 breakpoint: 768,
        //                 settings: {
        //                     slidesToShow: 2,
        //                     centerMode: false
        //                 }
        //             },
        //             {
        //                 breakpoint: 480,
        //                 settings: {
        //                     slidesToShow: 1,
        //                 }
        //             }
        //         ]
        //     });
    } else {
        (function ($) {
            var hwSlideSpeed = 700;
            var hwTimeOut = 3000;
            var hwNeedLinks = true;

            $(document).ready(function (e) {
                $('.related-slider').css(
                    {
                        "position": 'relative', "width": "100%",
                        "height": '240px'
                    });
                $('.related-slider .mainnews').removeClass('d-flex');
                $('.related-slider .mainnews').css(
                    {
                        "position": "absolute",
                        "top": '0', "left": 'auto', "height": '240px', 'margin-right': '0'
                    }).hide().eq(0).show();
                var slideNum = 0;
                var slideTime;
                slideCount = $(".related-slider .mainnews").size();
                var animSlide = function (arrow) {
                    clearTimeout(slideTime);
                    $('.related-slider  .mainnews').eq(slideNum).fadeOut(hwSlideSpeed);
                    if (arrow == "next") {
                        if (slideNum == (slideCount - 1)) {
                            slideNum = 0;
                        } else {
                            slideNum++
                        }
                    } else if (arrow == "prew") {
                        if (slideNum == 0) {
                            slideNum = slideCount - 1;
                        } else {
                            slideNum -= 1
                        }
                    } else {
                        slideNum = arrow;
                    }
                    $('#related-news .mainnews').eq(slideNum).fadeIn(hwSlideSpeed, rotator);
                    $(".control-slide.active").removeClass("active");
                    $('.control-slide').eq(slideNum).addClass('active');
                }
                if (hwNeedLinks) {
                    var $linkArrow = $('<a id="prewbutton" class="link-arr" href="#">&lt;</a><a id="nextbutton" class="link-arr" href="#">&gt;</a>')
                        .prependTo('.related-slider');
                    $('#prewbutton').css({
                        "position": "absolute",
                        "bottom": '-25px', "left": '0',
                        'font-size': '15px', 'color': 'black'
                    });
                    $('#nextbutton').css({
                        "position": "absolute",
                        "right": '0',
                        "bottom": '-25px',
                        'font-size': '15px', 'color': 'black'
                    });
                    $('#nextbutton').click(function () {
                        animSlide("next");
                        return false;
                    })
                    $('#prewbutton').click(function () {
                        animSlide("prew");
                        return false;
                    })
                }
                var $adderSpan = '';
                $('#related-news .mainnews').each(function (index) {
                    $adderSpan += '<span class = "control-slide">' + index + '</span>';
                });
                $('<div class ="sli-links">' + $adderSpan + '</div>').appendTo('#slider-wrap');
                $(".control-slide:first").addClass("active");
                $('.control-slide').click(function () {
                    var goToNum = parseFloat($(this).text());
                    animSlide(goToNum);
                });
                var pause = false;
                var rotator = function () {
                    if (!pause) {
                        slideTime = setTimeout(function () {
                            animSlide('next')
                        }, hwTimeOut);
                    }
                }
                $('related-post-slider').hover(
                    function () {
                        clearTimeout(slideTime);
                        pause = true;
                    },
                    function () {
                        pause = false;
                        rotator();
                    });
                rotator();
            });
        })(jQuery);
    }
});

jQuery(document).ready(function ($) { // зaпускaем скрипт пoсле зaгрузки всех элементoв
// /* зaсунем срaзу все элементы в переменные, чтoбы скрипту не прихoдилoсь их кaждый рaз искaть при кликaх */
// var overlay = $('#overlay'); // пoдлoжкa, дoлжнa быть oднa нa стрaнице
// var open_modal = $('.open_modal'); // все ссылки, кoтoрые будут oткрывaть oкнa
// var close = $('.modal_close, #overlay'); // все, чтo зaкрывaет мoдaльнoе oкнo, т.е. крестик и oверлэй-пoдлoжкa
// var modal = $('.modal_div'); // все скрытые мoдaльные oкнa

// open_modal.click( function(event){ // лoвим клик пo ссылке с клaссoм open_modal
// event.preventDefault(); // вырубaем стaндaртнoе пoведение
// var div = $(this).attr('href'); // вoзьмем стрoку с селектoрoм у кликнутoй ссылки
// overlay.fadeIn(400, //пoкaзывaем oверлэй
// function(){ // пoсле oкoнчaния пoкaзывaния oверлэя
// $(div) // берем стрoку с селектoрoм и делaем из нее jquery oбъект
// .css('display', 'block')
// .animate({opacity: 1, top: '50%'}, 200); // плaвнo пoкaзывaем
// });
// });

// close.click( function(){ // лoвим клик пo крестику или oверлэю
// modal // все мoдaльные oкнa
// .animate({opacity: 0, top: '45%'}, 200, // плaвнo прячем
// function(){ // пoсле этoгo
// $(this).css('display', 'none');
// overlay.fadeOut(400); // прячем пoдлoжку
// }
// );
// });
});

function switcher() {
    [].forEach.call(document.body.querySelectorAll("[data-switcher]"), (a) => {
        let b = a.querySelectorAll("[data-switcher-name]"),
            c = a.querySelectorAll("[data-switcher-show]");
        [].forEach.call(c, (d) => {
            if (d.dataset.switcherSelected != undefined) {
                d.classList.add("selected");
                [].filter.call(b, (a) => a.dataset.switcherName == d.dataset.switcherShow ? a.classList.add("selected") : "");
            }
            d.addEventListener("click", () => {
                [].forEach.call(c, (a) => a != d ? a.classList.remove("selected") : a.classList.add("selected"));
                [].forEach.call(b, (a) => a.dataset.switcherName != d.dataset.switcherShow ? a.classList.remove("selected") : a.classList.add("selected"));
            }, true);
        });
    });
}

window.onload = function () {
    switcher();
    //jQuery("#post-40885").parent().find('.owl-item.cloned').addClass("hide-carousel");
    //jQuery("#post-40885").parent().addClass("hide-carousel");
    //jQuery("#post-41039").parent().find('.owl-item.cloned').addClass("hide-carousel");
    //jQuery("#post-41039").parent().addClass("hide-carousel");
}
jQuery(document).ready(function ($) {
    var modal = document.querySelector("#mymodal"),
        modalOverlay = document.querySelector("#modal-overlay"),
        closeButton = document.querySelector("#close-button"),
        openButton = document.querySelector("#open-button");
    $('.close-button').each(function () {
        jQuery(this).on('click', function () {
            jQuery(this).parents('.mymodal').addClass('closed');
            jQuery(this).parents().eq(5).find(".modal-overlay").addClass('closed');
        });
    });
    $('.open-button').each(function () {
        jQuery(this).on('click', function () {
            jQuery(this).parent().parent().find(".mymodal").removeClass('closed');
            jQuery(this).parent().find(".modal-overlay").removeClass('closed');
        });
        let list_1 = [];
        let list_2 = [];
        let list_3 = [];
        $('.save-product').each(function (event) {
            jQuery(this).on('click', function () {
                var input = jQuery(this).closest('.modal-body').find('input[type="text"].product-value');
                jQuery(this).parents().eq(4).addClass('closed');
                jQuery(this).parents().eq(5).find(".modal-overlay").addClass('closed');
                console.log(input.val());
                let list = jQuery(this).parents().eq(6).find('ul');
                let test = 'Test text';
                list_1.push(test);
                list.prepend('<li>' + input.val() + '</li>');
                return false;
                input.val('');

            });
        });
        $('.title-product-region').each(function () {
            jQuery(this).on('click', function () {
                jQuery(this).parents().eq(1).find('ul').addClass('hide');
            });
        });
    });
// 	closeButton.addEventListener("click", function() {
// 	  modal.classList.toggle("closed");
// 	  modalOverlay.classList.toggle("closed");
// 	});

// 	openButton.addEventListener("click", function() {
// 	  modal.classList.toggle("closed");
// 	  modalOverlay.classList.toggle("closed");
});
jQuery('.open-spoiler').each(function ($) {
    var content = jQuery(this).parent('.spoiler-content');
    jQuery(this).click(function () {
        content.slideToggle('slow');
        content.addClass('active')
    });

    jQuery(this).click(function (e) {
        e.preventDefault();
        jQuery(this).parent().find(".spoiler-content").addClass("hoverstate");
    }, function () {
        e.preventDefault();
        jQuery(this).parent().find(".spoiler-content").removeClass('hoverstate');

    });
    jQuery("#accordion").accordion();
    $("#submitbtn-1").click(function () {
        $.post($("#myform-1").attr("action"),
            $("#myform-1 :input").serializeArray(),
            function (info) {
                $("#result").html(info);
            });
        clearInput();
    });

    $("#myform-1").submit(function () {
        return false;
    });

    function clearInput() {
        $("#myform-1 :input").each(function () {
            $(this).val('');
        });
    }
});

function diplay_hide(blockId) {
    if (jQuery(blockId).css('display') == 'none') {
        jQuery(blockId).slideDown(500);
    } else {
        jQuery(blockId).slideUp(500);
    }
}

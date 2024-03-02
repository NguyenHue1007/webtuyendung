(function ($) {
  "use strict";
  // TOP Menu Sticky
  $(window).on('scroll', function () {
    var scroll = $(window).scrollTop();
    if (scroll < 400) {
      $("#sticky-header").removeClass("sticky");
      $('#back-top').fadeIn(500);
    } else {
      $("#sticky-header").addClass("sticky");
      $('#back-top').fadeIn(500);
    }
  });





  $(document).ready(function () {

    // mobile_menu
    var menu = $('ul#navigation');
    if (menu.length) {
      menu.slicknav({
        prependTo: ".mobile_menu",
        closedSymbol: '+',
        openedSymbol: '-'
      });
    };
    // blog-menu
    // $('ul#blog-menu').slicknav({
    //   prependTo: ".blog_menu"
    // });

    // review-active

    var slider = $('.slider_active');
    if (slider.length) {
      slider.owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        autoplay: true,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        nav: true,
        dots: false,
        autoplayHoverPause: true,
        autoplaySpeed: 800,
        responsive: {
          0: {
            items: 1,
            nav: false,
          },
          767: {
            items: 1,
            nav: false,
          },
          992: {
            items: 1,
            nav: false
          },
          1200: {
            items: 1,
            nav: false
          },
          1600: {
            items: 1,
            nav: true
          }
        }
      });
    }



    // review-active
    var testmonial = $('.testmonial_active');
    if (testmonial.length) {
      testmonial.owlCarousel({
        loop: true,
        margin: 0,
        autoplay: true,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        nav: true,
        dots: false,
        autoplayHoverPause: true,
        autoplaySpeed: 800,
        responsive: {
          0: {
            items: 1,
            dots: false,
            nav: false,
          },
          767: {
            items: 1,
            dots: false,
            nav: false,
          },
          992: {
            items: 1,
            nav: true
          },
          1200: {
            items: 1,
            nav: true
          },
          1500: {
            items: 1
          }
        }
      });
    }

    // review-active
    var candidate = $('.candidate_active');
    if (candidate.length) {
      candidate.owlCarousel({
        loop: true,
        margin: 30,
        autoplay: true,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        nav: true,
        dots: false,
        autoplayHoverPause: true,
        autoplaySpeed: 800,
        responsive: {
          0: {
            items: 1,
            dots: false,
            nav: false,
          },
          767: {
            items: 3,
            dots: false,
            nav: false,
          },
          992: {
            items: 4,
            nav: true
          },
          1200: {
            items: 4,
            nav: true
          },
          1500: {
            items: 4
          }
        }
      });
    }




    // for filter
    // init Isotope
    var $grid = $('.grid').isotope({
      itemSelector: '.grid-item',
      percentPosition: true,
      masonry: {
        // use outer width of grid-sizer for columnWidth
        columnWidth: 1
      }
    });

    // filter items on button click
    $('.portfolio-menu').on('click', 'button', function () {
      var filterValue = $(this).attr('data-filter');
      $grid.isotope({ filter: filterValue });
    });

    //for menu active class
    $('.portfolio-menu button').on('click', function (event) {
      $(this).siblings('.active').removeClass('active');
      $(this).addClass('active');
      event.preventDefault();
    });

    // wow js
    new WOW().init();

    // counter 
    $('.counter').counterUp({
      delay: 10,
      time: 10000
    });

    /* magnificPopup img view */
    $('.popup-image').magnificPopup({
      type: 'image',
      gallery: {
        enabled: true
      }
    });

    /* magnificPopup img view */
    $('.img-pop-up').magnificPopup({
      type: 'image',
      gallery: {
        enabled: true
      }
    });

    /* magnificPopup video view */
    $('.popup-video').magnificPopup({
      type: 'iframe'
    });

    // blog-page

    //brand-active
    var brand = $('.brad_active');
    if (brand.length) {
      brand.owlCarousel({
        loop: true,
        autoplay: true,
        nav: false,
        dots: false,
        autoplayHoverPause: true,
        autoplaySpeed: 800,
        responsive: {
          0: {
            items: 2,
            nav: false
          },
          767: {
            items: 4
          },
          992: {
            items: 5
          }
        }
      });
    }


    // blog-dtails-page

    if (document.getElementById('default-select')) {
      $('select').niceSelect();

      $('select').niceSelect('update');
    }

    //about-pro-active
    $('.details_active').owlCarousel({
      loop: true,
      margin: 0,
      items: 1,
      // autoplay:true,
      navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
      nav: true,
      dots: false,
      // autoplayHoverPause: true,
      // autoplaySpeed: 800,
      responsive: {
        0: {
          items: 1,
          nav: false

        },
        767: {
          items: 1,
          nav: false
        },
        992: {
          items: 1,
          nav: false
        },
        1200: {
          items: 1,
        }
      }
    });

  });

  // resitration_Form
  $(document).ready(function () {
    $('.popup-with-form').magnificPopup({
      type: 'inline',
      preloader: false,
      focus: '#name',

      // When elemened is focused, some mobile browsers in some cases zoom in
      // It looks not nice, so we disable it:
      callbacks: {
        beforeOpen: function () {
          if ($(window).width() < 700) {
            this.st.focus = false;
          } else {
            this.st.focus = '#name';
          }
        }
      }
    });
  });



  //------- Mailchimp js --------//  
  function mailChimp() {
    $('#mc_embed_signup').find('form').ajaxChimp();
  }
  mailChimp();



  // Search Toggle
  $("#search_input_box").hide();
  $("#search").on("click", function () {
    $("#search_input_box").slideToggle();
    $("#search_input").focus();
  });
  $("#close_search").on("click", function () {
    $('#search_input_box').slideUp(500);
  });
  // Search Toggle
  $("#search_input_box").hide();
  $("#search_1").on("click", function () {
    $("#search_input_box").slideToggle();
    $("#search_input").focus();
  });
  $(document).ready(function () {
    $('select').niceSelect();
  });


  //   $('#datepicker').datepicker({
  //     iconsLibrary: 'fontawesome',
  //     icons: {
  //      rightIcon: '<span class="fa fa-caret-down"></span>'
  //  }
  // });
  $(document).ready(function () {
    $('.multiple-items').slick({
      infinite: true,
      slidesToShow: 4,     // Hiển thị 4 item cùng một lúc
      slidesToScroll: 4,   // Cuộn 4 item mỗi lần chuyển động
      rows: 2,
    });
  });

  var citis = document.getElementById("city");
  var districts = document.getElementById("district");
  var wards = document.getElementById("ward");
  var Parameter = {
    url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
    method: "GET",
    responseType: "application/json",
  };
  var promise = axios(Parameter);
  promise.then(function (result) {
    renderCity(result.data);
    // Gọi hàm niceSelect để tạo nice-select cho các select
    $('select').niceSelect();
  });

  function renderCity(data) {
    for (const x of data) {
      var opt = document.createElement('option');
      opt.value = x.Name;
      opt.text = x.Name;
      opt.setAttribute('data-id', x.Id);
      citis.options.add(opt);
    }
    // Gọi hàm niceSelect('update') để cập nhật nice-select
    $(citis).niceSelect('update');

    citis.onchange = function () {
      district.length = 1;
      ward.length = 1;
      if (this.options[this.selectedIndex].dataset.id != "") {
        const result = data.filter(n => n.Id === this.options[this.selectedIndex].dataset.id);

        for (const k of result[0].Districts) {
          var opt = document.createElement('option');
          opt.value = k.Name;
          opt.text = k.Name;
          opt.setAttribute('data-id', k.Id);
          districts.options.add(opt);
        }
      }
      // Gọi hàm niceSelect('update') để cập nhật nice-select
      $(districts).niceSelect('update');
    };

    districts.onchange = function () {
      ward.length = 1;
      const dataCity = data.filter((n) => n.Id === citis.options[citis.selectedIndex].dataset.id);
      if (this.options[this.selectedIndex].dataset.id != "") {
        const dataWards = dataCity[0].Districts.filter(n => n.Id === this.options[this.selectedIndex].dataset.id)[0].Wards;

        for (const w of dataWards) {
          var opt = document.createElement('option');
          opt.value = w.Name;
          opt.text = w.Name;
          opt.setAttribute('data-id', w.Id);
          wards.options.add(opt);
        }
      }
      // Gọi hàm niceSelect('update') để cập nhật nice-select
      $(wards).niceSelect('update');
    };
  }

})(jQuery);

var loadFile = function (event) {
  var image = document.getElementById("output");
  image.src = URL.createObjectURL(event.target.files[0]);
};

var quillInit = function() {

  var toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
    ['blockquote', 'code-block'],

    [{ 'header': 1 }, { 'header': 2 }],               // custom button values
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
    [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
    [{ 'direction': 'rtl' }],                         // text direction

    // [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
    // [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

    // [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
    // [{ 'font': [] }],
    // [{ 'align': [] }],

    // ['clean']                                         // remove formatting button
  ];

  if ( $('.editor').length > 0 ) {
    var quill = new Quill('#editor-1', {
      modules: {
        toolbar: toolbarOptions,
      },
      placeholder: 'Compose an epic...',
      theme: 'snow'  // or 'bubble'
    });
    var quill = new Quill('#editor-2', {
      modules: {
        toolbar: toolbarOptions,
      },
      placeholder: 'Compose an epic...',
      theme: 'snow'  // or 'bubble'
    });
    var quill = new Quill('#editor-3', {
      modules: {
        toolbar: toolbarOptions,
      },
      placeholder: 'Compose an epic...',
      theme: 'snow'  // or 'bubble'
    });
  }

}
quillInit();
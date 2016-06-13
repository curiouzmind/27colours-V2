<!DOCTYPE html>
<html>
@include('layout.header')
<body>
<!-- FB PLUGIN JAVASCRIPT CODE -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=539099199605669";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- ./ FB PLUGIN -->
  	<div>
   		 <div>
             @include('layout.head')
         </div>
         <!-- CONTENT -->
        <div class="">
			@yield('content')
        </div>
        <footer>
			@include('layout.footer')
		</footer>
  	</div> <!-- ./ page -->
    <!-- jQuery Version 2.1.3 -->
    <script src="{{ asset('js/jquery-2.1.3.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/owl-carousel/owl.carousel.js')}}"></script>
    <script src="{{ asset('plugins/jquery.flexslider.min.js')}}"></script>
    <script src="{{ asset('plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js')}}"></script>
    <script src="{{asset('plugins/videoplayer/video.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/humane.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/selectize.min.js') }}"></script>
    <script>
        <!-- owl-carousel -->
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                autoPlay: 3000, //Set AutoPlay to 3 seconds
                stopOnHover: true,
                items : 4,
                itemsDesktop : [1199,3],
                itemsDesktopSmall : [979,2]
            });
        });
        $(document).ready(function() {
            var owl = $("#partners");
            owl.owlCarousel({
                autoPlay  : 4000,
                nav: false,
                dots: false,
                items : 10, //10 items above 1000px browser width
                itemsDesktop : [1000,5], //5 items between 1000px and 901px
                itemsDesktopSmall : [900,3], // betweem 900px and 601px
                itemsTablet: [600,2], //2 items between 600 and 0
                itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
            });
        });
    </script>
	<script>
		$(function() {
			$('a[href="#toggle-search"], .navbar-bootsnipp .bootsnipp-search .input-group-btn > ' +
					'.btn[type="reset"]').on('click', function(event) {
				event.preventDefault();
				$('.navbar-bootsnipp .bootsnipp-search .input-group > input').val('');
				$('.navbar-bootsnipp .bootsnipp-search').toggleClass('open');
				$('a[href="#toggle-search"]').closest('li').toggleClass('active');
				if ($('.navbar-bootsnipp .bootsnipp-search').hasClass('open')) {
					/* I think .focus dosen't like css animations, set timeout to make sure input gets focus */
					setTimeout(function() {
						$('.navbar-bootsnipp .bootsnipp-search .form-control').focus();
					}, 100);
				}
			});
			$(document).on('keyup', function(event) {
				if (event.which == 27 && $('.navbar-bootsnipp .bootsnipp-search').hasClass('open')) {
					$('a[href="#toggle-search"]').trigger('click');
				}
			});
            $('a[href="#toggle-search-xs"]').on('click', function() {
               $('.bootsnipp-search').toggle().animate('slidein', 200); 
            });
		});
        $(function () {
            var w = $(window);
            w.scroll(function () {
                if (w.scrollTop() !== 0) {
                    $(".d").removeClass("visible");
                    return;
                }
                $(".d").addClass("visible");
            });
            $(".d").addClass("visible");
        });
	</script>
    <script>
        $(document).ready(function () {
            // for bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                // save the latest tab; use cookies if you like 'em better:
                localStorage.setItem('lastTab', $(this).attr('href'));
            });
            // go to the latest tab, if it exists:
            var lastTab = localStorage.getItem('lastTab');
            if (lastTab) {
                $('[href="' + lastTab + '"]').tab('show');
            }
        });
    </script>
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover({
                html: true
            })
        });
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script>
        $(".alert-dismissable").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert-dismissable").alert('close');
        });
    </script>
    <script>
        videojs.options.flash.swf = "plugins/videoplayer/video-js.swf"
    </script>
    <!-- Ajax global handler -->
    <script>
        $(document).bind("mobileinit", function(){
            $.mobile.ignoreContentEnabled = true;
        });
    </script>
    
    
    <script>
        $(function() {
            // Enable Selectize
            $('#search').selectize({
                valueField: 'id',
                labelField: 'title',
                searchField: ['title'],
                render: {
                    option: function(item, escape) {
                        return '<div><a href="/song/show/'+escape(item.id) + '">' + escape(item.title) + '</a></div>';
                    }
                },
                onChange: function(value){
                    // Do something when input changes
                    alert(value);
                },
                load: function(query, callback) {
                    if (!query.length) return callback();
                    $.ajax({
                        url: './song/search',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            q: query
                        },
                        success: function(res) {
                            callback(res.data);
                        }
                    });
                }
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
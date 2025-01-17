<script src="{{ asset('newFrontEnd') }}/assets/plugins/preloaderDK/preloaderDK.js" type="text/javascript"></script>
<script src="{{ asset('newFrontEnd') }}/assets/plugins/initLoader.js" type="text/javascript"></script>
<script src="{{ asset('newFrontEnd') }}/assets/plugins/consoleFix.js" type="text/javascript"></script>
<script src="{{ asset('newFrontEnd') }}/assets/plugins/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('newFrontEnd') }}/assets/plugins/placeholder.js" type="text/javascript"></script>
<script src="{{ asset('newFrontEnd') }}/assets/plugins/bootstrap/dist/js/bootstrap.min.js" type="text/javascript">
</script>
<script src="{{ asset('newFrontEnd') }}/assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"
    type="text/javascript"></script>
<script src="{{ asset('newFrontEnd') }}/assets/plugins/modernizr.js" type="text/javascript"></script>
<script src="{{ asset('newFrontEnd') }}/assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"
    type="text/javascript"></script>
<script src="{{ asset('newFrontEnd') }}/assets/plugins/owl.carousel/dist/owl.carousel.min.js" type="text/javascript">
</script>
<script src="{{ asset('newFrontEnd') }}/assets/plugins/owlcarousel2-thumbs/dist/owl.carousel2.thumbs.min.js"
    type="text/javascript"></script>
<script src="{{ asset('newFrontEnd') }}/assets/plugins/bootstrap-validator/dist/validator.min.js"
    type="text/javascript"></script>
<script src="{{ asset('newFrontEnd') }}/assets/plugins/photoswipe/dist/photoswipe.min.js" type="text/javascript">
</script>
<script src="{{ asset('newFrontEnd') }}/assets/plugins/photoswipe/dist/photoswipe-ui-default.min.js"
    type="text/javascript"></script>
<script src="{{ asset('newFrontEnd') }}/assets/plugins/isotope/isotope.pkgd.min.js" type="text/javascript"></script>
<script src="{{ asset('newFrontEnd') }}/assets/plugins/isotope/isotope.layoutModules.js" type="text/javascript">
</script>
<script src="{{ asset('newFrontEnd') }}/assets/plugins/jquery.touchSwipe.min.js" type="text/javascript"></script>
<script src="{{ asset('newFrontEnd') }}/assets/plugins/moment/min/moment.min.js" type="text/javascript"></script>
<script src="{{ asset('newFrontEnd') }}/assets/plugins/calentim-daterangepicker/build/js/calentim.min.js"
    type="text/javascript"></script>
<script src="{{ asset('newFrontEnd') }}/assets/plugins/imagesloaded.pkgd.min.js" type="text/javascript"></script>
<script src="{{ asset('newFrontEnd') }}/assets/plugins/appear.min.js" type="text/javascript"></script>
<script src="{{ asset('newFrontEnd') }}/assets/plugins/semantic-ui-sticky/sticky.min.js" type="text/javascript">
</script>
<script src="{{ asset('newFrontEnd') }}/assets/plugins/baron/baron.min.js" type="text/javascript"></script>
<script src="{{ asset('newFrontEnd') }}/assets/plugins/wow.min.js" type="text/javascript"></script>
<script src="{{ asset('newFrontEnd') }}/js/app3f56.js?v=11" type="text/javascript"></script>

<script type="text/javascript">
    $(function() {
        // $('#txtSearch').on('keyup', function(){

        let debounceTimer; // Timer for debounce

        $('#txtSearch').on('keyup', function() {
            const text = $(this).val().trim();

            // Clear previous debounce timer
            clearTimeout(debounceTimer);

            // Debounce function execution
            debounceTimer = setTimeout(function() {
                if (text.length > 2) { // Trigger search after 3+ characters
                    $.ajax({
                        type: "POST", // Use POST for better security
                        url: '/newSearch',
                        data: {
                            text: text,

                        },
                        success: function(response) {
                            if (response.success) {
                                $('#result').html(response
                                    .html); // Render HTML from response
                            }
                        },
                        error: function(xhr) {
                            console.error(xhr
                                .responseText); // Log errors for debugging
                        },
                    });
                } else {
                    $('#result').html(''); // Clear results for short inputs
                }
            }, 300); // Delay search by 300ms
        });
    });







    var EW_IS_MOBILE = false,
        $ad;

    $(document).ready(function() {
        var maxWidth = 0;
        $('.dropdown-menu').each(function(i) {
            if (!EW_IS_MOBILE)
                $(this).width($(this).width() + 50);
        });
    });

    function showtv() {
        var $ = jQuery;
        var $d = $("#dtv");
        $d.toggle();
    }

    function AdBox() {
        var $ = jQuery;
        var $dlg = $("#myad");
        $dlg.modal("show");
    }

    // Strip JavaScript in HTML loaded by Ajax
    function ew_StripScript(html) {
        var ar, re = /<script([^>]*)>([\s\S]*?)<\/script\s*>/ig;
        var str = html;
        while ((ar = re.exec(html)) != null) {
            var text = RegExp.lastMatch;
            if (/(\s+type\s*=\s*['"]*(text|application)\/(java|ecma)script['"]*)|^((?!\s+type\s*=).)*$/i.test(RegExp
                    .$1))
                str = str.replace(text, "");
        }
        return str;
    }

    function AdvancedSearch() {
        var $ = jQuery;
        var $dlg = $("#adSearch");

        // submit
        var _submit = function() {
            var form = $dlg.find(".modal-body form")[0];
            var frm = ewForms[form.id];
            frm.UpdateTextArea();
            if (frm.Validate()) {
                frm.DestroyEditor();
                form.submit();
            }
            return false;
        }

        $dlg.on("hidden.bs.modal", function(data) {
            var frm = $dlg.find(".modal-body form").data("form");
            if (frm) frm.DestroyEditor();
            $dlg.find(".modal-body").html("");
            $dlg.find(".modal-footer .btn-submit").unbind();
        });
        $dlg.find(".modal-footer .btn-submit").click(_submit).focus();
        $.get("advancedsrch.php?modal=1", function(data) {
            $dlg.find(".modal-body").append($(data));
        });

        $dlg.modal("show");
    }

    function UpdateHits(id, type, show = false) {
        var $ = jQuery;
        $.post("command.php", {
                id: id,
                type: type
            },
            function(data, status) {
                if ($.trim(data) && show == true) {
                    var $dlg = $("#ewDialog");
                    $dlg.html(data);
                    $dlg.modal("show");
                    $dlg.on('hidden.bs.modal', function(e) {
                        $("#player").attr("src", "");
                    })
                }
            });
    }

    function AddRequest(group, name) {
        if (group && name.trim()) {
            var $ = jQuery;
            $.post("command.php", {
                    group: group,
                    name: name,
                    request: 'request'
                },
                function(data, status) {
                    if (!$.trim(data))
                        $("#request").collapse('hide');
                    $("#x_name").val("");
                });
        } else {
            alert("Type Request Name!");
        }
    }

    function expand($elem) {
        var $ = jQuery;
        var angle = 0;
        var t = setInterval(function() {
            if (angle == 1440) {
                clearInterval(t);
                return;
            }
            angle += 40;
            $('.link', $elem).stop().animate({
                rotate: '+=-40deg'
            }, 0);
        }, 10);
        $elem.stop().animate({
                width: '180px'
            }, 800)
            .find('.item_content').fadeIn(400, function() {
                $(this).find('p').stop(true, true).fadeIn(600);
            });
    }

    function collapse($elem) {
        var $ = jQuery;
        var angle = 1440;
        var t = setInterval(function() {
            if (angle == 0) {
                clearInterval(t);
                return;
            }
            angle -= 40;
            $('.link', $elem).stop().animate({
                rotate: '+=40deg'
            }, 0);
        }, 10);
        $elem.stop().animate({
                width: '52px'
            }, 800)
            .find('.item_content').stop(true, true).fadeOut().find('p').stop(true, true).fadeOut();
    }

    $(function() {
        var timer = null,
            interval = 3000;

        function tStart() {
            if (timer !== null) return;
            timer = setInterval(function() {
                $(".owl-next").click();
            }, interval);
        }

        function tStop() {
            clearInterval(timer);
            timer = null
        }

        tStart();

        $("#psearch").focus(function() {
            tStop();
        }).focusout(function() {
            tStart();
        });

        $(".dropdown-toggle").on('click', function() {
            tStop();
            setTimeout(tStart, 60000);
        });

    });




    /*(function($) {
            $(document).ready(function() {
               var akas=true;
                $("#content-slider").lightSlider({
                    loop:true,
    				item:6,
    				speed:500,
                    auto:true,
                    pager:false,
                    pauseOnHover:true,
                    keyPress:true
                });
                $('.item').hover(
                    function(){
                        var $this = $(this);
                        expand($this);
                    },
                    function(){
                        var $this = $(this);
                        collapse($this);
                    }
                );
            });
        })(jQuery);*/
    autocomplete(document.getElementById("psearch"));
</script>

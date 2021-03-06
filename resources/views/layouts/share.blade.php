<a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}"
   target="_blank">
    <i class="fa fa-facebook-official"></i>
</a>

<a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}"
   target="_blank">
    <i class="fa fa-twitter-square"></i>
</a>

<a href="https://plus.google.com/share?url={{ urlencode($url) }}"
   target="_blank">
    <i class="fa fa-google-plus-square"></i>
</a>

<a href="https://pinterest.com/pin/create/button/?{{
        http_build_query([
            'url' => $url,
            'media' => $image,
            'description' => $description
        ])
        }}" target="_blank">
    <i class="fa fa-pinterest-square"></i>
</a>

</div>

@yield('share')

<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script>

    var popupSize = {
        width: 780,
        height: 550
    };

    $(document).on('click', '.social-buttons > a', function(e){

        var
            verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
            horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

        var popup = window.open($(this).prop('href'), 'social',
            'width='+popupSize.width+',height='+popupSize.height+
            ',left='+verticalPos+',top='+horisontalPos+
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            e.preventDefault();
        }

    });
</script>
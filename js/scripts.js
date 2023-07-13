/*!
    * Start Bootstrap - SB Admin v6.0.2 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    (function($) {
    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });
})(jQuery);

$(document).ready(function() {
    Webcam.set({
        width: 320,
        height: 240,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    $('#accesscamera').on('click', function() {
        Webcam.reset();
        Webcam.on('error', function() {
            $('#photoModal').modal('hide');
            swal({
                title: 'Warning',
                text: 'Please give permission to access your webcam',
                icon: 'warning'
            });
        });
        Webcam.attach('#my_camera');
    });

    $('#takephoto').on('click', take_snapshot);

    $('#retakephoto').on('click', function() {
        $('#my_camera').addClass('d-block');
        $('#my_camera').removeClass('d-none');

        $('#results').addClass('d-none');

        $('#takephoto').addClass('d-block');
        $('#takephoto').removeClass('d-none');

        $('#retakephoto').addClass('d-none');
        $('#retakephoto').removeClass('d-block');

        $('#uploadphoto').addClass('d-none');
        $('#uploadphoto').removeClass('d-block');
    });

    $('#photoForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'photoUpload.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(data) {
                if(data == 'success') {
                    Webcam.reset();

                    $('#my_camera').addClass('d-block');
                    $('#my_camera').removeClass('d-none');

                    $('#results').addClass('d-none');

                    $('#takephoto').addClass('d-block');
                    $('#takephoto').removeClass('d-none');

                    $('#retakephoto').addClass('d-none');
                    $('#retakephoto').removeClass('d-block');

                    $('#uploadphoto').addClass('d-none');
                    $('#uploadphoto').removeClass('d-block');

                    $('#photoModal').modal('hide');

                    swal({
                        title: 'Success',
                        text: 'Photo uploaded successfully',
                        icon: 'success',
                        buttons: false,
                        closeOnClickOutside: false,
                        closeOnEsc: false,
                        timer: 2000
                    })
                }
                else {
                    swal({
                        title: 'Error',
                        text: 'Something went wrong',
                        icon: 'error'
                    })
                }
            }
        })
    })
})

function take_snapshot()
{
    //take snapshot and get image data
    Webcam.snap(function(data_uri) {
        //display result image
        $('#results').html('<img src="' + data_uri + '" class="d-block mx-auto rounded"/>');

        var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
        $('#photoStore').val(raw_image_data);
    });

    $('#my_camera').removeClass('d-block');
    $('#my_camera').addClass('d-none');

    $('#results').removeClass('d-none');

    $('#takephoto').removeClass('d-block');
    $('#takephoto').addClass('d-none');

    $('#retakephoto').removeClass('d-none');
    $('#retakephoto').addClass('d-block');

    $('#uploadphoto').removeClass('d-none');
    $('#uploadphoto').addClass('d-block');
}
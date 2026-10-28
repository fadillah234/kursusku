import 'bootstrap';
import $ from 'jquery';

window.$ = window.jQuery = $;

$(function () {
    $('#course_id').on('change', function () {
        const courseId = $(this).val();
        const availability = $('#availability');

        if (!courseId) {
            availability
                .removeClass('alert-success alert-danger')
                .addClass('alert-info')
                .text('Pilih kursus untuk melihat sisa kursi.');
            return;
        }

        availability
            .removeClass('alert-info alert-success alert-danger')
            .addClass('alert-info')
            .text('Memeriksa ketersediaan kursi...');

        $.ajax({
            url: `/courses/${encodeURIComponent(courseId)}/availability`,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                availability
                    .removeClass('alert-info alert-danger')
                    .addClass('alert-success')
                    .text(`Sisa kursi tersedia: ${data.remaining}`);
            },
            error: function () {
                availability
                    .removeClass('alert-info alert-success')
                    .addClass('alert-danger')
                    .text('Gagal memeriksa ketersediaan kursi. Silakan coba lagi.');
            }
        });
    });
});
$(document).ready(function(){
    toastr.options = {
        "closeButton": false,
        "positionClass": "toast-top-center",
    }
    
    $('.timepicker').timepicker({
        icons: {
            up: 'fas fa-sort-up 5x',
            down: 'fas fa-sort-down 5x'
        }
    });

    $('.datepick').datepicker({
        format: "dd-mm-yyyy"
    });

    $('.fetured-images.owl-carousel').owlCarousel({
        autoplay:true,
        margin:0,
        dots:false,
        items: 1,
        nav:true,
        loop:true,
        navText: ['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>']
    });
    $('.hot-jobs.owl-carousel').owlCarousel({
        autoplay:false,
        margin:0,
        dots:false,
        items: 1,
        nav:true,
        loop:false,
        navText: ['Prev','Next']
    });
    $('.premium-tutors.owl-carousel').owlCarousel({
        autoplay:false,
        margin:0,
        dots:false,
        items: 1,
        nav:true,
        loop:false,
        navText: ['Prev','Next']
    });
    $('.feedback.owl-carousel').owlCarousel({
        autoplay:true,
        margin:0,
        dots:true,
        items: 1,
        loop:true,
    });
    $('.tutors.owl-carousel').owlCarousel({
        autoplay:true,
        margin:0,
        dots:true,
        items: 1,
        loop:true,
    });
    $('.categories.owl-carousel').owlCarousel({
        autoplay:true,
        margin:0,
        dots:false,
        items: 1,
        loop:true,
    });
})
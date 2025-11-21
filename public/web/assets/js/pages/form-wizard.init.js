/*
Template Name: Upcube -  Admin & Dashboard Template
Author: Themesdesign
Contact: themesdesign.in@gmail.com
File: Form wizard Js File
*/

$(document).ready(function () {
    $('#basic-pills-wizard').bootstrapWizard({
        'tabClass': 'nav nav-pills nav-justified'
    });

    $('#progrss-wizard').bootstrapWizard({
        onTabShow: function (tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index + 1;
            var $percent = ($current / $total) * 100;
            $('#progrss-wizard').find('.progress-bar').css({ width: $percent + '%' });
        }
    });

});

// Active tab pane on nav link

// var triggerTabList = [].slice.call(document.querySelectorAll('.twitter-bs-wizard-nav .nav-link'))
// triggerTabList.forEach(function (triggerEl) {
//     var tabTrigger = new bootstrap.Tab(triggerEl)

//     triggerEl.addEventListener('click', function (event) {
//         event.preventDefault()
//         tabTrigger.show()
//     })
// })

var triggerTabList = document.querySelectorAll('.twitter-bs-wizard-nav .nav-link-bs');

triggerTabList.forEach(function (triggerEl) {

    triggerEl.addEventListener('click', function (event) {
        event.preventDefault();

        var navlinks = document.querySelectorAll(".twitter-bs-wizard-nav  .nav-link-bs")
        if (navlinks) {
            navlinks.forEach(function (e) {
                e.classList.remove("active")
            })
        }

        // Hide all tab contents
        var tabContents = document.querySelectorAll('.twitter-bs-wizard-tab-content .tab-pane');
        tabContents.forEach(function (tabContent) {
            tabContent.classList.remove('active');
        });


        // Show the clicked tab content
        var tabTarget = triggerEl.getAttribute('href');
        triggerEl.classList.add("active")
        var targetTabContent = document.querySelector(tabTarget);
        targetTabContent.classList.add('active');
    });
});



var triggerTabList2 = document.querySelectorAll('.twitter-wizard-nav .nav-link');
triggerTabList2.forEach(function (triggerEl) {
    triggerEl.addEventListener('click', function (event) {
        event.preventDefault();
        // console.log('Clicked');
        // console.log('here', event.target.parentNode);
        var parentEle = event.target.parentNode
        if (parentEle) {
            var classes = parentEle.classList
            var isProgressSeller = classes.contains('progress-seller-details')
            var progressBar = document.querySelector(".progress-bar")
            // console.log(progressBar);
            if (progressBar) {
                if (isProgressSeller) {
                    progressBar.style['width'] = "25%"
                }
                var isCompanyDoc = classes.contains('progress-company-document')
                if (isCompanyDoc) {
                    progressBar.style['width'] = "50%"
                }
                var isBankDetail = classes.contains('progress-bank-detail')
                if (isBankDetail) {
                    progressBar.style['width'] = "75%"
                }
                var isConformDetail = classes.contains('progress-confirm-detail')
                if (isConformDetail) {
                    progressBar.style['width'] = "100%"
                }
            }
        }

        var navlinks = document.querySelectorAll(".twitter-wizard-nav .nav-link")
        if (navlinks) {
            navlinks.forEach(function (e) {
                e.classList.remove("active")
            })
        }

        // Hide all tab contents
        var tabContents = document.querySelectorAll('.twitter-wizard .tab-content .tab-pane');
        tabContents.forEach(function (tabContent) {
            tabContent.classList.remove('active');
        });


        // Show the clicked tab content
        var tabTarget = triggerEl.getAttribute('href');
        triggerEl.classList.add("active")
        var targetTabContent = document.querySelector(tabTarget);
        targetTabContent.classList.add('active');
    });
});

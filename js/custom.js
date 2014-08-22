/***************************************************
 TABBED AREA
 ***************************************************/



jQuery(document).ready(function () {

    //When page loads...
    jQuery(".tab_content").hide(); //Hide all content
    jQuery("ul.tabs li:first").addClass("active").show(); //Activate first tab
    jQuery(".tab_content:first").show(); //Show first tab content

    //On Click Event
    jQuery("ul.tabs li").click(function () {

        jQuery("ul.tabs li").removeClass("active"); //Remove any "active" class
        jQuery(this).addClass("active"); //Add "active" class to selected tab
        jQuery(".tab_content").hide(); //Hide all tab content

        var activeTab = jQuery(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
        jQuery(activeTab).fadeIn(); //Fade in the active ID content
        return false;
    });

});

/***********************************************************************************************************************
 DOCUMENT: includes/javascript.js
 DEVELOPED BY: Ryan Stemkoski
 COMPANY: Zipline Interactive
 EMAIL: ryan@gozipline.com
 PHONE: 509-321-2849
 DATE: 3/26/2009
 UPDATED: 3/25/2010
 DESCRIPTION: This is the JavaScript required to create the accordion style menu.  Requires jQuery library
 NOTE: Because of a bug in jQuery with IE8 we had to add an IE stylesheet hack to get the system to work in all browsers. I hate hacks but had no choice :(.
 ************************************************************************************************************************/

jQuery(document).ready(function () {

    //ACCORDION BUTTON ACTION (ON CLICK DO THE FOLLOWING)
    jQuery('.accordionButton').click(function () {

        //REMOVE THE ON CLASS FROM ALL BUTTONS
        jQuery('.accordionButton').removeClass('on');

        //NO MATTER WHAT WE CLOSE ALL OPEN SLIDES
        jQuery('.accordionContent').slideUp(200);

        //IF THE NEXT SLIDE WASN'T OPEN THEN OPEN IT
        if (jQuery(this).next().is(':hidden') == true) {

            //ADD THE ON CLASS TO THE BUTTON
            jQuery(this).addClass('on');

            //OPEN THE SLIDE
            jQuery(this).next().slideDown(200);
        }

    });


    /*** REMOVE IF MOUSEOVER IS NOT REQUIRED ***/

        //ADDS THE .OVER CLASS FROM THE STYLESHEET ON MOUSEOVER
    jQuery('.accordionButton').mouseover(function () {
        jQuery(this).addClass('over');

        //ON MOUSEOUT REMOVE THE OVER CLASS
    }).mouseout(function () {
        jQuery(this).removeClass('over');
    });

    /*** END REMOVE IF MOUSEOVER IS NOT REQUIRED ***/


    /********************************************************************************************************************
     CLOSES ALL S ON PAGE LOAD
     ********************************************************************************************************************/
    jQuery('.accordionContent').hide();

    jQuery("#open").trigger('click');

});

/*************************************************************************
 ******************     THESE ARE THE SCRIPT CALLS    ***********************
 **************************************************************************/
jQuery(window).load(function () {

    jQuery('.slider').flexslider();

// Create the dropdown base
    jQuery("<select />").appendTo(".topmenu");

// Create default option "Go to..."
    jQuery("<option />", {
        "selected": "selected",
        "value": "",
        "text": "Menu"
    }).appendTo(".topmenu select");

// Populate dropdown with menu items
    jQuery(".topmenu a").each(function () {
        var el = jQuery(this);
        jQuery("<option />", {
            "value": el.attr("href"),
            "text": el.text()
        }).appendTo(".topmenu select");
    });

// To make dropdown actually work
// To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
    jQuery(".topmenu select").change(function () {
        window.location = jQuery(this).find("option:selected").val();
    });

    jQuery('.fancybox').fancybox();

});


/**
 * My hacks
 */
// add .active class to .current-menu-item>a
$(document).ready(function () {
    $('.current-menu-item > a').addClass('active');
});
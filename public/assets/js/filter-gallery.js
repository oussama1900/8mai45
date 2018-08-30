/*
    Author: Akshay Nagpal (github.com/akshaynagpal)
    License: MIT
*/

$(document).ready(function(){
    // clicking button with class "category-button"
    $(".category-button").click(function(){
        // get the data-filter value of the button
        var filterValue = $(this).attr('data-filter');

        // show all items
        if(filterValue == "allu")
        {
            $(".allu").show("slow");
        }
        else
        {
            // hide all items
            $(".allu").not('.'+filterValue).hide("slow");
            // and then, show only items with selected data-filter value
            $(".allu").filter('.'+filterValue).show("slow");
        }
    });

});
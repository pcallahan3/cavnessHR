/**
 * Created by Nicholas on 7/18/2017.
 */

var $counter = 0;

$(function() {
    $('#next').click(function() {
        // $("#page"+$counter).toggle();
        // $("#page"+$counter+1).toggle();
        // $("#page"+$counter).css("display", "none");
        //
        // $("#page1").$('.hiddenPanel').css("display", "block !important");
        if($counter <= 7){
            $("#page"+$counter).addClass("hiddenPanel");
            $("#page"+$counter).removeClass("visiblePanel");
            $counter++;
            $("#page"+$counter).removeClass("hiddenPanel");
            $("#page"+$counter).addClass("visiblePanel");
        }




    });

    $('#previous').click(function() {
        if($counter >= 1){
            $("#page"+$counter).removeClass("visiblePanel");
            $("#page"+$counter).addClass("hiddenPanel");
            $counter--;
            $("#page"+$counter).removeClass("hiddenPanel");
            $("#page"+$counter).addClass("visiblePanel");
            //$("#page"+$counter).css("display", "block");
        }

    });
});


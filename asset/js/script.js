$(function() {

    $('#side-menu').metisMenu();

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
});

function hideArea() {
    if($("#bar-chart").hasClass("hidden")) {
        $("#area-chart").addClass("hidden");
        $("#bar-chart").removeClass("hidden");
        $(window).trigger('resize');
    }
}

function hideBar() {
    if($("#area-chart").hasClass("hidden")) {
        $("#bar-chart").addClass("hidden");
        $("#area-chart").removeClass("hidden");
        $(window).trigger('resize');
    }
}

$(document).ready(function(){

    $('#tag-plus').click(function(){
        $('#tag-form').removeClass("hidden");
    });

    function getChildren($row) {
        var children = [], level = $row.attr('data-level');
        while($row.next().attr('data-level') > level) {
            children.push($row.next());
            $row = $row.next();
        }            
        return children;
    }

    $('tr.header').click(function(){
        var children = getChildren($(this));
        var metaParent = $(this);
        var parent = $(this).find('i');
        $(this).find('i').toggleClass("fa-caret-down").toggleClass("fa-caret-right");
        $(this).find('td.data > span').toggleClass("hidden");
        $.each(children, function() {
            if(parent.hasClass("fa-caret-right")) {
                $(this).slideUp();
                $(this).find('i').removeClass("fa-caret-down").addClass("fa-caret-right");
                $(this).find('td.data > span').removeClass("hidden");
            } else {
                if((parseInt(metaParent.attr('data-level'))+1) === parseInt($(this).attr('data-level'))) {
                    $(this).slideDown();
                }
            }
        });
    });

    $('div.header > i.fa').click(function(){
        var children = getChildren($(this).parent());
        var metaParent = $(this).parent();
        var parent = $(this);
        $(this).toggleClass("fa-caret-down").toggleClass("fa-caret-right");
        $.each(children, function() {
            if(parent.hasClass("fa-caret-right")) {
                $(this).slideUp();
                $(this).find('i').removeClass("fa-caret-down").addClass("fa-caret-right");
            } else {
                if((parseInt(metaParent.attr('data-level'))+1) === parseInt($(this).attr('data-level'))) {
                    $(this).slideDown();
                }
            }
        });
    });
});
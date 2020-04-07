
function tableSort($that) {
    $(".sorts a", $that).each(function () {
        $(this).unbind("click").bind("click", function () {
            tableContentClose();
            var direction = $(this).attr("data-sort");
            var name = $(this).closest("td,th").attr("data-name");
            //var $rows = $that.find('tr').not(".drow-header");
            var $table = $(this).closest(".dtable");

            // close expanded rows
            $table.find('.drow.opener').removeClass("opener");
            $table.find('.drow.opened').remove();

            var $rows = $('tbody > tr', $table).not(".drow-header");

            // toggle to next value
            switch (direction)
            {
                case 'asc':
                    direction = 'desc';
                    break;

                case 'desc':
                    direction = 'none';
                    break;

                case 'none':
                    direction = 'asc';
                    break;
            }

            $('.sort.sort-toggle').attr('data-sort', 'none'); // reset all other
            $(this).attr("data-sort", direction);

            $rows.sort(function (a, b) {
                var keyA, keyB, sortDirection;

                switch (direction)
                {
                    case 'none': // use row id
                        keyA = $(a).attr('data-row-zaehler');
                        keyB = $(b).attr('data-row-zaehler');
                        sortDirection = 'asc';
                        break;

                    default: // use cell value
                        keyA = $("*[data-name='" + name + "'] .searchable", a).text().toLowerCase();
                        keyB = $("*[data-name='" + name + "'] .searchable", b).text().toLowerCase();
                        sortDirection = direction;
                }

                switch (sortDirection)
                {
                    case 'asc':
                        return keyA > keyB ? 1 : -1;

                    case 'desc':
                        return keyA < keyB ? 1 : -1;
                }
            });

            $.each($rows, function (index, row) {
                $table.append(row);
            });
        });
    })
}


function tableFilterChange($that) {
    var $content = $that;
    $(".filter-list select", $content).each(function () {
        var name = $(this).attr("name");
        var select_val = $(this).val();

        if (select_val == -1) {
        } else {
            var $row = $(".dtable .drow", $content).not(".drow-header");
            var sammle=[];
            $row.each(function (index ) {
                $(this).find("*[data-name='" + name + "'] .td").each(function ( ) {
                    $(this).find(".filterable").each(function ( ) {
                        var ex=select_val.split("#####");
                        if (ex.indexOf($(this).text())!=-1) {
                            sammle[index]=index;
                        }
                    });
                });
            });
            $row.each(function (index ) {
                if (sammle.indexOf(index)!=-1) {} else {
                     $(this).css("display", "none");
                    $(this).addClass("filter_notfound");
                }
            });
           
        }
    });
    $(window).trigger('resize');
}


function tableFilter($that) {
    var $content = $that;
    $(".filter-list select", $content).each(function () {
        $(this).unbind("change").bind("change", function () {
            tableContentClose();
            $(".dtable .drow", $content).not(".search_notfound").css("display", "");
            $(".dtable .drow", $content).removeClass("filter_notfound");
            tableFilterChange($that);
            if ($(this).val() == "-1") {
                $(this).removeClass("changed");
            } else {
                $(this).addClass("changed");
            }
        });
    });
}


function tableFilterTrigger($that) {
    var $content = $that.closest(".template_table");

    // $(".dtable",$content).addClass("fadeOut");

    $($that).unbind("click").bind("click", function () {
        // $(".dtable",$content).addClass("fadeOut");

        if ($(window).width() <= 900) {


            var that = $(".filter-list", $content);



            var overlay = $(".filter-overlay", $content);
            if (that.hasClass("sichtbar")) {
                that.removeClass("sichtbar");
                that.css("transform", "");

                overlay.css("display", "block");
                overlay.animate({
                    opacity: 0
                }, 150, function () {
                    overlay.css("display", "none");

                });



                $("html", topmain.document).unbind('click.filterhelperoutside');
            } else {
                var ps_filter_nav = new PerfectScrollbar(".filter-list", {
                    wheelSpeed: 2,
                    wheelPropagation: false,
                    minScrollbarLength: 20
                });
                that.addClass("sichtbar");
                that.css("transform", "translateX(0)");

                overlay.css("display", "block");
                overlay.animate({
                    opacity: 1
                }, 150, function () {

                });


                $("html", topmain.document).unbind("click.filterhelperoutside").bind('click.filterhelperoutside', function (e) {
                    if (
                            ($(e.target).closest("div[name=menu]").length === 0) &&
                            ($(e.target).closest(".filter-trigger").length === 0) &&
                            ($(e.target).closest(".filter-list").length === 0)
                            ) {
                        $that.trigger("click");
                    }
                });
            }
        } else {

            if (!$content.hasClass("filter_open")) {
                $content.addClass("filter_open");
            } else {
                $content.removeClass("filter_open");
            }
            setTimeout(function () {
                $(window).trigger('resize');
            }, 300);

        }
    });
}

var tableWidth_collapsed_trigger=false;
function tableWidth($that) {
    
    var table = $that;
    var table_width = table.width();
    var table_inner = table.find("> .dtable");
    var table_inner_width = table_inner.width();

    var first_row = table_inner.find("tbody > .drow:first-child");
    var collapse_element = first_row.find(".drow2").not(".collapsed").not(".mit_priority").not(".collapsed-more").last();

    var priority = [];


    if (table_inner_width > table_width && collapse_element.length > 0) {

        collapse_element.css("display", "none").addClass("collapsed");

        table_inner.find(".drow").each(function () {
            $(this).find(".drow2").eq(collapse_element.index()).css("display", "none").addClass("collapsed");
        });
        tableWidth_collapsed_trigger=true;
        tableWidth($that);
        return;
    }
    if (table_inner_width > table_width && collapse_element.length <= 0) {

        var last_higher = 0;
        var last_higher_element = null;
        first_row.find(".drow2").not(".collapsed").not(".collapsed-more").each(function () {
            var priority = $(this).attr("data-priority");
            //console.log("priority "+priority);
            if (parseInt(priority) > parseInt(last_higher)) {
                last_higher = priority;
                last_higher_element = $(this);
            }
        });
        //console.log("last_higher "+last_higher);
        last_higher_element.css("display", "none").addClass("collapsed");
        table_inner.find(".drow").each(function () {
            $(this).find(".drow2").eq(last_higher_element.index()).css("display", "none").addClass("collapsed");
        });
        tableWidth_collapsed_trigger=true;
        tableWidth($that);
        return;
    }

    setTimeout(function () {
        if (tableWidth_collapsed_trigger==false) {
            $that.find(".collapsed_trigger").css("display","none");
        }
        table_inner.removeClass("fadeOut");
       
    }, 100);
}


function tableWidthInit($that) {
    tableWidth_collapsed_trigger=false;
    $that.find("> .dtable").addClass("fadeOut");
    $that.find(".collapsed_trigger").css("display","");
    var table = $that;
    table.find(".collapsed").css("display", "").removeClass("collapsed");
    if ($(window).outerWidth() < 992) {
        return;
    }
    tableWidth($that);
    jq1112(window).resized(
        function () {
            tableContentClose();
            $that.find(".collapsed_trigger").css("display","");
            tableWidth_collapsed_trigger=false;
            $that.find("> .dtable").addClass("fadeOut");
            tableWidthInit($that);
        }, 100
   );
}


function tableContentClose() {
    $(".content_expand").closest(".drow").each(function() {
        var ele=$(this);
        ele.removeClass("opener");
        ele.next(".opened").remove();
        ele.next(".opened").remove();
        ele.find(".content_expand i").html("add_circle_outline");
    }); 
}

function tableContentExpand(ele) {
    ele = ele.closest(".drow");

    if (!ele.hasClass("opener")) {
        var collapse_element = ele.find(".collapsed").not(".collapsed-more");
        var table_inner = ele.closest(".dtable");
        var first_row = table_inner.find("tbody > .drow:first-child");
        var html = "<div class='dtable_inner'>";
        collapse_element.each(function () {
            var that = $(this);

     
           
            
   

            html += "<div class='drow_inner'><div class='dcol_inner'>" + first_row.find(".drow2").eq($(this).index()).find(".dcol").html() + "</div><div class='dcol_inner'>" + that.find(".dcol").eq(1).html() + "</div></div>";
        })
        html += "</div></div>";

        ele.addClass("opener");
        
        
        var inner_table=$("<tr class='drow opened'><td colspan='100'>" + html + "</td></tr>");
        $(".template_tooltip.remove_on_tablecontentexpand",inner_table).each(function() {
            template_tooltip_destroy($(this));
        });
        $(".template_text.remove_on_tablecontentexpand",inner_table).each(function() {
            template_truncate_destroy($(this));
        });
        
        inner_table.insertAfter(ele);
        $("<tr class='drow opened' style='display: none'><td></td></tr>").insertAfter(ele);

        ele.find(".content_expand i").html("remove_circle_outline");
    } else {
        ele.removeClass("opener");
        ele.next(".opened").remove();
        ele.next(".opened").remove();
        ele.find(".content_expand i").html("add_circle_outline");
    }

    runFunctionsByDataTag('data-on-document-changed', false);
}


function tableContentExpandInit($that) {
    var $content = $that;

    $(".content_expand", $content).unbind("click").bind("click", function () {
        tableContentExpand($(this));
    });
}






function tableSearch($that) {
    var $content = $that;

    $(".table-search input", $content).unbind("keyup").bind("keyup", function (event) {
        if (event.which == 40 || event.which == 38) {
        } else {
            tableContentClose();
            var searchtext = $(this).val();

            var such2 = searchtext;
            such2 = such2.replace("ä", "ae").replace("ö", "oe").replace("ü", "ue");
            such2 = such2.replace("Ä", "Ae").replace("Ö", "Oe").replace("Ü", "Ue");

            var such3 = searchtext;
            such3 = such3.replace("ae", "ä").replace("oe", "ö").replace("ue", "ü");
            such3 = such3.replace("Ae", "Ä").replace("Oe", "Ö").replace("Ue", "Ü");

            if (searchtext == "") {
                $(".dtable .drow", $content).not(".drow-header").each(function () {
                    var $row = $(this);
                    $(".searchable", $row).each(function () {
                        jq1112(this).html(jq1112(this).html()
                                .split("<!--highlight1--><span class='found'>").join("")
                                .split('<!--highlight1--><span class="found">').join("")
                                .split("</span><!--highlight2-->").join("")
                                );
                    });
                    $row.removeClass("search_notfound");
                    $row.not(".filter_notfound").css("display", "");
                });
                return;
            }


            var regex = new RegExp(searchtext + "", 'i');
            var regex2 = new RegExp(such2 + "", 'i');
            var regex3 = new RegExp(such3 + "", 'i');

            $(".dtable .drow", $content).not(".drow-header").each(function () {
                var $row = $(this);
                var etwas_gefunden = false;
                $(".searchable", $row).each(function () {
                    if ($(this).closest(".th").length===0) {
                        
                    
                    var text = $(this).text();
                    
                    if ($(this).attr("truncated-text") && $(this).attr("truncated-text")!='') {
                        text = $(this).attr("truncated-text");
                    }
                    
                    var results = text.match(regex);
                    var results2 = text.match(regex2);
                    var results3 = text.match(regex3);


                    if ((results != null && results.length > 0 && results[0] != "") || (results2 != null && results2.length > 0 && results2[0] != "") || (results3 != null && results3.length > 0 && results3[0] != "")) {
                        if (results != null && results.length > 0 && results[0] != "") {
                            var result2 = text.replace(results[0], "<!--highlight1--><span class='found'>" + results[0] + "</span><!--highlight2-->");
                        }

                        if (results2 != null && results2.length > 0 && results2[0] != "") {
                            var result2 = text.replace(results2[0], "<!--highlight1--><span class='found'>" + results2[0] + "</span><!--highlight2-->");
                        }

                        if (results3 != null && results3.length > 0 && results3[0] != "") {
                            var result2 = text.replace(results3[0], "<!--highlight1--><span class='found'>" + results3[0] + "</span><!--highlight2-->");
                        }
                        etwas_gefunden = true;
                        
                        
                        if ($(this).attr("truncated-text") && $(this).attr("truncated-text")!='') {
                        } else {
                        
                        $(this).html(result2);
                    }
                    } else {
                        $(this).html($(this).html()
                                .split("<!--highlight1--><span class='found'>").join("")
                                .split('<!--highlight1--><span class="found">').join("")
                                .split("</span><!--highlight2-->").join("")
                                );
                    }
                    }
                });
                if (etwas_gefunden) {
                    $row.removeClass("search_notfound");
                    $row.not(".filter_notfound").css("display", "");
                } else {
                    $(this).css("display", "none").addClass("search_notfound");
                }
            })
        }
    });
}



var currentlyScrolling = false;

var SCROLL_AREA_TOP_HEIGHT = 56; // Distance from window's top and bottom edge.
var SCROLL_AREA_BOTTOM_HEIGHT = 34; // Distance from window's top and bottom edge.


function tableSortable($that) {


    //$(document).scrollTop( {scrolltop} );

   
    $that.find(".dtable > tbody").sortable({
        axis: "y",
        //     cursorAt: { top: -30 },
        placeholder: "ui-state-highlight",
        items: "tr:not(.notsortaable)",
        scroll: true,
        //    scrollSensitivity: 450,
        revert: false,
        forcePlaceholderSize: false,
        forceHelperSize: false,
        //    helper: "clone",
        opacity: 1,
        tolerance: 'pointer',
        handle: ".sortable_move",
        distance: 0,
        create: function (event, ui) {
             
        },
        update: function (event, ui) {
            var richtung = '';
            var target = -1;


            if (parseInt(ui.item.prev().attr('data-row-zaehler')) > parseInt(ui.item.attr('data-row-zaehler'))) {
                richtung = "&unten=" + ui.item.attr('data-row-id');
                target = ui.item.prev().attr('data-row-id');
            } else {
                richtung = "&oben=" + ui.item.attr('data-row-id');
                target = ui.item.next().attr('data-row-id');
            }


            var url = $that.find(".sortable_href").attr("data-href");
            url = url + richtung + "&target=" + target;


            template_progressbar.start();
            RequestHelper.get(url, function (response) {



                jq1112("div[name='main']").css("opacity", "0");
                setTimeout(function () {
                    jq1112("div[name='main']").html(response);
                    jq1112("div[name='main']").css("opacity", "1");

                    jq1112("div[name='main']").ready(function () {
                        document_ready();
                        window_load();
                        template_progressbar.end();
                    });
                }, 40);

            }, true, true, true);
            
            $that.find("*[oldcss]").each(function() {
                $(this).attr("style",$(this).attr("oldcss"));
            });
           // $that.find(".dtable > tbody").sortable( "refreshPositions" );
            // window.location.href = "admin_telefonreport.php?" + richtung + "&sortrang=1&target=" + target + "&parent_id=" + $("input[name='parent_id']").val() + "&fragen=" + $("input[name='fragen']").val() + "&scrollTop=" + $(document).scrollTop();
        },
        sort: function (event, ui) {
            // $(".ui-state-highlight").html("<td colspan='100'></td>");
         
           
            // autoScroll();
          
            if (currentlyScrolling) {
                return;
            }

            var windowHeight = $(window).height();
            var mouseYPosition = event.clientY;
            var mouseYPosition = (ui.item.offset().top);
//console.log((mouseYPosition-jq1112(document).scrollTop())+" "+(SCROLL_AREA_TOP_HEIGHT)+" "+($that.find(".dtable > tbody .notsortaable").offset().top+$that.find(".dtable > tbody .notsortaable").height()));

            if ((mouseYPosition - jq1112(document).scrollTop()) < SCROLL_AREA_TOP_HEIGHT) {
                currentlyScrolling = true;

                $('html, body').animate({
                    scrollTop: "-=" + ui.item.height() + "px" // Scroll up half of window height.
                },
                        800, // 400ms animation.
                        function () {
                            currentlyScrolling = false;
                        });

            } else if ((mouseYPosition + ui.item.height() - jq1112(document).scrollTop()) > (windowHeight - SCROLL_AREA_BOTTOM_HEIGHT)) {

                currentlyScrolling = true;

                $('html, body').animate({
                    scrollTop: "+=" + ui.item.height() + "px" // Scroll down half of window height.
                },
                        800, // 400ms animation.
                        function () {
                            currentlyScrolling = false;
                        });

            }
     

        },
        start: function (event, ui) {
            $(".ui-state-highlight").css("display","none");
            ui.item.css("position","relative");


           // ui.item.attr("oldcss",(typeof ui.item.attr("style") != typeof undefined?ui.item.attr("style"):" "));
            ui.item.css("width",ui.item.closest("table").outerWidth());
            ui.item.css("height",ui.item.height());
            
            
            $that.find(".dtable > tbody > tr:first-child").each(function() {
               $(this).attr("oldcss",(typeof $(this).attr("style") != typeof undefined?$(this).attr("style"):" "));
                $(this).css("width",$(this).outerWidth());
            });
            $that.find(".dtable > tbody > tr:first-child").find(".drow2").each(function() {
                $(this).attr("oldcss",(typeof $(this).attr("style") != typeof undefined?$(this).attr("style"):" "));
                $(this).css("width",$(this).outerWidth());
            });
            ui.item.find(".drow2").each(function() {
                $(this).attr("oldcss",(typeof $(this).attr("style") != typeof undefined?$(this).attr("style"):" "));
                $(this).css("height",$(this).outerHeight());
                $(this).css("width",$(this).outerWidth());
            });
            
            
            
            
            $(".ui-state-highlight").css("width", ui.item.closest("table").outerWidth());
            $(".ui-state-highlight").css("height", ui.item.height());
            $(".ui-state-highlight").html("<td colspan='1000'></td>");
             ui.item.css("position","absolute");
             $(".ui-state-highlight").css("display","");
        },
        stop: function (event, ui) {
       
            $that.find("*[oldcss]").each(function() {
                $(this).attr("style",$(this).attr("oldcss"));
            });
           // $that.find(".dtable > tbody").sortable( "refresh" );
           // ui.item.find(".dcol").css("border","");
        }
    });
    $that.find(".dtable > tbody").disableSelection();
}










                  
function template_table_getFloatWidth(ele) {
    //return parseInt(window.getComputedStyle(ele).width.split("px").join(""));
    return parseInt(ele.outerWidth());
}             
   
function template_table_getFloatHeight(ele) {
    //return parseInt(window.getComputedStyle(ele).height.split("px").join(""));
    return parseInt(ele.outerHeight());
}    

function template_table_froze_head_reset() {
    
    //jq1112( document ).unbind("my")
    jq1112(".table-jsfixed-clone").remove();
    var z=0;
    jq1112(".table-jsfixed").each(function() {
        var doc=jq1112(this).attr("data-jsfixed-target");
        var doc2=doc;
        if (typeof doc != typeof undefined && doc!=null && doc && doc!="") {
        } else {
            doc=document;
            doc2="document";
        }
        
        var main_table=jq1112(this);
        
        var thz=0;
        main_table.find("tr").eq(0).find("th").each(function() {
            main_table.find("tr").eq(0).find("th").eq(thz).css("width","");
            thz++;
        }); 
        main_table.css("width","");
        
        jq1112( document ).unbind("scroll.froze_head"+doc2);
        jq1112( doc ).unbind("scroll.froze_head"+doc2);
        z++;
    });
}

function frozeHead(tag) {

    return;
    if (crm_version>61) {} else { return; }
    template_table_froze_head_reset();
  
    
    //console.log("froze_head");
    if (typeof tag != typeof undefined && tag!="") {} else {
        tag=".table-jsfixed";
    }

    var z=0;
    jq1112(tag).each(function() {
     
        var a2=0;
        var l2=0;
        var scroll=0;
        
        var main_table=jq1112(this);
        
        var doc=main_table.attr("data-jsfixed-target");
        var doc2=doc;
        if (typeof doc != typeof undefined && doc!=null && doc && doc!="") {
        } else {
            doc=document;
            doc2="document";
        }
        
        //jq1112(doc).scrollTop( 0 );
  
        var head_table=main_table.clone(true);
        head_table.removeClass("table-jsfixed").addClass("table-jsfixed-clone");
        head_table.html("");

        var firstTR = main_table.find("tr").eq(0);
        if (jq1112(firstTR).hasClass("heading")) {
            firstTR = main_table.find("tr").eq(1);
        }
        head_table.append(firstTR.clone(true));
        //head_table.find("tr").eq(0).find("th").each(function() {
          //  jq1112(this).html("<div style='display:block;'>"+jq1112(this).html()+"</div>");
        //});
        
      
        head_table.insertBefore(main_table);
        head_table.wrap("<div style='position:fixed; width:100%; z-index:1; overflow-x:hidden;'></div>");
        var head=head_table.parent();
        head.addClass("table-jsfixed-clone");
        
        

        
        var thz=0;
        firstTR.find("th").each(function() {
            //main_table_tr0.find("th").eq(thz).css("width",w);
            head_table.find("tr").eq(0).find("th").eq(thz).css("width",jq1112(this).outerWidth());
            thz++;
        }); 
       

        head_table.css({"width":template_table_getFloatWidth(main_table),"height":template_table_getFloatHeight(head_table),"position":"relative"});
        main_table.css("width",template_table_getFloatWidth(main_table));
        head.css({"height":template_table_getFloatHeight(head_table),"display":"none"});
        
       
        var a=main_table.offset().top+jq1112(doc).scrollTop();
        var l=main_table.offset().left+jq1112(doc).scrollLeft();


        if (jq1112(doc).hasVerticalScrollBar()) {
            head.css("width",(jq1112(doc).width()-scrollbarWidth()));
        } else {
            head.css("width",jq1112(doc).width());
        }

        jq1112(doc).unbind("scoll.froze_head"+doc2).bind("scroll.froze_head"+doc2, { main_table: main_table,head_table:head_table,a:a,l:l,head:head  },function(event) {
 
            var scroll=jq1112(this).scrollTop();
            var scroll2=jq1112(this).scrollLeft();

            var main_table=event.data.main_table;
            var head_table=event.data.head_table;
            var head=event.data.head;
            var a2=event.data.a;
            var l2=event.data.l;

            var a=main_table.offset().top;
            var l=main_table.offset().left;




            var abfang_top=0;
            var abfang_left=0;
            var doc_ask=56;

            if (doc!=document) {

                doc_ask=jq1112(this).offset().top;
                abfang_top=jq1112(document).scrollTop();
                abfang_left=jq1112(document).scrollLeft();
            }

           //console.log("a"+a+" scroll:"+scroll+" a2:"+a2+" doc_ask:"+doc_ask+" height"+(doc_ask-scroll)+" "+(((-1*a)-scroll)<=getFloatHeight(main_table)-40)+" "+((-1*a)-scroll)+" "+(getFloatHeight(main_table)-40)+" ");

 

            if ((main_table.offset().top-scroll)<doc_ask && (scroll-(a2-doc_ask))<(template_table_getFloatHeight(main_table)-40)) {
                head.css({"top":(doc_ask-abfang_top),left:((l2-(scroll2+(l-l2)))-abfang_left),"z-index":"1","display":"block","position":"fixed"});
                head_table.css({left:(l-l2)});
            } else {
                head.css({"top":doc_ask,left:l,"z-index":"1","display":"none","position":"fixed"});
            }

        });

        if (doc!=document) {
            jq1112( document ).unbind("scroll.froze_head"+doc2).bind("scroll.froze_head"+doc2,function() {    	
                jq1112(doc).triggerHandler("scroll.froze_head"+doc2);
            });
        }
        jq1112(document).triggerHandler("scroll.froze_head"+doc2);
        jq1112(document).unbind("froze_head").bind('froze_head',function() {
           froze_head(); 
        });
    });
    
}

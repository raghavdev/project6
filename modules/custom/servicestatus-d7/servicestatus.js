/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function ShowHide(div)
{
    (jQuery)("#" + div).toggle();
}

(function($) {

    Drupal.behaviors.servicestatus = {
        attach: function (context, settings) {
            
            var t = parseInt($.cookie('ss_mode'));
            
            // alert ("cookie is : '" + t + "'");
            // This code below will auto select a particular tab if it's an agency homepage.  So on LIRR homepage, the LIRR status tab is shown

            var page_req = window.location.pathname;

            if (page_req == "/nyct")
                t = 3;
            else if (page_req == "/lirr")
                t = 2;
            else if (page_req == "/mnr")
                t = 5;
            else if (page_req == "/bandt")
                t = 4;
	    else if (page_req == "/nyct-subways")
                t = 1;

            switch (t) {
                case 1:
                    selectSubwayTab();
                    break;
                case 2:
                    selectlirrTab();
                    break;
                case 3:
                    selectBusTab();
                    break;
                case 4:
                    selectBntTab();
                    break;
                case 5:
                    selectmnrTab();
                    break;
                default:
                    selectSubwayTab();
                    break;
            }
            $("#statusblock-tabs ul li").wrapInner('<span></span>'); 


            // Add custom function here
            $("#subwayTab", context).click(function() {
                selectSubwayTab();
            });            
            
            $("#railTab", context).click(function() {
                selectRailTab();
            });

            $("#mnrTab", context).click(function() {
                selectmnrTab();
            });
            
            $("#lirrTab", context).click(function() {
                selectlirrTab();
            });
            
            
            $("#busTab", context).click(function() {
                selectBusTab();
            });
            
            $("#bntTab", context).click(function() {
                selectBntTab();
            });
            
            function selectSubwayTab () {
                $("#bntDiv").hide();
                $("#subwayDiv").show();
                $("#lirrDiv").hide();
                $("#mnrDiv").hide();
                $("#busDiv").hide();

                $("#bntTab").removeClass("selectedStatusTab");
                $("#busTab").removeClass("selectedStatusTab");
                $("#subwayTab").removeClass("notselectedStatusTab");
                $("#lirrTab").removeClass("selectedStatusTab");
                $("#mnrTab").removeClass("selectedStatusTab");
                $("#subwayTab").addClass("selectedStatusTab");

                $.cookie('ss_mode', '1', {path: '/'});
//                alert ("Subway - cookie is : " + $.cookie('ss_mode'));
            }
            
            function selectRailTab () {
                $("#subwayDiv").hide();
                $("#busDiv").hide();
                $("#bntDiv").hide();
                $("#railDiv").show();

                $("#bntTab").removeClass("selectedStatusTab");
                $("#busTab").removeClass("selectedStatusTab");
                $("#railTab").removeClass("notselectedStatusTab");
                $("#subwayTab").removeClass("selectedStatusTab");
                $("#railTab").addClass("selectedStatusTab");

                $.cookie('ss_mode', '2', {path: '/'});
//                alert ("Rail - cookie is : " + $.cookie('tab'));
            }

            function selectlirrTab () {
                $("#subwayDiv").hide();
                $("#busDiv").hide();
                $("#bntDiv").hide();
                $("#mnrDiv").hide();
                $("#lirrDiv").show();

                $("#bntTab").removeClass("selectedStatusTab");
                $("#busTab").removeClass("selectedStatusTab");
                $("#lirrTab").removeClass("notselectedStatusTab");
                $("#mnrTab").removeClass("selectedStatusTab");
                $("#subwayTab").removeClass("selectedStatusTab");
                $("#lirrTab").addClass("selectedStatusTab");

                $.cookie('ss_mode', '3', {path: '/'});
//                alert ("LIRR - cookie is : " + $.cookie('tab'));
            }

            function selectmnrTab () {
                $("#subwayDiv").hide();
                $("#busDiv").hide();
                $("#bntDiv").hide();
                $("#lirrDiv").hide();
                $("#mnrDiv").show();

                $("#bntTab").removeClass("selectedStatusTab");
                $("#busTab").removeClass("selectedStatusTab");
                $("#lirrTab").removeClass("selectedStatusTab");
                $("#mnrTab").removeClass("notselectedStatusTab");
                $("#subwayTab").removeClass("selectedStatusTab");
                $("#mnrTab").addClass("selectedStatusTab");

                $.cookie('ss_mode', '4', {path: '/'});
//                alert ("MNR - cookie is : " + $.cookie('tab'));
            }
            
            function selectBusTab () {
                $("#subwayDiv").hide();
                $("#lirrDiv").hide();
                $("#mnrDiv").hide();
                $("#bntDiv").hide();
                $("#busDiv").show();

                $("#bntTab").removeClass("selectedStatusTab");
                $("#lirrTab").removeClass("selectedStatusTab");
                $("#mnrTab").removeClass("selectedStatusTab");
                $("#subwayTab").removeClass("selectedStatusTab");
                $("#busTab").removeClass("notselectedStatusTab");
                $("#busTab").addClass("selectedStatusTab");

                $.cookie('ss_mode', '5', {path: '/'});
//                alert ("Bus - cookie is : " + $.cookie('ss_mode'));
            }

            function selectBntTab () {
                $("#subwayDiv").hide();
                $("#lirrDiv").hide();
                $("#mnrDiv").hide();
                $("#busDiv").hide();
                $("#bntDiv").show();

                $("#busTab").removeClass("selectedStatusTab");
                $("#lirrTab").removeClass("selectedStatusTab");
                $("#mnrTab").removeClass("selectedStatusTab");;
                $("#subwayTab").removeClass("selectedStatusTab");
                $("#bntTab").removeClass("notselectedStatusTab");
                $("#bntTab").addClass("selectedStatusTab");

                $.cookie('ss_mode', '6', {path: '/'});
//                alert ("Bnt - cookie is : " + $.cookie('tab'));
            }
        }       
    }
}(jQuery));

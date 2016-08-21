/*
* --------------------------------------------------------------------------------------------------------------------
* main navigation toggling
* --------------------------------------------------------------------------------------------------------------------
*/


(function() {
  $(document).ready(function() {
    var body, click_event, content, nav, nav_toggler;
    nav_toggler = $("header .toggle-nav");
    nav = $("#main-nav");
    content = $("#content");
    body = $("body");
    click_event = (jQuery.support.touch ? "tap" : "click");
    
    $("#main-nav .dropdown-collapse").on(click_event, function(e) {
      var link, list;
      e.preventDefault();
      link = $(this);
      list = link.parent().find("> ul");
      if (list.is(":visible")) {
        if (body.hasClass("main-nav-closed") && link.parents("li").length === 1) {
          false;
        } else {
          link.removeClass("in");
          list.slideUp(300, function() {
            return $(this).removeClass("in");
          });
        }
      } else {
        if (list.parents("ul.nav.nav-stacked").length === 1) {
          $(document).trigger("nav-open");
        }
        link.addClass("in");
        list.slideDown(300, function() {
          return $(this).addClass("in");
        });
      }
      return false;
    });
    if (jQuery.support.touch) {
      nav.on("swiperight", function(e) {
        return $(document).trigger("nav-open");
      });
      nav.on("swipeleft", function(e) {
        return $(document).trigger("nav-close");
      });
    }
    nav_toggler.on(click_event, function() {
    	
      if (nav_open()) {
        $(document).trigger("nav-close");
      } else {  
        $(document).trigger("nav-open");
      }
      return false;
    });
    $(document).bind("nav-close", function(event, params) {
      var nav_open;
      body.removeClass("main-nav-opened").addClass("main-nav-closed");
      return nav_open = false;
    });
    return $(document).bind("nav-open", function(event, params) {
      var nav_open;
      body.addClass("main-nav-opened").removeClass("main-nav-closed");
      return nav_open = true;
    });
  });

  this.nav_open = function() {
    return $("body").hasClass("main-nav-opened") || $("#main-nav").width() > 50;
  };
  
   //hide a div after 3 seconds
		    setTimeout(function(){ $(".alert").slideUp(); }, 3000);
		    
//		    $('[data-toggle="confirmation"]').confirmation();
//		    $('[data-toggle="confirmation-singleton"]').confirmation({singleton:true});
//		    $('[data-toggle="confirmation-popout"]').confirmation({popout: true});
    		
    		var data = JSON.parse(localStorage.getItem("lomsNavigation"));
    		
    		if(data != null){
    			var dataLevel = data.level;
    			var dataName = data.name;
    			console.log(dataLevel);
   				console.log(dataName);
   			
    			switch (dataLevel){
    			
    				case 1:
    					$(".navigation").find("a[data-name='" + dataName + "']").parent('li').addClass('active');
    				break;
    				
    				case 2:
    					var menuActive = $(".navigation").find("a[data-name='" + dataName + "']");
    					menuActive.parent('li').addClass('active');
    					menuActive.parent('li').parent('ul').addClass('in');
    					menuActive.parent('li').parent('ul').parent('li').addClass('active');
    				break;
    				
    				case 3:
    					var menuActive = $(".navigation").find("a[data-name='" + dataName + "']");
    					menuActive.parent('li').addClass('active');
    					menuActive.parent('li').parent('ul').addClass('in');
    					menuActive.parent('li').parent('ul').parent('li').parent('ul').addClass('in');
    					menuActive.parent('li').parent('ul').parent('li').parent('ul').parent('li').addClass('active');
    				break;
    				
    				case 4:
    					var menuActive = $(".navigation").find("a[data-name='" + dataName + "']");
    					menuActive.parent('li').addClass('active');
    					menuActive.parent('li').parent('ul').addClass('in');
    					menuActive.parent('li').parent('ul').parent('li').parent('ul').addClass('in');
    					menuActive.parent('li').parent('ul').parent('li').parent('ul').parent('li').parent('ul').addClass('in');
    					menuActive.parent('li').parent('ul').parent('li').parent('ul').parent('li').parent('ul').parent('li').addClass('active');
    				break;
    				
    				default:
    					$(".navigation").find("a[data-name='overview']").parent('li').addClass('active');
    				break;
    				}
   			} else {
   				$(".navigation").find("a[data-name='overview']").parent('li').addClass('active');
   			}
    		
    		$(".breadcrumb a.home").click(function(){
    			tempData = {
					    level : '1',
					    name: 'overview',
				  };
				 
				  // Saving element in local storage
				  localStorage.setItem("lomsNavigation", JSON.stringify(tempData));
    		});
    		
    		$(".navigation a").click(function(){
    			var dataLevel = $(this).data('level');
    			
    			if(dataLevel != undefined){
    				var dataName = $(this).data('name');
    				
    				tempData = {
					    level : dataLevel,
					    name: dataName,
				  };
				 
				  // Saving element in local storage
				  localStorage.setItem("lomsNavigation", JSON.stringify(tempData));
    			}
    			
    		});

  /*
  * --------------------------------------------------------------------------------------------------------------------
  * plugin initializations
  * --------------------------------------------------------------------------------------------------------------------
  */


  $(document).ready(function() {
    var touch;
    setTimeAgo();
    setScrollable();
    setSortable($(".sortable"));
    setSelect2();
    setAutoSize();
    setCharCounter();
    setMaxLength();
    setValidateForm();
    /*
    * --------------------------------------------------------------------------------------------------------------------
    * removes .box after click on .box-remove button
    * --------------------------------------------------------------------------------------------------------------------
    */

    $(".box .box-remove").on("click", function(e) {
      $(this).parents(".box").first().remove();
      e.preventDefault();
      return false;
    });
    /*
    * --------------------------------------------------------------------------------------------------------------------
    * collapse .box after click on .box-collapse button
    * --------------------------------------------------------------------------------------------------------------------
    */

    $(".box .box-collapse").on("click", function(e) {
      var box;
      box = $(this).parents(".box").first();
      box.toggleClass("box-collapsed");
      e.preventDefault();
      return false;
    });
    /*
    * --------------------------------------------------------------------------------------------------------------------
    * password strength
    * --------------------------------------------------------------------------------------------------------------------
    */

    if (jQuery().pwstrength) {
      $('.pwstrength').pwstrength({
        showVerdicts: false
      });
    }
    /*
    * --------------------------------------------------------------------------------------------------------------------
    * check all checkboxes in table with class only-checkbox
    * --------------------------------------------------------------------------------------------------------------------
    */

    $(".check-all").on("click", function(e) {
      return $(this).parents("table:eq(0)").find(".only-checkbox :checkbox").attr("checked", this.checked);
    });
    /*
    * --------------------------------------------------------------------------------------------------------------------
    * setting up responsive tabs
    * --------------------------------------------------------------------------------------------------------------------
    */

    if (jQuery().tabdrop) {
      $('.nav-responsive.nav-pills, .nav-responsive.nav-tabs').tabdrop();
    }
    /*
    * --------------------------------------------------------------------------------------------------------------------
    * setting up datatables
    * --------------------------------------------------------------------------------------------------------------------
    */

    setDataTable($(".data-table"));
    setDataTable($(".data-table-column-filter"));
    /*
    * --------------------------------------------------------------------------------------------------------------------
    * setting up basic wysiwyg
    * --------------------------------------------------------------------------------------------------------------------
    */

    if (jQuery().wysihtml5) {
      $('.wysihtml5').wysihtml5();
    }
    /*
    * --------------------------------------------------------------------------------------------------------------------
    * setting up sortable list
    * --------------------------------------------------------------------------------------------------------------------
    */

    if (jQuery().nestable) {
      $('.dd-nestable').nestable();
    }
    /*
    * --------------------------------------------------------------------------------------------------------------------
    * affixing main navigation
    * --------------------------------------------------------------------------------------------------------------------
    */

    if (!$("body").hasClass("fixed-header")) {
      if (jQuery().affix) {
        $('#main-nav.main-nav-fixed').affix({
          offset: 40
        });
      }
    }
    /*
    * --------------------------------------------------------------------------------------------------------------------
    * setting up bootstrap popovers
    * --------------------------------------------------------------------------------------------------------------------
    */

    touch = false;
    if (window.Modernizr) {
      touch = Modernizr.touch;
    }
    if (!touch) {
      $("body").on("mouseenter", ".has-popover", function() {
        var el;
        el = $(this);
        if (el.data("popover") === undefined) {
          el.popover({
            placement: el.data("placement") || "top",
            container: "body"
          });
        }
        return el.popover("show");
      });
      $("body").on("mouseleave", ".has-popover", function() {
        return $(this).popover("hide");
      });
    }
    /*
    * --------------------------------------------------------------------------------------------------------------------
    * setting up bootstrap tooltips
    * --------------------------------------------------------------------------------------------------------------------
    */

    touch = false;
    if (window.Modernizr) {
      touch = Modernizr.touch;
    }
    if (!touch) {
      $("body").on("mouseenter", ".has-tooltip", function() {
        var el;
        el = $(this);
        if (el.data("tooltip") === undefined) {
          el.tooltip({
            placement: el.data("placement") || "top",
            container: "body"
          });
        }
        return el.tooltip("show");
      });
      $("body").on("mouseleave", ".has-tooltip", function() {
        return $(this).tooltip("hide");
      });
    }
    /*
    * --------------------------------------------------------------------------------------------------------------------
    * replacing svg images for png fallback
    * --------------------------------------------------------------------------------------------------------------------
    */

    if (window.Modernizr && Modernizr.svg === false) {
      $("img[src*=\"svg\"]").attr("src", function() {
        return $(this).attr("src").replace(".svg", ".png");
      });
    }
    /*
    * --------------------------------------------------------------------------------------------------------------------
    * color pickers
    * --------------------------------------------------------------------------------------------------------------------
    */

    if (jQuery().colorpicker) {
      $(".colorpicker-hex").colorpicker({
        format: "hex"
      });
      $(".colorpicker-rgb").colorpicker({
        format: "rgb"
      });
    }
    /*
    * --------------------------------------------------------------------------------------------------------------------
    * datetimepickers
    * --------------------------------------------------------------------------------------------------------------------
    */

    if (jQuery().datetimepicker) {
      $(".datetimepicker-input").datetimepicker({
        icons: {
          time: "icon-time",
          date: "icon-calendar",
          up: "icon-arrow-up",
          down: "icon-arrow-down"
        }
      });
      $(".datepicker-input").datetimepicker({
        pickTime: false,
        icons: {
          time: "icon-time",
          date: "icon-calendar",
          up: "icon-arrow-up",
          down: "icon-arrow-down"
        }
      });
      $(".timepicker-input").datetimepicker({
        pickDate: false,
        icons: {
          time: "icon-time",
          date: "icon-calendar",
          up: "icon-arrow-up",
          down: "icon-arrow-down"
        }
      });
    }
    /*
    * --------------------------------------------------------------------------------------------------------------------
    * setting bootstrap file input
    * --------------------------------------------------------------------------------------------------------------------
    */

    if (jQuery().bootstrapFileInput) {
      $('input[type=file]').bootstrapFileInput();
    }
    /*
    * --------------------------------------------------------------------------------------------------------------------
    * modernizr fallbacks
    * --------------------------------------------------------------------------------------------------------------------
    */

    if (window.Modernizr) {
      if (!Modernizr.input.placeholder) {
        $("[placeholder]").focus(function() {
          var input;
          input = $(this);
          if (input.val() === input.attr("placeholder")) {
            input.val("");
            return input.removeClass("placeholder");
          }
        }).blur(function() {
          var input;
          input = $(this);
          if (input.val() === "" || input.val() === input.attr("placeholder")) {
            input.addClass("placeholder");
            return input.val(input.attr("placeholder"));
          }
        }).blur();
        return $("[placeholder]").parents("form").submit(function() {
          return $(this).find("[placeholder]").each(function() {
            var input;
            input = $(this);
            if (input.val() === input.attr("placeholder")) {
              return input.val("");
            }
          });
        });
      }
    }
  });

  /*
  * --------------------------------------------------------------------------------------------------------------------
  * max length counter
  * --------------------------------------------------------------------------------------------------------------------
  */


  this.setMaxLength = function(selector) {
    if (selector == null) {
      selector = $(".char-max-length");
    }
    if (jQuery().maxlength) {
      return selector.maxlength();
    }
  };

  /*
  * --------------------------------------------------------------------------------------------------------------------
  * character counter
  * --------------------------------------------------------------------------------------------------------------------
  */


  this.setCharCounter = function(selector) {
    if (selector == null) {
      selector = $(".char-counter");
    }
    if (jQuery().charCount) {
      return selector.charCount({
        allowed: selector.data("char-allowed"),
        warning: selector.data("char-warning"),
        cssWarning: "text-warning",
        cssExceeded: "text-error"
      });
    }
  };

  /*
  * --------------------------------------------------------------------------------------------------------------------
  * autosize feature for expanding textarea elements
  * --------------------------------------------------------------------------------------------------------------------
  */


  this.setAutoSize = function(selector) {
    if (selector == null) {
      selector = $(".autosize");
    }
    if (jQuery().autosize) {
      return selector.autosize();
    }
  };

  /*
  * --------------------------------------------------------------------------------------------------------------------
  * timeago feature converts static time to dynamically refreshed
  * --------------------------------------------------------------------------------------------------------------------
  */


  this.setTimeAgo = function(selector) {
    if (selector == null) {
      selector = $(".timeago");
    }
    if (jQuery().timeago) {
      jQuery.timeago.settings.allowFuture = true;
      jQuery.timeago.settings.refreshMillis = 60000;
      selector.timeago();
      return selector.addClass("in");
    }
  };

  /*
  * --------------------------------------------------------------------------------------------------------------------
  * scrollable boxes
  * --------------------------------------------------------------------------------------------------------------------
  */


  this.setScrollable = function(selector) {
    if (selector == null) {
      selector = $(".scrollable");
    }
    if (jQuery().slimScroll) {
      return selector.each(function(i, elem) {
        return $(elem).slimScroll({
          height: $(elem).data("scrollable-height"),
          start: $(elem).data("scrollable-start") || "top"
        });
      });
    }
  };

  /*
  * --------------------------------------------------------------------------------------------------------------------
  * jquery ui sortable
  * --------------------------------------------------------------------------------------------------------------------
  */


  this.setSortable = function(selector) {
    if (selector == null) {
      selector = null;
    }
    if (jQuery().sortable) {
      if (selector) {
        return selector.sortable({
          axis: selector.data("sortable-axis"),
          connectWith: selector.data("sortable-connect")
        });
      }
    }
  };

  /*
  * --------------------------------------------------------------------------------------------------------------------
  * select 2 selects
  * --------------------------------------------------------------------------------------------------------------------
  */


  this.setSelect2 = function(selector) {
    if (selector == null) {
      selector = $(".select2");
    }
    if (jQuery().select2) {
      return selector.each(function(i, elem) {
        return $(elem).select2();
      });
    }
  };

  /*
  * --------------------------------------------------------------------------------------------------------------------
  * datatables
  * --------------------------------------------------------------------------------------------------------------------
  */


  this.setDataTable = function(selector) {
    if (jQuery().dataTable) {
      return selector.each(function(i, elem) {
        var dt, sdom;
        var defs = new Array;
        
        if ($(elem).data("pagination-top-bottom") === true) {
          sdom = "<'row datatables-top'<'col-sm-6'l><'col-sm-6 text-right'pf>r>t<'row datatables-bottom'<'col-sm-6'i><'col-sm-6 text-right'p>>";
        } else if ($(elem).data("pagination-top") === true) {
          sdom = "<'row datatables-top'<'col-sm-6'l><'col-sm-6 text-right'pf>r>t<'row datatables-bottom'<'col-sm-6'i><'col-sm-6 text-right'>>";
        } else {
          sdom = "<'row datatables-top'<'col-sm-6'l><'col-sm-6 text-right'f>r>t<'row datatables-bottom'<'col-sm-6'i><'col-sm-6 text-right'p>>";
        }
        
         if ($(elem).hasClass("data-table-column-filter")) {
        	var columnType = $(elem).find("thead tr th");
        	var isItem = [];
        	console.log("==============================");
        	$(columnType).each(function(k , value){
        		//console.log($(this).data('column-type'));
        		//console.log($(this).data('column-hide'));
        		if($(this).data('column-hide') != undefined){
        			defs[k] = {visible: false};
        		} else {
        			defs[k] = {visible: true};
        		}
        		
        		if($(this).data('column-type') != undefined ){
        			if($(this).data('column-type') != "select"){
	        			isItem[k] = {type : $(this).data('column-type')};
	        		} else {
	        			if($(this).data('column-values') !== undefined){
	        				var isValue = $(this).data('column-values').split(',');
		        			//console.log(isValue);
		        			isItem[k] = {type : $(this).data('column-type'), values : isValue};
	        			} else {
	        				isItem[k] = {type : $(this).data('column-type')};
	        			}
	        		}
        		} else {
        			isItem[k] = {type : 'text'};
        		}
        	});
        }
         
         console.log(defs);
        
        dt = $(elem).dataTable({
          sDom:  'C<"clear">lfrtip',
          columns: defs,
	        colVis: {
        		buttonText: "<i class='icon-ellipsis-vertical'></i> Change columns",
	            restore: "Restore",
	            showAll: "Show all",
	            showNone: "Show none"
	        },
          sPaginationType: "bootstrap",
          "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
          "iDisplayLength": $(elem).data("pagination-records") || 50,
          oLanguage: {
            sLengthMenu: "_MENU_ records per page"
          },
          fnDrawCallback: function(oSettings) {
        	var wrapper = $(this).closest('.dataTables_wrapper');
        	wrapper.find('th.action').css("width", "80px");
            wrapper.find('div[id$=_filter] input').css("width", "200px");
            wrapper.find('div[id$=_info]').addClass('col-xs-12 col-sm-4');
            wrapper.find('div[id$=_paginate]').addClass('col-xs-12 col-sm-6 text-right');
            wrapper.find('.ColVis_MasterButton').removeClass('ColVis_Button').addClass('btn btn-sm');
            wrapper.find('div[id$=_filter] input').addClass("form-control input-sm").attr('placeholder', $(this).closest('.dataTables_wrapper').find('div[id$=_filter] label').text().replace(":", "..."));
            return
          }
        });
        
       	
        if ($(elem).hasClass("data-table-column-filter")) {
	     //return defs;
          return dt.columnFilter({
			aoColumns: isItem
		  });
        }
                
      });
    }
  };

  /*
  * --------------------------------------------------------------------------------------------------------------------
  * form validation
  * --------------------------------------------------------------------------------------------------------------------
  */


  this.setValidateForm = function(selector) {
    if (selector == null) {
      selector = $(".validate-form");
    }
    if (jQuery().validate) {
      return selector.each(function(i, elem) {
        return $(elem).validate({
          errorElement: "span",
          errorClass: "help-block has-error",
          errorPlacement: function(e, t) {
            return t.parents(".controls").first().append(e);
          },
          highlight: function(e) {
            return $(e).closest('.form-group').removeClass("has-error has-success").addClass('has-error');
          },
          success: function(e) {
            return e.closest(".form-group").removeClass("has-error");
          }
        });
      });
    }
  };

}).call(this);
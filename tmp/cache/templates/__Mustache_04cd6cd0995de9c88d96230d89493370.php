<?php

class __Mustache_04cd6cd0995de9c88d96230d89493370 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div id="ai_top_bar_content" class="container-fluid">
';
        $buffer .= $indent . '	<div class="ai_top_bar_expander visible-xs-inline-block visible-sm-inline-block hidden-md hidden-lg col-xs-6">
';
        $buffer .= $indent . '		<a id="ai_top_bar_toggler" href="javascript:void(0);"><span class="menu-expander"></span> ';
        $value = $this->resolveValue($context->find('title'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '</a>
';
        $buffer .= $indent . '	</div>
';
        $buffer .= $indent . '	<div class="ai_top_bar_expander visible-xs-inline-block visible-sm-inline-block hidden-md hidden-lg col-xs-6 text-right">
';
        $buffer .= $indent . '		<a id="ai_top_bar_toggler_user" href="javascript:void(0);">';
        $value = $this->resolveValue($context->findDot('user.img_html_small'), $context, $indent);
        $buffer .= $value;
        $buffer .= '</a>
';
        $buffer .= $indent . '	</div>
';
        $buffer .= $indent . '	<div id="ai_top_bar_sections" class="row">
';
        $buffer .= $indent . '		<div class="sectioned_content left_content col-md-8">
';
        $buffer .= $indent . '			<ul class="main_menu level_1">
';
        // 'user.is_logged_in' section
        $value = $context->findDot('user.is_logged_in');
        $buffer .= $this->section0080670eae0a59b3f4f391a6b27b1b07($context, $indent, $value);
        $buffer .= $indent . '			</ul>
';
        $buffer .= $indent . '		</div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '		<!--<div class="sectioned_content mid_content">< !-- empty -- ></div>-->
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '		<div class="sectioned_content right_content col-md-4">
';
        // 'multisearch.stat' section
        $value = $context->findDot('multisearch.stat');
        $buffer .= $this->sectionA61fb8bbd7408497858e5e76e0d1d3b3($context, $indent, $value);
        $buffer .= $indent . '			<ul class="main_menu level_1 user_account_menu">
';
        // 'edit_toggle.stat' section
        $value = $context->findDot('edit_toggle.stat');
        $buffer .= $this->section91c9a492a887ed8cfa50824a21ad0785($context, $indent, $value);
        // 'sitestat.stat' section
        $value = $context->findDot('sitestat.stat');
        $buffer .= $this->section12d17b6709a9017880b7844a60dd6d77($context, $indent, $value);
        // 'cart.stat' section
        $value = $context->findDot('cart.stat');
        $buffer .= $this->sectionB29f0780e3958353c5d90f8194056af0($context, $indent, $value);
        // 'tokens.stat' section
        $value = $context->findDot('tokens.stat');
        $buffer .= $this->section1280acf393e94eda8417732e1d991724($context, $indent, $value);
        // 'user.is_logged_in' section
        $value = $context->findDot('user.is_logged_in');
        $buffer .= $this->section4c860d3cbfad9fcf70f09c5854e04154($context, $indent, $value);
        $buffer .= $indent . '			</ul>
';
        $buffer .= $indent . '		</div>
';
        $buffer .= $indent . '	</div>
';
        $buffer .= $indent . '</div>
';
        $buffer .= $indent . '<div id="meta_search_results" class="clearfix"></div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<script>
';
        $buffer .= $indent . 'var NEW_PANEL_WIDTH = 300;
';
        $buffer .= $indent . 'var $panels_container = null;
';
        $buffer .= $indent . 'var total_runs = 0;
';
        $buffer .= $indent . '
';
        $buffer .= $indent . 'function do_menu_balance() {
';
        $buffer .= $indent . '	//select all panel menus (mainly just admin and user menu - but user menu won\'t be touched
';
        $buffer .= $indent . '	// make sure they don\'t exceed screen height - send excess to a new panel: topbar_push_excess_to_new_panel()
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	view_height = $(window).height() - 30;
';
        $buffer .= $indent . '	if(view_height>760) view_height=760;
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	$(\'div.ai_top_bar_panels\').each(function(){
';
        $buffer .= $indent . '		$panels_container = $(this);
';
        $buffer .= $indent . '		$panels_container.css(\'height\',\'auto\');//fix FF hack
';
        $buffer .= $indent . '		$panels_container.css(\'overflow-y\',\'visible\');//fix FF hack
';
        $buffer .= $indent . '		$panel = $(this).find(\'div.ai_top_bar_panel\');
';
        $buffer .= $indent . '		liarr = $panels_container.data(\'liarr\');
';
        $buffer .= $indent . '		is_backed = (liarr+\'\'!=\'undefined\' && liarr!==false);
';
        $buffer .= $indent . '		$ul = $panel.children(\'ul.nested_level\');
';
        $buffer .= $indent . '		if($ul.length>1) $ul=$ul[0];
';
        $buffer .= $indent . '		if( $panel.length==1 || is_backed) {
';
        $buffer .= $indent . '			//BACKUP OR RESTORE THE PANELS DIV ORINGAL HTML: $(this)
';
        $buffer .= $indent . '			if( is_backed )  {
';
        $buffer .= $indent . '				num_li = liarr.length;
';
        $buffer .= $indent . '			}
';
        $buffer .= $indent . '			else {
';
        $buffer .= $indent . '				//LOOP THROUGH ALL LI CHILDREN IN THIS PANEL AND CAPTURE INFO ON EACH ONE
';
        $buffer .= $indent . '				i = 0;
';
        $buffer .= $indent . '				liarr = [];
';
        $buffer .= $indent . '				$ul.children(\'li.ai_top_bar_li\').each(function() {
';
        $buffer .= $indent . '					liarr[i] = {html:$(this).prop(\'outerHTML\'), pos:$(this).position(), w:$(this).outerWidth(true), h:$(this).outerHeight(true)};
';
        $buffer .= $indent . '					i++;
';
        $buffer .= $indent . '				});
';
        $buffer .= $indent . '				num_li = liarr.length;
';
        $buffer .= $indent . '				$panels_container.data(\'liarr\',liarr);
';
        $buffer .= $indent . '			}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '			//INITIALIZE THE PANELS
';
        $buffer .= $indent . '			panelsarr=[];
';
        $buffer .= $indent . '			for(p=0;p<10;p++) { panelsarr[p]={cnt:0, sum_h:0.0, max_w:0.0, html:""}; }
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '			//LOOP THROUGH THE LI ARR AND ASSIGN TO PANELS
';
        $buffer .= $indent . '			for(i=0;i<num_li;i++) {
';
        $buffer .= $indent . '				li=liarr[i];
';
        $buffer .= $indent . '				//find first pannel it will fit into
';
        $buffer .= $indent . '				for(p=0;p<10;p++) {
';
        $buffer .= $indent . '					//if it will fit (or if it has to fit because it\'s the only one)
';
        $buffer .= $indent . '					if( (panelsarr[p].sum_h + li.h) < view_height  ||  panelsarr[p].cnt==0 ) {
';
        $buffer .= $indent . '						panelsarr[p].cnt += 1;
';
        $buffer .= $indent . '						panelsarr[p].sum_h += li.h;
';
        $buffer .= $indent . '						if(li.w > panelsarr[p].max_w) panelsarr[p].max_w = li.w;
';
        $buffer .= $indent . '						panelsarr[p].html += "\\n" + li.html;
';
        $buffer .= $indent . '						break;
';
        $buffer .= $indent . '					}
';
        $buffer .= $indent . '				}
';
        $buffer .= $indent . '			}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '			//CLEAR THE MAIN CONTAINER
';
        $buffer .= $indent . '			$panels_container.html(\'\');
';
        $buffer .= $indent . '			//LOOP THROUGH NEW PANELS AND DRAW THEM
';
        $buffer .= $indent . '			for(p=0;p<10;p++) {
';
        $buffer .= $indent . '				if(panelsarr[p].cnt==0) break;
';
        $buffer .= $indent . '				$panels_container.append(\'<div class="ai_top_bar_panel"><ul class="nested_level">\'+ panelsarr[p].html +\'</ul></div>\');
';
        $buffer .= $indent . '			}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '			//NOW RE-ADJUST ACTUAL PANEL WIDTH NEEDED (EACH CONTAINER IS A DIFFERENT WIDTH DEPENDING ON MENU TEXT LENGTH)
';
        $buffer .= $indent . '			sum_width=0.0;
';
        $buffer .= $indent . '			$panels_container.children(\'div.ai_top_bar_panel\').each(function() { sum_width+=$(this).outerWidth(); });
';
        $buffer .= $indent . '			//set panels container width
';
        $buffer .= $indent . '			$panels_container.width( sum_width + 12 );
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '			//and shift it left to center it
';
        $buffer .= $indent . '			cur_margin_left = parseInt($panels_container.css(\'margin-left\'));
';
        $buffer .= $indent . '			cur_left = $panels_container.offset().left - cur_margin_left;
';
        $buffer .= $indent . '			margin_reduction = parseInt(sum_width/2);
';
        $buffer .= $indent . '			if( (cur_left - margin_reduction) < 0 ) margin_reduction = cur_left;
';
        $buffer .= $indent . '			$panels_container.css(\'margin-left\', (-margin_reduction)+\'px\');// function (index, curValue) { return parseFloat(curValue) - (sum_width/2) + \'px\'; });
';
        $buffer .= $indent . '		}
';
        $buffer .= $indent . '	});
';
        $buffer .= $indent . '}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '//adjust onLoad
';
        $buffer .= $indent . '$(document).ready(do_menu_balance);
';
        $buffer .= $indent . '//adjust 200ms after we\'re done resizing
';
        $buffer .= $indent . '$(window).resize(function() {
';
        $buffer .= $indent . '    clearTimeout($.data(this, \'resize_topbar_timer\'));
';
        $buffer .= $indent . '    $.data(this, \'resize_topbar_timer\', setTimeout(function() {
';
        $buffer .= $indent . '        do_menu_balance();
';
        $buffer .= $indent . '    }, 200));
';
        $buffer .= $indent . '});
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '/************  TB SEARCH MENU ***************/
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '//this var is true when menu is on
';
        $buffer .= $indent . 'var tbsearch_on = false;
';
        $buffer .= $indent . 'var tbsearch_loaded = false;
';
        $buffer .= $indent . 'var tbsearch_sel = 0;
';
        $buffer .= $indent . 'var tbsearch_needle = \'\';
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '//ONLY INITIALIZE THE ADMIN SEARCH TOOL IF WE FIND TBSEARCHBUTTON
';
        $buffer .= $indent . 'if($(\'#tbsearchbutton\').length>0)
';
        $buffer .= $indent . '{
';
        $buffer .= $indent . '	//add search image
';
        $buffer .= $indent . '	$(\'#tbsearchbutton\').html(\'<span class="glyphicon glyphicon-search"></span>\').show();
';
        $buffer .= $indent . '	//add search menu container
';
        $buffer .= $indent . '	$(\'#tbsearchbutton\').after(\'<ul class="tbsearch_nested" id="tbsearch_ul"><input type="text" name="tbsearch_field" id="tbsearch_field" placeholder="Search Menu"></ul>\');
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	//search button is clicked
';
        $buffer .= $indent . '	$(\'#tbsearchbutton\').on(\'click\',function(ev){  tbsearch_toggle(); ev.stopPropagation(); return false; });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	//search field is clicked (user trying to focus on the search field)
';
        $buffer .= $indent . '	$(\'#tbsearch_field\').on(\'click\',function(ev){ ev.stopPropagation(); return true; });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	//DOC READY...
';
        $buffer .= $indent . '	$(document).ready(function() {
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '		//this \'window\'-level click will only be caught if they click on something other than the menu
';
        $buffer .= $indent . '		$(document).on(\'click\',function(ev){ if(tbsearch_on) { tbsearch_close(); } return true;  });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '		$(window).keydown(function(event) {
';
        $buffer .= $indent . '				//ESC
';
        $buffer .= $indent . '				if(event.which==27 && tbsearch_on) { tbsearch_close(); event.preventDefault(); return false;	}
';
        $buffer .= $indent . '				//DOWN ARROW: 40
';
        $buffer .= $indent . '				if(event.which==40 && tbsearch_on) { tbsearch_arrow(+1); event.preventDefault(); return false; }
';
        $buffer .= $indent . '				//UP ARROW: 38   note: right 39, left 37
';
        $buffer .= $indent . '				if(event.which==38 && tbsearch_on) { tbsearch_arrow(-1); event.preventDefault(); return false; }
';
        $buffer .= $indent . '				//ENTER
';
        $buffer .= $indent . '				if(!event.ctrlKey && event.which==13 && tbsearch_on && $(\'.tbsearch_selected\').length>0) { $(\'.tbsearch_selected\')[0].click(); tbsearch_close(); }
';
        $buffer .= $indent . '				//Ctrl-ENTER (open in new tab)
';
        $buffer .= $indent . '				if(event.ctrlKey && (event.which==13 || event.which==10) && tbsearch_on && $(\'.tbsearch_selected\').length>0) { $(\'.tbsearch_selected\').eq(0).clone().attr(\'target\',\'_blank\')[0].click(); tbsearch_close(); event.preventDefault(); event.stopPropagation(); return false; }
';
        $buffer .= $indent . '				//Ctrl-Space for Chrome on Linux
';
        $buffer .= $indent . '				if(event.ctrlKey && event.which==32) { tbsearch_toggle(); event.preventDefault(); return false; }
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '				return true;
';
        $buffer .= $indent . '		});
';
        $buffer .= $indent . '		//Capture \'Ctrl-Space\' (Open/Close the menu)
';
        $buffer .= $indent . '		$(window).keypress(function(event) {
';
        $buffer .= $indent . '				//Ctrl-Space for All browsers & Special handler for Chrome (not Linux Chrome)
';
        $buffer .= $indent . '				if(event.ctrlKey && (event.which==32 || (event.which==0 && event.key==\' \'))) { tbsearch_toggle(); event.preventDefault(); return false; }
';
        $buffer .= $indent . '				//Ctrl-ENTER (open in new tab)
';
        $buffer .= $indent . '				if(event.ctrlKey && (event.which==13 || event.which==10) && tbsearch_on && $(\'.tbsearch_selected\').length>0) { $(\'.tbsearch_selected\').eq(0).clone().attr(\'target\',\'_blank\')[0].click(); tbsearch_close(); event.preventDefault(); event.stopPropagation(); return false; }
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '		    return true;
';
        $buffer .= $indent . '		});
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '		//Onload - load the menu contents
';
        $buffer .= $indent . '		tbsearch_load();
';
        $buffer .= $indent . '	});
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	function tbsearch_toggle() {
';
        $buffer .= $indent . '		if(tbsearch_on) tbsearch_close();
';
        $buffer .= $indent . '		else tbsearch_open();
';
        $buffer .= $indent . '	}
';
        $buffer .= $indent . '	function tbsearch_open() {
';
        $buffer .= $indent . '		tbsearch_on = true;
';
        $buffer .= $indent . '		$(\'#tbsearch_ul\').show(100);
';
        $buffer .= $indent . '		$(\'#tbsearch_field\').val(\'\').focus();
';
        $buffer .= $indent . '		//highlight the first "selected" menu item
';
        $buffer .= $indent . '		$(\'.tbsearch_item\').removeClass(\'tbsearch_selected\');
';
        $buffer .= $indent . '		tbsearch_sel=0;
';
        $buffer .= $indent . '	}
';
        $buffer .= $indent . '	function tbsearch_close() {
';
        $buffer .= $indent . '		tbsearch_on=false;
';
        $buffer .= $indent . '		$(\'#tbsearch_ul\').hide(100);
';
        $buffer .= $indent . '		$(\'ul#tbsearch_ul a\').hide().removetbhighlight();
';
        $buffer .= $indent . '	}
';
        $buffer .= $indent . '	function tbsearch_arrow(direction){
';
        $buffer .= $indent . '		//off the front?
';
        $buffer .= $indent . '		if(tbsearch_sel + direction < 0) return;
';
        $buffer .= $indent . '		//off the end?
';
        $buffer .= $indent . '		if(direction>0 && tbsearch_sel+direction >= $(\'.tbsearch_item:visible\').length) return;
';
        $buffer .= $indent . '		//UPDATE ACTIVE ITEM
';
        $buffer .= $indent . '		$(\'.tbsearch_item:visible\').eq(tbsearch_sel).removeClass(\'tbsearch_selected\');
';
        $buffer .= $indent . '		tbsearch_sel += direction;
';
        $buffer .= $indent . '		$(\'.tbsearch_item:visible\').eq(tbsearch_sel).addClass(\'tbsearch_selected\');
';
        $buffer .= $indent . '	}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	function tbsearch_load(){
';
        $buffer .= $indent . '		//only need to load the search_menu contents once
';
        $buffer .= $indent . '		if(tbsearch_loaded) return;
';
        $buffer .= $indent . '		url_arr = new Array();
';
        $buffer .= $indent . '		$searchmenu = $(\'#tbsearch_ul\');
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '		//FASTER METHOD NOW THAT THEY HAVE THE \'STXT\' ATTRIBUTE ON THEM ALREADY
';
        $buffer .= $indent . '		//only get links with images
';
        $buffer .= $indent . '		$(\'#ai_top_bar ul.nested_level li.ai_top_bar_li  > a[stxt!=""]\').each(function(){
';
        $buffer .= $indent . '			$(this).parent().clone().appendTo($searchmenu);
';
        $buffer .= $indent . '		});
';
        $buffer .= $indent . '		$(\'#tbsearch_ul a\').addClass(\'tbsearch_item\');
';
        $buffer .= $indent . '	}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	//JQUERY HIGHLIGHT (MINIFIED AND CONVERTED TO \'tb\'highlight to avoid conflicts)
';
        $buffer .= $indent . '	jQuery.fn.tbhighlight=function(c){function e(b,c){var d=0;if(3==b.nodeType){var a=b.data.toUpperCase().indexOf(c),a=a-(b.data.substr(0,a).toUpperCase().length-b.data.substr(0,a).length);if(0<=a){d=document.createElement("span");d.className="tbhighlight";a=b.splitText(a);a.splitText(c.length);var f=a.cloneNode(!0);d.appendChild(f);a.parentNode.replaceChild(d,a);d=1}}else if(1==b.nodeType&&b.childNodes&&!/(script|style)/i.test(b.tagName))for(a=0;a<b.childNodes.length;++a)a+=e(b.childNodes[a],c);return d} return this.length&&c&&c.length?this.each(function(){e(this,c.toUpperCase())}):this};jQuery.fn.removetbhighlight=function(){return this.find("span.tbhighlight").each(function(){this.parentNode.firstChild.nodeName;with(this.parentNode)replaceChild(this.firstChild,this),normalize()}).end()};
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	//REFRESH THE SEARCH RESULTS WHEN CHANGED
';
        $buffer .= $indent . '	$("#tbsearch_field").on("keyup", function( e ) {
';
        $buffer .= $indent . '		var needle = $.trim( $(this).val() ).toLowerCase();
';
        $buffer .= $indent . '		if(needle == tbsearch_needle) return;
';
        $buffer .= $indent . '		tbsearch_needle = needle;
';
        $buffer .= $indent . '		$(\'ul#tbsearch_ul a\').hide().removetbhighlight();
';
        $buffer .= $indent . '		tbsearch_sel=0;
';
        $buffer .= $indent . '		if ( needle.length >= 2 ) {
';
        $buffer .= $indent . '			$(\'ul#tbsearch_ul a[stxt*=\\\'\'+needle+\'\\\']\').tbhighlight(needle).css(\'display\',\'block\');
';
        $buffer .= $indent . '			$(\'.tbsearch_item\').removeClass(\'tbsearch_selected\');
';
        $buffer .= $indent . '			$(\'.tbsearch_item:visible\').eq(tbsearch_sel).addClass(\'tbsearch_selected\');
';
        $buffer .= $indent . '		}
';
        $buffer .= $indent . '	});
';
        $buffer .= $indent . '}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</script>
';

        return $buffer;
    }

    private function section48c7ca2ff96669e066a65e32145fabe2(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
				{{>nested}}
				';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                if ($partial = $this->mustache->loadPartial('nested')) {
                    $buffer .= $partial->renderInternal($context, $indent . '				');
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section0080670eae0a59b3f4f391a6b27b1b07(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
				{{#nav_menu_all}}
				{{>nested}}
				{{/nav_menu_all}}
				';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                // 'nav_menu_all' section
                $value = $context->find('nav_menu_all');
                $buffer .= $this->section48c7ca2ff96669e066a65e32145fabe2($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionA61fb8bbd7408497858e5e76e0d1d3b3(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
				<input type=\'text\' class=\'meta_search_input\' placeholder=\'Search...\'>
			';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '				<input type=\'text\' class=\'meta_search_input\' placeholder=\'Search...\'>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section91c9a492a887ed8cfa50824a21ad0785(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
				<li>
					<a onclick="toggle_edit_view();" id="edit_toggle_button"><img src="{{edit_toggle.img}}" style="width:20px;height:20px"/> {{edit_toggle.name}} </a>
				</li>
				';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '				<li>
';
                $buffer .= $indent . '					<a onclick="toggle_edit_view();" id="edit_toggle_button"><img src="';
                $value = $this->resolveValue($context->findDot('edit_toggle.img'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '" style="width:20px;height:20px"/> ';
                $value = $this->resolveValue($context->findDot('edit_toggle.name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= ' </a>
';
                $buffer .= $indent . '				</li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section7d1ab29d1f7d2e920e3f9b607b344a39(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = ' <span class="counter">{{sitestat.count}}</span>';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= ' <span class="counter">';
                $value = $this->resolveValue($context->findDot('sitestat.count'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '</span>';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section12d17b6709a9017880b7844a60dd6d77(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
				<li>
					<a href="{{sitestat.url}}" class="sitestat_display"> {{sitestat.name}}{{#sitestat.count}} <span class="counter">{{sitestat.count}}</span>{{/sitestat.count}}</a>
				</li>
				';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '				<li>
';
                $buffer .= $indent . '					<a href="';
                $value = $this->resolveValue($context->findDot('sitestat.url'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '" class="sitestat_display"> ';
                $value = $this->resolveValue($context->findDot('sitestat.name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                // 'sitestat.count' section
                $value = $context->findDot('sitestat.count');
                $buffer .= $this->section7d1ab29d1f7d2e920e3f9b607b344a39($context, $indent, $value);
                $buffer .= '</a>
';
                $buffer .= $indent . '				</li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3572129cde2630ec7d32c2a7b62937f1(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = ' <span class="counter">{{cart.count}}</span>';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= ' <span class="counter">';
                $value = $this->resolveValue($context->findDot('cart.count'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '</span>';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section303f77446c074de869d867f38744e292(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = ' <span class="counter">{{count}}</span>';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= ' <span class="counter">';
                $value = $this->resolveValue($context->find('count'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '</span>';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3ed53ab5b41111c14f15cf20d8f7a890(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
									<li class="ai_top_bar_li ai_top_bar_li_ ai_top_bar_li_menu_">
										<a href="{{url}}"><span class="glyphicon glyphicon-shopping-cart"></span> {{display_title}}{{#count}} <span class="counter">{{count}}</span>{{/count}}</a>
									</li>
								';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '									<li class="ai_top_bar_li ai_top_bar_li_ ai_top_bar_li_menu_">
';
                $buffer .= $indent . '										<a href="';
                $value = $this->resolveValue($context->find('url'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '"><span class="glyphicon glyphicon-shopping-cart"></span> ';
                $value = $this->resolveValue($context->find('display_title'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                // 'count' section
                $value = $context->find('count');
                $buffer .= $this->section303f77446c074de869d867f38744e292($context, $indent, $value);
                $buffer .= '</a>
';
                $buffer .= $indent . '									</li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section2602aeac77f61fe6778737cfcd1cf7e2(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '

						<a href="{{cart.url}}"><span class="glyphicon glyphicon-shopping-cart"></span> {{cart.name}}{{#cart.count}} <span class="counter">{{cart.count}}</span>{{/cart.count}}</a>
						<div class="ai_top_bar_panels" style="margin: 0 0 0 -40px; width:auto;">
							<ul class="nested_level">
								{{#cart.cart_list}}
									<li class="ai_top_bar_li ai_top_bar_li_ ai_top_bar_li_menu_">
										<a href="{{url}}"><span class="glyphicon glyphicon-shopping-cart"></span> {{display_title}}{{#count}} <span class="counter">{{count}}</span>{{/count}}</a>
									</li>
								{{/cart.cart_list}}
							</ul>
						</div>
					';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '
';
                $buffer .= $indent . '						<a href="';
                $value = $this->resolveValue($context->findDot('cart.url'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '"><span class="glyphicon glyphicon-shopping-cart"></span> ';
                $value = $this->resolveValue($context->findDot('cart.name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                // 'cart.count' section
                $value = $context->findDot('cart.count');
                $buffer .= $this->section3572129cde2630ec7d32c2a7b62937f1($context, $indent, $value);
                $buffer .= '</a>
';
                $buffer .= $indent . '						<div class="ai_top_bar_panels" style="margin: 0 0 0 -40px; width:auto;">
';
                $buffer .= $indent . '							<ul class="nested_level">
';
                // 'cart.cart_list' section
                $value = $context->findDot('cart.cart_list');
                $buffer .= $this->section3ed53ab5b41111c14f15cf20d8f7a890($context, $indent, $value);
                $buffer .= $indent . '							</ul>
';
                $buffer .= $indent . '						</div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionB29f0780e3958353c5d90f8194056af0(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
				<li>
					{{#cart.multiple_carts}}

						<a href="{{cart.url}}"><span class="glyphicon glyphicon-shopping-cart"></span> {{cart.name}}{{#cart.count}} <span class="counter">{{cart.count}}</span>{{/cart.count}}</a>
						<div class="ai_top_bar_panels" style="margin: 0 0 0 -40px; width:auto;">
							<ul class="nested_level">
								{{#cart.cart_list}}
									<li class="ai_top_bar_li ai_top_bar_li_ ai_top_bar_li_menu_">
										<a href="{{url}}"><span class="glyphicon glyphicon-shopping-cart"></span> {{display_title}}{{#count}} <span class="counter">{{count}}</span>{{/count}}</a>
									</li>
								{{/cart.cart_list}}
							</ul>
						</div>
					{{/cart.multiple_carts}}
					{{^cart.multiple_carts}}
						<a href="{{cart.url}}"><span class="glyphicon glyphicon-shopping-cart"></span> {{cart.name}}{{#cart.count}} <span class="counter">{{cart.count}}</span>{{/cart.count}}</a>
					{{/cart.multiple_carts}}
				</li>
				';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '				<li>
';
                // 'cart.multiple_carts' section
                $value = $context->findDot('cart.multiple_carts');
                $buffer .= $this->section2602aeac77f61fe6778737cfcd1cf7e2($context, $indent, $value);
                // 'cart.multiple_carts' inverted section
                $value = $context->findDot('cart.multiple_carts');
                if (empty($value)) {
                    
                    $buffer .= $indent . '						<a href="';
                    $value = $this->resolveValue($context->findDot('cart.url'), $context, $indent);
                    $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                    $buffer .= '"><span class="glyphicon glyphicon-shopping-cart"></span> ';
                    $value = $this->resolveValue($context->findDot('cart.name'), $context, $indent);
                    $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                    // 'cart.count' section
                    $value = $context->findDot('cart.count');
                    $buffer .= $this->section3572129cde2630ec7d32c2a7b62937f1($context, $indent, $value);
                    $buffer .= '</a>
';
                }
                $buffer .= $indent . '				</li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionA39c290bd65823dc852ccb677a4fe186(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '{{>nested}}';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                if ($partial = $this->mustache->loadPartial('nested')) {
                    $buffer .= $partial->renderInternal($context, $indent . '');
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1280acf393e94eda8417732e1d991724(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
				<li>
					<span class="nohref"><img src="includes/modules/tokens/top-bar-coin.svg" class="top-bar-token-coin" alt="">{{tokens.name}} <span class="counter counter-green">{{tokens.balance}}</span></span>
					<ul class="nested_level">
					{{#tokens.menu}}{{>nested}}{{/tokens.menu}}
					</ul>
				</li>
				';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '				<li>
';
                $buffer .= $indent . '					<span class="nohref"><img src="includes/modules/tokens/top-bar-coin.svg" class="top-bar-token-coin" alt="">';
                $value = $this->resolveValue($context->findDot('tokens.name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= ' <span class="counter counter-green">';
                $value = $this->resolveValue($context->findDot('tokens.balance'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '</span></span>
';
                $buffer .= $indent . '					<ul class="nested_level">
';
                $buffer .= $indent . '					';
                // 'tokens.menu' section
                $value = $context->findDot('tokens.menu');
                $buffer .= $this->sectionA39c290bd65823dc852ccb677a4fe186($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '					</ul>
';
                $buffer .= $indent . '				</li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section210a82675005ae574acfb8cd3ce25709(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '<img class="ai_top_bar_menu_img {{img_data_class}}" src="//:0" alt="">';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= '<img class="ai_top_bar_menu_img ';
                $value = $this->resolveValue($context->find('img_data_class'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '" src="//:0" alt="">';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section0e42aa2820a5e7debbce3040e65cc4e8(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '<img class="ai_top_bar_menu_img" src="{{img}}" alt="">';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= '<img class="ai_top_bar_menu_img" src="';
                $value = $this->resolveValue($context->find('img'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '" alt="">';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1f4b5a90509408833459b8d881b59827(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '{{btxt}}';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $value = $this->resolveValue($context->find('btxt'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section4d8add5d17151126a83bb5edfb5d5a89(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
										<li class="ai_top_bar_li ai_top_bar_li_{{id}} ai_top_bar_li_menu_{{has_menu}}">
											<a href="{{href}}">
											{{#img_data_class}}<img class="ai_top_bar_menu_img {{img_data_class}}" src="//:0" alt="">{{/img_data_class}}
											{{^img_data_class}}{{#img}}<img class="ai_top_bar_menu_img" src="{{img}}" alt="">{{/img}}{{/img_data_class}}
											{{#translate}}{{btxt}}{{/translate}}
											</a>
										</li>
										';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '										<li class="ai_top_bar_li ai_top_bar_li_';
                $value = $this->resolveValue($context->find('id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= ' ai_top_bar_li_menu_';
                $value = $this->resolveValue($context->find('has_menu'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '">
';
                $buffer .= $indent . '											<a href="';
                $value = $this->resolveValue($context->find('href'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '">
';
                $buffer .= $indent . '											';
                // 'img_data_class' section
                $value = $context->find('img_data_class');
                $buffer .= $this->section210a82675005ae574acfb8cd3ce25709($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '											';
                // 'img_data_class' inverted section
                $value = $context->find('img_data_class');
                if (empty($value)) {
                    
                    // 'img' section
                    $value = $context->find('img');
                    $buffer .= $this->section0e42aa2820a5e7debbce3040e65cc4e8($context, $indent, $value);
                }
                $buffer .= '
';
                $buffer .= $indent . '											';
                // 'translate' section
                $value = $context->find('translate');
                $buffer .= $this->section1f4b5a90509408833459b8d881b59827($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '											</a>
';
                $buffer .= $indent . '										</li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section4c860d3cbfad9fcf70f09c5854e04154(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
				<li>
					<span class="nohref">
						<span class="ai_top_bar_menu_img">{{{user.img_html_small}}}</span>
						{{user.first_name}}
					</span>
					<div class="ai_top_bar_panels">
						<div class="ai_top_bar_panel ai_top_bar_desc_panel">{{{user.img_html}}}</div>
						<div class="ai_top_bar_panel">
							<ul class="nested_level">
								<li class="ai_top_bar_li ai_top_bar_li_{{id}} ai_top_bar_li_menu_{{has_menu}}">
									<span class="nohref">{{user.full_name}}</span>
									<ul class="nested_level">
										{{#user.menu}}
										<li class="ai_top_bar_li ai_top_bar_li_{{id}} ai_top_bar_li_menu_{{has_menu}}">
											<a href="{{href}}">
											{{#img_data_class}}<img class="ai_top_bar_menu_img {{img_data_class}}" src="//:0" alt="">{{/img_data_class}}
											{{^img_data_class}}{{#img}}<img class="ai_top_bar_menu_img" src="{{img}}" alt="">{{/img}}{{/img_data_class}}
											{{#translate}}{{btxt}}{{/translate}}
											</a>
										</li>
										{{/user.menu}}
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</li>
				';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '				<li>
';
                $buffer .= $indent . '					<span class="nohref">
';
                $buffer .= $indent . '						<span class="ai_top_bar_menu_img">';
                $value = $this->resolveValue($context->findDot('user.img_html_small'), $context, $indent);
                $buffer .= $value;
                $buffer .= '</span>
';
                $buffer .= $indent . '						';
                $value = $this->resolveValue($context->findDot('user.first_name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '
';
                $buffer .= $indent . '					</span>
';
                $buffer .= $indent . '					<div class="ai_top_bar_panels">
';
                $buffer .= $indent . '						<div class="ai_top_bar_panel ai_top_bar_desc_panel">';
                $value = $this->resolveValue($context->findDot('user.img_html'), $context, $indent);
                $buffer .= $value;
                $buffer .= '</div>
';
                $buffer .= $indent . '						<div class="ai_top_bar_panel">
';
                $buffer .= $indent . '							<ul class="nested_level">
';
                $buffer .= $indent . '								<li class="ai_top_bar_li ai_top_bar_li_';
                $value = $this->resolveValue($context->find('id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= ' ai_top_bar_li_menu_';
                $value = $this->resolveValue($context->find('has_menu'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '">
';
                $buffer .= $indent . '									<span class="nohref">';
                $value = $this->resolveValue($context->findDot('user.full_name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '</span>
';
                $buffer .= $indent . '									<ul class="nested_level">
';
                // 'user.menu' section
                $value = $context->findDot('user.menu');
                $buffer .= $this->section4d8add5d17151126a83bb5edfb5d5a89($context, $indent, $value);
                $buffer .= $indent . '									</ul>
';
                $buffer .= $indent . '								</li>
';
                $buffer .= $indent . '							</ul>
';
                $buffer .= $indent . '						</div>
';
                $buffer .= $indent . '					</div>
';
                $buffer .= $indent . '				</li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }
}

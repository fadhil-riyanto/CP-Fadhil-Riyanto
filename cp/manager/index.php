<?php
include ("/laragon/www/admin/conf.php");
?>
<html ng:controller="CoreRootController" class="ng-scope"><head><style type="text/css">[uib-typeahead-popup].dropdown-menu{display:block;}</style><style type="text/css">.uib-time input{width:50px;}</style><style type="text/css">[uib-tooltip-popup].tooltip.top-left > .tooltip-arrow,[uib-tooltip-popup].tooltip.top-right > .tooltip-arrow,[uib-tooltip-popup].tooltip.bottom-left > .tooltip-arrow,[uib-tooltip-popup].tooltip.bottom-right > .tooltip-arrow,[uib-tooltip-popup].tooltip.left-top > .tooltip-arrow,[uib-tooltip-popup].tooltip.left-bottom > .tooltip-arrow,[uib-tooltip-popup].tooltip.right-top > .tooltip-arrow,[uib-tooltip-popup].tooltip.right-bottom > .tooltip-arrow,[uib-tooltip-html-popup].tooltip.top-left > .tooltip-arrow,[uib-tooltip-html-popup].tooltip.top-right > .tooltip-arrow,[uib-tooltip-html-popup].tooltip.bottom-left > .tooltip-arrow,[uib-tooltip-html-popup].tooltip.bottom-right > .tooltip-arrow,[uib-tooltip-html-popup].tooltip.left-top > .tooltip-arrow,[uib-tooltip-html-popup].tooltip.left-bottom > .tooltip-arrow,[uib-tooltip-html-popup].tooltip.right-top > .tooltip-arrow,[uib-tooltip-html-popup].tooltip.right-bottom > .tooltip-arrow,[uib-tooltip-template-popup].tooltip.top-left > .tooltip-arrow,[uib-tooltip-template-popup].tooltip.top-right > .tooltip-arrow,[uib-tooltip-template-popup].tooltip.bottom-left > .tooltip-arrow,[uib-tooltip-template-popup].tooltip.bottom-right > .tooltip-arrow,[uib-tooltip-template-popup].tooltip.left-top > .tooltip-arrow,[uib-tooltip-template-popup].tooltip.left-bottom > .tooltip-arrow,[uib-tooltip-template-popup].tooltip.right-top > .tooltip-arrow,[uib-tooltip-template-popup].tooltip.right-bottom > .tooltip-arrow,[uib-popover-popup].popover.top-left > .arrow,[uib-popover-popup].popover.top-right > .arrow,[uib-popover-popup].popover.bottom-left > .arrow,[uib-popover-popup].popover.bottom-right > .arrow,[uib-popover-popup].popover.left-top > .arrow,[uib-popover-popup].popover.left-bottom > .arrow,[uib-popover-popup].popover.right-top > .arrow,[uib-popover-popup].popover.right-bottom > .arrow,[uib-popover-html-popup].popover.top-left > .arrow,[uib-popover-html-popup].popover.top-right > .arrow,[uib-popover-html-popup].popover.bottom-left > .arrow,[uib-popover-html-popup].popover.bottom-right > .arrow,[uib-popover-html-popup].popover.left-top > .arrow,[uib-popover-html-popup].popover.left-bottom > .arrow,[uib-popover-html-popup].popover.right-top > .arrow,[uib-popover-html-popup].popover.right-bottom > .arrow,[uib-popover-template-popup].popover.top-left > .arrow,[uib-popover-template-popup].popover.top-right > .arrow,[uib-popover-template-popup].popover.bottom-left > .arrow,[uib-popover-template-popup].popover.bottom-right > .arrow,[uib-popover-template-popup].popover.left-top > .arrow,[uib-popover-template-popup].popover.left-bottom > .arrow,[uib-popover-template-popup].popover.right-top > .arrow,[uib-popover-template-popup].popover.right-bottom > .arrow{top:auto;bottom:auto;left:auto;right:auto;margin:0;}[uib-popover-popup].popover,[uib-popover-html-popup].popover,[uib-popover-template-popup].popover{display:block !important;}</style><style type="text/css">.uib-datepicker-popup.dropdown-menu{display:block;float:none;margin:0;}.uib-button-bar{padding:10px 9px 2px;}</style><style type="text/css">.uib-position-measure{display:block !important;visibility:hidden !important;position:absolute !important;top:-9999px !important;left:-9999px !important;}.uib-position-scrollbar-measure{position:absolute !important;top:-9999px !important;width:50px !important;height:50px !important;overflow:scroll !important;}.uib-position-body-scrollbar-measure{overflow:scroll !important;}</style><style type="text/css">.uib-datepicker .uib-title{width:100%;}.uib-day button,.uib-month button,.uib-year button{min-width:100%;}.uib-left,.uib-right{width:100%}</style><style type="text/css">.ng-animate.item:not(.left):not(.right){-webkit-transition:0s ease-in-out left;transition:0s ease-in-out left}</style><style id="ace-solarized-dark">.ace-solarized-dark .ace_gutter {background: #01313f;color: #d0edf7}.ace-solarized-dark .ace_print-margin {width: 1px;background: #33555E}.ace-solarized-dark {background-color: #002B36;color: #93A1A1}.ace-solarized-dark .ace_entity.ace_other.ace_attribute-name,.ace-solarized-dark .ace_storage {color: #93A1A1}.ace-solarized-dark .ace_cursor,.ace-solarized-dark .ace_string.ace_regexp {color: #D30102}.ace-solarized-dark .ace_marker-layer .ace_active-line,.ace-solarized-dark .ace_marker-layer .ace_selection {background: rgba(255, 255, 255, 0.1)}.ace-solarized-dark.ace_multiselect .ace_selection.ace_start {box-shadow: 0 0 3px 0px #002B36;}.ace-solarized-dark .ace_marker-layer .ace_step {background: rgb(102, 82, 0)}.ace-solarized-dark .ace_marker-layer .ace_bracket {margin: -1px 0 0 -1px;border: 1px solid rgba(147, 161, 161, 0.50)}.ace-solarized-dark .ace_gutter-active-line {background-color: #0d3440}.ace-solarized-dark .ace_marker-layer .ace_selected-word {border: 1px solid #073642}.ace-solarized-dark .ace_invisible {color: rgba(147, 161, 161, 0.50)}.ace-solarized-dark .ace_keyword,.ace-solarized-dark .ace_meta,.ace-solarized-dark .ace_support.ace_class,.ace-solarized-dark .ace_support.ace_type {color: #859900}.ace-solarized-dark .ace_constant.ace_character,.ace-solarized-dark .ace_constant.ace_other {color: #CB4B16}.ace-solarized-dark .ace_constant.ace_language {color: #B58900}.ace-solarized-dark .ace_constant.ace_numeric {color: #D33682}.ace-solarized-dark .ace_fold {background-color: #268BD2;border-color: #93A1A1}.ace-solarized-dark .ace_entity.ace_name.ace_function,.ace-solarized-dark .ace_entity.ace_name.ace_tag,.ace-solarized-dark .ace_support.ace_function,.ace-solarized-dark .ace_variable,.ace-solarized-dark .ace_variable.ace_language {color: #268BD2}.ace-solarized-dark .ace_string {color: #2AA198}.ace-solarized-dark .ace_comment {font-style: italic;color: #657B83}.ace-solarized-dark .ace_indent-guide {background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAACCAYAAACZgbYnAAAAEklEQVQImWNg0Db1ZVCxc/sPAAd4AlUHlLenAAAAAElFTkSuQmCC) right repeat-y}
/*# sourceURL=ace/css/ace-solarized-dark */</style><style id="autocompletion.css">.ace_editor.ace_autocomplete .ace_marker-layer .ace_active-line {    background-color: #CAD6FA;    z-index: 1;}.ace_dark.ace_editor.ace_autocomplete .ace_marker-layer .ace_active-line {    background-color: #3a674e;}.ace_editor.ace_autocomplete .ace_line-hover {    border: 1px solid #abbffe;    margin-top: -1px;    background: rgba(233,233,253,0.4);    position: absolute;    z-index: 2;}.ace_dark.ace_editor.ace_autocomplete .ace_line-hover {    border: 1px solid rgba(109, 150, 13, 0.8);    background: rgba(58, 103, 78, 0.62);}.ace_completion-meta {    opacity: 0.5;    margin: 0.9em;}.ace_editor.ace_autocomplete .ace_completion-highlight{    color: #2d69c7;}.ace_dark.ace_editor.ace_autocomplete .ace_completion-highlight{    color: #93ca12;}.ace_editor.ace_autocomplete {    width: 300px;    z-index: 200000;    border: 1px lightgray solid;    position: fixed;    box-shadow: 2px 3px 5px rgba(0,0,0,.2);    line-height: 1.4;    background: #fefefe;    color: #111;}.ace_dark.ace_editor.ace_autocomplete {    border: 1px #484747 solid;    box-shadow: 2px 3px 5px rgba(0, 0, 0, 0.51);    line-height: 1.4;    background: #25282c;    color: #c1c1c1;}
/*# sourceURL=ace/css/autocompletion.css */</style><style>.ace_snippet-marker {    -moz-box-sizing: border-box;    box-sizing: border-box;    background: rgba(194, 193, 208, 0.09);    border: 1px dotted rgba(211, 208, 235, 0.62);    position: absolute;}</style><style>#ace_settingsmenu, #kbshortcutmenu {background-color: #F7F7F7;color: black;box-shadow: -5px 4px 5px rgba(126, 126, 126, 0.55);padding: 1em 0.5em 2em 1em;overflow: auto;position: absolute;margin: 0;bottom: 0;right: 0;top: 0;z-index: 9991;cursor: default;}.ace_dark #ace_settingsmenu, .ace_dark #kbshortcutmenu {box-shadow: -20px 10px 25px rgba(126, 126, 126, 0.25);background-color: rgba(255, 255, 255, 0.6);color: black;}.ace_optionsMenuEntry:hover {background-color: rgba(100, 100, 100, 0.1);transition: all 0.3s}.ace_closeButton {background: rgba(245, 146, 146, 0.5);border: 1px solid #F48A8A;border-radius: 50%;padding: 7px;position: absolute;right: -8px;top: -8px;z-index: 100000;}.ace_closeButton{background: rgba(245, 146, 146, 0.9);}.ace_optionsMenuKey {color: darkslateblue;font-weight: bold;}.ace_optionsMenuCommand {color: darkcyan;font-weight: normal;}.ace_optionsMenuEntry input, .ace_optionsMenuEntry button {vertical-align: middle;}.ace_optionsMenuEntry button[ace_selected_button=true] {background: #e7e7e7;box-shadow: 1px 0px 2px 0px #adadad inset;border-color: #adadad;}.ace_optionsMenuEntry button {background: white;border: 1px solid lightgray;margin: 0px;}.ace_optionsMenuEntry button:hover{background: #f0f0f0;}</style><style>    .error_widget_wrapper {        background: inherit;        color: inherit;        border:none    }    .error_widget {        border-top: solid 2px;        border-bottom: solid 2px;        margin: 5px 0;        padding: 10px 40px;        white-space: pre-wrap;    }    .error_widget.ace_error, .error_widget_arrow.ace_error{        border-color: #ff5a5a    }    .error_widget.ace_warning, .error_widget_arrow.ace_warning{        border-color: #F1D817    }    .error_widget.ace_info, .error_widget_arrow.ace_info{        border-color: #5a5a5a    }    .error_widget.ace_ok, .error_widget_arrow.ace_ok{        border-color: #5aaa5a    }    .error_widget_arrow {        position: absolute;        border: solid 5px;        border-top-color: transparent!important;        border-right-color: transparent!important;        border-left-color: transparent!important;        top: -5px;    }</style><style id="ace-tm">.ace-tm .ace_gutter {background: #f0f0f0;color: #333;}.ace-tm .ace_print-margin {width: 1px;background: #e8e8e8;}.ace-tm .ace_fold {background-color: #6B72E6;}.ace-tm {background-color: #FFFFFF;color: black;}.ace-tm .ace_cursor {color: black;}.ace-tm .ace_invisible {color: rgb(191, 191, 191);}.ace-tm .ace_storage,.ace-tm .ace_keyword {color: blue;}.ace-tm .ace_constant {color: rgb(197, 6, 11);}.ace-tm .ace_constant.ace_buildin {color: rgb(88, 72, 246);}.ace-tm .ace_constant.ace_language {color: rgb(88, 92, 246);}.ace-tm .ace_constant.ace_library {color: rgb(6, 150, 14);}.ace-tm .ace_invalid {background-color: rgba(255, 0, 0, 0.1);color: red;}.ace-tm .ace_support.ace_function {color: rgb(60, 76, 114);}.ace-tm .ace_support.ace_constant {color: rgb(6, 150, 14);}.ace-tm .ace_support.ace_type,.ace-tm .ace_support.ace_class {color: rgb(109, 121, 222);}.ace-tm .ace_keyword.ace_operator {color: rgb(104, 118, 135);}.ace-tm .ace_string {color: rgb(3, 106, 7);}.ace-tm .ace_comment {color: rgb(76, 136, 107);}.ace-tm .ace_comment.ace_doc {color: rgb(0, 102, 255);}.ace-tm .ace_comment.ace_doc.ace_tag {color: rgb(128, 159, 191);}.ace-tm .ace_constant.ace_numeric {color: rgb(0, 0, 205);}.ace-tm .ace_variable {color: rgb(49, 132, 149);}.ace-tm .ace_xml-pe {color: rgb(104, 104, 91);}.ace-tm .ace_entity.ace_name.ace_function {color: #0000A2;}.ace-tm .ace_heading {color: rgb(12, 7, 255);}.ace-tm .ace_list {color:rgb(185, 6, 144);}.ace-tm .ace_meta.ace_tag {color:rgb(0, 22, 142);}.ace-tm .ace_string.ace_regex {color: rgb(255, 0, 0)}.ace-tm .ace_marker-layer .ace_selection {background: rgb(181, 213, 255);}.ace-tm.ace_multiselect .ace_selection.ace_start {box-shadow: 0 0 3px 0px white;}.ace-tm .ace_marker-layer .ace_step {background: rgb(252, 255, 0);}.ace-tm .ace_marker-layer .ace_stack {background: rgb(164, 229, 101);}.ace-tm .ace_marker-layer .ace_bracket {margin: -1px 0 0 -1px;border: 1px solid rgb(192, 192, 192);}.ace-tm .ace_marker-layer .ace_active-line {background: rgba(0, 0, 0, 0.07);}.ace-tm .ace_gutter-active-line {background-color : #dcdcdc;}.ace-tm .ace_marker-layer .ace_selected-word {background: rgb(250, 250, 255);border: 1px solid rgb(200, 200, 250);}.ace-tm .ace_indent-guide {background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAACCAYAAACZgbYnAAAAE0lEQVQImWP4////f4bLly//BwAmVgd1/w11/gAAAABJRU5ErkJggg==") right repeat-y;}
/*# sourceURL=ace/css/ace-tm */</style><style id="ace_editor.css">.ace_br1 {border-top-left-radius    : 3px;}.ace_br2 {border-top-right-radius   : 3px;}.ace_br3 {border-top-left-radius    : 3px; border-top-right-radius:    3px;}.ace_br4 {border-bottom-right-radius: 3px;}.ace_br5 {border-top-left-radius    : 3px; border-bottom-right-radius: 3px;}.ace_br6 {border-top-right-radius   : 3px; border-bottom-right-radius: 3px;}.ace_br7 {border-top-left-radius    : 3px; border-top-right-radius:    3px; border-bottom-right-radius: 3px;}.ace_br8 {border-bottom-left-radius : 3px;}.ace_br9 {border-top-left-radius    : 3px; border-bottom-left-radius:  3px;}.ace_br10{border-top-right-radius   : 3px; border-bottom-left-radius:  3px;}.ace_br11{border-top-left-radius    : 3px; border-top-right-radius:    3px; border-bottom-left-radius:  3px;}.ace_br12{border-bottom-right-radius: 3px; border-bottom-left-radius:  3px;}.ace_br13{border-top-left-radius    : 3px; border-bottom-right-radius: 3px; border-bottom-left-radius:  3px;}.ace_br14{border-top-right-radius   : 3px; border-bottom-right-radius: 3px; border-bottom-left-radius:  3px;}.ace_br15{border-top-left-radius    : 3px; border-top-right-radius:    3px; border-bottom-right-radius: 3px; border-bottom-left-radius: 3px;}.ace_editor {position: relative;overflow: hidden;font: 12px/normal 'Monaco', 'Menlo', 'Ubuntu Mono', 'Consolas', 'source-code-pro', monospace;direction: ltr;text-align: left;-webkit-tap-highlight-color: rgba(0, 0, 0, 0);}.ace_scroller {position: absolute;overflow: hidden;top: 0;bottom: 0;background-color: inherit;-ms-user-select: none;-moz-user-select: none;-webkit-user-select: none;user-select: none;cursor: text;}.ace_content {position: absolute;box-sizing: border-box;min-width: 100%;contain: style size layout;}.ace_dragging .ace_scroller:before{position: absolute;top: 0;left: 0;right: 0;bottom: 0;content: '';background: rgba(250, 250, 250, 0.01);z-index: 1000;}.ace_dragging.ace_dark .ace_scroller:before{background: rgba(0, 0, 0, 0.01);}.ace_selecting, .ace_selecting * {cursor: text !important;}.ace_gutter {position: absolute;overflow : hidden;width: auto;top: 0;bottom: 0;left: 0;cursor: default;z-index: 4;-ms-user-select: none;-moz-user-select: none;-webkit-user-select: none;user-select: none;contain: style size layout;}.ace_gutter-active-line {position: absolute;left: 0;right: 0;}.ace_scroller.ace_scroll-left {box-shadow: 17px 0 16px -16px rgba(0, 0, 0, 0.4) inset;}.ace_gutter-cell {position: absolute;top: 0;left: 0;right: 0;padding-left: 19px;padding-right: 6px;background-repeat: no-repeat;}.ace_gutter-cell.ace_error {background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAABOFBMVEX/////////QRswFAb/Ui4wFAYwFAYwFAaWGAfDRymzOSH/PxswFAb/SiUwFAYwFAbUPRvjQiDllog5HhHdRybsTi3/Tyv9Tir+Syj/UC3////XurebMBIwFAb/RSHbPx/gUzfdwL3kzMivKBAwFAbbvbnhPx66NhowFAYwFAaZJg8wFAaxKBDZurf/RB6mMxb/SCMwFAYwFAbxQB3+RB4wFAb/Qhy4Oh+4QifbNRcwFAYwFAYwFAb/QRzdNhgwFAYwFAbav7v/Uy7oaE68MBK5LxLewr/r2NXewLswFAaxJw4wFAbkPRy2PyYwFAaxKhLm1tMwFAazPiQwFAaUGAb/QBrfOx3bvrv/VC/maE4wFAbRPBq6MRO8Qynew8Dp2tjfwb0wFAbx6eju5+by6uns4uH9/f36+vr/GkHjAAAAYnRSTlMAGt+64rnWu/bo8eAA4InH3+DwoN7j4eLi4xP99Nfg4+b+/u9B/eDs1MD1mO7+4PHg2MXa347g7vDizMLN4eG+Pv7i5evs/v79yu7S3/DV7/498Yv24eH+4ufQ3Ozu/v7+y13sRqwAAADLSURBVHjaZc/XDsFgGIBhtDrshlitmk2IrbHFqL2pvXf/+78DPokj7+Fz9qpU/9UXJIlhmPaTaQ6QPaz0mm+5gwkgovcV6GZzd5JtCQwgsxoHOvJO15kleRLAnMgHFIESUEPmawB9ngmelTtipwwfASilxOLyiV5UVUyVAfbG0cCPHig+GBkzAENHS0AstVF6bacZIOzgLmxsHbt2OecNgJC83JERmePUYq8ARGkJx6XtFsdddBQgZE2nPR6CICZhawjA4Fb/chv+399kfR+MMMDGOQAAAABJRU5ErkJggg==");background-repeat: no-repeat;background-position: 2px center;}.ace_gutter-cell.ace_warning {background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAmVBMVEX///8AAAD///8AAAAAAABPSzb/5sAAAAB/blH/73z/ulkAAAAAAAD85pkAAAAAAAACAgP/vGz/rkDerGbGrV7/pkQICAf////e0IsAAAD/oED/qTvhrnUAAAD/yHD/njcAAADuv2r/nz//oTj/p064oGf/zHAAAAA9Nir/tFIAAAD/tlTiuWf/tkIAAACynXEAAAAAAAAtIRW7zBpBAAAAM3RSTlMAABR1m7RXO8Ln31Z36zT+neXe5OzooRDfn+TZ4p3h2hTf4t3k3ucyrN1K5+Xaks52Sfs9CXgrAAAAjklEQVR42o3PbQ+CIBQFYEwboPhSYgoYunIqqLn6/z8uYdH8Vmdnu9vz4WwXgN/xTPRD2+sgOcZjsge/whXZgUaYYvT8QnuJaUrjrHUQreGczuEafQCO/SJTufTbroWsPgsllVhq3wJEk2jUSzX3CUEDJC84707djRc5MTAQxoLgupWRwW6UB5fS++NV8AbOZgnsC7BpEAAAAABJRU5ErkJggg==");background-position: 2px center;}.ace_gutter-cell.ace_info {background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAAAAAA6mKC9AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAAJ0Uk5TAAB2k804AAAAPklEQVQY02NgIB68QuO3tiLznjAwpKTgNyDbMegwisCHZUETUZV0ZqOquBpXj2rtnpSJT1AEnnRmL2OgGgAAIKkRQap2htgAAAAASUVORK5CYII=");background-position: 2px center;}.ace_dark .ace_gutter-cell.ace_info {background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAJFBMVEUAAAChoaGAgIAqKiq+vr6tra1ZWVmUlJSbm5s8PDxubm56enrdgzg3AAAAAXRSTlMAQObYZgAAAClJREFUeNpjYMAPdsMYHegyJZFQBlsUlMFVCWUYKkAZMxZAGdxlDMQBAG+TBP4B6RyJAAAAAElFTkSuQmCC");}.ace_scrollbar {contain: strict;position: absolute;right: 0;bottom: 0;z-index: 6;}.ace_scrollbar-inner {position: absolute;cursor: text;left: 0;top: 0;}.ace_scrollbar-v{overflow-x: hidden;overflow-y: scroll;top: 0;}.ace_scrollbar-h {overflow-x: scroll;overflow-y: hidden;left: 0;}.ace_print-margin {position: absolute;height: 100%;}.ace_text-input {position: absolute;z-index: 0;width: 0.5em;height: 1em;opacity: 0;background: transparent;-moz-appearance: none;appearance: none;border: none;resize: none;outline: none;overflow: hidden;font: inherit;padding: 0 1px;margin: 0 -1px;contain: strict;-ms-user-select: text;-moz-user-select: text;-webkit-user-select: text;user-select: text;white-space: pre!important;}.ace_text-input.ace_composition {background: transparent;color: inherit;z-index: 1000;opacity: 1;}.ace_composition_placeholder { color: transparent }.ace_composition_marker { border-bottom: 1px solid;position: absolute;border-radius: 0;margin-top: 1px;}[ace_nocontext=true] {transform: none!important;filter: none!important;perspective: none!important;clip-path: none!important;mask : none!important;contain: none!important;perspective: none!important;mix-blend-mode: initial!important;z-index: auto;}.ace_layer {z-index: 1;position: absolute;overflow: hidden;word-wrap: normal;white-space: pre;height: 100%;width: 100%;box-sizing: border-box;pointer-events: none;}.ace_gutter-layer {position: relative;width: auto;text-align: right;pointer-events: auto;height: 1000000px;contain: style size layout;}.ace_text-layer {font: inherit !important;position: absolute;height: 1000000px;width: 1000000px;contain: style size layout;}.ace_text-layer > .ace_line, .ace_text-layer > .ace_line_group {contain: style size layout;position: absolute;top: 0;left: 0;right: 0;}.ace_hidpi .ace_text-layer,.ace_hidpi .ace_gutter-layer,.ace_hidpi .ace_content,.ace_hidpi .ace_gutter {contain: strict;will-change: transform;}.ace_hidpi .ace_text-layer > .ace_line, .ace_hidpi .ace_text-layer > .ace_line_group {contain: strict;}.ace_cjk {display: inline-block;text-align: center;}.ace_cursor-layer {z-index: 4;}.ace_cursor {z-index: 4;position: absolute;box-sizing: border-box;border-left: 2px solid;transform: translatez(0);}.ace_multiselect .ace_cursor {border-left-width: 1px;}.ace_slim-cursors .ace_cursor {border-left-width: 1px;}.ace_overwrite-cursors .ace_cursor {border-left-width: 0;border-bottom: 1px solid;}.ace_hidden-cursors .ace_cursor {opacity: 0.2;}.ace_smooth-blinking .ace_cursor {transition: opacity 0.18s;}.ace_animate-blinking .ace_cursor {animation-duration: 1000ms;animation-timing-function: step-end;animation-name: blink-ace-animate;animation-iteration-count: infinite;}.ace_animate-blinking.ace_smooth-blinking .ace_cursor {animation-duration: 1000ms;animation-timing-function: ease-in-out;animation-name: blink-ace-animate-smooth;}@keyframes blink-ace-animate {from, to { opacity: 1; }60% { opacity: 0; }}@keyframes blink-ace-animate-smooth {from, to { opacity: 1; }45% { opacity: 1; }60% { opacity: 0; }85% { opacity: 0; }}.ace_marker-layer .ace_step, .ace_marker-layer .ace_stack {position: absolute;z-index: 3;}.ace_marker-layer .ace_selection {position: absolute;z-index: 5;}.ace_marker-layer .ace_bracket {position: absolute;z-index: 6;}.ace_marker-layer .ace_active-line {position: absolute;z-index: 2;}.ace_marker-layer .ace_selected-word {position: absolute;z-index: 4;box-sizing: border-box;}.ace_line .ace_fold {box-sizing: border-box;display: inline-block;height: 11px;margin-top: -2px;vertical-align: middle;background-image:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAAJCAYAAADU6McMAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAJpJREFUeNpi/P//PwOlgAXGYGRklAVSokD8GmjwY1wasKljQpYACtpCFeADcHVQfQyMQAwzwAZI3wJKvCLkfKBaMSClBlR7BOQikCFGQEErIH0VqkabiGCAqwUadAzZJRxQr/0gwiXIal8zQQPnNVTgJ1TdawL0T5gBIP1MUJNhBv2HKoQHHjqNrA4WO4zY0glyNKLT2KIfIMAAQsdgGiXvgnYAAAAASUVORK5CYII="),url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAA3CAYAAADNNiA5AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAACJJREFUeNpi+P//fxgTAwPDBxDxD078RSX+YeEyDFMCIMAAI3INmXiwf2YAAAAASUVORK5CYII=");background-repeat: no-repeat, repeat-x;background-position: center center, top left;color: transparent;border: 1px solid black;border-radius: 2px;cursor: pointer;pointer-events: auto;}.ace_dark .ace_fold {}.ace_fold:hover{background-image:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAAJCAYAAADU6McMAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAJpJREFUeNpi/P//PwOlgAXGYGRklAVSokD8GmjwY1wasKljQpYACtpCFeADcHVQfQyMQAwzwAZI3wJKvCLkfKBaMSClBlR7BOQikCFGQEErIH0VqkabiGCAqwUadAzZJRxQr/0gwiXIal8zQQPnNVTgJ1TdawL0T5gBIP1MUJNhBv2HKoQHHjqNrA4WO4zY0glyNKLT2KIfIMAAQsdgGiXvgnYAAAAASUVORK5CYII="),url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAA3CAYAAADNNiA5AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAACBJREFUeNpi+P//fz4TAwPDZxDxD5X4i5fLMEwJgAADAEPVDbjNw87ZAAAAAElFTkSuQmCC");}.ace_tooltip {background-color: #FFF;background-image: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.1));border: 1px solid gray;border-radius: 1px;box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);color: black;max-width: 100%;padding: 3px 4px;position: fixed;z-index: 999999;box-sizing: border-box;cursor: default;white-space: pre;word-wrap: break-word;line-height: normal;font-style: normal;font-weight: normal;letter-spacing: normal;pointer-events: none;}.ace_folding-enabled > .ace_gutter-cell {padding-right: 13px;}.ace_fold-widget {box-sizing: border-box;margin: 0 -12px 0 1px;display: none;width: 11px;vertical-align: top;background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAANElEQVR42mWKsQ0AMAzC8ixLlrzQjzmBiEjp0A6WwBCSPgKAXoLkqSot7nN3yMwR7pZ32NzpKkVoDBUxKAAAAABJRU5ErkJggg==");background-repeat: no-repeat;background-position: center;border-radius: 3px;border: 1px solid transparent;cursor: pointer;}.ace_folding-enabled .ace_fold-widget {display: inline-block;   }.ace_fold-widget.ace_end {background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAANElEQVR42m3HwQkAMAhD0YzsRchFKI7sAikeWkrxwScEB0nh5e7KTPWimZki4tYfVbX+MNl4pyZXejUO1QAAAABJRU5ErkJggg==");}.ace_fold-widget.ace_closed {background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAMAAAAGCAYAAAAG5SQMAAAAOUlEQVR42jXKwQkAMAgDwKwqKD4EwQ26sSOkVWjgIIHAzPiCgaqiqnJHZnKICBERHN194O5b9vbLuAVRL+l0YWnZAAAAAElFTkSuQmCCXA==");}.ace_fold-widget:hover {border: 1px solid rgba(0, 0, 0, 0.3);background-color: rgba(255, 255, 255, 0.2);box-shadow: 0 1px 1px rgba(255, 255, 255, 0.7);}.ace_fold-widget:active {border: 1px solid rgba(0, 0, 0, 0.4);background-color: rgba(0, 0, 0, 0.05);box-shadow: 0 1px 1px rgba(255, 255, 255, 0.8);}.ace_dark .ace_fold-widget {background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAHklEQVQIW2P4//8/AzoGEQ7oGCaLLAhWiSwB146BAQCSTPYocqT0AAAAAElFTkSuQmCC");}.ace_dark .ace_fold-widget.ace_end {background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAH0lEQVQIW2P4//8/AxQ7wNjIAjDMgC4AxjCVKBirIAAF0kz2rlhxpAAAAABJRU5ErkJggg==");}.ace_dark .ace_fold-widget.ace_closed {background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAMAAAAFCAYAAACAcVaiAAAAHElEQVQIW2P4//+/AxAzgDADlOOAznHAKgPWAwARji8UIDTfQQAAAABJRU5ErkJggg==");}.ace_dark .ace_fold-widget:hover {box-shadow: 0 1px 1px rgba(255, 255, 255, 0.2);background-color: rgba(255, 255, 255, 0.1);}.ace_dark .ace_fold-widget:active {box-shadow: 0 1px 1px rgba(255, 255, 255, 0.2);}.ace_inline_button {border: 1px solid lightgray;display: inline-block;margin: -1px 8px;padding: 0 5px;pointer-events: auto;cursor: pointer;}.ace_inline_button:hover {border-color: gray;background: rgba(200,200,200,0.2);display: inline-block;pointer-events: auto;}.ace_fold-widget.ace_invalid {background-color: #FFB4B4;border-color: #DE5555;}.ace_fade-fold-widgets .ace_fold-widget {transition: opacity 0.4s ease 0.05s;opacity: 0;}.ace_fade-fold-widgets:hover .ace_fold-widget {transition: opacity 0.05s ease 0.05s;opacity:1;}.ace_underline {text-decoration: underline;}.ace_bold {font-weight: bold;}.ace_nobold .ace_bold {font-weight: normal;}.ace_italic {font-style: italic;}.ace_error-marker {background-color: rgba(255, 0, 0,0.2);position: absolute;z-index: 9;}.ace_highlight-marker {background-color: rgba(255, 255, 0,0.2);position: absolute;z-index: 8;}.ace_text-input-ios {position: absolute !important;top: -100000px !important;left: -100000px !important;}
/*# sourceURL=ace/css/ace_editor.css */</style><style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>
        <title ng:bind="pageTitle + (pageTitle ? ' | ' : '') + identity.machine.name" class="ng-binding"><?php echo $machine_name;?></title>
        <link rel="shortcut icon" type="image/x-icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAP0lEQVQ4T2NkoBAwUqifYRAaoDjt83983rqfxYviagwvDC4DYM5FdhVJXqDYAGyBSZILBsYAUpP2IEzKpHoBALnHKBFpHX0VAAAAAElFTkSuQmCC">
        <link rel="manifest" href="/api/core/web-manifest">

        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="theme-color" content="#2196F3">
        <meta name="viewport" content="initial-scale=1, user-scalable=no, width=device-width, height=device-height, minimal-ui">

        <link rel="stylesheet" href="./resources/all.vendor.css" type="text/css">
        <link rel="stylesheet" href="./resources/all.css" type="text/css">
        <link rel="stylesheet" href="./resources/core/resources/vendor/fontawesome/css/all.min.css" type="text/css">
        <link rel="stylesheet" href="./resources/core/resources/vendor/fontawesome/css/v4-shims.css" type="text/css">

        <link rel="stylesheet" href="/resources/core/resources/vendor/pt-sans/styles/pt_sans.css" type="text/css">

        <script src="./rejsources/all.vendor.js" type="text/javascript"></script><style>.sv-helper{position: fixed !important;z-index: 99999;margin: 0 !important;}.sv-candidate{}.sv-placeholder{}.sv-sorting-in-progress{-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;}.sv-visibility-hidden{visibility: hidden !important;opacity: 0 !important;}</style>
        <script src="./resources/all.init.js" type="text/javascript"></script>
        <script src="./resources/all.js" type="text/javascript"></script>
        <script src="./resources/all.partials.js" type="text/javascript"></script>

        <style>
            [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
              display: none !important;
            }
        </style>
    <style>._3emE9--dark-theme .-S-tR--ff-downloader{background:rgba(30,30,30,.93);border:1px solid rgba(82,82,82,.54);box-shadow:0 4px 7px rgba(30,30,30,.55);color:#fff}._3emE9--dark-theme .-S-tR--ff-downloader ._6_Mtt--header ._2VdJW--minimize-btn{background:#3d4b52}._3emE9--dark-theme .-S-tR--ff-downloader ._6_Mtt--header ._2VdJW--minimize-btn:hover{background:#131415}._3emE9--dark-theme .-S-tR--ff-downloader ._10vpG--footer{background:rgba(30,30,30,.93)}._2mDEx--white-theme .-S-tR--ff-downloader{background:#fff;border:1px solid rgba(82,82,82,.54);box-shadow:0 4px 7px rgba(30,30,30,.55);color:#314c75}._2mDEx--white-theme .-S-tR--ff-downloader ._6_Mtt--header{font-weight:700}._2mDEx--white-theme .-S-tR--ff-downloader ._2dFLA--container ._2bWNS--notice{border:0;color:rgba(0,0,0,.88)}._2mDEx--white-theme .-S-tR--ff-downloader ._10vpG--footer{background:#fff}.-S-tR--ff-downloader{display:block;overflow:hidden;position:fixed;bottom:20px;right:7.1%;width:330px;height:180px;background:rgba(30,30,30,.93);border-radius:2px;color:#fff;z-index:99999999;border:1px solid rgba(82,82,82,.54);box-shadow:0 4px 7px rgba(30,30,30,.55);transition:.5s}.-S-tR--ff-downloader._3M7UQ--minimize{height:62px}.-S-tR--ff-downloader._3M7UQ--minimize .nxuu4--file-info,.-S-tR--ff-downloader._3M7UQ--minimize ._6_Mtt--header{display:none}.-S-tR--ff-downloader ._6_Mtt--header{padding:10px;font-size:17px;font-family:sans-serif}.-S-tR--ff-downloader ._6_Mtt--header ._2VdJW--minimize-btn{float:right;background:#f1ecec;height:20px;width:20px;text-align:center;padding:2px;margin-top:-10px;cursor:pointer}.-S-tR--ff-downloader ._6_Mtt--header ._2VdJW--minimize-btn:hover{background:#e2dede}.-S-tR--ff-downloader ._13XQ2--error{color:red;padding:10px;font-size:12px;line-height:19px}.-S-tR--ff-downloader ._2dFLA--container{position:relative;height:100%}.-S-tR--ff-downloader ._2dFLA--container .nxuu4--file-info{padding:6px 15px 0;font-family:sans-serif}.-S-tR--ff-downloader ._2dFLA--container .nxuu4--file-info div{margin-bottom:5px;width:100%;overflow:hidden}.-S-tR--ff-downloader ._2dFLA--container ._2bWNS--notice{margin-top:21px;font-size:11px}.-S-tR--ff-downloader ._10vpG--footer{width:100%;bottom:0;position:absolute;font-weight:700}.-S-tR--ff-downloader ._10vpG--footer ._2V73d--loader{-webkit-animation:n0BD1--rotation 3.5s linear forwards;animation:n0BD1--rotation 3.5s linear forwards;position:absolute;top:-120px;left:calc(50% - 35px);border-radius:50%;border:5px solid #fff;border-top-color:#a29bfe;height:70px;width:70px;display:flex;justify-content:center;align-items:center}.-S-tR--ff-downloader ._10vpG--footer ._24wjw--loading-bar{width:100%;height:18px;background:#dfe6e9;border-radius:5px}.-S-tR--ff-downloader ._10vpG--footer ._24wjw--loading-bar ._1FVu9--progress-bar{height:100%;background:#8bc34a;border-radius:5px}.-S-tR--ff-downloader ._10vpG--footer ._2KztS--status{margin-top:10px}.-S-tR--ff-downloader ._10vpG--footer ._2KztS--status ._1XilH--state{float:left;font-size:.9em;letter-spacing:1pt;text-transform:uppercase;width:100px;height:20px;position:relative}.-S-tR--ff-downloader ._10vpG--footer ._2KztS--status ._1jiaj--percentage{float:right}</style></head>
    <body class="global-color-default widescreen-mode-off ">
        <nav class="navbar navbar-default navbar-fixed-top" ng:show="appReady">
            <div class="container">
                <a ng:click="toggleNavigation()" ng:show="navigationPresent" class="navbar-brand navigation-toggle hide-phone hide-tablet">
                   
                </a>

                <a ng:click="toggleOverlayNavigation()" ng:show="navigationPresent" class="navbar-brand navigation-toggle hide-desktop hide-large">
                   
                </a>

                <!-- ngIf: customization.plugins.core.logoURL -->


                <a class="navbar-brand ellipsis" ng:href="/view/" href="/view/">
                    <span class="title ng-binding">
                        <?php echo $machine_name; ?>
                    </span> 
                </a>

                

                <div ng:show="identity.user" class="pull-right">
                    <div uib-dropdown="" class="dropdown">
                       
                        <ul uib-dropdown-menu="" class="dropdown-menu-right dropdown-menu" style="width: 200px">
                            <li>
                                <div class="ng-binding">
                                    <span class="subtle pull-right ng-binding">UID 0</span>
                                    <i class="fa fa-fw fa-user"></i> root
                                </div>
                            </li>
                            <li class="hide-tablet hide-desktop hide-large">
                                <div class="ng-binding">
                                    <i class="fa fa-fw fa-hdd-o"></i> Internsial-Node
                                </div>
                            </li>
                            <!-- ngRepeat: item in customization.plugins.core.extraProfileMenuItems -->
                            <li>
                                <a ng:click="identity.elevate()" ng:show="identity.effective != 0 &amp;&amp; identity.elevation_allowed" class="ng-hide">
                                    <i class="fa fa-fw fa-angle-double-up"></i> <span translate=""><span class="ng-scope">Elevate</span></span>
                                </a>
                            </li>
                            <li>
                                <a ng:click="identity.logout()">
                                    <i class="fa fa-fw fa-power-off"></i> <span translate=""><span class="ng-scope">Log out</span></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <p class="navbar-text pull-right hide-phone ng-binding" style="min-width:99px;">
                    <i class="fa fa-hdd-o"></i> <?php echo $name_owner; ?>
                </p>
                <!-- ngIf: identity.user && resttime < 1800 && resttime >= 0 -->
            </div>
        </nav>

        <div class="container" ng:show="appReady">
            <div class="row">
                <div class="col-md-3 sidebar hide-tablet hide-phone" ng:show="showSidebar &amp;&amp; navigationPresent">
                    <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarTasks.html'" class="ng-scope"><div ng:controller="CoreTasksController" class="ng-scope">
    <!-- ngRepeat: task in tasks.tasks -->
</div></ng:include>
                    <core:sidebar class="ng-scope">
            <div ng:bind-html="customization.plugins.core.sidebarUpperContent" class="ng-binding"></div>
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope isRoot hasChildren" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope isTopLevel hasChildren" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding">
        General
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope active" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        Dashboard
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel --><div ng:if="!item.isRoot &amp;&amp; !item.isTopLevel" class="ng-scope">
        <a ng:click="item.expanded = !item.expanded; $event.stopPropagation(); $event.preventDefault()" ng:show="item.children.length > 0" class="expander ng-hide" href="#">
            <!-- ngIf: item.expanded -->
            <!-- ngIf: !item.expanded --><i ng:if="!item.expanded" class="fa fa-fw fa-caret-right ng-scope"></i><!-- end ngIf: !item.expanded -->
        </a>
        <a ng:href="/view/dashboard" ng:mouseup="feedback.emit('sidebar', {id: item.id})" class="link ng-binding" href="/view/dashboard">
            <i class="fa fa-fw fa-bar-chart" ng:show="item.icon.indexOf(' ') < 0"></i>
            <i class="fa-fw bar-chart ng-hide" ng:show="item.icon.indexOf(' ') > 0"></i>
            Dashboard
        </a>
    </div><!-- end ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        Plugins
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel --><div ng:if="!item.isRoot &amp;&amp; !item.isTopLevel" class="ng-scope">
        <a ng:click="item.expanded = !item.expanded; $event.stopPropagation(); $event.preventDefault()" ng:show="item.children.length > 0" class="expander ng-hide" href="#">
            <!-- ngIf: item.expanded -->
            <!-- ngIf: !item.expanded --><i ng:if="!item.expanded" class="fa fa-fw fa-caret-right ng-scope"></i><!-- end ngIf: !item.expanded -->
        </a>
        <a ng:href="/view/plugins" ng:mouseup="feedback.emit('sidebar', {id: item.id})" class="link ng-binding" href="/view/plugins">
            <i class="fa fa-fw fa-th-large" ng:show="item.icon.indexOf(' ') < 0"></i>
            <i class="fa-fw th-large ng-hide" ng:show="item.icon.indexOf(' ') > 0"></i>
            Plugins
        </a>
    </div><!-- end ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        Settings
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel --><div ng:if="!item.isRoot &amp;&amp; !item.isTopLevel" class="ng-scope">
        <a ng:click="item.expanded = !item.expanded; $event.stopPropagation(); $event.preventDefault()" ng:show="item.children.length > 0" class="expander ng-hide" href="#">
            <!-- ngIf: item.expanded -->
            <!-- ngIf: !item.expanded --><i ng:if="!item.expanded" class="fa fa-fw fa-caret-right ng-scope"></i><!-- end ngIf: !item.expanded -->
        </a>
        <a ng:href="/view/settings" ng:mouseup="feedback.emit('sidebar', {id: item.id})" class="link ng-binding" href="/view/settings">
            <i class="fa fa-fw fa-cog" ng:show="item.icon.indexOf(' ') < 0"></i>
            <i class="fa-fw cog ng-hide" ng:show="item.icon.indexOf(' ') > 0"></i>
            Settings
        </a>
    </div><!-- end ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope isTopLevel hasChildren" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding">
        Tools
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        File Manager
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel --><div ng:if="!item.isRoot &amp;&amp; !item.isTopLevel" class="ng-scope">
        <a ng:click="item.expanded = !item.expanded; $event.stopPropagation(); $event.preventDefault()" ng:show="item.children.length > 0" class="expander ng-hide" href="#">
            <!-- ngIf: item.expanded -->
            <!-- ngIf: !item.expanded --><i ng:if="!item.expanded" class="fa fa-fw fa-caret-right ng-scope"></i><!-- end ngIf: !item.expanded -->
        </a>
        <a ng:href="/view/filemanager//" ng:mouseup="feedback.emit('sidebar', {id: item.id})" class="link ng-binding" href="/view/filemanager//">
            <i class="fa fa-fw fa-folder-o" ng:show="item.icon.indexOf(' ') < 0"></i>
            <i class="fa-fw folder-o ng-hide" ng:show="item.icon.indexOf(' ') > 0"></i>
            File Manager
        </a>
    </div><!-- end ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        Notepad
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel --><div ng:if="!item.isRoot &amp;&amp; !item.isTopLevel" class="ng-scope">
        <a ng:click="item.expanded = !item.expanded; $event.stopPropagation(); $event.preventDefault()" ng:show="item.children.length > 0" class="expander ng-hide" href="#">
            <!-- ngIf: item.expanded -->
            <!-- ngIf: !item.expanded --><i ng:if="!item.expanded" class="fa fa-fw fa-caret-right ng-scope"></i><!-- end ngIf: !item.expanded -->
        </a>
        <a ng:href="/view/notepad" ng:mouseup="feedback.emit('sidebar', {id: item.id})" class="link ng-binding" href="/view/notepad">
            <i class="fa fa-fw fa-pencil" ng:show="item.icon.indexOf(' ') < 0"></i>
            <i class="fa-fw pencil ng-hide" ng:show="item.icon.indexOf(' ') > 0"></i>
            Notepad
        </a>
    </div><!-- end ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        Terminal
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel --><div ng:if="!item.isRoot &amp;&amp; !item.isTopLevel" class="ng-scope">
        <a ng:click="item.expanded = !item.expanded; $event.stopPropagation(); $event.preventDefault()" ng:show="item.children.length > 0" class="expander ng-hide" href="#">
            <!-- ngIf: item.expanded -->
            <!-- ngIf: !item.expanded --><i ng:if="!item.expanded" class="fa fa-fw fa-caret-right ng-scope"></i><!-- end ngIf: !item.expanded -->
        </a>
        <a ng:href="/view/terminal" ng:mouseup="feedback.emit('sidebar', {id: item.id})" class="link ng-binding" href="/view/terminal">
            <i class="fa fa-fw fa-terminal" ng:show="item.icon.indexOf(' ') < 0"></i>
            <i class="fa-fw terminal ng-hide" ng:show="item.icon.indexOf(' ') > 0"></i>
            Terminal
        </a>
    </div><!-- end ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope isTopLevel hasChildren" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding">
        Software
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope hasChildren" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        Services
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel --><div ng:if="!item.isRoot &amp;&amp; !item.isTopLevel" class="ng-scope">
        <a ng:click="item.expanded = !item.expanded; $event.stopPropagation(); $event.preventDefault()" ng:show="item.children.length > 0" class="expander" href="#">
            <!-- ngIf: item.expanded -->
            <!-- ngIf: !item.expanded --><i ng:if="!item.expanded" class="fa fa-fw fa-caret-right ng-scope"></i><!-- end ngIf: !item.expanded -->
        </a>
        <a ng:href="/view/services" ng:mouseup="feedback.emit('sidebar', {id: item.id})" class="link ng-binding" href="/view/services">
            <i class="fa fa-fw fa-cogs" ng:show="item.icon.indexOf(' ') < 0"></i>
            <i class="fa-fw cogs ng-hide" ng:show="item.icon.indexOf(' ') > 0"></i>
            Services
        </a>
    </div><!-- end ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        System V
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel --><div ng:if="!item.isRoot &amp;&amp; !item.isTopLevel" class="ng-scope">
        <a ng:click="item.expanded = !item.expanded; $event.stopPropagation(); $event.preventDefault()" ng:show="item.children.length > 0" class="expander ng-hide" href="#">
            <!-- ngIf: item.expanded -->
            <!-- ngIf: !item.expanded --><i ng:if="!item.expanded" class="fa fa-fw fa-caret-right ng-scope"></i><!-- end ngIf: !item.expanded -->
        </a>
        <a ng:href="/view/services/sysv" ng:mouseup="feedback.emit('sidebar', {id: item.id})" class="link ng-binding" href="/view/services/sysv">
            <i class="fa fa-fw fa-cog" ng:show="item.icon.indexOf(' ') < 0"></i>
            <i class="fa-fw cog ng-hide" ng:show="item.icon.indexOf(' ') > 0"></i>
            System V
        </a>
    </div><!-- end ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        systemd
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel --><div ng:if="!item.isRoot &amp;&amp; !item.isTopLevel" class="ng-scope">
        <a ng:click="item.expanded = !item.expanded; $event.stopPropagation(); $event.preventDefault()" ng:show="item.children.length > 0" class="expander ng-hide" href="#">
            <!-- ngIf: item.expanded -->
            <!-- ngIf: !item.expanded --><i ng:if="!item.expanded" class="fa fa-fw fa-caret-right ng-scope"></i><!-- end ngIf: !item.expanded -->
        </a>
        <a ng:href="/view/services/systemd" ng:mouseup="feedback.emit('sidebar', {id: item.id})" class="link ng-binding" href="/view/services/systemd">
            <i class="fa fa-fw fa-cog" ng:show="item.icon.indexOf(' ') < 0"></i>
            <i class="fa-fw cog ng-hide" ng:show="item.icon.indexOf(' ') > 0"></i>
            systemd
        </a>
    </div><!-- end ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope isTopLevel hasChildren" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding">
        System
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope hasChildren" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        Packages
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel --><div ng:if="!item.isRoot &amp;&amp; !item.isTopLevel" class="ng-scope">
        <a ng:click="item.expanded = !item.expanded; $event.stopPropagation(); $event.preventDefault()" ng:show="item.children.length > 0" class="expander" href="#">
            <!-- ngIf: item.expanded -->
            <!-- ngIf: !item.expanded --><i ng:if="!item.expanded" class="fa fa-fw fa-caret-right ng-scope"></i><!-- end ngIf: !item.expanded -->
        </a>
        <a ng:href="/view/packages/apt" ng:mouseup="feedback.emit('sidebar', {id: item.id})" class="link ng-binding" href="/view/packages/apt">
            <i class="fa fa-fw fa-gift" ng:show="item.icon.indexOf(' ') < 0"></i>
            <i class="fa-fw gift ng-hide" ng:show="item.icon.indexOf(' ') > 0"></i>
            Packages
        </a>
    </div><!-- end ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        APT
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel --><div ng:if="!item.isRoot &amp;&amp; !item.isTopLevel" class="ng-scope">
        <a ng:click="item.expanded = !item.expanded; $event.stopPropagation(); $event.preventDefault()" ng:show="item.children.length > 0" class="expander ng-hide" href="#">
            <!-- ngIf: item.expanded -->
            <!-- ngIf: !item.expanded --><i ng:if="!item.expanded" class="fa fa-fw fa-caret-right ng-scope"></i><!-- end ngIf: !item.expanded -->
        </a>
        <a ng:href="/view/packages/apt" ng:mouseup="feedback.emit('sidebar', {id: item.id})" class="link ng-binding" href="/view/packages/apt">
            <i class="fa fa-fw fa-gift" ng:show="item.icon.indexOf(' ') < 0"></i>
            <i class="fa-fw gift ng-hide" ng:show="item.icon.indexOf(' ') > 0"></i>
            APT
        </a>
    </div><!-- end ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        PIP
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel --><div ng:if="!item.isRoot &amp;&amp; !item.isTopLevel" class="ng-scope">
        <a ng:click="item.expanded = !item.expanded; $event.stopPropagation(); $event.preventDefault()" ng:show="item.children.length > 0" class="expander ng-hide" href="#">
            <!-- ngIf: item.expanded -->
            <!-- ngIf: !item.expanded --><i ng:if="!item.expanded" class="fa fa-fw fa-caret-right ng-scope"></i><!-- end ngIf: !item.expanded -->
        </a>
        <a ng:href="/view/packages/pip" ng:mouseup="feedback.emit('sidebar', {id: item.id})" class="link ng-binding" href="/view/packages/pip">
            <i class="fa fa-fw fa-gift" ng:show="item.icon.indexOf(' ') < 0"></i>
            <i class="fa-fw gift ng-hide" ng:show="item.icon.indexOf(' ') > 0"></i>
            PIP
        </a>
    </div><!-- end ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope isTopLevel ng-hide" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding">
        Other
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
            <div ng:bind-html="customization.plugins.core.sidebarLowerContent" class="ng-binding"></div>
        </core:sidebar>
                </div>
                <!-- ngView: --><div ng:view="" class="content ng-scope" ng-swipe-right="toggleOverlayNavigation(true)" ng-swipe-left="toggleOverlayNavigation(false)"><br class="ng-scope">

<progress-spinner ng:show="!ready" class="ng-scope ng-hide">
            <div>
                <div class="one"></div>
                <div class="two"></div>
            </div></progress-spinner>

<div ng:show="ready" class="ng-scope">
    <div uib-dropdown="" class="pull-right dropdown" ng:show="customization.plugins.dashboard.allowAdd">
        <a class="btn btn-default subtle dropdown-toggle" uib-dropdown-toggle="" aria-haspopup="true" aria-expanded="false">
            <span translate=""><span class="ng-scope">Tabs</span></span> <i class="fa fa-caret-down"></i>
        </a>
        <ul uib-dropdown-menu="" class="dropdown-menu">
            <li>
                <a ng:click="addTab()" translate=""><span class="ng-scope">Add</span></a>
            </li>
            <li>
                <a ng:click="renameTab(_.activeTabIndex)" translate=""><span class="ng-scope">Rename</span></a>
            </li>
            <!-- ngIf: userConfig.dashboard.tabs.length > 1 -->
        </ul>
    </div>

    <div class="btn-group pull-right" ng:show="customization.plugins.dashboard.allowAdd">
        <a class="btn btn-default subtle ng-pristine ng-untouched ng-valid ng-not-empty" uib-btn-radio="1" ng:model="userConfig.dashboard.tabs[_.activeTabIndex].width">
            <i class="fa fa-stop"></i>
        </a>
        <a class="btn btn-default subtle ng-pristine ng-untouched ng-valid ng-not-empty active" uib-btn-radio="2" ng:model="userConfig.dashboard.tabs[_.activeTabIndex].width">
            <i class="fa fa-pause"></i>
        </a>
    </div>

    <div uib-dropdown="" class="pull-right dropdown" ng:show="customization.plugins.dashboard.allowAdd">
        <a class="btn btn-default subtle dropdown-toggle" uib-dropdown-toggle="" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-plus"></i> <span translate=""><span class="ng-scope">Add widget</span></span>
        </a>
        <ul uib-dropdown-menu="" class="dropdown-menu">
            <!-- ngRepeat: widget in availableWidgets|orderBy:'name|translate' --><li ng:repeat="widget in availableWidgets|orderBy:'name|translate'" class="ng-scope">
                <a ng:click="addWidget(_.activeTabIndex, widget)" class="ng-binding">
                    CPU usage
                </a>
            </li><!-- end ngRepeat: widget in availableWidgets|orderBy:'name|translate' --><li ng:repeat="widget in availableWidgets|orderBy:'name|translate'" class="ng-scope">
                <a ng:click="addWidget(_.activeTabIndex, widget)" class="ng-binding">
                    Disk space
                </a>
            </li><!-- end ngRepeat: widget in availableWidgets|orderBy:'name|translate' --><li ng:repeat="widget in availableWidgets|orderBy:'name|translate'" class="ng-scope">
                <a ng:click="addWidget(_.activeTabIndex, widget)" class="ng-binding">
                    Hostname
                </a>
            </li><!-- end ngRepeat: widget in availableWidgets|orderBy:'name|translate' --><li ng:repeat="widget in availableWidgets|orderBy:'name|translate'" class="ng-scope">
                <a ng:click="addWidget(_.activeTabIndex, widget)" class="ng-binding">
                    Load average
                </a>
            </li><!-- end ngRepeat: widget in availableWidgets|orderBy:'name|translate' --><li ng:repeat="widget in availableWidgets|orderBy:'name|translate'" class="ng-scope">
                <a ng:click="addWidget(_.activeTabIndex, widget)" class="ng-binding">
                    Memory usage
                </a>
            </li><!-- end ngRepeat: widget in availableWidgets|orderBy:'name|translate' --><li ng:repeat="widget in availableWidgets|orderBy:'name|translate'" class="ng-scope">
                <a ng:click="addWidget(_.activeTabIndex, widget)" class="ng-binding">
                    Script
                </a>
            </li><!-- end ngRepeat: widget in availableWidgets|orderBy:'name|translate' --><li ng:repeat="widget in availableWidgets|orderBy:'name|translate'" class="ng-scope">
                <a ng:click="addWidget(_.activeTabIndex, widget)" class="ng-binding">
                    Service
                </a>
            </li><!-- end ngRepeat: widget in availableWidgets|orderBy:'name|translate' --><li ng:repeat="widget in availableWidgets|orderBy:'name|translate'" class="ng-scope">
                <a ng:click="addWidget(_.activeTabIndex, widget)" class="ng-binding">
                    Uptime
                </a>
            </li><!-- end ngRepeat: widget in availableWidgets|orderBy:'name|translate' -->
        </ul>
    </div>

    <div active="_.activeTabIndex" class="ng-isolate-scope">
  <ul class="nav nav-tabs" ng-class="{'nav-stacked': vertical, 'nav-justified': justified}" ng-transclude="">
        <!-- ngRepeat: tab in userConfig.dashboard.tabs --><li ng-class="[{active: active, disabled: disabled}, classes]" class="uib-tab nav-item ng-scope ng-isolate-scope active" heading="Home" ng:repeat="tab in userConfig.dashboard.tabs" index="$index">
  <a href="" ng-click="select($event)" class="nav-link ng-binding" uib-tab-heading-transclude="">Home</a>
</li><!-- end ngRepeat: tab in userConfig.dashboard.tabs -->
    </ul>
  <div class="tab-content">
    <!-- ngRepeat: tab in tabset.tabs --><div class="tab-pane ng-scope active" ng-repeat="tab in tabset.tabs" ng-class="{active: tabset.active === tab.index}" uib-tab-content-transclude="tab">
    
            <div class="clearfix ng-scope"></div>

            <div class="dashboard-widgets-container ng-scope" sv:root="" sv:on-sort="onSort()">
                <div class="row">
                    <div ng:class="{'col-sm-6': tab.width == 2, 'col-sm-12': tab.width == 1}" sv:part="tab.widgetsLeft" class="ng-scope col-sm-6">
                        <div sv:placeholder="" class="widget placeholder sv-placeholder ng-hide"></div>
                        <!-- ngRepeat: widget in tab.widgetsLeft --><div ng:repeat="widget in tab.widgetsLeft" sv:element="" class="widget ng-scope">
                            <!-- ngInclude: --><ng:include src="'/dashboard:resources/partial/widget.html'" class="ng-scope"><a class="widget-btn config-btn btn btn-default ng-scope ng-hide" ng:click="configureWidget(widget)" ng:show="widgetTypes[widget.typeId].config_template &amp;&amp; customization.plugins.dashboard.allowConfigure" title="Configure">
    <i class="fa fa-fw fa-wrench"></i>
</a>
<a class="widget-btn move-btn btn btn-default ng-scope" sv:handle="" ng:show="customization.plugins.dashboard.allowMove">
    <i class="fa fa-fw fa-arrows"></i>
</a>
<a class="widget-btn remove-btn btn btn-default ng-scope" ng:click="removeWidget(tab, widget)" title="Remove" ng:show="customization.plugins.dashboard.allowRemove">
    <i class="fa fa-fw fa-trash-o"></i>
</a>
<!-- ngInclude: --><ng:include src="widgetTypes[widget.typeId].template" class="ng-scope"><div ng:controller="HostnameWidgetController" class="ng-scope">
    <div class="widget-header" translate=""><span class="ng-scope">Hostname</span></div>
    <div class="widget-value ng-binding">
        <?php echo $get_hostname;?>
    </div>
</div>
</ng:include>
</ng:include>
                        </div><!-- end ngRepeat: widget in tab.widgetsLeft --><div ng:repeat="widget in tab.widgetsLeft" sv:element="" class="widget ng-scope">
                            <!-- ngInclude: --><ng:include src="'/dashboard:resources/partial/widget.html'" class="ng-scope"><a class="widget-btn config-btn btn btn-default ng-scope ng-hide" ng:click="configureWidget(widget)" ng:show="widgetTypes[widget.typeId].config_template &amp;&amp; customization.plugins.dashboard.allowConfigure" title="Configure">
    <i class="fa fa-fw fa-wrench"></i>
</a>
<a class="widget-btn move-btn btn btn-default ng-scope" sv:handle="" ng:show="customization.plugins.dashboard.allowMove">
    <i class="fa fa-fw fa-arrows"></i>
</a>
<a class="widget-btn remove-btn btn btn-default ng-scope" ng:click="removeWidget(tab, widget)" title="Remove" ng:show="customization.plugins.dashboard.allowRemove">
    <i class="fa fa-fw fa-trash-o"></i>
</a>
<!-- ngInclude: --><ng:include src="widgetTypes[widget.typeId].template" class="ng-scope"><div ng:controller="CPUWidgetController" class="ng-scope">
    <div class="row">
        <div class="col-xs-4">
            <div class="widget-header" translate=""><span class="ng-scope">Active cores</span></div>
            <smart-progress value="cores" max="values.length" class="ng-isolate-scope">
            <div>
                <div class="progress ng-isolate-scope" type="warning" max="100" value="100 * value / max" animate="animate" ng:class="{indeterminate: !max}">
  <div class="progress-bar progress-bar-warning" ng-class="type &amp;&amp; 'progress-bar-' + type" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" ng-style="{width: (percent < 100 ? percent : 100) + '%'}" aria-valuetext="100%" aria-labelledby="progressbar" ng-transclude="" style="width: 100%;">
                </div>
</div>
            </div>
            <div class="values">
                <span class="pull-left no-wrap ng-binding"></span>
                <span class="pull-right no-wrap ng-binding"></span>
            </div></smart-progress>
        </div>
        <div class="col-xs-8">
            <div class="widget-header" translate=""><span class="ng-scope">CPU usage</span></div>
            <smart-progress value="avgPercent" max="100" class="ng-isolate-scope">
            <div>
                <div class="progress ng-isolate-scope" type="warning" max="100" value="100 * value / max" animate="animate" ng:class="{indeterminate: !max}">
  <div class="progress-bar progress-bar-warning" ng-class="type &amp;&amp; 'progress-bar-' + type" role="progressbar" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100" ng-style="{width: (percent < 100 ? percent : 100) + '%'}" aria-valuetext="39%" aria-labelledby="progressbar" ng-transclude="" style="width: 39%;">
                </div>
</div>
            </div>
            <div class="values">
                <span class="pull-left no-wrap ng-binding"></span>
                <span class="pull-right no-wrap ng-binding"></span>
            </div></smart-progress>
        </div>
    </div>
    <div>
    </div>
    <div class="row">
        <div class="col-xs-4">
            <div class="widget-value ng-binding">
                4/4
            </div>
        </div>
        <div class="col-xs-8">
            <div class="widget-value ng-binding">
                <?php echo get_cpu_usage();?>
                <sup ng:show="avgPercent > 95" class="ng-hide">
                    <span class="label label-danger">
                        <i class="fa fa-warning"></i>
                    </span>
                </sup>
            </div>
        </div>
    </div>
</div>
</ng:include>
</ng:include>
                        </div><!-- end ngRepeat: widget in tab.widgetsLeft --><div ng:repeat="widget in tab.widgetsLeft" sv:element="" class="widget ng-scope">
                            <!-- ngInclude: --><ng:include src="'/dashboard:resources/partial/widget.html'" class="ng-scope"><a class="widget-btn config-btn btn btn-default ng-scope ng-hide" ng:click="configureWidget(widget)" ng:show="widgetTypes[widget.typeId].config_template &amp;&amp; customization.plugins.dashboard.allowConfigure" title="Configure">
    <i class="fa fa-fw fa-wrench"></i>
</a>
<a class="widget-btn move-btn btn btn-default ng-scope" sv:handle="" ng:show="customization.plugins.dashboard.allowMove">
    <i class="fa fa-fw fa-arrows"></i>
</a>
<a class="widget-btn remove-btn btn btn-default ng-scope" ng:click="removeWidget(tab, widget)" title="Remove" ng:show="customization.plugins.dashboard.allowRemove">
    <i class="fa fa-fw fa-trash-o"></i>
</a>
<!-- ngInclude: --><ng:include src="widgetTypes[widget.typeId].template" class="ng-scope"><div ng:controller="LoadAverageWidgetController" class="row ng-scope">
    <div class="col-xs-4">
        <div class="widget-header" translate=""><span class="ng-scope">1 min</span></div>
        <div class="widget-value ng-binding">
            0.52
        </div>
    </div>
    <div class="col-xs-4">
        <div class="widget-header" translate=""><span class="ng-scope">5 min</span></div>
        <div class="widget-value ng-binding">
            0.58
        </div>
    </div>
    <div class="col-xs-4">
        <div class="widget-header" translate=""><span class="ng-scope">15 min</span></div>
        <div class="widget-value ng-binding">
            0.59
        </div>
    </div>
</div>
</ng:include>
</ng:include>
                        </div><!-- end ngRepeat: widget in tab.widgetsLeft --><div ng:repeat="widget in tab.widgetsLeft" sv:element="" class="widget ng-scope">
                            <!-- ngInclude: --><ng:include src="'/dashboard:resources/partial/widget.html'" class="ng-scope"><a class="widget-btn config-btn btn btn-default ng-scope ng-hide" ng:click="configureWidget(widget)" ng:show="widgetTypes[widget.typeId].config_template &amp;&amp; customization.plugins.dashboard.allowConfigure" title="Configure">
    <i class="fa fa-fw fa-wrench"></i>
</a>
<a class="widget-btn move-btn btn btn-default ng-scope" sv:handle="" ng:show="customization.plugins.dashboard.allowMove">
    <i class="fa fa-fw fa-arrows"></i>
</a>
<a class="widget-btn remove-btn btn btn-default ng-scope" ng:click="removeWidget(tab, widget)" title="Remove" ng:show="customization.plugins.dashboard.allowRemove">
    <i class="fa fa-fw fa-trash-o"></i>
</a>
<!-- ngInclude: --><ng:include src="widgetTypes[widget.typeId].template" class="ng-scope"><div ng:controller="UptimeWidgetController" class="ng-scope">
    <div class="widget-header" translate=""><span class="ng-scope">Uptime</span></div>
    <div class="widget-value ng-binding">
        00:20:34
    </div>
</div>
</ng:include>
</ng:include>
                        </div><!-- end ngRepeat: widget in tab.widgetsLeft -->
                    </div>
                    <div class="col-sm-6 ng-scope" sv:part="tab.widgetsRight" ng:show="tab.width == 2">
                        <div sv:placeholder="" class="widget placeholder sv-placeholder ng-hide"></div>
                        <!-- ngRepeat: widget in tab.widgetsRight --><div ng:repeat="widget in tab.widgetsRight" sv:element="" class="widget ng-scope">
                            <!-- ngInclude: --><ng:include src="'/dashboard:resources/partial/widget.html'" class="ng-scope"><a class="widget-btn config-btn btn btn-default ng-scope ng-hide" ng:click="configureWidget(widget)" ng:show="widgetTypes[widget.typeId].config_template &amp;&amp; customization.plugins.dashboard.allowConfigure" title="Configure">
    <i class="fa fa-fw fa-wrench"></i>
</a>
<a class="widget-btn move-btn btn btn-default ng-scope" sv:handle="" ng:show="customization.plugins.dashboard.allowMove">
    <i class="fa fa-fw fa-arrows"></i>
</a>
<a class="widget-btn remove-btn btn btn-default ng-scope" ng:click="removeWidget(tab, widget)" title="Remove" ng:show="customization.plugins.dashboard.allowRemove">
    <i class="fa fa-fw fa-trash-o"></i>
</a>
<!-- ngInclude: --><ng:include src="widgetTypes[widget.typeId].template" class="ng-scope"><div ng:controller="UptimeWidgetController" class="ng-scope">
    <div class="widget-header" translate=""><span class="ng-scope">Uptime</span></div>
    <div class="widget-value ng-binding">
        00:20:34
    </div>
</div>
</ng:include>
</ng:include>
                        </div><!-- end ngRepeat: widget in tab.widgetsRight --><div ng:repeat="widget in tab.widgetsRight" sv:element="" class="widget ng-scope">
                            <!-- ngInclude: --><ng:include src="'/dashboard:resources/partial/widget.html'" class="ng-scope"><a class="widget-btn config-btn btn btn-default ng-scope ng-hide" ng:click="configureWidget(widget)" ng:show="widgetTypes[widget.typeId].config_template &amp;&amp; customization.plugins.dashboard.allowConfigure" title="Configure">
    <i class="fa fa-fw fa-wrench"></i>
</a>
<a class="widget-btn move-btn btn btn-default ng-scope" sv:handle="" ng:show="customization.plugins.dashboard.allowMove">
    <i class="fa fa-fw fa-arrows"></i>
</a>
<a class="widget-btn remove-btn btn btn-default ng-scope" ng:click="removeWidget(tab, widget)" title="Remove" ng:show="customization.plugins.dashboard.allowRemove">
    <i class="fa fa-fw fa-trash-o"></i>
</a>
<!-- ngInclude: --><ng:include src="widgetTypes[widget.typeId].template" class="ng-scope"><div ng:controller="MemoryWidgetController" class="ng-scope">
    <div class="row">
        <div class="col-xs-4" ng:hide="widget.config.hideTotal">
            <div class="widget-header" translate=""><span class="ng-scope">Total</span></div>
            <smart-progress max="1" class="ng-isolate-scope">
            <div>
                <div class="progress ng-isolate-scope" type="warning" max="100" value="100 * value / max" animate="animate" ng:class="{indeterminate: !max}">
  <div class="progress-bar progress-bar-warning" ng-class="type &amp;&amp; 'progress-bar-' + type" role="progressbar" aria-valuenow="NaN" aria-valuemin="0" aria-valuemax="100" ng-style="{width: (percent < 100 ? percent : 100) + '%'}" aria-valuetext="%" aria-labelledby="progressbar" ng-transclude="" style="width: 100%;">
                </div>
</div>
            </div>
            <div class="values">
                <span class="pull-left no-wrap ng-binding"></span>
                <span class="pull-right no-wrap ng-binding"></span>
            </div></smart-progress>
        </div>
        <div class="col-xs-8">
            <div class="widget-header" translate=""><span class="ng-scope">Memory usage</span></div>
            <smart-progress value="usage" max="100" class="ng-isolate-scope">
            <div>
                <div class="progress ng-isolate-scope" type="warning" max="100" value="100 * value / max" animate="animate" ng:class="{indeterminate: !max}">
  <div class="progress-bar progress-bar-warning" ng-class="type &amp;&amp; 'progress-bar-' + type" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" ng-style="{width: (percent < 100 ? percent : 100) + '%'}" aria-valuetext="78%" aria-labelledby="progressbar" ng-transclude="" style="width: 78%;">
                </div>
</div>
            </div>
            <div class="values">
                <span class="pull-left no-wrap ng-binding"></span>
                <span class="pull-right no-wrap ng-binding"></span>
            </div></smart-progress>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4" ng:hide="widget.config.hideTotal">
            <div class="widget-value ng-binding">
                3.8 GB
            </div>
        </div>
        <div class="col-xs-8">
            <div class="widget-value ng-binding">
                78%
                <sup ng:show="usage > 90" class="ng-hide">
                    <span class="label label-danger">
                        <i class="fa fa-warning"></i>
                    </span>
                </sup>
            </div>
        </div>
    </div>
</div>
</ng:include>
</ng:include>
                        </div><!-- end ngRepeat: widget in tab.widgetsRight --><div ng:repeat="widget in tab.widgetsRight" sv:element="" class="widget ng-scope">
                            <!-- ngInclude: --><ng:include src="'/dashboard:resources/partial/widget.html'" class="ng-scope"><a class="widget-btn config-btn btn btn-default ng-scope" ng:click="configureWidget(widget)" ng:show="widgetTypes[widget.typeId].config_template &amp;&amp; customization.plugins.dashboard.allowConfigure" title="Configure">
    <i class="fa fa-fw fa-wrench"></i>
</a>
<a class="widget-btn move-btn btn btn-default ng-scope" sv:handle="" ng:show="customization.plugins.dashboard.allowMove">
    <i class="fa fa-fw fa-arrows"></i>
</a>
<a class="widget-btn remove-btn btn btn-default ng-scope" ng:click="removeWidget(tab, widget)" title="Remove" ng:show="customization.plugins.dashboard.allowRemove">
    <i class="fa fa-fw fa-trash-o"></i>
</a>
<!-- ngInclude: --><ng:include src="widgetTypes[widget.typeId].template" class="ng-scope"><div ng:controller="MemoryWidgetController" class="ng-scope">
    <div class="row">
        <div class="col-xs-4" ng:hide="widget.config.hideTotal">
            <div class="widget-header" translate=""><span class="ng-scope">Total</span></div>
            <smart-progress max="1" class="ng-isolate-scope">
            <div>
                <div class="progress ng-isolate-scope" type="warning" max="100" value="100 * value / max" animate="animate" ng:class="{indeterminate: !max}">
  <div class="progress-bar progress-bar-warning" ng-class="type &amp;&amp; 'progress-bar-' + type" role="progressbar" aria-valuenow="NaN" aria-valuemin="0" aria-valuemax="100" ng-style="{width: (percent < 100 ? percent : 100) + '%'}" aria-valuetext="%" aria-labelledby="progressbar" ng-transclude="" style="width: 100%;">
                </div>
</div>
            </div>
            <div class="values">
                <span class="pull-left no-wrap ng-binding"></span>
                <span class="pull-right no-wrap ng-binding"></span>
            </div></smart-progress>
        </div>
        <div class="col-xs-8">
            <div class="widget-header ng-binding">
                <span translate=""><span class="ng-scope">Filesystem</span></span>: 
            </div>
            <smart-progress value="usage" max="100" class="ng-isolate-scope">
            <div>
                <div class="progress ng-isolate-scope" type="warning" max="100" value="100 * value / max" animate="animate" ng:class="{indeterminate: !max}">
  <div class="progress-bar progress-bar-warning" ng-class="type &amp;&amp; 'progress-bar-' + type" role="progressbar" aria-valuenow="NaN" aria-valuemin="0" aria-valuemax="100" ng-style="{width: (percent < 100 ? percent : 100) + '%'}" aria-valuetext="%" aria-labelledby="progressbar" ng-transclude="" style="width: 100%;">
                </div>
</div>
            </div>
            <div class="values">
                <span class="pull-left no-wrap ng-binding"></span>
                <span class="pull-right no-wrap ng-binding"></span>
            </div></smart-progress>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4" ng:hide="widget.config.hideTotal">
            <div class="widget-value ng-binding">
                0 bytes
            </div>
        </div>
        <div class="col-xs-8">
            <div class="widget-value ng-binding">
                NaN%
                <sup ng:show="usage > 90" class="ng-hide">
                    <span class="label label-danger">
                        <i class="fa fa-warning"></i>
                    </span>
                </sup>
            </div>
        </div>
    </div>
</div>
</ng:include>
</ng:include>
                        </div><!-- end ngRepeat: widget in tab.widgetsRight --><div ng:repeat="widget in tab.widgetsRight" sv:element="" class="widget ng-scope">
                            <!-- ngInclude: --><ng:include src="'/dashboard:resources/partial/widget.html'" class="ng-scope"><a class="widget-btn config-btn btn btn-default ng-scope" ng:click="configureWidget(widget)" ng:show="widgetTypes[widget.typeId].config_template &amp;&amp; customization.plugins.dashboard.allowConfigure" title="Configure">
    <i class="fa fa-fw fa-wrench"></i>
</a>
<a class="widget-btn move-btn btn btn-default ng-scope" sv:handle="" ng:show="customization.plugins.dashboard.allowMove">
    <i class="fa fa-fw fa-arrows"></i>
</a>
<a class="widget-btn remove-btn btn btn-default ng-scope" ng:click="removeWidget(tab, widget)" title="Remove" ng:show="customization.plugins.dashboard.allowRemove">
    <i class="fa fa-fw fa-trash-o"></i>
</a>
<!-- ngInclude: --><ng:include src="widgetTypes[widget.typeId].template" class="ng-scope"><div ng:controller="ServiceWidgetController" class="ng-scope">
    <div class="widget-header ng-binding">
        No service / 
    </div>
    <div class="pull-right btn-group">
        <a class="btn btn-default subtle" ng:click="runOperation('start')" ng:show="!service.isRunning">
            <i class="fa fa-fw fa-play"></i>
        </a>
        <a class="btn btn-default subtle ng-hide" ng:click="runOperation('stop')" ng:show="service.isRunning">
            <i class="fa fa-fw fa-stop"></i>
        </a>
        <a class="btn btn-default subtle ng-hide" ng:click="runOperation('restart')" ng:show="service.isRunning">
            <i class="fa fa-fw fa-refresh"></i>
        </a>
    </div>
    <div class="widget-value ng-binding">
        Unknown
        <sup ng:show="service.isRunning" class="ng-hide">
            <span class="label label-info">
                <i class="fa fa-play"></i>
            </span>
        </sup>
        <sup ng:show="!service.isRunning" class="">
            <span class="label label-danger">
                <i class="fa fa-warning"></i>
            </span>
        </sup>
    </div>
</div>
</ng:include>
</ng:include>
                        </div><!-- end ngRepeat: widget in tab.widgetsRight -->
                    </div>
                </div>
            </div>
        </div><!-- end ngRepeat: tab in tabset.tabs -->
  </div>
</div>

    <dialog ng:show="configuredWidget" class="block-element ng-hide animate-modal">
            <div class="modal">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <ng-transclude>
        <div class="modal-header ng-scope">
            <h4 class="ng-binding"></h4>
        </div>
        <div class="modal-body ng-scope">
            <!-- ngInclude: -->
        </div>
        <div class="modal-footer ng-scope">
            <a ng:click="saveWidgetConfig()" class="btn btn-default btn-flat" translate=""><span class="ng-scope">Save</span></a>
        </div>
    </ng-transclude>
                    </div>
                </div>
            </div></dialog></div>

</div>
            </div>

            <div class="sidebar overlay-sidebar animate-sidebar hide-desktop hide-large" ng:show="showOverlaySidebar &amp;&amp; navigationPresent" ng-swipe-left="toggleOverlayNavigation(false)" style="">
                <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarTasks.html'" class="ng-scope"><div ng:controller="CoreTasksController" class="ng-scope">
    <!-- ngRepeat: task in tasks.tasks -->
</div></ng:include>
                <core:sidebar class="ng-scope">
            <div ng:bind-html="customization.plugins.core.sidebarUpperContent" class="ng-binding"></div>
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope isRoot hasChildren" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope isTopLevel hasChildren" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding">
        General
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope active" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        Dashboard
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel --><div ng:if="!item.isRoot &amp;&amp; !item.isTopLevel" class="ng-scope">
        <a ng:click="item.expanded = !item.expanded; $event.stopPropagation(); $event.preventDefault()" ng:show="item.children.length > 0" class="expander ng-hide" href="#">
            <!-- ngIf: item.expanded -->
            <!-- ngIf: !item.expanded --><i ng:if="!item.expanded" class="fa fa-fw fa-caret-right ng-scope"></i><!-- end ngIf: !item.expanded -->
        </a>
        <a ng:href="/view/dashboard" ng:mouseup="feedback.emit('sidebar', {id: item.id})" class="link ng-binding" href="/view/dashboard">
            <i class="fa fa-fw fa-bar-chart" ng:show="item.icon.indexOf(' ') < 0"></i>
            <i class="fa-fw bar-chart ng-hide" ng:show="item.icon.indexOf(' ') > 0"></i>
            Dashboard
        </a>
    </div><!-- end ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        Plugins
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel --><div ng:if="!item.isRoot &amp;&amp; !item.isTopLevel" class="ng-scope">
        <a ng:click="item.expanded = !item.expanded; $event.stopPropagation(); $event.preventDefault()" ng:show="item.children.length > 0" class="expander ng-hide" href="#">
            <!-- ngIf: item.expanded -->
            <!-- ngIf: !item.expanded --><i ng:if="!item.expanded" class="fa fa-fw fa-caret-right ng-scope"></i><!-- end ngIf: !item.expanded -->
        </a>
        <a ng:href="/view/plugins" ng:mouseup="feedback.emit('sidebar', {id: item.id})" class="link ng-binding" href="/view/plugins">
            <i class="fa fa-fw fa-th-large" ng:show="item.icon.indexOf(' ') < 0"></i>
            <i class="fa-fw th-large ng-hide" ng:show="item.icon.indexOf(' ') > 0"></i>
            Plugins
        </a>
    </div><!-- end ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        Settings
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel --><div ng:if="!item.isRoot &amp;&amp; !item.isTopLevel" class="ng-scope">
        <a ng:click="item.expanded = !item.expanded; $event.stopPropagation(); $event.preventDefault()" ng:show="item.children.length > 0" class="expander ng-hide" href="#">
            <!-- ngIf: item.expanded -->
            <!-- ngIf: !item.expanded --><i ng:if="!item.expanded" class="fa fa-fw fa-caret-right ng-scope"></i><!-- end ngIf: !item.expanded -->
        </a>
        <a ng:href="/view/settings" ng:mouseup="feedback.emit('sidebar', {id: item.id})" class="link ng-binding" href="/view/settings">
            <i class="fa fa-fw fa-cog" ng:show="item.icon.indexOf(' ') < 0"></i>
            <i class="fa-fw cog ng-hide" ng:show="item.icon.indexOf(' ') > 0"></i>
            Settings
        </a>
    </div><!-- end ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope isTopLevel hasChildren" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding">
        Tools
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        File Manager
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel --><div ng:if="!item.isRoot &amp;&amp; !item.isTopLevel" class="ng-scope">
        <a ng:click="item.expanded = !item.expanded; $event.stopPropagation(); $event.preventDefault()" ng:show="item.children.length > 0" class="expander ng-hide" href="#">
            <!-- ngIf: item.expanded -->
            <!-- ngIf: !item.expanded --><i ng:if="!item.expanded" class="fa fa-fw fa-caret-right ng-scope"></i><!-- end ngIf: !item.expanded -->
        </a>
        <a ng:href="/view/filemanager//" ng:mouseup="feedback.emit('sidebar', {id: item.id})" class="link ng-binding" href="/view/filemanager//">
            <i class="fa fa-fw fa-folder-o" ng:show="item.icon.indexOf(' ') < 0"></i>
            <i class="fa-fw folder-o ng-hide" ng:show="item.icon.indexOf(' ') > 0"></i>
            File Manager
        </a>
    </div><!-- end ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        Notepad
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel --><div ng:if="!item.isRoot &amp;&amp; !item.isTopLevel" class="ng-scope">
        <a ng:click="item.expanded = !item.expanded; $event.stopPropagation(); $event.preventDefault()" ng:show="item.children.length > 0" class="expander ng-hide" href="#">
            <!-- ngIf: item.expanded -->
            <!-- ngIf: !item.expanded --><i ng:if="!item.expanded" class="fa fa-fw fa-caret-right ng-scope"></i><!-- end ngIf: !item.expanded -->
        </a>
        <a ng:href="/view/notepad" ng:mouseup="feedback.emit('sidebar', {id: item.id})" class="link ng-binding" href="/view/notepad">
            <i class="fa fa-fw fa-pencil" ng:show="item.icon.indexOf(' ') < 0"></i>
            <i class="fa-fw pencil ng-hide" ng:show="item.icon.indexOf(' ') > 0"></i>
            Notepad
        </a>
    </div><!-- end ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        Terminal
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel --><div ng:if="!item.isRoot &amp;&amp; !item.isTopLevel" class="ng-scope">
        <a ng:click="item.expanded = !item.expanded; $event.stopPropagation(); $event.preventDefault()" ng:show="item.children.length > 0" class="expander ng-hide" href="#">
            <!-- ngIf: item.expanded -->
            <!-- ngIf: !item.expanded --><i ng:if="!item.expanded" class="fa fa-fw fa-caret-right ng-scope"></i><!-- end ngIf: !item.expanded -->
        </a>
        <a ng:href="/view/terminal" ng:mouseup="feedback.emit('sidebar', {id: item.id})" class="link ng-binding" href="/view/terminal">
            <i class="fa fa-fw fa-terminal" ng:show="item.icon.indexOf(' ') < 0"></i>
            <i class="fa-fw terminal ng-hide" ng:show="item.icon.indexOf(' ') > 0"></i>
            Terminal
        </a>
    </div><!-- end ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope isTopLevel hasChildren" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding">
        Software
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope hasChildren" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        Services
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel --><div ng:if="!item.isRoot &amp;&amp; !item.isTopLevel" class="ng-scope">
        <a ng:click="item.expanded = !item.expanded; $event.stopPropagation(); $event.preventDefault()" ng:show="item.children.length > 0" class="expander" href="#">
            <!-- ngIf: item.expanded -->
            <!-- ngIf: !item.expanded --><i ng:if="!item.expanded" class="fa fa-fw fa-caret-right ng-scope"></i><!-- end ngIf: !item.expanded -->
        </a>
        <a ng:href="/view/services" ng:mouseup="feedback.emit('sidebar', {id: item.id})" class="link ng-binding" href="/view/services">
            <i class="fa fa-fw fa-cogs" ng:show="item.icon.indexOf(' ') < 0"></i>
            <i class="fa-fw cogs ng-hide" ng:show="item.icon.indexOf(' ') > 0"></i>
            Services
        </a>
    </div><!-- end ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        System V
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel --><div ng:if="!item.isRoot &amp;&amp; !item.isTopLevel" class="ng-scope">
        <a ng:click="item.expanded = !item.expanded; $event.stopPropagation(); $event.preventDefault()" ng:show="item.children.length > 0" class="expander ng-hide" href="#">
            <!-- ngIf: item.expanded -->
            <!-- ngIf: !item.expanded --><i ng:if="!item.expanded" class="fa fa-fw fa-caret-right ng-scope"></i><!-- end ngIf: !item.expanded -->
        </a>
        <a ng:href="/view/services/sysv" ng:mouseup="feedback.emit('sidebar', {id: item.id})" class="link ng-binding" href="/view/services/sysv">
            <i class="fa fa-fw fa-cog" ng:show="item.icon.indexOf(' ') < 0"></i>
            <i class="fa-fw cog ng-hide" ng:show="item.icon.indexOf(' ') > 0"></i>
            System V
        </a>
    </div><!-- end ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        systemd
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel --><div ng:if="!item.isRoot &amp;&amp; !item.isTopLevel" class="ng-scope">
        <a ng:click="item.expanded = !item.expanded; $event.stopPropagation(); $event.preventDefault()" ng:show="item.children.length > 0" class="expander ng-hide" href="#">
            <!-- ngIf: item.expanded -->
            <!-- ngIf: !item.expanded --><i ng:if="!item.expanded" class="fa fa-fw fa-caret-right ng-scope"></i><!-- end ngIf: !item.expanded -->
        </a>
        <a ng:href="/view/services/systemd" ng:mouseup="feedback.emit('sidebar', {id: item.id})" class="link ng-binding" href="/view/services/systemd">
            <i class="fa fa-fw fa-cog" ng:show="item.icon.indexOf(' ') < 0"></i>
            <i class="fa-fw cog ng-hide" ng:show="item.icon.indexOf(' ') > 0"></i>
            systemd
        </a>
    </div><!-- end ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope isTopLevel hasChildren" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding">
        System
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope hasChildren" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        Packages
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel --><div ng:if="!item.isRoot &amp;&amp; !item.isTopLevel" class="ng-scope">
        <a ng:click="item.expanded = !item.expanded; $event.stopPropagation(); $event.preventDefault()" ng:show="item.children.length > 0" class="expander" href="#">
            <!-- ngIf: item.expanded -->
            <!-- ngIf: !item.expanded --><i ng:if="!item.expanded" class="fa fa-fw fa-caret-right ng-scope"></i><!-- end ngIf: !item.expanded -->
        </a>
        <a ng:href="/view/packages/apt" ng:mouseup="feedback.emit('sidebar', {id: item.id})" class="link ng-binding" href="/view/packages/apt">
            <i class="fa fa-fw fa-gift" ng:show="item.icon.indexOf(' ') < 0"></i>
            <i class="fa-fw gift ng-hide" ng:show="item.icon.indexOf(' ') > 0"></i>
            Packages
        </a>
    </div><!-- end ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        APT
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel --><div ng:if="!item.isRoot &amp;&amp; !item.isTopLevel" class="ng-scope">
        <a ng:click="item.expanded = !item.expanded; $event.stopPropagation(); $event.preventDefault()" ng:show="item.children.length > 0" class="expander ng-hide" href="#">
            <!-- ngIf: item.expanded -->
            <!-- ngIf: !item.expanded --><i ng:if="!item.expanded" class="fa fa-fw fa-caret-right ng-scope"></i><!-- end ngIf: !item.expanded -->
        </a>
        <a ng:href="/view/packages/apt" ng:mouseup="feedback.emit('sidebar', {id: item.id})" class="link ng-binding" href="/view/packages/apt">
            <i class="fa fa-fw fa-gift" ng:show="item.icon.indexOf(' ') < 0"></i>
            <i class="fa-fw gift ng-hide" ng:show="item.icon.indexOf(' ') > 0"></i>
            APT
        </a>
    </div><!-- end ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding ng-hide">
        PIP
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel --><div ng:if="!item.isRoot &amp;&amp; !item.isTopLevel" class="ng-scope">
        <a ng:click="item.expanded = !item.expanded; $event.stopPropagation(); $event.preventDefault()" ng:show="item.children.length > 0" class="expander ng-hide" href="#">
            <!-- ngIf: item.expanded -->
            <!-- ngIf: !item.expanded --><i ng:if="!item.expanded" class="fa fa-fw fa-caret-right ng-scope"></i><!-- end ngIf: !item.expanded -->
        </a>
        <a ng:href="/view/packages/pip" ng:mouseup="feedback.emit('sidebar', {id: item.id})" class="link ng-binding" href="/view/packages/pip">
            <i class="fa fa-fw fa-gift" ng:show="item.icon.indexOf(' ') < 0"></i>
            <i class="fa-fw gift ng-hide" ng:show="item.icon.indexOf(' ') > 0"></i>
            PIP
        </a>
    </div><!-- end ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) --><div ng:repeat="item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name'])" class="ng-scope">
            <!-- ngInclude: --><ng:include src="'/core:resources/partial/sidebarItem.html'" class="ng-scope"><div class="sidebar-item ng-scope isTopLevel ng-hide" ng:class="{isRoot: item.isRoot, isTopLevel: item.isTopLevel, hasChildren: item.children.length > 0, active: location.pathname == urlPrefix + item.url}" ng:hide="item.isTopLevel &amp;&amp; item.children.length == 0">
    <h5 ng:show="item.isTopLevel" class="ng-binding">
        Other
    </h5>
    <!-- ngIf: !item.isRoot && !item.isTopLevel -->
    <div class="children ng-hide" ng:show="item.expanded &amp;&amp; item.children.length > 0">
        <!-- ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
        </div><!-- end ngRepeat: item in item.isRoot ? item.children : (item.children|orderBy:['weight', 'name']) -->
    </div>
</div>
</ng:include>
            <div ng:bind-html="customization.plugins.core.sidebarLowerContent" class="ng-binding"></div>
        </core:sidebar>
            </div>
        </div>

        <div id="toast-container" ng-class="[config.position, config.animation]" class="ng-scope toast-top-right"><!-- ngRepeat: toaster in toasters --></div>

        <messagebox-container>
            <!-- ngRepeat: message in messagebox.messages --></messagebox-container>

        <div ng:controller="CoreNavboxController" class="ng-scope">
            <!-- ngIf: visible -->
        </div>

        <div class="global-overlay global-loading-overlay ng-hide" ng:hide="appReady">
            <progress-spinner>
            <div>
                <div class="one"></div>
                <div class="two"></div>
            </div></progress-spinner>
        </div>

        <div class="global-overlay global-bootstrap-error" style="display: none">
            <div class="text-center">
                <span class="header">
                    <i class="fa fa-warning"></i>
                </span>
                <h1 translate=""><span class="ng-scope">A bootstrap error has occured</span></h1>
                <div translate=""><span class="ng-scope">Please see browser console</span></div>
                <div>
                    <i class="fa fa-arrow-down"></i>
                </div>
            </div>
        </div>

        <div class="modal fade global-bootstrap-recovered in hidden">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Warning</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning">
                            The following plugin has failed to load: <strong class="plugin-name"></strong>. Please fix or uninstall it.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-default btn-flat btn-close" translate=""><span class="ng-scope">OK</span></a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            angular.module('core').constant('urlPrefix', '');
            angular.module('core').constant('ajentiPlugins', {"core": "Core", "passwd": "User DB API", "ace": "Ace editor", "plugins": "Plugins", "dashboard": "Dashboard", "filesystem": "Filesystem API", "services": "Services", "terminal": "Terminal", "filemanager": "File Manager", "packages": "Packages", "notepad": "Notepad", "settings": "Settings"});
            angular.module('core').constant('initialConfigContent', {"auth": {"allow_sudo": false, "emails": {}, "provider": "os", "user_config": "os"}, "bind": {"host": "0.0.0.0", "mode": "tcp", "port": 8000}, "color": "default", "language": "en", "max_sessions": 9, "name": "Internsial-Node", "restricted_user": "nobody", "session_max_time": 3600, "ssl": {"certificate": null, "client_auth": {"certificates": [], "enable": false, "force": false}, "enable": false, "fqdn_certificate": null}});
            angular.module('core').constant('ajentiPlatform', 'debian');
            angular.module('core').constant('ajentiPlatformUnmapped', 'ubuntu');
            angular.module('core').constant('ajentiVersion', '2.1.36');
            angular.module('core').constant('ajentiBootstrapColor', 'default');

            angular.element(document).ready(ajentiBootstrap);
        </script>
    

</body></html>
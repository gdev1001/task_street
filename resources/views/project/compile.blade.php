<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>C++ Showcase</title>
	<script type="text/javascript" src="{{asset('js/scripts/jquery/jquery-2.1.3.min.js') }}"></script>
	<script type="text/javascript" src="{{asset('js/scripts/src-min-noconflict/ace.js') }}"></script>


	<script> 
		var token = function() {
		    return rand() + rand(); // to make it longer
		};
		function setCookie(cname, cvalue, exdays) {
		    var d = new Date();
		    d.setTime(d.getTime() + (exdays*24*60*60*1000));
		    var expires = "expires="+d.toUTCString();
		    document.cookie = cname + "=" + cvalue + "; " + expires;
		}
		function getCookie(cname) {
		    var name = cname + "=";
		    var ca = document.cookie.split(';');
		    for(var i=0; i<ca.length; i++) {
		        var c = ca[i];
		        while (c.charAt(0)==' ') c = c.substring(1);
		        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
		    }
		    return "";
		}
		function saveText(text_data) {
			localStorage.setItem("text_data", text_data);
		}
		function getText(text_data) {
			return localStorage.getItem("text_data");
		}

		function setMode(mode) {
			if(mode=="")
	            mode = "c_cpp";
	        var e = ace.edit("e");
	        e.getSession().setMode("ace/mode/"+mode);
	        setCookie("edit_lang", mode, 36500);
		}
		function setTheme(theme) {
			if(theme=="")
				theme = "twilight";
			var e = ace.edit("e");
	        e.setTheme("ace/theme/"+theme);
	        setCookie("edit_theme", theme, 36500);
		}
		function displayConfig(display) {
			document.getElementById('config').style.display=display;
			document.getElementById('fade').style.display=display;
			document.getElementById('select_syntax').value = ace.edit('e').getSession().getMode().$id.split('/').last();
			document.getElementById('select_theme').value = ace.edit('e').getTheme().split('/').last();
		}
		function applyConfig() {
			setMode(document.getElementById('select_syntax').value);
			setTheme(document.getElementById('select_theme').value);
		}
	    $(document).ready( 
	        function(){ 
	            setTheme(getCookie("edit_theme"));
	            setMode(getCookie("edit_lang"));
	            data = getText();
	            if(data!=null)
	            	ace.edit('e').setValue(data);
	            $("#e").on
	            ("keydown", function (b) { 
	                if (event.ctrlKey || event.metaKey) { 
	                	var c = String.fromCharCode(event.which).toLowerCase();
	                    switch(c){
		                    case 's': 
	                    		b.preventDefault(); 
	        					var e = ace.edit("e");
		                    	saveText(e.getValue());
		                    	alert("Saved in your localStorage.");
		                    	break;
		                    case 'm':
	                    		b.preventDefault(); 
	                    		displayConfig('block')
	                    		break;
		                    default:
		                    	break;
						}
		            }
	            }); 
	        }
	    ); 
		var rand = function() {
	    return Math.random().toString(36).substr(2); // remove `0.`
		};
		if (!Array.prototype.last){
		    Array.prototype.last = function(){
		        return this[this.length - 1];
		    };
		};
		window.onunload = function() {
        	if (confirm("Are you sure you want to quit?") ) {
			    if (confirm("Save your work before leaving?") ) {
			        saveText(ace.edit('e').getValue());
			    }
			} else {
			    preventDefault();
			}
		}
	</script>
	<style type="text/css"> 
    #e { position:absolute; top:0; right:0; bottom:0; left:0; font-size:16px; } 
	</style>
	<style>
    .black_overlay{
        display: none;
        position: absolute;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        background-color: black;
        z-index:1001;
        -moz-opacity: 0.8;
        opacity:.80;
        filter: alpha(opacity=80);
    }
    .white_content {
        display: none;
        position: absolute;
        top: 25%;
        left: 25%;
        width: auto;
        height: auto;
        padding: 16px;
        border: 8px solid gray;
        background-color: white;
        z-index:1002;
        overflow: auto;
        text-align:center;
    }
	</style>
</head>

<div id="config" class="white_content"> 
	<p>Syntax: <select id="select_syntax">
		<option value="plain_text">Plaintext</option>
		<option value="python">Python</option>
		<option value="c_cpp">C/C++</option>
		<option value="javascript">Javscript</option>
		<option value="markdown">Markdown</option>
		<option value="java">Java</option>
		<option value="coffee">CoffeeScript</option>
	</select> &nbsp;Theme: <select id="select_theme">
		<option value="monokai">Monokai</option>
		<option value="eclipse">Eclipse</option>
		<option value="textmate">Textmate</option>
		<option value="xcode">Xcode</option>
		<option value="github">GitHub</option>
		<option value="chrome">Chrome</option>
		<option value="twilight">Twilight</option>
	</select> </p>  
	<p>
		Reset: 
		<a href = "javascript:void(0)" onclick="localStorage.removeItem('text_data');location.reload();">Text</a> 
		<a href = "javascript:void(0)" onclick="setCookie('edit_theme','');setCookie('edit_lang','');location.reload();">Settings</a> 
	</p> 
	<p>
		<button href = "javascript:void(0)" onclick = "displayConfig('none')">Cancel</button>  
		&nbsp;&nbsp;&nbsp;&nbsp;
		<button href = "javascript:void(0)" onclick = "applyConfig();displayConfig('none');">Done</button> 
	</p> 
</div>
<div id="fade" class="black_overlay"></div>
<div id="e">#include &ltiostream&gt
using namespace std;
int main(int argc, char *argv[])
{
	cout &lt&lt "You can type anything here and use Ctrl+S to save." &lt&lt endl;
	cout &lt&lt "After saving, refresh this page could load or reset those text." &lt&lt endl;
	cout &lt&lt "Use Ctrl+M to set syntax and theme." &lt&lt endl;
	return 0;
}
</div>
</html>
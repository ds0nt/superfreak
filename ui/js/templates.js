!function(){function e(e,t){return e.write('<div style="text-align: center">Your token is <input type="text" value="').reference(t.get(["token"],!1),t,"h").write('">To put our button on your page simply paste this in the bottom of your page!<br/><br/><pre>').reference(t.get(["tokencode"],!1),t,"h").write("</pre></div>")}return dust.register("app-instructions",e),e}();
;!function(){function t(t){return t.write('<form id="appregister" method="post" action="#">App Name: <input type="text" name="name"></form><button class="btn huge" id="done">Finish</button>')}return dust.register("appregister",t),t}();
;!function(){function t(t){return t.write('<div id="bigbanner"><button id="startbtn" class="btn huge">Get Started</button><p class="footer">One place to try them all</p>&nbsp;</div>')}return dust.register("home",t),t}();
;!function(){function t(t){return t.write('<div style="text-align: center"><button class="btn male">Male</button><button class="btn female">Female</button></div>')}return dust.register("startpg1",t),t}();
;!function(){function t(t){return t.write('<form id="register" method="post" action="#"><input type="text" name="username"><input type="password" name="password"><input type="text" name="data[height]" value="10"><input type="text" name="data[bust]" value="10"><input type="text" name="data[waist]" value="10"><input type="text" name="data[hip]" value="10"><input type="text" name="data[arm]" value="10"><input type="text" name="data[shoulder]" value="10"><input type="text" name="data[innerleg]" value="10"><input type="text" name="data[outerleg]" value="10"></form><button class="btn huge" id="done">Finish</button>')}return dust.register("startpg2",t),t}();
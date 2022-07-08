(function() {  
    tinymce.create('tinymce.plugins.course_content', {  
        init : function(ed, url) {  
            ed.addButton('course_content', {  
                title : 'Course Sample Content',  
                image : url + '/images/package_content.png',  
                onclick : function() {  
					ed.focus();
                    ed.selection.setContent(
'<div class="h2-block"><h2 class="h2-title-bar">きぬかけの路を歩く</h2>人出の少ない早朝に竹林の小径に行くと、静かな空気が漂っていて何とも言えず気分が良いです。渡月橋は川と山が一度に見れて、こちらも京都らしい景色です。今宮神社のあぶり餅。こじんまりとした神社ですがとても手入れが行き届いていて綺麗な神社です。またあぶり餅も珍しいので喜ばれます。</div><div class="h3-block"><h3 class="h3-title-bar">金閣寺</h3><div class="wrap-course clearfix"><div class="imageleft"><img src="http://localhost/kimono/data/wordpress/wp-content/uploads/2014/10/h3-course-imageleft-01.png" alt="" /></div><div class="textright"><ul><li><label>住所</label>京都府京都市北区金閣寺町1</li><li><label>拝観時間</label>9:00~17:00</li><li><label>電話番号</label>075-461-0013</li><li><label>所要時間</label>約40分</li><li><label>アクセス</label>市バス「金閣寺前」より 徒歩1分</li></ul><p class="link"><a href="#">豆知識をみる</a></p></div></div></div><div class="h3-block"><h3 class="h3-title-bar">龍安寺</h3><div class="wrap-course clearfix"><div class="imageleft"><img src="http://localhost/kimono/data/wordpress/wp-content/uploads/2014/10/h3-course-imageleft-01.png" alt="" /></div><div class="textright"><ul><li><label>住所</label>京都府京都市北区金閣寺町1</li><li><label>拝観時間</label>9:00~17:00</li><li><label>電話番号</label>075-461-0013</li><li><label>所要時間</label>約40分</li><li><label>アクセス</label>市・JRバス「龍安寺」より 徒歩1分 京福電車「龍安寺」より 徒歩7分</li></ul><p class="link"><a href="#">豆知識をみる</a></p></div></div></div><div class="h3-block"><h3 class="h3-title-bar">仁和寺</h3><div class="wrap-course clearfix"><div class="imageleft"><img src="http://localhost/kimono/data/wordpress/wp-content/uploads/2014/10/h3-course-imageleft-01.png" alt="" /></div><div class="textright"><ul><li><label>住所</label>京都府京都市北区金閣寺町1</li><li><label>拝観時間</label>9:00~17:00</li><li><label>電話番号</label>075-461-0013</li><li><label>所要時間</label>約40分</li><li><label>アクセス</label>市バス「御室仁和寺」より徒歩1分 京福電車「御室仁和寺」より徒歩3分</li></ul><p class="link"><a href="#">豆知識をみる</a></p></div></div></div>'
					);  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        }
    });  
    tinymce.PluginManager.add('course_content', tinymce.plugins.course_content);  
})();
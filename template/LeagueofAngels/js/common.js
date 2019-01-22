/**
 * @author $Author: liaojy@uuzu.com
 * @date 2013-10-30
 */
var Onezs = {
    logingArea : $('div.loging'),
	loginedArea : $('div.logined'),
    urlencode:function(str){
		str = (str + '').toString();
		return encodeURIComponent(str).replace(/!/g, '%21').replace(/'/g, '%27').replace(/\(/g, '%28').replace(/\)/g, '%29').replace(/\*/g, '%2A').replace(/%20/g, '+');
	},
    
    login:function(){
        if($.cookie("uuzu_UNICKNAME")) {
            Onezs.logined();
            return;
        }
		
		//初始化顶通头部
		typeof userAction!='undefined' && userAction.init();
		
        Onezs.logingArea.show();
        Onezs.loginedArea.hide();
        
        var inputUsername = Onezs.logingArea.find('input[name=username]'),
            inputPassword = Onezs.logingArea.find('input[name=password]');

            inputUsername.val(
                $.cookie('login_email') ? $.cookie('login_email') : langArr["Email"]
            ).focus(function(){
                if($.trim($(this).val()) == 'Email')$(this).val('');
            }).blur(function(){
                if($.trim($(this).val()) == '')$(this).val(langArr['Email']);
            });
            
   			//  $("#addPwdTextArea").focus(function () {
			// 	$(this).hide();
			// 	$(this).siblings("input[name=password]").show().focus();
			// 	$('#passport_err').hide();
			// });
			// $("#addPwdTextArea").siblings("input[name=password]").blur(function () {
			// 	if($(this).val() == "") {
			// 		$(this).hide();
			// 		$("#addPwdTextArea").show();
			// 	}
			// });
            
            $('#memory').click(function(){
                if($(this).val() == 1) $(this).val('0');
                else $(this).val('1');
            });
            
            inputPassword.keyup(function(e){if(e.keyCode == 13)$('#logingBtn').trigger('click');});
            
            $('#logingBtn').unbind('click').click(function(){
                var uname =    Onezs.logingArea.find('input[name=username]').val(),
                    upassword = Onezs.logingArea.find('input[name=password]').val(),
                    keep_id = $('#memory'),
                    param = 'username='+Onezs.urlencode(uname)+'&password='+Onezs.urlencode(upassword);
                    
                    if(uname == '' || uname  == 'Email'){
                        return Onezs.showErrorMsg('#account_err','#passport_err',langArr['This is not a valid email address.']);
                    }
                    
                    if(upassword == '' || upassword  == 'Password'){
                        return Onezs.showErrorMsg('#passport_err','#account_err',langArr['Please enter a passport.']);
                    }
                    
                    if(keep_id.val() == 1){
                        param += '&keep_login=1';
                    }
                    
                    $.getJSON('/site/ulogin?'+param,function(data){
                        if(!data)return Onezs.showErrorMsg('#passport_err','#account_err',langArr['Your email or password was entered incorrectly.']);
                        
                        if(data.status === 1){
							// serverList.getMyList();  todo
                            Onezs.logined();
                        }else{
                            return Onezs.showErrorMsg('#passport_err','#account_err',langArr['Your email or password was entered incorrectly.']);
                        }
                    });
            });
        
    },
    logined:function(){
		//初始化顶通头部
		typeof userAction!='undefined' && userAction.init();
		
        Onezs.logingArea.hide();
        Onezs.loginedArea.show().find('span.userName').html('<a title="'+$.cookie('uuzu_UNICKNAME')+'">'+$.cookie('uuzu_UNICKNAME').limitLeft(14,'...')+'</a>');
        
        Onezs.loginedArea.find('p.userInfo .logout').unbind('click').click(function(){
            $.cookie("uuzu_UNICKNAME", null,{ path: '/', expires: -1,domain:'gtarcade.com' });
            $.cookie("uuzu_UAUTH", null,{ path: '/', expires: -1,domain:'gtarcade.com' });
            Onezs.login();
        });
    },
    showErrorMsg:function(sid,hid,msg){
        $(sid).children('.msg').html(msg);
        $(sid).show();
        $(hid).hide();
        return;
    }
}

//video
function openVideo(src,title){
	angle_pop.showVedio(src,title);
}

var angle_pop = {
	picProp : new prompt(),
	
	delDiv : function(obj){
		var div = document.getElementById(obj);
		if (div != null){
		    div.parentNode.removeChild(div);
		}
	},

	closeX : function (obj){
		this.delDiv(obj);
		background().remove();
		return;
	},

	showTips: function(content) {
		
        var html = '<div class="pop_bar pop_wrap2" >\
                        <div class="pop_left">\
                          <div class="pop_title"></div>\
                          <div class="pop_content">\
                              <p class="tips_warn"><span class="icon_warn"></span>'+content+'</p>\
                              <a href="javascript:;" class="btn_ok">OK</a>\
                          </div>\
                        </div>\
                        <div class="pop_right"><a href="javascript:;" class="btn_tan_close">'+langArr['close']+'</a>  </div>\
                    </div>';

		this.picProp.init(html, function(o){
			o.container.find('a.btn_tan_close,a.btn_ok').click(function() {
				o.container.remove();
				background().hide();
				return false;
			});
		}).show();
	},

	showVedio: function(content,title) {
		
        var html = '<div class="pop_bar pop_wrap3" style="width:702px;height:390px;">\
                        <div class="pop_left">\
                            <div class="pop_content">\
                                <div class="vedio_src"><iframe width="640" height="390" src="'+content+'" frameborder="0" allowfullscreen></iframe></div>\
                                <div class="vedio_text">'+title+'</div>\
                            </div>\
                        </div>\
                        <div class="pop_right"><a href="javascript:;" class="btn_tan_close">'+langArr['close']+'</a>  </div>\
                    </div>';

		this.picProp.init(html, function(o){
			o.container.find('a.btn_tan_close').click(function() {
				o.container.remove();
				background().hide();
				return false;
			});
		}).show();
	},
	
	showPic: function (imgTitle, imgSrc,type) {
		
        var html = '<div class="pop_tuku_bar" id="pop_tuku_bar" style="width:600px;height:200px;overflow:hidden;" >\
                        <div class="loadingDiv" style="position:absolute; display:none; top:0px; text-align:center; z-index:1000001; left:0px; background-color:#000;">\
							<img src="'+loaStaticUrl+'/images/loading.gif?01" style="position:absolute; top:10px;">\
						</div>\
                        <div class="tuku_left">\
                            <p class="pt_pics"><img src="'+imgSrc+'" alt="" /></p>\
                            <p class="pt_nms"><span class="pt_nmtxt">'+imgTitle+'</span></p>\
                            <p class="pt_lin"><span class="ot_a"><a href="javascript:;" class="to-prev">< '+langArr['previous']+'</a></span><span class="ot_jie">|</span><span class="ot_b"><a href="javascript:;" class="to-next">'+langArr['next']+' ></a></span></p>\
                        </div>\
                        <div class="tuku_right"><a href="javascript:;" class="btn_tan_close">'+langArr['close']+'</a>  </div>\
                    </div>';
			
			if(typeof(type) != 'undefined'){
				if(type == 1){
					html += '<script type="text/javascript">\
							$(function () {\
								imgPlayer.init($("#imageListBox a[name=play]"));\
								imgPlayer.init($("#imageListBox a[name=play1]"));\
							})\
						</script>';
				}else if(type == 2){
					html += '<script type="text/javascript">\
							$(function () {\
								imgPlayer.init($("#gameImg_0 a[name=play_0]"));\
							})\
						</script>';
				}else if(type == 3){
					html += '<script type="text/javascript">\
							$(function () {\
								imgPlayer.init($("#gameImg_1 a[name=play_1]"));\
							})\
						</script>';
				}else if(type == 4){
					html += '<script type="text/javascript">\
							$(function () {\
								imgPlayer.init($("#gameImg_2 a[name=play_2]"));\
								imgPlayer.init($("#gameImg_2 a[name=playindex_2]"));\
							})\
						</script>';
				}
			}
			
		this.picProp.init(html,function(o){
			o.container.find('.btn_tan_close').click(function() {
				o.remove();
				background().remove();
				return false;
			});
		}).show();
	},
	
	showCode: function (content) {
		
        var html = '<div class="pop_bar pop_wrap1" id="pop_code">\
                        <div class="pop_left">\
                          <div class="pop_title">'+langArr['Your New Player Pack Code']+'</div>\
                          <div class="pop_content">\
                              <div class="gift_code clearfix">\
                                  <span>'+lang['Gift Code']+':</span>\
                                  <input type="text" class="input_code" value="'+content+'">\
                                  <a href="javascript:copyCard(\''+content+'\');" class="btn_copy">'+langArr['Copy']+'</a>\
                              </div>\
                          </div>\
                        </div>\
                        <div class="pop_right"><a href="javascript:pop.closeX(\'pop_code\');" class="btn_tan_close">'+langArr['close']+'</a>  </div>\
                    </div>';
        
			
		this.picProp.init(html,function(o){
			o.container.find('.btn_tan_close').click(function() {
				o.remove();
				background().remove();
				return false;
			});
		}).show();
	}
}

/**
 * pic
 */
var imgPlayer = {
	control:true,
	imgLen:0,
	newImgId:-1,
	imgObj: new Object,

	// init
	init:function (obj,type) {
		this.imgObj = obj;
		this.imgLen = this.imgObj.length;
		var _this = this;

		this.imgObj.unbind("click").bind("click", function () {

			angle_pop.showPic($(this).attr("title"), $(this).attr("data-imgSrc"),type);

			_this.newImgId = $(this).parents("li").index();

			$("#pop_tuku_bar .to-next").unbind("click").bind("click", function () {
				_this.toNext();
			});
			$("#pop_tuku_bar .to-prev").unbind("click").bind("click", function () {
				_this.toPrev();
			});
			// $("#pop_tuku_bar .pt_pics img").unbind("click").bind("click", function () {
			// 	_this.toNext();
			// });

			_this.loading();
			return false;
		});
	},

	// prev
	toPrev:function () {
		if(!this.control) {
			return;
		}
		this.control = false;

		var nextId = this.newImgId - 1 >= 0 ? this.newImgId - 1 : this.imgLen - 1;
		this.newImgId = nextId;

		$("#pop_tuku_bar .pt_pics img:eq(0)").attr("src", this.imgObj.eq(nextId).attr("data-imgSrc"));
		$("#pop_tuku_bar .pt_nms span").html(this.imgObj.eq(nextId).attr("title"));
		this.loading();
		this.control = true;
	},

	// next
	toNext:function() {

		if(!this.control) {
			return;
		}
		this.control = false;
		var nextId = this.newImgId + 1 >= this.imgLen ? 0 : this.newImgId + 1;
		this.newImgId = nextId;
		$("#pop_tuku_bar .pt_pics img:eq(0)").attr("src", this.imgObj.eq(nextId).attr("data-imgSrc"));

		$("#pop_tuku_bar .pt_nms span").html(this.imgObj.eq(nextId).attr("title"));
		this.loading();
		this.control = true;
	},

	// loading
	loading:function() {
		var popObj = $("#pop_tuku_bar"), h = popObj.height(), w = popObj.width() - Math.ceil((this.newImgId + 1) / 1000000) * 34;
		popObj.children(".loadingDiv").css({"height":h+"px", "width":(w+35)+"px", "top":"0px"}).fadeIn(0);
		popObj.find(".loadingDiv img").css({"top":(h/2) + "px", "left":(w/2)+"px"});

		$("#pop_tuku_bar .pt_pics img:eq(0)").unbind("load").load(function () {
			$(this).removeAttr("style");
			var winH = $(window).height(),
					winW = $(window).width(),
					maxH = winH * 0.8,
					maxW = winW * 0.8,
					imgH = $(this).height(),
					imgW = $(this).width();

			if(imgH > maxH) {
				imgW = imgW * maxH / imgH;
				imgH = maxH;
			}
			if(imgW > maxW) {
				imgH = imgH * maxW / imgW;
				imgW = maxW;
			}
			var pLeft = $(document).scrollLeft() + (winW - imgW) / 2,
					pTop = $(document).scrollTop() + (winH - imgH) / 2;

			$(this).css({"width":imgW+"px", "height":imgH+"px"});
			popObj.find("div.tuku_left").hide();
			
			popObj.animate({"top":pTop+"px", "left":pLeft+"px", "width":(imgW+70)+"px", "height":(imgH+35)+"px"}, 500);
			popObj.find(".loadingDiv img").animate({"top":(imgH/2) + "px", "left":(imgW/2)+"px"}, 500);
			popObj.children(".loadingDiv").animate({"width":(imgW)+"px", "height":(imgH+35)+"px"}, 500, function () {

				$(this).animate({"height":"0px", "top":(imgH+35)+"px"}, 900);
				popObj.find("div.tuku_left").css({"width":imgW+"px", "height":(imgH+35)+"px"}).show();
			});
		});
	}
}

var tabLi = {
    init:function(){
        this.tunMode('#news_list','current','.show_news_list');
        this.tunMode('#album_list','current','.show_album_list');
    },
    tunMode:function(id,cls,showCls){
        $(id+' li').live('mouseover',function(){
            if($(this).attr('class') == cls)return;
            
            $(id+' li').removeClass(cls);
            $(this).addClass(cls);
            
            var i = $(this).index();
            $(showCls+':visible').hide();
            $(showCls).eq(i).show();
        });
    }
}

var indexEye = {
	autoTime:0,
	
	init: function () {
		var eyeObj = $("#eye_box a:eq(0) img:eq(0)");
		eyeObj.attr("src", eyeObj.attr("dataimgsrc"));
		eyeObj.load(function () {
			indexEye.autoTime = setTimeout(function () {
				indexEye.autoPlay();
  		}, 10000);
		});

		$("#eye_number a").live("mouseover", function() {
			if($(this).attr("class").indexOf("on") > 0) return;
			indexEye.autoPlay(this);
		});
	},

	autoPlay:function (me) {
		clearTimeout(this.autoTime);
		this.turnNumber(me);
		var now = $("#eye_number a.on").index();
		var imgObj = $("#eye_box a").eq(now).children("img");
		if(imgObj.attr("src") == "") {
			imgObj.attr("src", imgObj.attr("dataimgsrc"));
		}
		
		setTimeout(function () {
			$("#eye_box a:visible").fadeOut(0, function() {
				$("#eye_box a").eq(now).fadeIn(0);
			});
		}, 200);
		this.autoTime = setTimeout("indexEye.autoPlay()", 6000);
	},

	turnNumber:function(me) {
		if(typeof(me) == 'undefined') {
			var i = $("#eye_number a.on").index();
			i = i >= $("#eye_number a").length - 1 ? 0 : i + 1;
			me = $("#eye_number a").eq(i);
		}
		$("#eye_number a.on").each(function () {
            $(this).removeClass("on").addClass('off');
		});
		$(me).removeClass("off").addClass('on');
	}
}

$(function(){
    Onezs.login();
    indexEye.init();
    tabLi.init();
	$('#account_err').click(function(){
		$(this).hide();
	});
	$('#passport_err').click(function(){
		$(this).hide();
	});
	$('#login_area_email_angel').click(function(){
		$('#account_err').hide();
	});
	//$('#addPwdTextArea').click(function(){
		//$('#passport_err').hide();
	//});
	//服务器列表，是否已登录
	$('#recommend_list li a, #my_list_box li a, #all_list li a').live('click', function() {
		if(!$.cookie("uuzu_UNICKNAME")) {
			$(this).removeAttr('target');
			pop.showLogin();
			return false;
		} else {
			//发送推送数据
			$.get("/adUrl/stat?t="+new Date().getTime());
			if($(this).attr('href').indexOf('http://') != -1){
				$(this).attr('target', '_blank');
			}
		}
	});
})
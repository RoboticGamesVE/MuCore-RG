
// 大眼睛广告轮播
var indexEye = {
	autoTime:0,
	init: function () {
		var eyeObj = $("#eye_box a:eq(0) img:eq(0)");
		eyeObj.attr("src", eyeObj.attr("data-imgSrc"));
		eyeObj.load(function () {
			indexEye.autoTime = setTimeout(function () {
				indexEye.autoPlay();
  		}, 10000);
		});
		//$("#eye_number").siblings(".rotate_img_link").children("a").attr({"href":$("#eye_box a").eq(0).attr("href"), "title":$("#eye_box a").eq(0).attr("title")});

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
			imgObj.attr("src", imgObj.attr("data-imgSrc"));
		}
		
		
		setTimeout(function () {
			$("#eye_box a:visible").fadeOut(0, function() {
				$("#eye_box a").eq(now).fadeIn(0);
				//$("#eye_number").siblings(".rotate_img_link").children("a").attr({"href":$("#eye_box a").eq(now).attr("href"), "title":$("#eye_box a").eq(now).attr("title")});
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





$(function () {
	indexEye.init();
});


$(function(){
// 新闻
	$(".HotNewsBox .tabNav").mouseover(function(e){
		var element=$(e.target);
		var t=element.index();
		if(element.is("li.ti"))
		{$(".news_nr").stop().animate({"left":t*-666+"px"},500)}
	});
	$("li.ti").hover(function(){
		$(this).addClass("hover").siblings().removeClass("hover");
	});
});


$(function(){
 function tabs(tabTit,on,tabCon){
	 $(tabCon).each(function(){
			$(this).children().eq(2).show();
	 });
 $(tabTit).each(function(){
		 $(this).children().eq(2).addClass(on);
 });
$(tabTit).children().hover(function(){
			$(this).addClass(on).siblings().removeClass(on);
			 var index = $(tabTit).children().index(this);
			 $(tabCon).children().eq(index).show().siblings().hide();
	});
	 }
tabs(".tab-hd","active",".tab-bd");
});


$(function(){
 function tabs(tabTit,on,tabCon){
	 $(tabCon).each(function(){
			$(this).children().eq(0).show();
	 });
 $(tabTit).each(function(){
		 $(this).children().eq(0).addClass(on);
 });
$(tabTit).children().hover(function(){
			$(this).addClass(on).siblings().removeClass(on);
			 var index = $(tabTit).children().index(this);
			 $(tabCon).children().eq(index).show().siblings().hide();
	});
	 }
tabs(".tab-hd1","active",".tab-bd1");
});




// 大眼睛广告轮播
var indexEyeOne = {
	autoTime:0,
	init: function () {
		var eyeObj = $("#eye_boxOne a:eq(0) img:eq(0)");
		eyeObj.attr("src", eyeObj.attr("data-imgSrc"));
		eyeObj.load(function () {
			indexEyeOne.autoTime = setTimeout(function () {
				indexEyeOne.autoPlay();
  		}, 10000);
		});
		//$("#eye_number").siblings(".rotate_img_link").children("a").attr({"href":$("#eye_box a").eq(0).attr("href"), "title":$("#eye_box a").eq(0).attr("title")});

		$("#eye_numberOne a").live("mouseover", function() {
			if($(this).attr("class").indexOf("on") > 0) return;
			indexEyeOne.autoPlay(this);
		});
	},

	autoPlay:function (me) {
		clearTimeout(this.autoTime);
		this.turnNumber(me);
		var now = $("#eye_numberOne a.on").index();
		var imgObj = $("#eye_boxOne a").eq(now).children("img");
		if(imgObj.attr("src") == "") {
			imgObj.attr("src", imgObj.attr("data-imgSrc"));
		}
		
		
		setTimeout(function () {
			$("#eye_boxOne a:visible").fadeOut(0, function() {
				$("#eye_boxOne a").eq(now).fadeIn(0);
				//$("#eye_number").siblings(".rotate_img_link").children("a").attr({"href":$("#eye_box a").eq(now).attr("href"), "title":$("#eye_box a").eq(now).attr("title")});
			});
		}, 200);
		this.autoTime = setTimeout("indexEyeOne.autoPlay()", 6000);
	},

	turnNumber:function(me) {
		if(typeof(me) == 'undefined') {
			var i = $("#eye_numberOne a.on").index();
			i = i >= $("#eye_numberOne a").length - 1 ? 0 : i + 1;
			me = $("#eye_numberOne a").eq(i);
		}
		$("#eye_numberOne a.on").each(function () {
  		$(this).removeClass("on").addClass('off');
		});
		$(me).removeClass("off").addClass('on');
	}
}





$(function () {
	indexEyeOne.init();
});




// 大眼睛广告轮播
var indexEyeTwo = {
	autoTime:0,
	init: function () {
		var eyeObj = $("#eye_boxTwo a:eq(0) img:eq(0)");
		eyeObj.attr("src", eyeObj.attr("data-imgSrc"));
		eyeObj.load(function () {
			indexEyeTwo.autoTime = setTimeout(function () {
				indexEyeTwo.autoPlay();
  		}, 10000);
		});
		//$("#eye_number").siblings(".rotate_img_link").children("a").attr({"href":$("#eye_box a").eq(0).attr("href"), "title":$("#eye_box a").eq(0).attr("title")});

		$("#eye_numberTwo a").live("mouseover", function() {
			if($(this).attr("class").indexOf("on") > 0) return;
			indexEyeTwo.autoPlay(this);
		});
	},

	autoPlay:function (me) {
		clearTimeout(this.autoTime);
		this.turnNumber(me);
		var now = $("#eye_numberTwo a.on").index();
		var imgObj = $("#eye_boxTwo a").eq(now).children("img");
		if(imgObj.attr("src") == "") {
			imgObj.attr("src", imgObj.attr("data-imgSrc"));
		}
		
		
		setTimeout(function () {
			$("#eye_boxTwo a:visible").fadeOut(0, function() {
				$("#eye_boxTwo a").eq(now).fadeIn(0);
				//$("#eye_number").siblings(".rotate_img_link").children("a").attr({"href":$("#eye_box a").eq(now).attr("href"), "title":$("#eye_box a").eq(now).attr("title")});
			});
		}, 200);
		this.autoTime = setTimeout("indexEyeTwo.autoPlay()", 6000);
	},

	turnNumber:function(me) {
		if(typeof(me) == 'undefined') {
			var i = $("#eye_numberTwo a.on").index();
			i = i >= $("#eye_numberTwo a").length - 1 ? 0 : i + 1;
			me = $("#eye_numberTwo a").eq(i);
		}
		$("#eye_numberTwo a.on").each(function () {
  		$(this).removeClass("on").addClass('off');
		});
		$(me).removeClass("off").addClass('on');
	}
}





$(function () {
	indexEyeTwo.init();
});



$(".wallpaperContent_bot").delegate("span","mouseenter mouseleave",function(e){
	var type = e.type;
	if( type == "mouseenter" ){
		$(this).find("div").show();
	}else{
		$(this).find("div").hide();
	};
});
$(".lodingJs").delegate("span","mouseenter mouseleave",function(e){
	var type = e.type;
	if( type == "mouseenter" ){
		$(this).find("div").show();
	}else{
		$(this).find("div").hide();
	};
});
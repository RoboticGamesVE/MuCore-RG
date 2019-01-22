/**
 * [_check_urls 检测通用地址]
 */
function _check_urls() {
    if (typeof (window.urls) == 'undefined') {
        window.urls = [];
        window.urls.passport_url = '//user.gtarcade.com';
        window.urls.trd_login = '//user.gtarcade.com';
        window.urls.resource_url = '//static.gtarcade.com';
    }
}


var pop = {
    picProp: new prompt(),
    loginCallBack: null,
    logoutCallBack: null,
    init: function (o) {
        this.loginCallBack = o.loginCallBack;
        this.logoutCallBack = o.logoutCallBack;
    },
    delDiv: function (obj) {
        var div = document.getElementById(obj);
        if (div != null) {
            div.parentNode.removeChild(div);
        }
    },

    closeX: function (obj) {
        //$(obj).remove();
        this.delDiv(obj);
        background().remove();
        return;
    },
    //登陆
    showLogin: function () {
        appedUrl("picProp.showLogin")
        _check_urls();
        var html = '<div class="popUp_sign pop_sign" id="loginG" style="position:absolute; left:200px; top:60px;">\
						<div class="allBoxG">\
							<div class="popUp_head">\
								<a href="javascript:;" class="btn_close" id="loginCloseBtn" title="Close">x</a>\
								<div class="title title_loginG"><p>' + langArr["Log In"] + '</p></div>\
								<div class="title title_SignUpG"><p>' + langArr["Sign up"] + '</p></div>\
							</div>\
							<div class="popUp_main clearfix">\
								<div class="box_loginG" id="loginArea">\
									<form class="form_login" method="post" action="index.php?page_id=logint" name="uss_login_form">\
										<p class="Glogo"></p>\
										<div class="dd"><input name="email" id="email" type="text" placeholder="' + langArr["Email"] + '" class="input_login login_email" /><div class="wrong_tip username_warn" id="error_email"><span class="tip_sj">▲</span>' + langArr["Please enter a valid email address!"] + '</div></div>\
										<div class="dd"><input name="password" id="password" type="password" placeholder="' + langArr["Password"] + '" class="input_login" /><div class="wrong_tip password_warn" id="error_pwd"><span class="tip_sj">▲</span>' + langArr["Password must be at least 6 characters!"] + '</div></div>\
										<div class="dd clearfix show_login_verify_code" style="display:none;">\
											<input type="text" class="input_login fl" placeholder="' + langArr["Verification Code"] + '" style="width:230px;" id="login_code" name="login_code" />\
											<div class="wrong_tip code_warn" id="error_code"><span class="tip_sj">▲</span>' + langArr["Verification Code don\'t match"] + '</div>\
											<span class="yzm fr"><img onclick="pop.changeVerifyCode(1);" id="logVerifyCode" align="middle" src="" valign="absmiddle" style="cursor:pointer"></span>\
										</div>\
										<div class="dd">\
											<label class="label_checkbox" ><input name="" id="rememberMe" type="checkbox" checked="false" value=""/>' + langArr["Remember me"] + '</label>\
											<div class="btn_forgotPasw"><a href="' + urls.passport_url + '/password/forgotpassword">' + langArr["Forgot Password?"] + '</a></div>\
										</div>\
										<div class="btn_sign"><button style="border: none;" href="javascript:;" id="loginBtn">' + langArr["Log In"] + '</button></div>\
										<div class="noAccount">' + langArr["Don't have a GTArcade account?"] + ' <a href="javascript:;" id="btnGoSign">' + langArr["Sign up now!"] + ' </a></div>\
									</form>\
								</div>\
								<div class="box_SignUpG" id="signUpArea">\
									<form class="form_login" action="/site/proxy" method="get">\
										<p class="Glogo"></p>\
										<div class="dd"><input name="reg_email" id="reg_email" type="text" placeholder="' + langArr["Email"] + '" class="input_login" /><div class="wrong_tip" id="email_error"><span class="tip_sj">▲</span>' + langArr["Please enter a valid email address!"] + '</div></div>\
										<div class="dd"><input name="reg_password" id="reg_password" type="password" placeholder="' + langArr["Password"] + '" class="input_login" /><div class="wrong_tip" id="password_error"><span class="tip_sj">▲</span>' + langArr["Password must be at least 6 characters!"] + '</div></div>\
										<div class="dd"><input name="reg_password_re" id="reg_password_re" type="password" placeholder="' + langArr["Confirm Password"] + '" class="input_login" /><div class="wrong_tip" id="password_re_error"><span class="tip_sj">▲</span>' + langArr["Passwords don't match"] + '</div></div>\
										<div class="dd clearfix show_reg_verify_code" style="display:none;">\
											<input type="text" id="reg_code" class="input_login fl" placeholder="' + langArr["Verification Code"] + '" style="width:230px;" name="reg_code" />\
											<div class="wrong_tip code_warn" id="code_error"><span class="tip_sj">▲</span>' + langArr["Verification Code don\'t match"] + '</div>\
											<span class="yzm fr"><img onclick="pop.changeVerifyCode(2);" id="regVerifyCode" align="middle" src="" valign="absmiddle" style="cursor:pointer"></span>\
										</div>\
										<div class="dd">\
											<label class="label_checkbox" ><input name="policy0" type="checkbox" checked="false" value=""/>' + langArr["I have read and agree to the"] + '<a href="//www.' + urls.domain + '/terms.html" target="_blank">' + langArr["Terms of Service and Privacy Policy."] + '</a></label>\
											<label class="label_checkbox" ><input name="policy1" type="checkbox" checked="false" value=""/>' + langArr["I would like GTArcade to keep me informed of their newest games and promotions."] + '</label>\
										</div>\
										<div class="btn_sign"><a href="javascript:;" id="signBtn" class="btn_lg_a">' + langArr["Sign up"] + '</a></div>\
										<div class="noAccount">' + langArr["Allready have an account"] + '? <a href="javascript:;" id="btnGoLogin">' + langArr["Log in here"] + '! </a></div>\
									</form>\
								</div>\
								<div class="other_account">\
									<a href="javascript:;" class="btn_fbLogin" onclick="pop.connect(\'facebook\')">' + langArr["Log in with Facebook"] + '</a>\
									<a href="javascript:;" class="btn_gLogin" onclick="pop.connect(\'google\')">' + langArr["Log in with Google"] + '</a>\
									<ul class="list clearfix">\
										<li><a href="javascript:;" onclick="pop.connect(\'twitter\')"><h3 class="Twitter"></h3>' + langArr["Twitter"] + '</a></li>\
										<li><a href="javascript:;" onclick="pop.connect(\'yahoo\')"><h3 class="Yahoo"></h3>' + langArr["Yahoo"] + '!</a></li>\
										<li><a href="javascript:;" onclick="pop.connect(\'livespace\')"><h3 class="Windows"></h3>' + langArr["Windows"] + '</a></li>\
									</ul>\
								</div>\
								<div class="line"><p>Or</p></div>\
							</div>\
						</div>\
					</div>';
        this.picProp.init(html, function (o) {
            o.container.find('#loginCloseBtn').click(function () {
                o.container.remove();
                background().hide();
                return false;
            });
            var cookie_email = $.cookie("login_email", {
                path: '/'
            });
            if (cookie_email) o.container.find("input[name=email]").val(cookie_email);
        }).show();
        $("input[name^='policy']").click(function () {
            $("input[name^='policy']").each(function (i) {
                if (!$("input[name='policy" + i + "']").attr('checked')) {
                    $('#signBtn').css({
                        'background': '#c7c7c7'
                    });
                    $("#signBtn").attr("id", 'signBtn1');
                    return false;
                } else {
                    $('#signBtn1').css({
                        'background': '#fe9500'
                    });
                    $("#signBtn1").attr("id", 'signBtn');
                }
            });
        });
    },
    //验证码
    changeVerifyCode: function (flag) {
        appedUrl("picProp.changeVerifyCode")
        var imgId = '';
        switch (flag) {
            case 1:
                imgId = $('#logVerifyCode');
                break;
            case 2:
                imgId = $('#regVerifyCode');
                break;
            case 3:
                imgId = $('#hearderLogVerifyCode');
                break;
            case 4:
                imgId = $('#gameHearderLogVerifyCode');
                break;
        }
        _check_urls();
        $.ajax({
            type: "GET",
            url: urls.passport_url + "/site/captcha/refresh/1",
            dataType: 'jsonp',
            cache: false,
            jsonp: "callback",
            success: function (data) {
                imgId.attr('src', urls.passport_url + data['url']);
                $('body').data(urls.passport_url + '/site/captcha.hash', [data['hash1'], data['hash2']]);
            }
        });
    },

    codeRefresh: function () {
        appedUrl("picProp.codeRefresh")
        var img = new Image;
        img.onload = function () {
            $('#yw0').trigger('click');
        }
        img.src = $('#yw0').attr('src');
    },

    showThirdSignUp: function (account, from, email) {
        appedUrl("picProp.showThirdSignUp")
        pop.closeX('loginG');
        pop.closeX('SignUpG');
        var img;
        var platFrom = '';

        _check_urls();

        switch (from) {
            case 'facebook':
                img = urls.resource_url + '/gta_common/images/quickly_tu_facebook.jpg';
                platFrom = 'Facebook';
                break;
            case 'google':
                img = urls.resource_url + '/gta_common/images/quickly_tu_google.jpg';
                platFrom = 'Google';
                break;
            case 'twitter':
                img = urls.resource_url + '/gta_common/images/quickly_tu_twitter.png';
                platFrom = 'Twitter';
                break;
            case 'yahoo':
                img = urls.resource_url + '/gta_common/images/quickly_tu_yahoo.png';
                platFrom = 'Yahoo!';
                break;
            case 'livespace':
                img = urls.resource_url + '/gta_common/images/quickly_tu_live.png';
                platFrom = 'Windows Live';
                break;
        }
        var html = '<div class="GTpopBar" id="fbloginID">\
			  <div class="RegGroup">\
			    <div class="planbt"><span class="lantz">' + langArr["Join  GTArcade"] + ' </span> <a href="javascript:;"  id="fbloginColse" class="p_close">' + langArr["close"] + '</a></div>\
			    <!--login neirong Start-->\
			    <div class="LogKuang">\
			      <div class="logqu_a">\
			        <div class="disanfangQu">\
			          <p class="san_shangbiao">' + langArr["Connect"] + ' ' + platFrom + ' ' + langArr["Account"] + '   </p>\
			          <p class="san_tubiao"><img src="' + img + '" width="98" height="98"></p>\
			          <p class="san_hi">' + langArr["Hi"] + ', ' + account + '<br>\
			            ' + langArr["We pre-populated some fields from your"] + ' <br>\
			          ' + platFrom + ' ' + langArr["account"] + '.</p> \
			          <p class="san_Already">' + langArr["Already have a GTArcade account?"] + ' <br>\
			          <a href="javascript:;" class="txt_zhus" onclick="pop.closeX(\'fbloginID\');pop.showLogin();">' + langArr["Log in here"] + '</a>！</p>\
			        </div>\
			      </div>\
			      <div class="logqu_b">\
			        <div class="regBox" id="regBox">\
			          <p class="san_shangbiao">' + langArr["Create a GTArcade account"] + '</p>\
			          <p class="log_jie">' + langArr["Email"] + '</p>\
		          <p class="log_in">\
			            <input name="email" type="text" class="in_lr nor" id="email" value="' + email + '">\
			          </p>\
			          <p class="log_ti"><span class="ti_warn" id="email_error"></span></p>\
			          <p class="log_jie">' + langArr["Password"] + '</p>\
			          <p class="log_in">\
			            <input name="password" type="password" class="in_lr nor" id="password">\
			          </p>\
			          <p class="log_ti"><span class="ti_warn" id="password_error"></span></p>\
			          <p class="log_jie">' + langArr["Confirm Password"] + '</p>\
			          <p class="log_in">\
			            <input name="password_re" type="password" class="in_lr nor" id="password_re">\
			          </p>\
			          <p class="log_ti"><span class="ti_warn" id="password_re_error"></span></p>\
			          <p class="log_jie">' + langArr["Verification Code"] + '</p>\
			          <p class="log_in logvercode">\
			          <input name="code" type="text" class="in_lr nor" id="code">\
				      <span class="vercodema"><img id="captchaCodeImg" src="' + urls.passport_url + '/site/captcha?' + Math.random() + '" width="100" height="37"></span>\
				      <a href="javascript:;" class="refreshTxt" id="refreshCode">' + langArr["Refresh"] + '</a>\
				      </p>\
				      <p class="log_ti"><span class="ti_warn" id="code_error"></span></p>\
				      <input name="signUpFrom" type="hidden" id="signUpFrom" value="third"/>\
			          <p class="log_btn"><a href="javascript:;" class="btn_lg_a" id="fbloginBtn">' + langArr["Sign up"] + '</a> </p>\
			          <p class="log_iup">By clicking &quot;Sign Up&quot;, you are inidicating that you have read and agreed to the <a href="//www.' + urls.domain + '/terms.html" target="_blank" class="ls_up">Terms of Service and Privacy Policy</a></p>\
			        </div>\
			      </div>\
			      <div class="clear"></div>\
			    </div>\
			    <!--login neirong  End--> \
			  </div>\
			</div>\
			';
        this.picProp.init(html, function (o) {
            o.container.find('#fbloginColse').click(function () {
                o.container.remove();
                background().hide();
                return false;
            });
        }).show();
    },

    showThirdSignUpBinded: function (account, from, email) {
        appedUrl("picProp.showThirdSignUpBinded")
        pop.closeX('loginG');
        pop.closeX('SignUpG');
        var img;
        var platFrom = '';
        var fromIcon = from.replace(/(^|\s+)\w/g, function (s) {
            return s.toUpperCase();
        });
        if ('livespace' == from) fromIcon = 'Windows';

        _check_urls();

        switch (from) {
            case 'facebook':
                img = urls.resource_url + '/gta_common/images/quickly_tu_facebook.jpg';
                platFrom = 'Facebook';
                break;
            case 'google':
                img = urls.resource_url + '/gta_common/images/quickly_tu_google.jpg';
                platFrom = 'Google';
                break;
            case 'twitter':
                img = urls.resource_url + '/gta_common/images/quickly_tu_twitter.png';
                platFrom = 'Twitter';
                break;
            case 'yahoo':
                img = urls.resource_url + '/gta_common/images/quickly_tu_yahoo.png';
                platFrom = 'Yahoo!';
                break;
            case 'livespace':
                img = urls.resource_url + '/gta_common/images/quickly_tu_live.png';
                platFrom = 'Windows Live';
                break;
        }
        var html = '<div class="popUp_sign pop_sign" id="loginG" style="position:absolute; left:200px; top:60px;">\
						<div class="allBoxG">\
							<div class="popUp_head">\
								<a href="javascript:;" id="fbloginColse" class="btn_close" title="Close">x</a>\
								<div class="title title_loginG"><p>' + langArr["Log In"] + '</p></div>\
								<div class="title title_SignUpG"><p>' + langArr["Sign up"] + '</p></div>\
							</div>\
							<div class="popUp_main clearfix">\
								<div class="box_loginG" id="loginArea">\
									<form class="form_login">\
										<h3 class="existingH">' + langArr["existing User"] + '</h3>\
										<div class="dd"><input name="email" readonly="readonly" id="email" value="' + email + '" placeholder="' + langArr["Email"] + '" class="input_login login_email" /><div class="wrong_tip username_warn" id="error_email"><span class="tip_sj">▲</span>' + langArr["Please enter a valid email address!"] + '</div></div>\
										<div class="dd"><input name="password" id="password" type="password" placeholder="' + langArr["Password"] + '" class="input_login" /><div class="wrong_tip password_warn" id="error_pwd"><span class="tip_sj">▲</span>' + langArr["Password must be at least 6 characters!"] + '</div></div>\
										<div class="dd clearfix show_login_verify_code" style="display:none;">\
											<input type="text" class="input_login fl" placeholder="' + langArr["Verification Code"] + '" style="width:230px;" id="login_code" name="login_code" />\
											<div class="wrong_tip code_warn" id="error_code"><span class="tip_sj">▲</span>' + langArr["Verification Code don\'t match"] + '</div>\
											<span class="yzm fr"><img onclick="pop.changeVerifyCode(1);" id="logVerifyCode" align="middle" src="" valign="absmiddle" style="cursor:pointer"></span>\
										</div>\
										<div class="dd">\
											<label class="label_checkbox" ><input name="" id="rememberMe" type="checkbox" checked="false" value=""/>' + langArr["Remember me"] + '</label>\
											<div class="btn_forgotPasw"><a href="' + urls.passport_url + '/password/forgotpassword">' + langArr["Forgot Password?"] + '</a></div>\
										</div>\
										<div class="btn_sign"><a href="javascript:;" id="loginBtnBind">' + langArr["Log In"] + '</a></div>\
										<div class="noAccount">' + langArr["Don't have a GTArcade account?"] + ' <a href="javascript:;" id="btnGoSign">' + langArr["Sign up now!"] + ' </a></div>\
									</form>\
								</div>\
								<div class="box_SignUpG" id="signUpArea">\
									<form class="form_login" action="/site/proxy" method="get">\
										<p class="Glogo"></p>\
										<div class="dd"><input name="reg_email" id="reg_email" type="text" placeholder="' + langArr["Email"] + '" class="input_login" /><div class="wrong_tip" id="email_error"><span class="tip_sj">▲</span>' + langArr["Please enter a valid email address!"] + '</div></div>\
										<div class="dd"><input name="reg_password" id="reg_password" type="password" placeholder="' + langArr["Password"] + '" class="input_login" /><div class="wrong_tip" id="password_error"><span class="tip_sj">▲</span>' + langArr["Password must be at least 6 characters!"] + '</div></div>\
										<div class="dd"><input name="reg_password_re" id="reg_password_re" type="password" placeholder="' + langArr["Confirm Password"] + '" class="input_login" /><div class="wrong_tip" id="password_re_error"><span class="tip_sj">▲</span>' + langArr["Passwords don't match"] + '</div></div>\
										<div class="dd clearfix show_reg_verify_code" style="display:none;">\
											<input type="text" id="reg_code" class="input_login fl" placeholder="' + langArr["Verification Code"] + '" style="width:230px;" name="reg_code" />\
											<div class="wrong_tip code_warn" id="code_error"><span class="tip_sj">▲</span>' + langArr["Verification Code don\'t match"] + '</div>\
											<span class="yzm fr"><img onclick="pop.changeVerifyCode(2);" id="regVerifyCode" align="middle" src="" valign="absmiddle" style="cursor:pointer"></span>\
										</div>\
										<div class="dd">\
											<label class="label_checkbox" ><input name="policy0" type="checkbox" checked="false" value=""/>' + langArr["I have read and agree to the"] + '<a href="//www.' + urls.domain + '/terms.html" target="_blank">' + langArr["Terms of Service and Privacy Policy."] + '</a></label>\
											<label class="label_checkbox" ><input name="policy1" type="checkbox" checked="false" value=""/>' + langArr["I would like GTArcade to keep me informed of their newest games and promotions."] + '</label>\
										</div>\
										<div class="btn_sign"><a href="javascript:;" id="signBtn" class="btn_lg_a">' + langArr["Sign up"] + '</a></div>\
										<div class="noAccount">' + langArr["Allready have an account"] + '? <a href="javascript:;" id="btnGoLogin">' + langArr["Log in here"] + '! </a></div>\
									</form>\
								</div>\
								<div class="other_account existingL" style=" padding-top:36px;">\
                                    <p class="title">Connect a Windows Live Account</p>\
                                <ul class="list clearfix" style=" padding-top:14px;">\
                                <li><a href="#"><h3 class="Windows"></h3>Windows</a></li>\
                                </ul>\
                                <p class="tip_singS"><em>' + langArr["hello"] + ', ' + account + '</em>' + langArr["The address of this mail had been registered!"] + '</p>\
                                </div>\
								<div class="line"><p>Or</p></div>\
							</div>\
						</div>\
					</div>';
        this.picProp.init(html, function (o) {
            o.container.find('#fbloginColse').click(function () {
                o.container.remove();
                background().hide();
                if ($("#advertisement").val() == "gtarcade") {
                    return false;
                }
                pop.showLogin();
                return false;
            });
        }).show();
    },
    //注册
    showSignUp: function () { //改版后注册
        appedUrl("picProp.showSignUp")
        _check_urls();
        var html = '<div class="popUp_sign pop_sign" id="SignUpG" style="position:absolute; left:200px; top:60px;">\
						<div class="allBoxG">\
							<div class="popUp_head">\
								<a href="javascript:;" class="btn_close p_close" title="Close">x</a>\
								<div class="title title_loginG"><p>' + langArr["Log In"] + '</p></div>\
								<div class="title title_SignUpG"><p>' + langArr["Sign up"] + '</p></div>\
							</div>\
							<div class="popUp_main clearfix">\
								<div class="box_loginG" id="loginArea">\
									<form class="form_login">\
										<p class="Glogo"></p>\
										<div class="dd"><input name="email" id="email" type="text" placeholder="' + langArr["Email"] + '" class="input_login login_email" /><div class="wrong_tip" id="error_email"><span class="tip_sj">▲</span>' + langArr["Please enter a valid email address!"] + '</div></div>\
										<div class="dd"><input name="password" id="password" type="password" placeholder="' + langArr["Password"] + '" class="input_login" /><div class="wrong_tip" id="error_password"><span class="tip_sj">▲</span>' + langArr["Password must be at least 6 characters!"] + '</div></div>\
										<div class="dd clearfix show_login_verify_code" style="display:none;">\
											<input type="text" class="input_login fl" placeholder="' + langArr["Verification Code"] + '" style="width:230px;" id="login_code" name="login_code" />\
											<div class="wrong_tip code_warn" id="error_code"><span class="tip_sj">▲</span>' + langArr["Verification Code don\'t match"] + '</div>\
											<span class="yzm fr"><img onclick="pop.changeVerifyCode(1);" id="logVerifyCode" align="middle" src="" valign="absmiddle" style="cursor:pointer"></span>\
										</div>\
										<div class="dd">\
											<label class="label_checkbox" ><input name="" type="checkbox" checked="false" value=""/>' + langArr["Remember me"] + '</label>\
											<div class="btn_forgotPasw"><a href="' + urls.passport_url + '/password/forgotpassword">' + langArr["Forgot Password?"] + '</a></div>\
										</div>\
										<div class="btn_sign"><a href="javascript:;" id="loginBtn">' + langArr["Log In"] + '</a></div>\
										<div class="noAccount">' + langArr["Don't have a GTArcade account?"] + ' <a href="javascript:;" id="btnGoSign">' + langArr["Sign up now!"] + ' </a></div>\
									</form>\
								</div>\
								<div class="box_SignUpG" id="signUpArea">\
									<form class="form_login" action="/site/proxy" method="get">\
										<p class="Glogo"></p>\
										<div class="dd"><input name="reg_email" id="reg_email" type="text" placeholder="' + langArr["Email"] + '" class="input_login" /><div class="wrong_tip" id="email_error"><span class="tip_sj">▲</span>' + langArr["Please enter a valid email address!"] + '</div></div>\
										<div class="dd"><input name="reg_password" id="reg_password" type="password" placeholder="' + langArr["Password"] + '" class="input_login" /><div class="wrong_tip" id="password_error"><span class="tip_sj">▲</span>' + langArr["Password must be at least 6 characters!"] + '</div></div>\
										<div class="dd"><input name="reg_password_re" id="reg_password_re" type="password" placeholder="' + langArr["Confirm Password"] + '" class="input_login" /><div class="wrong_tip" id="password_re_error"><span class="tip_sj">▲</span>' + langArr["Passwords don't match"] + '</div></div>\
										<div class="dd clearfix show_reg_verify_code" style="display:none;">\
											<input type="text" id="reg_code" class="input_login fl" placeholder="' + langArr["Verification Code"] + '" style="width:230px;" name="reg_code" />\
											<div class="wrong_tip code_warn" id="code_error"><span class="tip_sj">▲</span>' + langArr["Verification Code don\'t match"] + '</div>\
											<span class="yzm fr"><img onclick="pop.changeVerifyCode(2);" id="regVerifyCode" align="middle" src="" valign="absmiddle" style="cursor:pointer"></span>\
										</div>\
										<div class="dd">\
											<label class="label_checkbox" ><input name="policy0" type="checkbox" checked="false" value=""/>' + langArr["I have read and agree to the"] + '<a href="//www.' + urls.domain + '/terms.html" target="_blank">' + langArr["Terms of Service and Privacy Policy."] + '</a></label>\
											<label class="label_checkbox" ><input name="policy1" type="checkbox" checked="false" value=""/>' + langArr["I would like GTArcade to keep me informed of their newest games and promotions."] + '</label>\
										</div>\
										<div class="btn_sign"><a href="javascript:;" id="signBtn" class="btn_lg_a">' + langArr["Sign up"] + '</a></div>\
										<div class="noAccount">' + langArr["Allready have an account"] + '? <a href="javascript:;" id="btnGoLogin">' + langArr["Log in here"] + '! </a></div>\
									</form>\
								</div>\
								<div class="other_account">\
									<a href="javascript:;" class="btn_fbLogin" onclick="pop.connect(\'facebook\')">' + langArr["Log in with Facebook"] + '</a>\
									<a href="javascript:;" class="btn_gLogin" onclick="pop.connect(\'google\')">' + langArr["Log in with Google"] + '</a>\
									<ul class="list clearfix">\
										<li><a href="javascript:;" onclick="pop.connect(\'twitter\')"><h3 class="Twitter"></h3>' + langArr["Twitter"] + '</a></li>\
										<li><a href="javascript:;" onclick="pop.connect(\'yahoo\')"><h3 class="Yahoo"></h3>' + langArr["Yahoo"] + '!</a></li>\
										<li><a href="javascript:;" onclick="pop.connect(\'livespace\')"><h3 class="Windows"></h3>' + langArr["Windows"] + '</a></li>\
									</ul>\
								</div>\
								<div class="line"><p>Or</p></div>\
							</div>\
						</div>\
					</div>';
        this.picProp.init(html, function (o) {
            o.container.find('.p_close').click(function () {
                o.container.remove();
                background().hide();
                return false;
            });
        }).show();
        $("input[name^='policy']").click(function () {
            $("input[name^='policy']").each(function (i) {
                if (!$("input[name='policy" + i + "']").attr('checked')) {
                    $('#signBtn').css({
                        'background': '#c7c7c7'
                    });
                    $("#signBtn").attr("id", 'signBtn1');
                    return false;
                } else {
                    $('#signBtn1').css({
                        'background': '#fe9500'
                    });
                    $("#signBtn1").attr("id", 'signBtn');
                }
            });
        });
        $(".log_ti .ti_warn").html('');
    },


    showSelectSever: function () {
        appedUrl("picProp.showSelectSever")
        var html = '<div class="GTpopBar tipsbox">\
				    <div class="planbt">\
				    	<a href="javascript:;" class="p_close">close</a>\
				    </div>\
				    <div class="warn_cont">\
				        <p class="mailbox_ok">Please enter the game to receive the reward !</p>\
				    </div>\
		</div>';

        this.picProp.init(html, function (o) {
            o.container.find('.p_close').click(function () {
                o.container.remove();
                background().hide();
                return false;
            });
        }).show();
    },


    showSignUpSuccess: function () {
        appedUrl("picProp.showSignUpSuccess")
        _check_urls();
        var html = '<div class="popWrap">\
					  <h2 class="popUp_head">\
					    <a href="javascript:;" class="btn_close p_close" title="Close">x</a>\
					  </h2>\
					  <div class="pop-newsBox">\
					    <p class="succes-icon">' + langArr["Successful registration"] + '</p>\
					    <p class="tt3">' + langArr["Go to"] + ' <a href="' + urls.passport_url + '">' + langArr["My Account"] + '</a>, ' + langArr["to change account information"] + '</p>\
					  </div>\
					</div>';
        this.picProp.init(html, function (o) {
            o.container.find('#signUpSuccessColseBtn').click(function () {
                o.container.remove();
                background().hide();
                return false;
            });
        }).show();
        setTimeout(
            function () {
                pop.closeX('SignUpSuccessArea');
                window.location.reload();
            }, 5000
        );
    },

    showSendMailSucess: function () {
        appedUrl("picProp.showSendMailSucess")
        var show_mail = user_secure_email.substr(0, 3) + "****" + user_secure_email.substr(user_secure_email.indexOf("@"));
        var link_mail = "http://mail." + user_secure_email.substr(user_secure_email.indexOf("@") + 1);
        var html = '<div class="popWrap">\
						  <div class="popUp_head">\
						    <a href="javascript:;" class="btn_close close_btn" title="Close">x</a>\
						    <div class="title"><p>' + langArr["Email Security"] + '</p></div>\
						  </div>\
						  <div class="pop-f">\
						    <p class="succes-iconS">' + langArr["Your email is set up successfully!"] + '</p>\
						    <p class="txtTit">' + langArr["We send you an email with a link to the specified address in your account"] + ':' + show_mail + '</p>\
						    <p class="tt2">' + langArr["Click on the link as soon as you get the mail, please note that the link is only active for 24 hours."] + '</p>\
						    <p class="pop-btn f-cb">\
						      <a href="' + link_mail + '" class="btn-Ocen" target="_blank">' + langArr["Login Mailbox"] + '</a>\
						    </p>\
						  </div>\
						</div>';
        this.picProp.init(html, function (o) {
            o.container.find('.close_btn').click(function () {
                o.container.remove();
                background().hide();
                return false;
            });
        }).show();
    },

    /* 订阅操作成功 */
    showSubscribeSuccess: function () {
        appedUrl("picProp.showSubscribeSuccess")
        var html = '<div class="popWrap">\
						  <div class="popUp_head">\
						    <a href="javascript:;" class="btn_close close_btn" title="Close">x</a>\
						    <div class="title"><p>' + langArr["Settings saved"] + '</p></div>\
						  </div>\
						  <div class="pop-f">\
						    <p class="txtTit" style="font-size:26px;color:#666;">' + langArr["Your subscriptions has been modified and will take effect within 24 hours"] + '</p>\
						    <p class="pop-btn f-cb">\
						      <a href="javascript:location.reload();scrollTo(0,0);" class="btn-Ocen"">' + langArr["OK"] + '</a>\
						    </p>\
						  </div>\
						</div>';
        this.picProp.init(html, function (o) {
            o.container.find('.close_btn').click(function () {
                o.container.remove();
                background().hide();
                return false;
            });
        }).show();
    },

    showSecurityBox: function (account) {
        appedUrl("picProp.showSecurityBox")
        var _self = this;
        if (!user_secure_email || '' === user_secure_email) user_secure_email = 'Enter the text';
        var mail_preg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        var html = '<div class="popWrap">\
					  <h2 class="popUp_head">\
					    <a href="javascript:;" id="securityCloseBtn" class="btn_close" title="Close">x</a>\
					    <div class="title"><p>' + langArr["Set security email"] + '</p></div>\
					  </h2>\
					  <div class="pop-f">\
					    <p class="tt">' + langArr["Please set one of your frequently used e-mail as secret mailbox, when you forget your password, can through the secret password reset email fast."] + '</p>\
					    <p class="p-ipt">\
					      <label for="" class="lb">' + langArr["Security Email"] + ':</label>\
					      <input type="text" name="" value="' + account + '" id="securityMail" class="pInput">\
					      <div id="email_error"></div>\
					    </p>\
					    <p class="pop-btn f-cb">\
					      <a href="javascript:;" class="btn-ok btn_submit">OK</a>\
					    </p>\
					  </div>\
					</div>';
        this.picProp.init(html, function (o) {
            o.container.find('#securityCloseBtn').click(function () {
                o.container.remove();
                background().hide();
                return false;
            });
            o.container.find("#securityMail").focus(function () {

                if ('Email' === jQuery(this).val()) {
                    jQuery(this).val("");
                }
            });
            o.container.find("#securityMail").blur(function () {
                var pre_input = jQuery(this).val();
                if ('' === jQuery(this).val()) {
                    jQuery(this).val("Email");
                } else {
                    jQuery(this).val(pre_input);
                }
                if (!mail_preg.test(jQuery.trim(jQuery(this).val()))) {
                    jQuery("#email_error").html("<font color='red'>" + langArr["Malformed e-mail"] + "</font>");
                } else {
                    jQuery("#email_error").html('');
                }

            });

            o.container.find(".btn_submit").click(function () {
                var input_email = o.container.find("#securityMail").val();
                if (!mail_preg.test(jQuery.trim(input_email))) {
                    return false;
                }

                jQuery.ajax({
                    url: '/password/security',
                    type: 'post',
                    data: 'secure_email=' + jQuery("#securityMail").val(),
                    dataType: 'json',
                    success: function (_res) {
                        user_secure_email = jQuery("#securityMail").val();
                        if (0 == _res.status) {
                            o.container.remove();
                            background().hide();
                            _self.showSendMailSucess();
                        } else {
                            alert(langArr["set fail,please try again later!"]);
                        }
                    }
                });

            });
        }).show();
    },

    showModifyMailConfirmBox: function () {
        appedUrl("picProp.showModifyMailConfirmBox")
        var _self = this;
        var show_mail = user_secure_email.substr(0, 3) + "****" + user_secure_email.substr(user_secure_email.indexOf("@"));
        var html = '<div class="popUp_warning">\
						  <div class="popUp_head">\
						    <a href="javascript:;" class="btn_close close_btn" title="Close">x</a>\
						    <div class="title"><p>' + langArr["Changing email"] + '</p></div>\
						  </div>\
						  <div class="popUp_main">\
						    <p class="warning_main">' + langArr["It is e-mailed to the address"] + ': ' + show_mail + '<br>' + langArr["Check your inbox please and follow the instructions to complete the confirmation"] + '</p>\
						    <div class="btn_warning">\
						      <a href="javascript:;" class="btn_submit modify_confirm">' + langArr["Send a confirmation email"] + '</a>\
						      <a href="javascript:;" class="btn_blue btn_submit close_btn">' + langArr["cancel"] + '</a>\
						    </div>\
						  </div>\
						</div>';

        this.picProp.init(html, function (o) {
            o.container.find('.close_btn').click(function () {
                o.container.remove();
                background().hide();
                return false;
            });

            o.container.find('.modify_confirm').click(function () {
                jQuery(this).addClass("disabled");
                jQuery(this).unbind("click");
                jQuery.ajax({
                    url: '/password/sendconfirmmail',
                    type: 'post',
                    data: 'curent_mail=' + user_secure_email,
                    dataType: 'json',
                    success: function (_res) {
                        if (0 == _res.status) {
                            jQuery(".btn_modify").removeClass("btn_show_modify");
                            jQuery(".btn_modify").addClass("disabled");
                            var dis_able_timeout = setTimeout(function () {
                                jQuery(".btn_modify").removeClass("disabled");
                                jQuery(".btn_modify").addClass("btn_show_modify");
                                clearTimeout(dis_able_timeout);
                            }, 120000);
                            o.container.remove();
                            background().hide();
                            _self.showSendMailSucess();
                        } else {
                            alert(langArr["send fail,please try again later!"]);
                        }
                    }
                });
            });
        }).show();
    },

    showModifyMailBox: function () {
        appedUrl("picProp.showModifyMailBox")
        var _self = this;
        var mail_preg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        var html = '<div class="popWrap">\
					  <h2 class="popUp_head">\
					    <a href="javascript:;" class="btn_close close_btn" title="Close">x</a>\
					    <div class="title"><p>' + langArr["Changing email"] + '</p></div>\
					  </h2>\
					  <div class="pop-f" style=" padding: 0 50px;">\
					    <p class="tt">' + langArr["Please update your secondary email, so you can recover the password if necessary."] + '</p>\
					    <p class="tt">' + langArr["We will send a confirmation email to the new address Email recovery. Please check your inbox and follow the instructions to complete the confirmation."] + '</p>\
					    <p class="p-ipt">\
					      <label for="" class="lb" style="font-weight:bold; margin-bottom: 10px;">' + langArr["New Email recovery"] + ':</label>\
					      </p><p style="text-align:center">\
					      <input type="text" name="" id="modify_mail" class="pInput" value="' + langArr["Enter the new address..."] + '" style=" width: 380px;"></p>\
					     <p id="modify_mail_error"></p>\
					    <p class="pop-btn f-cb">\
					      <a href="" class="btn-ok modify_confirm">' + langArr["OK"] + '</a>\
					    </p>\
					  </div>\
					</div>';

        this.picProp.init(html, function (o) {
            o.container.find('.close_btn').click(function () {
                o.container.remove();
                background().hide();
                return false;
            });

            o.container.find("#modify_mail").focus(function () {
                if (langArr["Enter the new address..."] === $(this).val()) {
                    $(this).val("");
                }
            });

            o.container.find("#modify_mail").blur(function () {
                var pre_input = $(this).val();
                if ('' === $(this).val()) {
                    $(this).val(langArr["Enter the new address..."]);
                } else {
                    $(this).val(pre_input);
                }
                if (!mail_preg.test($.trim($(this).val()))) {
                    $("#modify_mail_error").html(langArr["Email format is incorrect"]);
                } else {
                    $("#modify_mail_error").html('');
                }

            });

            o.container.find('.modify_confirm').click(function (event) {
                event.preventDefault();
                var input_email = o.container.find("#modify_mail").val();
                if (!mail_preg.test($.trim(input_email))) {
                    return false;
                }
                $(this).addClass("disabled");
                $(this).unbind("click");
                var $modify_mail = $("#modify_mail").val();
                $.ajax({
                    url: '/password/sendconfirmmail',
                    type: 'post',
                    data: 'curent_mail=' + $modify_mail + "&mtype=modifyconfirm&code=" + modify_code,
                    dataType: 'json',
                    success: function (_res) {
                        if (0 == _res.status) {
                            $(".btn_modify").removeClass("btn_show_modify");
                            $(".btn_modify").addClass("disabled");
                            var dis_able_timeout = setTimeout(function () {
                                $(".btn_modify").removeClass("disabled");
                                $(".btn_modify").addClass("btn_show_modify");
                                clearTimeout(dis_able_timeout);
                            }, 120000);
                            //user_secure_email = jQuery("#modify_mail").val();
                            //alert("邮件发送成功!");
                            //window.location.href = "/password/security";
                            o.container.remove();
                            background().hide();
                            _self.showSendMailSucess();
                        } else {
                            alert(langArr["send fail,please try again later!"]);
                        }
                    }
                });
            });
        }).show();
    },

    showSetSecuryTips: function () {
        appedUrl("picProp.showSetSecuryTips")
        var html = '<div class="GTpopBar tipsbox">\
                            <div class="planbt">\
                                <p class="lantxt">' + langArr["Account Security"] + '</p>\
                                <a href="javascript:" class="p_close close_btn">' + langArr["close"] + '</a>\
                            </div>\
                            <div class="warn_cont">\
                                <p class="">' + langArr["Link your recovery Email and mobile phone number, and connect your social network account for additional account security and easy access. Set them now to get Bonus Rewards!"] + '</p>\
                                <p class="button_warn"><a href="' + urls.passport_url + '/password/security" class="btn btn_submit">' + langArr["Set Now"] + '</a></p>\
                            </div>\
                        </div>';
        this.picProp.init(html, function (o) {
            $.cookie("show_email_tips", "true", {
                path: '/',
                expires: 30,
                domain: '.gtarcade.com'
            });
            o.container.find('.close_btn').click(function () {
                o.container.remove();
                background().hide();
                return false;
            });
        }).show();
    },

    connect: function (from) {
        appedUrl("picProp.connect")
        document.domain = window.urls.domain;
        _check_urls();

        var iWidth = 700;
        var iHeight = 500;
        var iTop = (window.screen.availHeight - 10 - iHeight) / 2;
        var iLeft = (window.screen.availWidth - 30 - iWidth) / 2;
        var win = window.open(
            urls.trd_login + '/openidNew/connect/plat/pt_en/name/' + from + '/callbackUrl/' + urls.domain,
            "_blank",
            "height=" + iHeight + ",width=" + iWidth + ",top=" + iTop + ",left=" + iLeft + ""
        );
        tt = setInterval((function (win) {
            return function () {
                if (win.closed) {
                    if ($.cookie('loginsucceed') != null) {
                        pop.showSignUpSuccess();
                        $.cookie('loginsucceed', null, {
                            path: '/',
                            domain: '.' + urls.domain
                        });
                        clearInterval(tt);
                    } else if ($.cookie('emailRegisted') != null) {
                        pop.showThirdSignUpBinded($.cookie('emailRegisted'), from, $.cookie(from + 'email'));
                        $.cookie('emailRegisted', null, {
                            path: '/',
                            domain: '.' + urls.domain
                        });
                        clearInterval(tt);
                    } else if ($.cookie('connecterror') != null) {
                        pop.showWarningInfo(from);
                        $.cookie('connecterror', null, {
                            path: '/',
                            domain: '.' + urls.domain
                        });
                        clearInterval(tt);
                    } else if ($.cookie('hasRegisted') != null) {
                        pop.showWarningInfo(from);
                        $.cookie('hasRegisted', null, {
                            path: '/',
                            domain: '.' + urls.domain
                        });
                        clearInterval(tt);
                    } else {
                        window.location.reload();
                        clearInterval(tt);
                    }
                }
            };
        })(win), 1000);
    },

    syncCookies: function (keys, cookies) {
        appedUrl("picProp.syncCookies")
        var lens = keys.length;
        for (var i = 0; i < lens; i++) {
            options = {};
            var decode = decodeURIComponent;
            var value = (result = new RegExp('(?:^|; )' + encodeURIComponent(keys[i]) + '=([^;]*)').exec(cookies)) ? decode(result[1]) : null;
            $.cookie(keys[i], value, {
                path: '/',
                domain: '.gtarcade.com'
            });
        }
    },

    goAccount: function () {
        appedUrl("picProp.goAccount")

        _check_urls();

        pop.loginCallBack = pop.goAccount;
        if ($.cookie("uuzu_UNICKNAME")) {
            window.location = urls.passport_url;
        } else {
            pop.showLogin();
        }
    },
    //待定
    goReg: function () {
        appedUrl("picProp.goReg")
        _check_urls();
        window.location = urls.passport_url + "/site/ureg/";
    },

    goRecharge: function () {
        appedUrl("picProp.goRecharge")
        _check_urls();
        pop.loginCallBack = pop.goAccount;
        if ($.cookie("uuzu_UNICKNAME")) {
            window.location = urls.passport_url + "/payment/";
        } else {
            window.urls.RechargeUrl = urls.passport_url + "/payment/";
            pop.showLogin();
        }
    },

    showPasswordError: function (info) {
        appedUrl("picProp.showPasswordError")
        var html = ' <div class="popWrap">\
            <h2 class="popUp_head">\
            <a href="javascript:;" class="btn_close p_close" title="Close">x</a>\
            </h2>\
            <div class="pop-newsBox">\
                <p class="tt3">' + info + '</p>\
            </div>\
        </div>';
        this.picProp.init(html, function (o) {
            o.container.find('.p_close').click(function () {
                o.container.remove();
                background().hide();
                return false;
            });
        }).show();
    },

    showMobileBox: function (isModify) {
        appedUrl("picProp.showMobileBox")
        var _self = this;
        var title = langArr["Mobile Phone Number:"];
        if (isModify == 1) {
            var title = langArr["Modify Mobile Phone Number:"];
        }

        var html = '<div class="GTpopBar mailbox">\
                        <div class="planbt">\
                            <p class="lantxt">' + title + '</p>\
                            <a href="javascript:" id="mobileCloseBtn" class="p_close">' + langArr["close"] + '</a>\
                        </div>\
                    <div class="warn_cont">\
                        <p class="tips_text">' + langArr["By confirming your phone number, you can retrieve your password via text message."] + '</p>\
                        <form action="" class="form-security-mail">\
                            <fieldset id="test_belen">\
                            <legend>' + langArr["Mobile Phone Number:"] + '</legend>\
                            <p class="clearfix">\
                                <label for="">' + langArr["Country/Region"] + '</label>\
                                <select name="" id="countryCode" class="form_select form_select2">\
                                    <option value="">' + langArr["Country/Region"] + '</option>\
                                    <option value="355">Albania</option>\<option value="213">Algeria</option>\<option value="376">Andorra</option>\<option value="244">Angola</option>\<option value="1264">Anguilla</option>\<option value="1268">Antigua and Barbuda</option>\<option value="54">Argentina</option>\<option value="374">Armenia</option>\<option value="247">Ascension</option>\<option value="61">Australia</option>\<option value="43">Austria</option>\<option value="994">Azerbaijan</option>\<option value="1242">Bahamas</option>\<option value="973">Bahrain</option>\<option value="880">Bangladesh</option>\<option value="1246">Barbados</option>\<option value="375">Belarus</option>\<option value="32">Belgium</option>\<option value="501">Belize</option>\<option value="229">Benin</option>\<option value="1441">Bermuda Is.</option>\<option value="591">Bolivia</option>\<option value="267">Botswana</option>\<option value="55">Brazil</option>\<option value="673">Brunei</option>\<option value="359">Bulgaria</option>\<option value="226">Burkina-faso</option>\<option value="95">Burma</option>\<option value="257">Burundi</option>\<option value="237">Cameroon</option>\<option value="1">Canada</option>\<option value="1345">Cayman Is.</option>\<option value="236">Central African Republic</option>\<option value="235">Chad</option>\<option value="56">Chile</option>\<option value="86">China</option>\<option value="57">Colombia</option>\<option value="242">Congo</option>\<option value="682">Cook Is.</option>\<option value="506">Costa Rica</option>\<option value="53">Cuba</option>\<option value="357">Cyprus</option>\<option value="420">Czech</option>\<option value="420">Czech Republic</option>\<option value="45">Denmark</option>\<option value="253">Djibouti</option>\<option value="1890">Dominica Rep.</option>\<option value="593">Ecuador</option>\<option value="20">Egypt</option>\<option value="503">EI Salvador</option>\<option value="372">Estonia</option>\<option value="251">Ethiopia</option>\<option value="679">Fiji</option>\<option value="358">Finland</option>\<option value="33">France</option>\<option value="594">French Guiana</option>\<option value="689">French Polynesia</option>\<option value="241">Gabon</option>\<option value="220">Gambia</option>\<option value="995">Georgia</option>\<option value="49">Germany</option>\<option value="233">Ghana</option>\<option value="350">Gibraltar</option>\<option value="30">Greece</option>\<option value="1809">Grenada</option>\<option value="1671">Guam</option>\<option value="502">Guatemala</option>\<option value="224">Guinea</option>\<option value="592">Guyana</option>\<option value="509">Haiti</option>\<option value="504">Honduras</option>\<option value="852">Hongkong</option>\<option value="36">Hungary</option>\<option value="354">Iceland</option>\<option value="91">India</option>\<option value="62">Indonesia</option>\<option value="98">Iran</option>\<option value="964">Iraq</option>\<option value="353">Ireland</option>\<option value="972">Israel</option>\<option value="39">Italy</option>\<option value="225">Ivory Coast</option>\<option value="1876">Jamaica</option>\<option value="81">Japan</option>\<option value="962">Jordan</option>\<option value="855">Kampuchea (Cambodia )</option>\<option value="327">Kazakstan</option>\<option value="254">Kenya</option>\<option value="82">Korea</option>\<option value="965">Kuwait</option>\<option value="331">Kyrgyzstan</option>\<option value="856">Laos</option>\<option value="371">Latvia</option>\<option value="961">Lebanon</option>\<option value="266">Lesotho</option>\<option value="231">Liberia</option>\<option value="218">Libya</option>\<option value="423">Liechtenstein</option>\<option value="370">Lithuania</option>\<option value="352">Luxembourg</option>\<option value="853">Macao</option>\<option value="261">Madagascar</option>\<option value="265">Malawi</option>\<option value="60">Malaysia</option>\<option value="960">Maldives</option>\<option value="223">Mali</option>\<option value="356">Malta</option>\<option value="1670">Mariana Is</option>\<option value="596">Martinique</option>\<option value="230">Mauritius</option>\<option value="52">Mexico</option>\<option value="373">Moldova, Republic of</option>\<option value="377">Monaco</option>\<option value="976">Mongolia</option>\<option value="1664">Montserrat Is</option>\<option value="212">Morocco</option>\<option value="258">Mozambique</option>\<option value="264">Namibia</option>\<option value="674">Nauru</option>\<option value="977">Nepal</option>\<option value="599">Netheriands Antilles</option>\<option value="31">Netherlands</option>\<option value="64">New Zealand</option>\<option value="505">Nicaragua</option>\<option value="977">Niger</option>\<option value="234">Nigeria</option>\<option value="850">North Korea</option>\<option value="47">Norway</option>\<option value="968">Oman</option>\<option value="92">Pakistan</option>\<option value="970">Palestine</option>\<option value="507">Panama</option>\<option value="675">Papua New Cuinea</option>\<option value="595">Paraguay</option>\<option value="51">Peru</option>\<option value="63">Philippines</option>\<option value="48">Poland</option>\<option value="351">Portugal</option>\<option value="1787">Puerto Rico</option>\<option value="974">Qatar</option>\<option value="225">Republic of Ivory Coast</option>\<option value="262">Reunion</option>\<option value="40">Romania</option>\<option value="7">Russia</option>\<option value="1784">Saint Vincent</option>\<option value="684">Samoa Eastern</option>\<option value="378">San Marino</option>\<option value="685">San Marino</option>\<option value="239">Sao Tome and Principe</option>\<option value="966">Saudi Arabia</option>\<option value="221">Senegal</option>\<option value="248">Seychelles</option>\<option value="232">Sierra Leone</option>\<option value="65">Singapore</option>\<option value="421">Slovakia</option>\<option value="386">Slovenia</option>\<option value="677">Solomon Is</option>\<option value="252">Somali</option>\<option value="27">South Africa</option>\<option value="34">Spain</option>\<option value="94">Sri Lanka</option>\<option value="1758">St.Lucia</option>\<option value="249">Sudan</option>\<option value="597">Suriname</option>\<option value="268">Swaziland</option>\<option value="46">Sweden</option>\<option value="41">Switzerland</option>\<option value="963">Syria</option>\<option value="886">Taiwan</option>\<option value="992">Tajikstan</option>\<option value="255">Tanzania</option>\<option value="66">Thailand</option>\<option value="228">Togo</option>\<option value="676">Tonga</option>\<option value="1809">Trinidad and Tobago</option>\<option value="216">Tunisia</option>\<option value="90">Turkey</option>\<option value="993">Turkmenistan</option>\<option value="256">Uganda</option>\<option value="380">Ukraine</option>\<option value="971">United Arab Emirates</option>\<option value="44">United Kiongdom</option>\<option value="1">United States of America</option>\<option value="598">Uruguay</option>\<option value="233">Uzbekistan</option>\<option value="58">Venezuela</option>\<option value="84">Vietnam</option>\<option value="967">Yemen</option>\<option value="381">Yugoslavia</option>\<option value="243">Zaire</option>\<option value="260">Zambia</option>\<option value="263">Zimbabwe</option>\
                                </select>\
                            </p>\
                            <p class="warn_info c_red" id="countryCode_error"></p>\
                            <p class="">\
                                <label for="">' + langArr["Mobile Phone Number:"] + '</label>\
                                <input type="text" name="" value="Enter mobile phone number…" id="mobileNum" class="input_mail">\
                            </p>\
                            <p class="warn_info c_red"><a href="javascript:;" class="btn_confircode">' + langArr["Send Confirmation Code"] + '</a></p>\
                            <p class="">\
                                <label for="">' + langArr["Confirmation Code:"] + '</label>\
                                <input type="text" name="" value="Enter confirmation code…" id="confirmationCode" class="input_mail">\
                            </p>\
                            <p class="warn_info c_red" id="code_error"></p>\
                            <p class="button_warn"><input type="button" value="Submit" class="btn btn_submit"></p>\
                            </fieldset>\
                    </form>\
                </div>\
            </div>';

        this.picProp.init(html, function (o) {
            o.container.find('#mobileCloseBtn').click(function () {
                o.container.remove();
                background().hide();
                return false;
            });
            o.container.find("#mobileNum").focus(function () {
                if ('Enter mobile phone number…' === jQuery(this).val()) {
                    jQuery(this).val("");
                }
            });
            o.container.find("#mobileNum").blur(function () {
                var pre_input = jQuery(this).val();
                if ('' === jQuery(this).val()) {
                    jQuery(this).val("Enter mobile phone number…");
                } else {
                    jQuery(this).val(pre_input);
                }

            });

            o.container.find("#confirmationCode").focus(function () {
                if ('Enter confirmation code…' === jQuery(this).val()) {
                    jQuery(this).val("");
                }
            });
            o.container.find("#confirmationCode").blur(function () {
                var pre_input = jQuery(this).val();
                if ('' === jQuery(this).val()) {
                    jQuery(this).val("Enter confirmation code…");
                } else {
                    jQuery(this).val(pre_input);
                }
                if ('' == jQuery.trim(jQuery(this).val()) || 'Enter confirmation code…' === jQuery.trim(jQuery(this).val())) {
                    jQuery("#code_error").html('Confirmation Code is incorrect');
                } else {
                    jQuery("#code_error").html('');
                }

            });

            o.container.find("#countryCode").blur(function () {
                var countryCode = jQuery(this).val();
                if ('' === countryCode) {
                    jQuery("#countryCode_error").html('Please select your country/region.');
                } else {
                    jQuery("#countryCode_error").html('');
                }
            });

            //发送验证码
            o.container.find(".btn_confircode").click(function () {
                var mobileNum = jQuery("#mobileNum").val();
                var countryCode = jQuery("#countryCode").val();
                if ('' === countryCode) {
                    alert('Please select your country/region.');
                    return false;
                }
                if ('' === mobileNum || 'Enter mobile phone number…' == mobileNum) {
                    alert('Please enter your phone num.');
                    return false;
                }
                if (!/^[0-9]+$/.test(mobileNum)) {
                    alert('Please enter your right phone num.');
                    return false;
                }


                jQuery.ajax({
                    url: '/profile/mobile',
                    type: 'post',
                    data: 'user_mobile=' + mobileNum + '&countryCode=' + countryCode + '&isModify=' + isModify,
                    dataType: 'json',
                    success: function (_res) {
                        user_secure_email = jQuery("#mobileNum").val();
                        if (0 == _res.status) {
                            jQuery("#code_error").html(langArr["Confirmation code had been sent."]);
                        } else {
                            alert("set fail,please try again later!");
                        }
                    }
                });

            });

            o.container.find(".btn_submit").click(function () {

                jQuery.ajax({
                    url: '/profile/MobileCodeCheck',
                    type: 'POST',
                    data: 'verification_code=' + jQuery("#confirmationCode").val(),
                    dataType: 'json',
                    success: function (_res) {
                        if (0 == _res.status) {
                            document.location.reload();
                        } else {
                            alert("set fail,please try again later!");
                        }
                    }
                });

            });
        }).show();
    },

    showConfimMobileBox: function () {
        appedUrl("picProp.showConfimMobileBox")
        var _self = this;

        var html = '<div class="GTpopBar mailbox">\
                        <div class="planbt">\
                            <p class="lantxt">Mobile Phone Number:</p>\
                            <a href="javascript:" id="mobileCloseBtn" class="p_close">close</a>\
                        </div>\
                    <div class="warn_cont">\
                        <p class="tips_text">By confirming your phone number, you can retrieve your password via text message.</p>\
                        <form action="" class="form-security-mail">\
                            <fieldset id="test_belen">\
                            <legend>Mobile Phone Number:</legend>\
                            <p class="warn_info c_red" id="countryCode_error"></p>\
                            <p class="">\
                                <label for="">Mobile Phone Number:</label>\
                                <p>' + format_secure_phone + '</p>\
                            </p>\
                            <p class="warn_info c_red"><a href="javascript:;" class="btn_confircode">Send Confirmation Code</a></p>\
                            <p class="">\
                                <label for="">Confirmation Code:</label>\
                                <input type="text" name="" value="Enter confirmation code…" id="confirmationCode" class="input_mail">\
                            </p>\
                            <p class="warn_info c_red" id="code_error"></p>\
                            <p class="button_warn"><input type="button" value="Submit" class="btn btn_submit"></p>\
                            </fieldset>\
                    </form>\
                </div>\
            </div>';

        this.picProp.init(html, function (o) {
            o.container.find('#mobileCloseBtn').click(function () {
                o.container.remove();
                background().hide();
                return false;
            });
            o.container.find("#mobileNum").focus(function () {
                if ('Enter mobile phone number…' === jQuery(this).val()) {
                    jQuery(this).val("");
                }
            });
            o.container.find("#mobileNum").blur(function () {
                var pre_input = jQuery(this).val();
                if ('' === jQuery(this).val()) {
                    jQuery(this).val("Enter mobile phone number…");
                } else {
                    jQuery(this).val(pre_input);
                }

            });
            o.container.find("#confirmationCode").focus(function () {
                if ('Enter confirmation code…' === jQuery(this).val()) {
                    jQuery(this).val("");
                }
            });
            o.container.find("#confirmationCode").blur(function () {
                var pre_input = jQuery(this).val();
                if ('' === jQuery(this).val()) {
                    jQuery(this).val("Enter confirmation code…");
                } else {
                    jQuery(this).val(pre_input);
                }
                if ('' == jQuery.trim(jQuery(this).val()) || 'Enter confirmation code…' === jQuery.trim(jQuery(this).val())) {
                    jQuery("#code_error").html('Confirmation Code is incorrect');
                } else {
                    jQuery("#code_error").html('');
                }

            });

            o.container.find("#countryCode").blur(function () {
                var countryCode = jQuery(this).val();
                if ('' === countryCode) {
                    jQuery("#countryCode_error").html(langArr["Please select your country/region."]);
                } else {
                    jQuery("#countryCode_error").html('');
                }
            });

            //发送验证码
            o.container.find(".btn_confircode").click(function () {
                var mobileNum = jQuery("#mobileNum").val();
                var countryCode = jQuery("#countryCode").val();
                if ('' === countryCode) {
                    alert('Please select your country/region.');
                }
                if ('' === mobileNum || 'Enter mobile phone number…' == mobileNum) {
                    alert('Please enter your phone num.');
                }

                jQuery.ajax({
                    url: '/profile/mobile',
                    type: 'post',
                    data: 'full_secure_phone=' + user_secure_phone,
                    dataType: 'json',
                    success: function (_res) {
                        if (0 == _res.status) {
                            jQuery("#code_error").html(langArr["Confirmation code had been sent."]);
                        } else {
                            alert(langArr["set fail,please try again later!"]);
                        }
                    }
                });

            });

            o.container.find(".btn_submit").click(function () {

                jQuery.ajax({
                    url: '/profile/MobileCodeCheck',
                    type: 'POST',
                    data: 'verification_code=' + jQuery("#confirmationCode").val(),
                    dataType: 'json',
                    success: function (_res) {
                        if (0 == _res.status) {
                            document.location.reload();
                        } else {
                            alert(langArr["set fail,please try again later!"]);
                        }
                    }
                });

            });
        }).show();
    },

    showWarningInfo: function (info) {
        appedUrl("picProp.showWarningInfo")
        var third_site = {
            'google': 'https://www.google.com',
            'facebook': 'https://www.facebook.com',
            'twitter': 'https://www.twitter.com',
            'yahoo': 'https://www.yahoo.com',
            'livespace': 'https://login.live.com'
        };
        _check_urls();
        var html = '<div class="popWrap" id="connect_social_media">\
					  <h2 class="popUp_head">\
					    <a href="javascript:;" class="btn_close p_close" title="Close" id="signUpSuccessColseBtn">x</a>\
					  </h2>\
					  <div class="pop-newsBox ">\
					    <p class="error-icon" style="font-size: 1em;line-height: 24px">\
					    ' + langArr["This {plat} account is already bound to a Gta account, please switch {plat} account."].replace(/{plat}/g, info) + '\
					    </p>\
					  </div>\
					  <div style="text-align: center">\
					    <a style="font-size: 1em;background-position: 14px 0;color:#d21034;display: inline-block;" href="' + third_site[info] + '" target="_blank"> ' + langArr["Switch {plat} account"].replace(/{plat}/g, info) + '</a>\
					  </div>\
					</div>';
        this.picProp.init(html, function (o) {
            o.container.find('#signUpSuccessColseBtn').click(function () {
                o.container.remove();
                background().hide();
                return false;
            });
        }).show();

    }
}

$("#header_login_email").val(localStorage.getItem("username"))
$("#game_header_login_email").val(localStorage.getItem("username"))
var signFlag = true
var userAction = {
    init: function () {
        appedUrl("userAction.init")
        if ($.cookie("uuzu_UNICKNAME")) {
            $("#header-login").hide();
            $("#header-out").show();
            var nickname = $.cookie("uuzu_UNICKNAME");
            if (nickname.length > 10) {
                nickname = nickname.substring(0, 12) + '..';
            }
            $("#header-out").find(".header-username").html(nickname);
        } else {
            $("#header-out").hide();
            $("#header-login").show();
        }
    },
    login: function (uid, pwd, remember, from, code) {
        appedUrl("userAction.login")
        _check_urls();

        if (!uid || uid === 'undefined' || !pwd || pwd === 'undefined') return;
        $.ajax({
            url: 'https://user.gtarcade.com/site/loginAjax',
            type: 'POST',
            data: {
                username: uid,
                password: pwd,
                code: code,
                keep_login: remember,
                from: from
            },
            dataType: 'jsonp',
            success: function (rst) {
                if (rst.status == 1) {
                    localStorage.setItem("username",rst.username)
                    if (rst.setcookie.length > 0) {
                        rst.setcookie.forEach(function (cookieVal) {
                            $.cookie(cookieVal.name, cookieVal.value, {
                                expires: cookieVal.expires,
                                path: cookieVal.path,
                                domain: cookieVal.domain
                            });
                        });
                    }
                    window.location.reload();
                    if (remember == 1) $.cookie("login_email", uid, {
                        expires: 30,
                        domain: '.gtarcade.com',
                        path: '/'
                    });
                    var rurl = window.urls.RechargeUrl == 'undefined' ? userAction.getUrlParam('rurl') : window.urls.RechargeUrl;
                    if (rurl) {
                        rurl = decodeURIComponent(rurl);
                        window.location.href = rurl;
                        return;
                    }
                    pop.closeX('loginG');
                    pop.closeX('fbloginID');

                    $.cookie('account', '', {
                        expires: -1,
                        path: '/'
                    });
                    $.cookie('kurl', '', {
                        expires: -1,
                        path: '/'
                    });
                    userAction.init();
                    if (typeof (pop.loginCallBack) != 'undefined' && typeof (pop.loginCallBack) == 'function')
                        pop.loginCallBack();
                } else {
                    if (from == 'header') {
                        $("#login_header_form .show-tooltip").hide();
                        for (var name in rst.errors) {
                            if (rst.errors[name][0].indexOf('Incorrect username or password') != -1) {
                                $("#" + name + "_login_header_error").html('<p>' + langArr["Wrong email and password combination."] + '</p><a title="Forgot Password?" href="' + urls.passport_url + '/password/forgotpassword">' + langArr["Forgot Password?"] + '</a>').show();
                            } else {
                                $("#" + name + "_login_header_error").html(rst.errors[name][0]).show();
                            }
                        }
                    } else if (from == 'headerLogin') { //平台官网新版顶通登陆
                        $(".wrong_tipT").hide();
                        for (var name in rst.errors) {
                            $("." + name + "_warnT").html('<span class="tip_sj">▲</span>' + rst.errors[name][0]).show();
                        }
                        pop.changeVerifyCode(3);
                    } else if (from == 'gameHeader') { //游戏官网新版顶通登陆
                        $(".wrong_tipTB").hide();
                        for (var name in rst.errors) {
                            $("." + name + "_warnTB").html('<span class="tip_sj">▲</span>' + rst.errors[name][0]).show();
                        }
                        pop.changeVerifyCode(4);
                    } else {
                        $(".wrong_tip").hide();
                        for (var name in rst.errors) {
                            $("." + name + "_warn").html('<span class="tip_sj">▲</span>' + rst.errors[name][0]).show();
                        }
                        pop.changeVerifyCode(1);
                    }
                }
            }
        });
    },
    showLogout: function () {
        appedUrl("userAction.showLogout")
        userAction.init();
        if (typeof (pop.loginCallBack) != 'undefined' && typeof (pop.loginCallBack) == 'function') pop.loginCallBack();
    },
    getUrlParam: function (name) {
        appedUrl("userAction.getUrlParam")
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);
        if (r != null) return unescape(r[2]);
        return null;
    },
    /*modified by liuxy on 20180621*/
    logout: function () {
        appedUrl("userAction.logout")
        $.ajax({
            url:window.urls.passport_url + '/site/logout',
            type:"GET",
            dataType: 'jsonp',//here
            jsonp:'callback',
            success: function (data) {
                //登录登出状态切换
                userAction.init();
                $('#header-login').find('#login_email_header').val('');
                $('#header-login').find('#login_password_header').val('');
                if (typeof (pop.logoutCallBack) != 'undefined' && typeof (pop.logoutCallBack) == 'function') pop.logoutCallBack();
                window.location.reload();
            }
        });

    },
    signUp: function (uid, pwd, pwd_re, birthYear, birthMonth, birthDay, subscription, from, code) {
        appedUrl("userAction.signUp")
        if (!$.trim(uid) || !$.trim(pwd) || !$.trim(pwd_re)) return;
        // var getUrl = urls.passport_url + '/site/reg';
        $('#signBtn').addClass("disabled");
        if(signFlag == false){
            return
        }
        signFlag = false
        $.ajax({
            url: 'https://user.gtarcade.com/site/reg',
            type: 'POST',
            data: {
                email: uid,
                password: pwd,
                password_re: pwd_re,
                birthYear: birthYear,
                birthMonth: birthMonth,
                birthDay: birthDay,
                subscription: subscription,
                from: from,
                code: code,
                // url: getUrl
            },
            dataType: 'jsonp',
            success: function (rst) {
                $('#signBtn').removeClass("disabled");
                signFlag = true;
                if (rst.status == 1) {
                    localStorage.setItem("username",uid);
                    pop.closeX('SignUpG');

                    window.location.reload();
                    userAction.init();
                    pop.showSignUpSuccess();
                    return false;
                    var rurl = userAction.getUrlParam('rurl');
                    if (rurl) {
                        rurl = decodeURIComponent(rurl);
                        window.location.href = rurl;
                        return;
                    }
                    pop.closeX('signUpArea');
                    pop.closeX('fbloginID');

                    userAction.init();
                    if (typeof (pop.loginCallBack) != 'undefined' && typeof (pop.loginCallBack) == 'function')
                        pop.loginCallBack();
                    pop.showSignUpSuccess();

                } else {
                    for (var key in rst.msg) {
                        var tmpID = key + '_error';
                        $("#" + tmpID).html('<span class="tip_sj">▲</span>' + rst.msg[key][0]).show();
                    }
                    pop.changeVerifyCode(2);
                }
            }
        });
    }
};

function submitKey(bind, submitKey) {
    appedUrl("only.submitKey")
    $(function () {
        $(bind).live('click', function () {
            $(submitKey).submit();
        });
    });
}

//游戏官网顶通登陆注册
function game_login_header() {
    appedUrl("only.game_login_header")
    var email = $("#game_header_login_email").val();
    var password = $("#game_header_login_password").val();
    var code = $("#game_header_login_code").val();

    if (email === 'undefined' || $.trim(email) == '') {
        $("#game_header_login_email_error").html('\<span class="tip_sj"\>▲\<\/span\>' + langArr["Please enter a valid email address!"]).show();
        return;
    } else {
        $("#game_header_login_email_error").hide();
    }
    if (password === 'undefined' || $.trim(password) == '') {
        $("#game_header_login_password_error").html('\<span class="tip_sj"\>▲\<\/span\>' + langArr["Password must be at least 6 characters!"]).show();
        return;
    } else {
        $("#game_header_login_password_error").hide();
    }
    userAction.login(email, password, 0, 'gameHeader', code);
}

function login_header() {
    appedUrl("only.login_header")
    var email = $("#login_email_header").val();
    var password = $("#login_password_header").val();

    if (email === 'undefined' || $.trim(email) == '') {
        $("#email_login_header_error").html('+langArr["Please enter a valid email address!"]+').show();
        return;
    } else {
        $("#email_login_header_error").hide();
    }
    if (password === 'undefined' || $.trim(password) == '') {
        $("#password_login_header_error").html('+langArr["Password must be at least 6 characters!"]+').show();
        return;
    } else {
        $("#password_login_header_error").hide();
    }
    userAction.login(email, password, 0, 'header');
}

function login_show($_this) {
    appedUrl("only.login_show")
    var $email = $("#loginArea input[name='email']").val();
    if ($email === 'undefined' || $.trim($email) == '') {
        $email = $("#fbloginID input[name='email']").val();
    }
    var $password = $("#loginArea input[name='password']").val();
    if ($password === 'undefined' || $.trim($password) == '') {
        $password = $("#fbloginID input[name='password']").val();
    }
    var code = $("#login_code").val();
    var $rememberMe = 0;
    var $from = '';
    if ($_this.attr("id") == 'loginBtnBind' || $_this.attr('id') == 'loginBtnRegBind') {
        $from = 'third';
    } else {
        var $rememberMe = $("#rememberMe").is(":checked") ? 1 : 0;
    }
    if ($email === 'undefined' || $.trim($email) == '') {
        $("#error_email").show();
        return;
    } else {
        $("#error_email").hide();
    }
    if ($password === 'undefined' || $.trim($password) == '') {
        $("#error_pwd").show();
        return;
        $("#error_pwd").hide();
    }
    if (error_info = check_email($email)) {
        $("#loginArea").find("#error_email").html(error_info).show();
        return false;
    }
    userAction.login($email,$password,$rememberMe,$from,code);
}

function header_login_show() {
    appedUrl("only.header_login_show")
    var email = $("input[name='header_login_email']").val();
    var password = $("input[name='header_login_password']").val();
    var code = $("#header_login_code").val();
    var rememberMe = 0;
    var from = 'headerLogin';
    var rememberMe = $("#headerRememberMe").is(":checked") ? 1 : 0;
    if (email === 'undefined' || $.trim(email) == '') {
        $("#header_login_email_error").show();
        return;
    } else {
        $("#header_login_email_error").hide();
    }
    if (password === 'undefined' || $.trim(password) == '') {
        $("#header_login_password_error").show();
        return;
    } else {
        $("#header_login_password_error").hide();
    }
    userAction.login(email, password, rememberMe, from, code);
}

function show_header_verify_code() {
    appedUrl("only.show_header_verify_code")
    var username = $('#header_login_email').val();
    if (username == '') {
        $('.show_header_verify_code').hide();
        return false;
    }
    $.ajax({
        type: "GET",
        url: urls.passport_url + "/site/ShowLoginVerifyCode",
        data: 'username=' + username,
        dataType: 'jsonp',
        async: true,
        cache: false,
        jsonp: "callback",
        success: function (data) {
            if (data.status == 1) {
                $('.show_header_verify_code').show();
            } else {
                $('.show_header_verify_code').hide();
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            //响应超时;
        }
    });
    return;
}

/**
 * [show_game_header_verify_code 游戏官网顶通新版登陆验证码]
 */
function show_game_header_verify_code() {
    appedUrl("only.show_game_header_verify_code")
    var username = $('#game_header_login_email').val();
    if (username == '') {
        $('.show_game_header_verify_code').hide();
        return false;
    }
    $.ajax({
        type: "GET",
        url: urls.passport_url + "/site/ShowLoginVerifyCode",
        data: 'username=' + username,
        dataType: 'jsonp',
        async: true,
        cache: false,
        jsonp: "callback",
        success: function (data) {
            if (data.status == 1) {
                $('.show_game_header_verify_code').show();
            } else {
                $('.show_game_header_verify_code').hide();
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            //响应超时
        }
    });
    return;
}

function show_verify_code() {
    appedUrl("only.show_verify_code")

    var username = $('.login_email').val();


    if (typeof (username) == "undefined") {
        username = $('#email').val();
    }
    if (username == '') {
        $('.show_login_verify_code').hide();
        return false;
    }
    $.ajax({
        type: "GET",
        url: urls.passport_url + "/site/ShowLoginVerifyCode",
        data: 'username=' + username,
        dataType: 'jsonp',
        async: true,
        cache: false,
        jsonp: "callback",
        success: function (data) {
            if (data.status == 1) {
                $('.show_login_verify_code').show();
            } else {
                $('.show_login_verify_code').hide();
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            //响应超时;
        }
    });
    return;
}

function show_reg_verify_code() {
    appedUrl("only.show_reg_verify_code")
    $.ajax({
        type: "GET",
        url: urls.passport_url + "/site/ShowVerifyCode",
        dataType: 'jsonp',
        async: true,
        cache: false,
        jsonp: "callback",
        success: function (data) {
            if (data.status == 1) {
                $('.show_reg_verify_code').show();
            } else {
                $('.show_reg_verify_code').hide();
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            //响应超时
        }
    });
    return;
}

function window_resize() {
    appedUrl("only.window_resize")
    if ($(window).width() > 1260) {
        $("#login_header_form").show();
        $("#login_button_header").unbind('click');
        $("#login_button_header").click(login_header);
        $("#login_email_header").click(function () {
            $("#email_login_header_error").hide();
        });
        $("#login_password_header").click(function () {
            $("#password_login_header_error").hide();
        });
    } else {
        $("#login_header_form").hide();
        $("#login_button_header").unbind('click');
        $("#login_button_header").click(function () {
            pop.showLogin();
        });
    }
}

function check_password_strength(pw, uname) {
    appedUrl("only.check_password_strength")
    pw += '';
    uname += '';
    var warn_info = false;
    var reg_pattern = new RegExp("qwerty|123456|password|admin|" + uname, 'ig');
    if (pw.match(reg_pattern) !== null) {
        warn_info = 'Pick a stronger password except your email address, simple number'
    }
    return warn_info;
}

function check_email(uname) {
    appedUrl("only.check_email")
    preg_flag = uname.match(/^[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/)
    if (!preg_flag) {
        return langArr['Please enter a valid email address!'];
    }
    return false;
}

function appedUrl(name) {
}

$(function () {
    //登入注册切换start
    $("#btnGoSign").live('click', function () {
        appedUrl("only.#btnGoSign")
        $(".box_SignUpG").stop().removeClass("pageRotate").css({
            "display": "block",
            "opacity": 1
        });
        $(".box_loginG").addClass("pageRotate").fadeOut(1000, function () {
            $(this).removeClass("pageRotate")
        });
        $(".pop_sign").attr("id", "SignUpG");
    });
    $("#btnGoLogin").live('click', function () {
        appedUrl("only.#btnGoLogin")
        $(".box_loginG").stop().removeClass("pageRotate").css({
            "display": "block",
            "opacity": 1
        });
        $(".box_SignUpG").addClass("pageRotate").fadeOut(1000, function () {
            $(this).removeClass("pageRotate")
        });
        $(".pop_sign").attr("id", "loginG");
    });
    //登入注册切换end

    /************************新版平台顶通登陆start**************************/

    $("#headerLogBtn").bind("click", function () {
        appedUrl("only.#headerLogBtn")
        show_header_verify_code();
        header_login_show();
    });


    /************************新版平台顶通登陆end***************************/


    $('#email').live("blur", function () {
        appedUrl("only.#email")
        show_verify_code();
        pop.changeVerifyCode(1);
    });

    $('#header_login_email').live("blur", function () {
        appedUrl("only.#header_login_email")
        show_header_verify_code();
        pop.changeVerifyCode(3);
    });

    $('#game_header_login_email').live("blur", function () {
        appedUrl("only.#game_header_login_email")
        show_game_header_verify_code();
        pop.changeVerifyCode(4);
    });

    $('#reg_email').live("blur", function () {
        appedUrl("only.#reg_email")
        show_reg_verify_code();
        pop.changeVerifyCode(2);
    });


    //----------------keyDownInit();
    $("#login_button_header,#login_password_header").live("keydown", function (e) {
        appedUrl("only.#login_password_header&#login_button_header")
        var e = window.event ? window.event : e;
        if (e.keyCode == 13) {
            login_header();
        }
    });

    $("#loginBtn,#loginBtnBind").live("click", function () {
        appedUrl("only.#loginBtnBind&#loginBtn")
        show_verify_code();
        login_show($(this));
    });

    $("#reg_password").live("keydown", function (e) {
        appedUrl("only.#reg_password")
        var e = window.event ? window.event : e;
        if (e.keyCode == 13) {
            login_show($(this));
        }
    });

    $("#reg_password_re").live("keydown", function (e) {
        appedUrl("only.#reg_password_re")
        var e = window.event ? window.event : e;
        if (e.keyCode == 13) {
            $("#signBtn").trigger("click");
        }
    });

    //-------------------------------
    $(window).resize(window_resize);
    window_resize();
    userAction.init();
    $("#email_login_header_error").click(function () {
        appedUrl("only.#email_login_header_error")
        $(this).hide();
    });

    $("#password_login_header_error").click(function () {
        appedUrl("only.#password_login_header_error")
        $(this).hide();
    });

    $("#header_login_email_error").live('click', function () {
        appedUrl("only.#header_login_email_error")
        $(this).hide();
    });
    $("#signUp").click(function () {
        appedUrl("only.#signUp")
        pop.showSignUp();
    });
    $("#gameSignUp").click(function () {
        appedUrl("only.#gameSignUp")
        pop.showSignUp();
    });

    $("#switchLogin").live('click', function () {
        appedUrl("only.#switchLogin")
        pop.showLogin();
    });

    $('#goReg').live('click', function () {
        appedUrl("only.#goReg")
        pop.closeX('signUpArea');
        pop.goReg();
    });

    $("#my_account_pay").live('click', function () {
        appedUrl("only.#my_account_pay")
        pop.closeX('signUpArea');
        pop.goRecharge();
    });

    $("#my_account").live('click', function () {
        appedUrl("only.#my_account")
        pop.closeX('signUpArea');
        pop.goAccount();
    });

    $("#switchSignUp").live('click', function () {
        appedUrl("only.#switchSignUp")
        pop.closeX('loginG');
        pop.showSignUp();
    });


    $("#captchaCodeImg,#refreshCode").live('click', function () {
        appedUrl("only.#refreshCode&#captchaCodeImg")
        _check_urls();
        $.ajax({
            url: '/site/proxy/?url=' + urls.passport_url + '/site/captcha/refresh/1?v' + Math.random(),
            dataType: 'json',
            cache: false,
            success: function (data) {
                $('#captchaCodeImg').attr('src', urls.passport_url + data.url);
                $('body').data('site/captcha.hash', data.hash1, data.hash2);
            }
        });
    });
    /*平台顶通退出登录触发事件 modified by liuxy on 20180622*/
    $("#logoutBtn, .logoutBtn").live('click', function () {
        appedUrl("only.#logoutBtn,space.logoutBtn")
        userAction.logout();
    });
    $("#signBtn,#fbloginBtn").live('click', function () {
        appedUrl("only.#signBtn&#fbloginBtn")
        show_reg_verify_code();
        var uObj, pObj, pReObj, cObj, btnId, currentId;
        btnId = $(this).attr("id");
        if (btnId == 'signBtn') {
            currentId = "signUpArea";
        } else if (btnId == 'fbloginBtn') {
            currentId = 'fbloginID';
        }
        uObj = $("#" + currentId).find("#reg_email");
        pObj = $("#" + currentId).find("#reg_password");
        pReObj = $("#" + currentId).find("#reg_password_re");
        cObj = $("#" + currentId).find("#reg_code");
        var u = $.trim(uObj.val());
        var p = $.trim(pObj.val());
        var pr = $.trim(pReObj.val());
        var c = $.trim(cObj.val());
        var year = $("#regBox select[name=year]").val();
        var month = $("#regBox select[name=month]").val();
        var day = $("#regBox select[name=day]").val();
        var maxDay = new Date(year, month, 0).getDate();
        var subscription = $("#signup_checked").is(":checked") ? 1 : 0;
        var status = true;
        $(".wrong_tip").hide();
        error_info = check_password_strength(p, u);
        // $("#"+currentId).find("#password_error").html('hi');
        // $("#"+currentId).find("#password_error").show();
        // status = false;
        if (!u || !u.match(/^[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/)) {
            $("#" + currentId).find("#email_error").show();
            status = false;
        }
        if (!p || p.length < 6 || error_info) {
            error_info && $("#"+currentId).find("#password_error").html(error_info);
            $("#" + currentId).find("#password_error").show();
            status = false;
        }
        if (!pr || p.pr < 6) {
            $("#" + currentId).find("#password_re_error").show();
            status = false;
        }
        if (p != pr) {
            $("#" + currentId).find("#password_re_error").html('<span class="tip_sj">▲</span>' + langArr["Passwords don't match"] + '').show();
            status = false;
        }
        if (status) {
            var from = $("#signUpFrom").val();
            if (typeof (year) == 'undefined') year = '0000';
            if (typeof (month) == 'undefined') month = '00';
            if (typeof (day) == 'undefined') day = '00';
            userAction.signUp(u, p, pr, year, month, day, subscription, from, c);
        } else {
            pop.changeVerifyCode(2);
        }
    });

    $("input[name=header_login_password]").live('focus', function () {
        $("#header_login_password_error").html('');
    });

    $("input[name=header_login_code]").live("focus", function () {
        $("#header_login_code_error").html('');
    });

    $("input[name=game_header_login_password]").live('focus', function () {
        $("#game_header_login_password_error").html('').hide();
    });

    $("input[name=game_header_login_code]").live("focus", function () {
        $("#game_header_login_code_error").html('').hide();
    });

    //检测邮箱
    $("#regBox input[name=email]").live("focus",
        function () {
            $("#regBox").find("#email_error").html('');
        }
    ).live("blur",
        function () {
            appedUrl("only.#regBox input[name=email]")
            _check_urls();
            var boxId, uObj, pObj, pReObj, cObj;
            boxId = 'regBox';
            uObj = $("#" + boxId).find("#email");
            pObj = $("#" + boxId).find("#password");
            pReObj = $("#" + boxId).find("#password_re");
            cObj = $("#" + boxId).find("#code");
            var u = $.trim(uObj.val());
            var p = $.trim(pObj.val());
            var pr = $.trim(pReObj.val());
            var c = $.trim(cObj.val());
            var year = $("#regBox select[name=year]").val();
            var month = $("#regBox select[name=month]").val();
            var day = $("#regBox select[name=day]").val();
            var maxDay = new Date(year, month, 0).getDate();
            if (typeof (year) == 'undefined') year = '0000';
            if (typeof (month) == 'undefined') month = '00';
            if (typeof (day) == 'undefined') day = '00';
            var subscription = $("#regBox select[name=subscription]").is(":checked") ? 1 : 0;
            if (!u || !u.match(/^[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/)) {
                $("#" + boxId).find("#email_error").html('Please enter a valid email address');
                return;
            }
            // var getUrl = urls.passport_url + '/site/reg';
            $.ajax({
                url: 'https://user.gtarcade.com/site/reg?email=' + encodeURIComponent(u) + '&password=' + encodeURIComponent(p) + '&password_re=' + encodeURIComponent(pr) + '&birthYear=' + year + '&birthMonth=' + month + '&birthDay=' + day + '&subscription=' + subscription + '&code=' + c,
                type: 'POST',
                data: 'ajax=user-reg',
                dataType: 'jsonp',
                success: function (rst) {
                    for (var name in rst) {
                        if (name == 'RegForm_email') {
                            $("#" + boxId).find("#email_error").html(rst[name][0]);
                        }
                    }
                }
            });
        }
    );

    $("#regBox input[name=password]").live("focus",
        function () {
            $("#password_error").html('');
        }
    ).live("blur",
        function () {
            var p = $.trim($("#regBox").find("#password").val());
            if (!p || p.length < 6) {
                $("#regBox").find("#password_error").html(langArr["Password must be at least 6 characters!"]);
            }
        }
    );

    $("#regBox input[name=password_re]").live("focus",
        function () {
            $("#regBox").find("#password_re_error").html('');
        }
    ).live("blur",
        function () {
            var p = $.trim($("#regBox").find("#password").val());
            var pr = $.trim($("#regBox").find("#password_re").val());
            if (!pr || p.pr < 6) {
                $("#regBox").find("#password_re_error").html(langArr["Password must be at least 6 characters!"]);
                status = false;
            }
            if (p != pr) {
                $("#regBox").find("#password_re_error").html('<span class="tip_sj">▲</span>' + langArr["Passwords don't match"]);
                status = false;
            }
        }
    );

    $("#regBox input[name=year]").live("blur",
        function () {
            var year = $("#regBox select[name=year]").val();
            var month = $("#regBox select[name=month]").val();
            var day = $("#regBox select[name=day]").val();
            var maxDay = new Date(year, month, 0).getDate();
            if (year == 0) {
                $("#birthday_error").html(langArr["You must select a year"]);
            } else if (month == 0) {
                $("#birthday_error").html(langArr["You must select a month"]);
            } else if (day == 0) {
                $("#birthday_error").html(langArr["You must select a day"]);
            } else if (day > maxDay) {
                $("#birthday_error").html(langArr["This month does not have that many days"]);
            } else {
                $("#birthday_error").html('');
            }
        }
    );

    $("#loginArea input[name=email]").live('blur',
        function () {
            _check_urls();

            var account = $(this).val();
            if (account.length > 0) {
                $.get("/site/proxy", {
                    url: urls.passport_url + "/site/isThirdMember",
                    account: account
                }, function (data) {
                    if (data.ret != null) {
                        $("#loginArea").find(".email_warn").html(langArr["This email is already associated with a Facebook or Google account"]).show();
                    }
                }, 'json');
            }
        }
    );


    $(".third_connect").click(
        function () {
            var from = $(this).attr("from");
            pop.connect(from);
        }
    );

    $("#lang_change li a").click(function () {
        var lang = '';
        var lang = $(this).attr("lang");
        if (typeof (lang) == undefined) {
            var lang = 'en-us';
        }

        // var language = new Array();
        // language = lang.split("-");

        // var language_url = '';

        // if( language[1] == 'cn' ){
        // 	language_url  = 'cn/'
        // }else{
        // 	if( language[0] == 'en' ){
        // 		language_url  = '';
        // 	}else{
        // 		language_url  = language[0]+'/';
        // 	}
        // }

        $.ajax({
            url: '//www.' + urls.domain + '/site/GtaLang?lang=' + lang,
            type: "GET",
            dataType: 'jsonp',
            jsonp: 'callback',
            success: function (data) {
                if (/\d/gi.test(window.location.pathname) || /\d/gi.test(window.location.search)) {
                    setTimeout(function () {
                        window.location.href = '/';
                    }, 1000);
                } else {
                    setTimeout(function () {
                        self.location.reload();
                    }, 1000);
                }
            }
        });


    });
});
// $("input").live('focus',function(){$(this).removeClass("nor").addClass("cur");});
// $("input").live('blur',function(){$(this).removeClass("cur").addClass("nor")});

/* html嵌套逻辑迁移 */
$(function () {
    /* 更新768px */
    /* 切换侧边栏显示 */
    $('.top-menu-close').click(function () {
        $('.topBar_nav').toggleClass('left');
    })
    $('.top-menu-btn').click(function () {
        $('.topBar_nav').toggleClass('left');
    })


    /* 右侧个人中心 */
    $('.top-user-center-btn').click(function () {
        var _url = window.location.href;
        if ($.cookie("uuzu_UAUTH")) {
            /* 后端控制跳转个人中心页面？ */
            window.location = "https://user.gtarcade.com/mobile/profileCenter";
        } else {
            window.location = "https://user.gtarcade.com/mobile/login?rurl="+_url;
        }
    })


    /* 	点击输入框隐藏提示 */
    validatorHide('#loginG input,.popUp_sign input[type=text],.popUp_sign input[type=password]');

    /* 点击输入框隐藏提示 */
    function validatorHide(target) {
        var target = $(target) || '';
        if (!target) return;
        target.live('blur', function () {
            $(this).next().hide();
        })
    }

});


$(function () {

    /*  先将页面内的input执行一遍 */
    showPlaceholder();

    /*
      *   再监听body中是否插入了popUp_sign
      *   DOMNodeInserted :　在使用appendChild()、replaceChild()或insertBefore()向DOM中插入节点时，首先触发DOMNodeInserted事件
      *                      这个事件的目标是被插入的节点，而event.relatedNode属性中包含一个对父节点的引用
      *   兼容性：IE9+
      */
    var titleEl = document.body;
    titleEl.addEventListener("DOMNodeInserted", function (e) {
        if(!placeholderSupport()){
            var targetClass = e.target.className || '';
            console.log(targetClass)
            if (targetClass === '' || targetClass === 'undefined') return;
            if (targetClass.indexOf('popUp_sign') > -1) {
                showPlaceholder();
            }
        }
    });

    // 兼容IE9下的placeholder
    function placeholderSupport() {
        return 'placeholder' in document.createElement('input');
    }

    function showPlaceholder() {

        // 判断浏览器是否支持 placeholder
        if (!placeholderSupport()) {
            $("[placeholder]").each(function () {
                var _this = $(this);
                var left = _this.css("padding-left"),
                    lineHeight = _this.css("line-height"),
                    fontSize = _this.css("font-size");

                _this.parent().append('<span class="placeholder" data-type="placeholder" style="position:absolute;color: #cfcfcf;left: ' +
                    left + ';font-size:' + fontSize + ';line-height:' + lineHeight + '">' + _this.attr("placeholder") + '</span>');

                if (_this.val() != "") {
                    _this.parent().find("span.placeholder").hide();
                } else {
                    _this.parent().find("span.placeholder").show();
                }
            }).on("focus", function () {
                $(this).parent().find("span.placeholder").hide();
            }).on("blur", function () {
                var _this = $(this);
                if (_this.val() != "") {
                    _this.parent().find("span.placeholder").hide();
                } else {
                    _this.parent().find("span.placeholder").show();
                }
            });

            /* 点击placeholder 标签时相当于触发input */
            $("span.placeholder").on("click", function () {
                var _this = $(this);
                _this.hide();
                _this.siblings("[placeholder]").trigger("click");
                _this.siblings("[placeholder]").trigger("focus");
            });
        }
    }
})
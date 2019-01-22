<?php
/**
 * 2017-2018 RoboticGames
 * NOTICE OF LICENSE
 * This source file is subject to the Open Software License (OSL 3.0)
 * https://opensource.org/licenses/OSL-3.0
 *
 * DISCLAIMER
 * Do not edit or add to this file if you wish to upgrade RoboticGames to newer
 * versions in the future. If you wish to customize RoboticGames for your
 * needs please refer to http://roboticgames.web.ve for more information.
 *
 * @author    RoboticGames FP <roboticgames.ve@gmail.com>
 * @copyright 2017-2018 RoboticGames FP
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * @Credits   Isumeru & MaryJo & Dao Van Trong - Trong.CF                      ¦
*/

//links
define('link_home','Home');
define('link_announcements','Announcements');
define('link_new_account','Dăng Ký Tài Khoản Mới');
define('link_log_out','Đăng Xuất');
define('link_lost_password','Quên Tài Khoản hoặc Mật Khẩu ?');
define('link_sign_up','Đăng Ký');
define('link_read_more','Read More');
define('link_permanent_banned_characters','View Permanently Banned Characters');
define('link_banned_characters','View Banned Characters');
define('link_check_available','Check if is Available');
define('link_check_status','Check Status');
define('link_location','Location');
define('link_account_settings','Thay Đổi Mật Khẩu');

//buttons
define('button_log_in','Đăng Nhập');
define('button_proceed_checkout','Proceed Checkout');
define('button_post_message','Gửi Tin');
define('button_reset_character','Reset Nhân Vật');
define('button_add_points','Cộng Điểm');
define('button_clear_pk','Rửa Tội');
define('button_unstuck_character','Gỡ nhân vật bị kẹt');
define('button_clear_inventory','Xóa Hòm Đồ');
define('button_clear_skills','Xóa Skills');
define('button_purchase_credits','Purchase Credits');
define('button_grand_reset_character','Chuyển Sinh Nhân Vật');

/*--------------------------------------*\
| This are the links from menu   |
| and user cp.       |
|          |
| $menu_links_title - Pages titles  |
| from admincp (dont translate them)  |
|          |
| $menu_links_translated - Pages titles |
| translated (translate this)   |
\*--------------------------------------*/

//dont translate here
$menu_links_title  = array('News','Announcements','Downloads','Donate for Credits','Banned Characters','Chat','Rankings','Register','Terms of Service','Contact Us','Forum','Reset Character','Add Points','Clear PK Status','Unstuck Character','Clear Inventory','Clear Skills','MU Coins','Grand Reset Character','Account Settings','User CP',);

//translate here
$menu_links_translated = array('Trang Chủ','Thống Báo','Tải Về','Donate for Credits','Nhân Vật bị Banned','Chat','Xếp Hạng','Đăng Ký','Nội Quy','Liên Hệ','Diễn Đàn','Reset Nhân Vật','Cộng Points','Rửa Tội','Gỡ Nhân Vật bị Kẹt Maps','Xóa Hòm Đồ','Xóa Skills','MU Coins','Chuyển Sinh Nhân Vật','Đổi Mật Khẩu','User CP',);



/*-----------------------------------------*\
| This are the modues from pages   |
| and user cp.        |
|           |
| $modules_text_tile - Modules titles  |
| from admincp (dont translate them)  |
|           |
| $modules_text_translate - Modules titles |
| translated (translate this)    |
\*-----------------------------------------*/
//dont translate here
$modules_text_tile  = array('News','Downloads','Chat','Announcements','Rankings','Register','Terms of Service','Log In','Lost Password','User CP','Log Out','Contact Us','Banned Characters','Donate with PayPal','Latest RSS','Reset Character','Add Points','Clear PK Status','Unstuck Character','Clear Inventory','Clear Skills','MU Coins','Grand Reset Character','Account Settings',);

//translate here
$modules_text_translate = array('Trang Chủ','Tải Về','Chat','Thông Báo','Xếp Hạng','Đăng Ký','Nội Quy','Đăng Nhập','Quên Mật Khảu','User CP','Thoát','Liên Hệ','Nhân Vật bị Banned','Donate with PayPal','Latest RSS','Reset Nhân Vật','Cộng Points','Rửa Tội','Gỡ Nhân Vật bị Kẹt Maps','Xóa Hòm Đồ','Xóa Skills','MU Coins','Chuyển Sinh Nhân Vật','Đổi Mật Khẩu',);



//texts
//Vote For Credits
define('text_module_vote_credits_t1','Unable to vote, reason: An IP can only vote once every {delay_hours} hours.');
define('text_module_vote_credits_t2','Unable to vote, lý do: Lỗi hệ thống, xin hãy liên hệ Admin.');
define('text_module_vote_credits_t3','Unable to vote, reason: {delay_hours} hours have not passed.');
define('text_module_vote_credits_t4','Credits Issued');
define('text_module_vote_credits_t5','Vote Now!');
define('text_module_vote_credits_t6','There are no vote links at the moment.');
define('text_not_loggd_in','Bạn chưa đăng nhập');
define('text_log_in','Log in');
define('text_start_play_now','Bắt đầu chơi ngay ');
define('text_member_area','Member Area');
define('text_menu','Menu');
define('text_announcement','Announcement');
define('text_posted_on','Posted on');
define('text_untill','untill');
define('text_notice','Notice');
define('text_ban_expire','Banned accounts are <b>not listed</b>. After the specified ban period account will be unbaned automatically.');
define('text_banned_on','Banned on');
define('text_expire_date','Expire date');
define('text_rason','Rason');
define('text_sorry_no_ban','Sorry, no banned characters found.');
define('text_user_id','Tên Tài Khoản');
define('text_password','Mật Khẩu');
define('text_cnf_password','Nhập lại mật khẩu');
define('text_personal_id','Mã Cá Nhân');
define('text_email_address','Địa chỉ Email');
define('text_country','Quốc gia:');
define('text_gender','Giới tính');
define('text_male','Nam');
define('text_female','Nữ');
define('text_select','Chọn');
define('text_wrong_login_ban','<b>Wrong Account Informations.</b><br><br> The limit for failed log in has been reached. <b>Waiting time for 15 minutes is now implimented.</b> <br>Always remember that password or username is case sensitive.');
define('text_wrong_login','<b>User ID or Password you entered is incorrect.</b> <br><br>Log In System is case sensitive and further log in attempts failure will result to inability to log in to the website for <b>15 minutes</b>.<br /><br /><b>You have used {attempts_count} out of 5 login attempts.</b> In case you used the allowable 5 login attempts and still unable to provide correct information, Log In Protection will disable the log in for 15 Minutes.');
define('text_sorry_no_donations','Sorry, there are no donation options at this moment.');
define('text_sorry_feature_disabled','Sorry, this feature is temporarily unavailable at the moment.');
define('text_issued_credits','Credits Issued');
define('text_your_donate_info','Your Donate Info');
define('text_donate_amount','Donate Amount');
define('text_checkout_error','Unable to checkout donate, lý do: Lỗi hệ thống, xin hãy liên hệ Admin.');
define('text_chat_error1','Unable to post message, reason: some fields where left blank.');
define('text_chat_error2','Unable to post message, reason: name must contains at last 4 characters.');
define('text_chat_error3','Unable to post message, reason: this name is reserved.');
define('text_chat_name','Tên');
define('text_chat_req1','4-10 characters.');
define('text_chat_message','Tin nhắn');
define('text_chat_req2','300 characters.');
define('text_register_error1','You have entered an invalid User ID (4-10 ký tự, chỉ số và chữ)');
define('text_register_error2','You have entered an invalid Password (6-12 ký tự, chỉ số và chữ)');
define('text_register_error3','Mật khẩu không khớp.');
define('text_register_error4','You have entered an invalid Personal ID number ({pers_id_length} chữ số)');
define('text_register_error5','You have entered an invalid Email Address (ex. somebody@gmail.com)');
define('text_register_error6','Mã quốc gia không hợp lệ.');
define('text_register_error7','Giới tính không hợp lệ.');
define('text_register_error8','Câu hỏi bí mật không hợp lệ.');
define('text_register_error9','Bạn đã nhập câu trả lời bí mật không hợp lệ.(4-20 ký tự, chỉ số và chữ)');
define('text_register_error10','Bạn cso phải robot không? Vui lòng nhập mã kiểm chứng!');
define('text_register_error11','Tên tài khoản đã có người sử dụng.');
define('text_register_error12','Email đã có người sử dụng.');
define('text_register_success1','Chào bạn, {userid}. Chúc mừng bạn đã đăng ký thành công!');
define('text_register_success2','Chào bạn, {userid}. Chúc mừng bạn đã đăng ký thành công!<br> Email lích hoạt đã được gửi tới '.$email.' với thông kích hoạt tài khoản bạn.<br><br>Bạn sẽ nhận được 1 lá thư trong hộp thư đến hoặc trong Spam (bulk). Bạn cần nhấn vào đường link kích hoạt trong đó để bắt dầu sử dụng tài khoản để chơi game');
define('text_register_error13','Không thể hoàn thành yêu cầu của bạn, lý do: Lỗi hệ thống, xin hãy liên hệ Admin.');
define('text_register_error14','Không thể hoàn thành yêu cầu của bạn, lý do: Không thể kết nối tới SMTP Server, xin hãy liên hệ Admin.');
define('text_register_error15','Không thể đăng ký, lý do: Lỗi hệ thống, xin hãy liên hệ Admin.');
define('text_register_error16','Không thể kích hoạt tài khoản, lý do: Lỗi hệ thống, xin hãy liên hệ Admin.');
define('text_register_error17','Tài khoản của bạn đã được kích hoạt');
define('text_register_success3','Chào mừng, {userid}. Bạn đã đăng ký thành công!');
define('text_register_error18','Không thể kích hoạt tài khoản, lý do: Lỗi hệ thống, xin hãy liên hệ Admin.');
define('text_register_complete_form','Complete Form');
define('text_register_activate_account','Kích hoạt tài khoản');
define('text_register_t1','Cung cấp thông tin đăng nhập của bạn');
define('text_register_req1','4-10 ký tự, chỉ số và chữ');
define('text_register_req2','6-12 ký tự, chỉ số và chữ');
define('text_register_req3','phiên biệt chữ HOA và thường');
define('text_register_t2','Nhập ID cá nhân(dùng trong game)');
define('text_register_req4','12 chữ số');
define('text_register_t3','Vui lòng nhập email đúng định dạng');
define('text_register_req5','Vd: somebody@gmail.com');
define('text_register_t4','Thông tin thêm');
define('text_register_t5','Để giúp bạn xác định hỗ trợ vấn đề và tài khoản, xin vui lòng chọn một câu hỏi từ danh sách dưới đây và cung cấp câu trả lời. Sử dụng để lấy lại mật khẩu của bạn.');
define('text_register_secret_question','Câu hỏi bí mật');
define('text_register_answer_question','Câu trả lời bí mật');
define('text_register_req6','4-20 ký tự, chỉ số và chữ');
define('text_register_t6','Ảnh xác thực');
define('text_register_type_code','Nhập mã xác thực ở đây');
define('text_register_read_terms1','Tôi đã đọc Điều khoản dịch vụ và tôi Đồng Ý với ');
define('text_register_read_terms2','Nội Quy');
define('text_rankings_update_date','Lịch Cập nhật theo tiếp theo cho xếp hạng là {date}');
define('text_contact_us_invalid_name','Bạn đã nhập Tên sai định dạng.');
define('text_contact_us_invalid_email','Bạn đã nhập Email sai định dạng. Địa chỉ Email (Ví dụ: somebody@gmail.com).');
define('text_contact_us_invalid_subject','Bạn đã nhập Chủ đề sai định dạng.');
define('text_contact_us_err1','Bạn là robot à? Hãy nhập chính xác Mã Xác Thực!');
define('text_contact_us_msg1','Tin nhắn đã gửi thành công!');
define('text_contact_us_err2','Không thể hoàn thành yêu cầu của bạn, lý do: Lỗi hệ thống, xin hãy liên hệ Admin.');
define('text_contact_us_err3','Không thể hoàn thành yêu cầu của bạn, lý do: không thể kết nối tới SMTP Server, xin hãy liên hệ Admin.');
define('text_contact_us_t1','Thông tin liên hệ của bạn');
define('text_contact_us_t2','Tên');
define('text_contact_us_t3','Địa chỉ Email');
define('text_contact_us_t4','Vd: somebody@gmail.com');
define('text_contact_us_t5','Chủ đề');
define('text_contact_us_t6','Lời nhắn');
define('text_contact_us_t7','{msg_length} ký tự');
define('text_contact_us_t8','Ảnh xác thực');
define('text_contact_us_t9','Nhập mã xác thực ở đây');
define('text_contact_us_t10','Liên hệ với chúng tôi qua {mail}');
define('text_lostpwd_t1','You have entered an invalid User ID (4-12 ký tự, chỉ số và chữ)');
define('text_lostpwd_t2','Bạn là robot à? Hãy nhập chính xác Mã Xác Thực!');
define('text_lostpwd_t3','Không tìm thấy tài khoản này');
define('text_lostpwd_t4','Bạn cung cấp một câu Hỏi hoặc câu Trả lời Sai. (câu trả lời dài 4-20 ký tự, chỉ số và chữ)');
define('text_lostpwd_t5','Bạn cung cấp một câu Hỏi hoặc câu Trả lời Sai.');
define('text_lostpwd_t6','Không thể đổi mật khẩu, lý do: Lỗi hệ thống, xin hãy liên hệ Admin.');
define('text_lostpwd_t7','Complete Form');
define('text_lostpwd_t8','Trả lời câu hỏi bảo mật');
define('text_lostpwd_t9','Nhận mật khẩu');
define('text_lostpwd_t10','Thành công!');
define('text_lostpwd_t11','Mật khẩu mới của bạn là');
define('text_lostpwd_t12','To see password, select with mouse in box.');
define('text_lostpwd_t13','Please answer to your Secret Question');
define('text_lostpwd_t14','Chọn cau hỏi bí mật');
define('text_lostpwd_t15','Câu trả lời bí mật');
define('text_lostpwd_t16','4-20 ký tự, chỉ số và chữ');
define('text_lostpwd_t17','Ảnh Xác Thực');
define('text_lostpwd_t18','Nhập mã xác thực ở đây');
define('text_lostpwd_t19','Vui lòng nhập Tài khoản');
define('text_lostpwd_t20','Tài khoản');
define('text_lostpwd_t21','4-12 ký tự, chỉ số và chữ');
define('text_lostpwd_t22','Không tìm thấy địa chỉ email này trong CSDL.');
define('text_lostpwd_t23','Tên tài khoản và thoogn tin đặt lại mật khẩu đã được gửi về email của bạn.');
define('text_lostpwd_t24','Không thể hoàn thành yêu cầu của bạn, lý do: Lỗi hệ thống, xin hãy liên hệ Admin.');
define('text_lostpwd_t25','Không thể hoàn thành yêu cầu của bạn, reason: could not connect to SMTP Server, please contact administrator.');
define('text_lostpwd_t26','Your password has now been reset and emailed to you. Please check your email to find your new password.');
define('text_lostpwd_t27','Vui lòng nhập địa chỉ email');
define('text_lostpwd_t28','Địa chỉ Email');
define('text_lostpwd_t29','Vd: somebody@gmail.com');

define('text_resetcharacter_t1','Tài khoản đang kết nối trong GAME, vui lòng thoát khỏi game.');
define('text_resetcharacter_t2','Không thể reset, lý do: thiếu {levels} levels.');
define('text_resetcharacter_t3','Không thể reset, lý do: thiếu {zen} zen.');
define('text_resetcharacter_t4','Không thể reset, lý do: reset limit reached : {resets_limit}');
define('text_resetcharacter_t5','Character successfully reseted.');
define('text_resetcharacter_t6','Unable to reset, lý do: Lỗi hệ thống, xin hãy liên hệ Admin.');
define('text_resetcharacter_t7','Yêu cầu cho Reset nhân vật');
define('text_resetcharacter_t8','Reset Forumla');
define('text_resetcharacter_t9','Levelup Bonus Points');
define('text_resetcharacter_t10','Resets Limit');
define('text_resetcharacter_t11','Zen');
define('text_resetcharacter_t12','Level');
define('text_resetcharacter_t13','Xóa Skills');
define('text_resetcharacter_t14','Xóa Hòm Đồ');
define('text_resetcharacter_t15','Reset Stats');
define('text_resetcharacter_t16','thiếu {levels} level avà {zen} zen');
define('text_resetcharacter_t17','thiếu {levels} level');
define('text_resetcharacter_t18','thiếu {zen} zen');
define('text_resetcharacter_t19','reset đã đạt tới giới hạn: {resets_limit}');

define('text_points_t1','Tài khoản đang kết nối trong GAME, vui lòng thoát khỏi game.');
define('text_points_t2','Unable to add levelup points, reason: you don\'t have enough levelup points.');
define('text_points_t3','Unable to add levelup points, reason: strength limit reached (strength limit: {str_limit}).');
define('text_points_t4','Unable to add levelup points, reason: agility limit reached (agility limit: {agi_limit}).');
define('text_points_t5','Unable to add levelup points, reason: vitality limit reached (vitality limit: {vit_limit}).');
define('text_points_t6','Unable to add levelup points, reason: energy limit reached (energy limit: {eng_limit}).');
define('text_points_t7','Unable to add levelup points, reason: command limit reached (command limit: {cmd_limit}).');
define('text_points_t8','Levelup Points successfully added.');
define('text_points_t9','Unable to add levelup points, lý do: Lỗi hệ thống, xin hãy liên hệ Admin.');
define('text_points_t10','Không có điểm để cộng');
define('text_points_t11','Limit reached.');
define('text_points_t12','Stats Limits');

define('text_pk_t1','Tài khoản đang kết nối trong GAME, vui lòng thoát khỏi game.');
define('text_pk_t2','Không thể rửa tội, lý do: Bạn cần giết vài người để sử dụng chức năng này.');
define('text_pk_t3','Không thể rửa tội, lý do: thiếu {zen} zen.');
define('text_pk_t4','Nhân vật đã được rửa tội.');
define('text_pk_t5','Không thể rửa tội, lý do: Lỗi hệ thống, xin hãy liên hệ Admin.');
define('text_pk_t6','Yêu cầu để rửa tội cần');
define('text_pk_t7','{zen} / PK Level (e.g: nếu pk level 2, thì số tiền sẽ nhân đôi là {total_zen}');
define('text_pk_t8','Bạn là một kẻ hèn nhát hả, tại sao bạn không thử giết vài người?');
define('text_pk_t9','CLGT! Giết sát nhân sẽ trở thành người hùng.');
define('text_pk_t10','Giết hết những kẻ giết người! Bạn là một anh hùng thực sự.');
define('text_pk_t11','thiếu {zen} zen');

define('text_ustuckcharacter_t1','Tài khoản đang kết nối trong GAME, vui lòng thoát khỏi game.');
define('text_ustuckcharacter_t2','Gỡ nhân vật bị kẹt thanh công.');
define('text_ustuckcharacter_t3','Không thể gỡ nhân vật bị kẹt, lý do: Lỗi hệ thống, xin hãy liên hệ Admin.');
define('text_ustuckcharacter_t4','Sau khi sử dụng tính năng này, nhân vật sẽ được di chuyển về <b>{map}</b>, tọa độ: <b>{coord_x}</b> với <b>{coord_y}</b>');
define('text_ustuckcharacter_t5','Vị trí');
define('text_ustuckcharacter_t6','Gỡ nhân vật bị kẹt');

define('text_clearinventory_t1','Tài khoản đang kết nối trong GAME, vui lòng thoát khỏi game.');
define('text_clearinventory_t2','Hòm đồ của nhân đã xóa thành công.');
define('text_clearinventory_t3','Không thể xóa hòm đồ, lý do: Lỗi hệ thống, xin hãy liên hệ Admin.');
define('text_clearinventory_t4','Xóa hòm đồ nhân vật');
define('text_clearinventory_t5','Sau khi dùng chức năng này, <b>hòm đồ của nhân vật sẽ được đặt lại</b>.');
define('text_clearinventory_t6','Bạn có chắc chắn muốn xóa hòm đồ không?');

define('text_clearskills_t1','Tài khoản đang kết nối trong GAME, vui lòng thoát khỏi game.');
define('text_clearskills_t2','Skills của nhân vật đã được xóa thành công.');
define('text_clearskills_t3','Không thể xóa skills , lý do: Lỗi hệ thống, xin hãy liên hệ Admin.');
define('text_clearskills_t4','Thông tin xóa skills');
define('text_clearskills_t5','Sau khi xóa skills, <b>skills nhân vật sẽ được đặt lại</b>.');
define('text_clearskills_t6','Bạn có chắc chắn muốn xóa skills không?');

define('text_mucoins_t1','Credits Account successfully created.');
define('text_mucoins_t2','Unable to create Credits Account, lý do: Lỗi hệ thống, xin hãy liên hệ Admin.');
define('text_mucoins_t3','Credits Info');
define('text_mucoins_t4','Credits');
define('text_mucoins_t5','Your PayPal Donate Transactions');
define('text_mucoins_t6','Transaction ID');
define('text_mucoins_t7','Amount');
define('text_mucoins_t8','Issued Credits');
define('text_mucoins_t9','Order Date');
define('text_mucoins_t10','Payment Status');
define('text_mucoins_t11','No transactions found.');

define('text_grandreset_t1','Tài khoản đang kết nối trong GAME, vui lòng thoát khỏi game.');
define('text_grandreset_t2','Không thể reset, lý do: thiếu {resets} resets.');
define('text_grandreset_t3','Không thể reset, lý do: thiếu {level} levels.');
define('text_grandreset_t4','Không thể reset, lý do: thiếu {zen} zen.');
define('text_grandreset_t5','Nhân vật đã chuyển sinh thanh công.');
define('text_grandreset_t6','Không thể chuyển sinh, lý do: Lỗi hệ thống, xin hãy liên hệ Admin.');
define('text_grandreset_t7','Để Chuyển Sinh yêu cầu cần');
define('text_grandreset_t8','Reset Forumla');
define('text_grandreset_t9','Credits Bonus');
define('text_grandreset_t10','Số Points được nhận');
define('text_grandreset_t11','Xóa Skills Nhân Vật');
define('text_grandreset_t12','Xóa hòm đồ cá nhân');
define('text_grandreset_t13','Xóa Point Nhân Vật');
define('text_grandreset_t14','thiếu {resets} resets, {level} level and {zen} zen');
define('text_grandreset_t15','thiếu {resets} resets');
define('text_grandreset_t16','thiếu {level} level');
define('text_grandreset_t17','thiếu {zen} zen');
define('text_grandreset_t18','Are you sure?');

define('text_accountsettings_t1','Bạn đã nhập mật khẩu hiện tại chưa đúng (6-12 ký tự, chỉ số và chữ)');
define('text_accountsettings_t2','Bạn đã nhập mật khẩu mới chưa đúng (6-12 ký tự, chỉ số và chữ)');
define('text_accountsettings_t3','Mật khẩu nhập khong khớp');
define('text_accountsettings_t4','Bạn là robot à? Hãy nhập chính xác Mã Xác Thực!');
define('text_accountsettings_t5','Mật khẩu hiện tại không chính xác!');
define('text_accountsettings_t6','Không thể xác thực mật khẩu, lý do: Lỗi hệ thống, xin hãy liên hệ Admin.');
define('text_accountsettings_t7','Complete Form');
define('text_accountsettings_t8','Đang gửi email xác thực');
define('text_accountsettings_t9','Xác nhận thay đổi mật khẩu');
define('text_accountsettings_t10','Password Fields');
define('text_accountsettings_t11','Mật khẩu hiện tại');
define('text_accountsettings_t12','6-12 ký tự, chỉ số và chữ');
define('text_accountsettings_t13','Mật khẩu mới');
define('text_accountsettings_t14','Nhập lại mật khẩu');
define('text_accountsettings_t16','Mật khẩu phiên biệt chữ HOA và thường');
define('text_accountsettings_t17','Ảnh Xác Thực');
define('text_accountsettings_t18','Nhập mã xác thực ở đây');
define('text_accountsettings_t19','Password change request link has been sent to your email address.');
define('text_accountsettings_t20','Không thể hoàn thành yêu cầu của bạn, lý do: Lỗi hệ thống, xin hãy liên hệ Admin.');
define('text_accountsettings_t21','Không thể hoàn thành yêu cầu của bạn, reason: could not connect to SMTP Server, please contact administrator.');
define('text_accountsettings_t22','Không thể thay đổi mật khẩu, reason: link expired.');
define('text_accountsettings_t23','Thay đổi mật khẩu thành công, vui lòng đăng nhập lại.');
define('text_accountsettings_t24','Không thể thay đổi mật khẩu, lý do: Lỗi hệ thống, xin hãy liên hệ Admin.');
define('text_accountsettings_t25','Không thể xác thực mật khẩu, lý do: Lỗi hệ thống, xin hãy liên hệ Admin.');
//1.0.4
define('text_resetcharacter_t_levelupbonusinfo','({reset_points} * resets number) - The multiplied amount between levelup bonus points witch is {reset_points} and number of resets that your character have.');
define('text_grandresetcharacter_t_levelupbonusinfo','({grandreset_credits} * grand resets number) - The * amount between credits bonus witch is {grandreset_credits} and number of grand resets that your character have.');
//1.0.5
define('mail_register_t1','Dear {user_id},<br><br>Thank you for registering at the {website_title}. Before we can activate your account one last step must be taken to complete your registration.<br><br>Please note - you must complete this last step to become a registered member. You will only need to visit this URL once to activate your account.<br><br>To complete your registration, please visit this URL:<br><a href="{activation_url}">{activation_url}</a><br><br><br>All the best,<br>{website_title} Team.');
define('mail_lostpassword_t1','Dear {user_id},<br><br>You have requested to reset your password on {website_title} because you have forgotten your password. If you did not request this, please ignore it. It will expire in 24 hours time.<br><br>To reset your password, please visit the following page:<br><a href="{reset_password_url}">{reset_password_url}</a><br><br>When you visit that page, your password will be reset, and the new password will be emailed to you.<br><br>Your username is: {user_id}<br><br><br>All the best,<br>{website_title} Team.');
define('mail_lostpassword_t2','Dear {user_id},<br><br>As you requested, your password has now been reset. Your new details are as follows:<br><br>Username: {request_username}<br>Password: {new_password}<br><br>To change your password, please visit the following page:<br><a href="{change_password_url}">{change_password_url}</a><br><br>All the best,<br>{website_title} Team.');
define('mail_changepassword_t1','Dear {user_id},<br><br>You have requested to change your password on {website_title}. If you did not request this, please ignore it. It will expire in 24 hours time.<br><br>To change your password, please visit the following page:<br><a href="{change_password_url}">{change_password_url}</a><br><br>When you visit that page, your password will be changed.<br><br>Your username is: {user_id}<br>Your new password is: {new_password}<br><br><br>All the best,<br>{website_title} Team.');
#Reset Stats
define('button_reset_stats','Reset Stats');
define('text_resetstats_t1','Tài khoản đang kết nối trong GAME, vui lòng thoát khỏi game.');
define('text_resetstats_t2','Character\'s stats successfully reseted.');
define('text_resetstats_t3','Unable to reset stats, lý do: Lỗi hệ thống, xin hãy liên hệ Admin.');
define('text_resetstats_t4','Reset Stats Info');
define('text_resetstats_t5','After using reset stats function, <b>character\'s stats will be reseted</b>.');
define('text_resetstats_t6','Are you sure you want to reset stats?');
define('text_resetstats_t7','thiếu {resets} resets');
define('text_resetstats_t8','Reset Stats Requirements');


#Castle Siege
define('cs_end','Siege Ended');
define('cs_start','Siege Started');
define('cs_no_owner','no owner');
define('cs_info','Siege Info');
define('cs_status','Status');
define('cs_guild_owner','Castle Guild Owner');
define('cs_money','Money');
define('cs_chaos_tax','Chaos Tax');
define('cs_store_tax','Store Tax');
define('cs_hunt_tax','Hunt Zone Tax');
define('cs_registered_guilds','Registered Guilds');
define('cs_guild_master','Guild Master');
define('cs_score','Score');
define('cs_no_guilds','There are no registered guilds.');
?>
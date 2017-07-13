@extends('layouts.admin')
@section('content')
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #EEF2FB;
}
</style>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" valign="top" background="{{asset('resources/views/admin/images/mail_leftbg.gif')}}"><img src="{{asset('resources/views/admin/images/left-top-right.gif')}}" width="17" height="29" /></td>
    <td valign="top" background="{{asset('resources/views/admin/images/content-bg.gif')}}"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31"><div class="titlebt">欢迎界面</div></td>
      </tr>
    </table></td>
    <td width="16" valign="top" background="{{asset('resources/views/admin/images/mail_rightbg.gif')}}"><img src="{{asset('resources/views/admin/images/nav-right-bg.gif')}}" width="16" height="29" /></td>
  </tr>
  <tr>
    <td valign="middle" background="{{asset('resources/views/admin/images/mail_leftbg.gif')}}">&nbsp;</td>
    <td valign="top" bgcolor="#F7F8F9"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2" valign="top">&nbsp;</td>
        <td>&nbsp;</td>
        <td valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" valign="top">
        	<span class="left_bt">感谢您使用博客网站管理系统程序</span>
        </td>
      </tr>
      <tr>
        <td colspan="2" valign="top">&nbsp;</td>
        <td>&nbsp;</td>
        <td valign="top">&nbsp;</td>
      </tr>
      <tr>
      	<td colspan="3" width="100%">
      		<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20%" height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">操作系统：</td>
                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2" class="left_txt2" colspan="2">{{PHP_OS}}</td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">运行环境：</td>
                <td>&nbsp;</td>
                <td height="30" colspan="2" class="left_txt2">{{$_SERVER['SERVER_SOFTWARE']}}</td>
              </tr>
              <tr>
                <td width="20%" height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">版本：</td>
                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2" class="left_txt2" colspan="2">v1.0</td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">时间：</td>
                <td>&nbsp;</td>
                <td height="30" colspan="2" class="left_txt2"><?php echo date('Y年m月d日 H:i:s')?></td>
              </tr>
              <tr>
                <td width="20%" height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">服务器域名/IP：</td>
                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2" class="left_txt2" colspan="2">{{$_SERVER['SERVER_NAME']}} [ {{$_SERVER['SERVER_ADDR']}} ]</td>
              </tr>
            </table>
      	</td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="40" colspan="4"><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
          <tr>
            <td></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td width="2%">&nbsp;</td>
        <td width="51%" class="left_txt"><img src="{{asset('resources/views/admin/images/icon-mail2.gif')}}" width="16" height="11"> 客户服务邮箱：853236808@qq.com<br>
              <img src="{{asset('resources/views/admin/images/icon-phone.gif')}}" width="17" height="14"> 官方网站：http://blog.csdn.net/crazywoniu</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td background="{{asset('resources/views/admin/images/mail_rightbg.gif')}}">&nbsp;</td>
  </tr>
  <tr>
    <td valign="bottom" background="{{asset('resources/views/admin/images/mail_leftbg.gif')}}"><img src="{{asset('resources/views/admin/images/buttom_left2.gif')}}" width="17" height="17" /></td>
    <td background="{{asset('resources/views/admin/images/buttom_bgs.gif')}}"><img src="{{asset('resources/views/admin/images/buttom_bgs.gif')}}" width="17" height="17"></td>
    <td valign="bottom" background="{{asset('resources/views/admin/images/mail_rightbg.gif')}}"><img src="{{asset('resources/views/admin/images/buttom_right2.gif')}}" width="16" height="17" /></td>
  </tr>
</table>
@endsection
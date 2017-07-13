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
        <td height="31"><div class="titlebt">修改密码</div></td>
      </tr>
    </table></td>
    <td width="16" valign="top" background="{{asset('resources/views/admin/images/mail_rightbg.gif')}}"><img src="{{asset('resources/views/admin/images/nav-right-bg.gif')}}" width="16" height="29" /></td>
  </tr>
  <tr>
    <td valign="middle" background="{{asset('resources/views/admin/images/mail_leftbg.gif')}}">&nbsp;</td>
    <td valign="top" bgcolor="#F7F8F9">
    	<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td valign="top" bgcolor="#F7F8F9"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="13" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="left_txt">当前位置：修改密码</td>
                  </tr>
                  <tr>
                    <td height="20"><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
                      <tr>
                        <td></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        			<form name="form1" method="POST" action="">
                      <tr>
                        <td width="20%" height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">*原密码：</td>
                        <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
                        <td width="32%" height="30" bgcolor="#f2f2f2"><input name="password_o" type="password" id="title" size="30" /></td>
                        <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt">请输入原始密码</td>
                      </tr>
                      <tr>
                        <td height="30" align="right" class="left_txt2">*新密码：</td>
                        <td>&nbsp;</td>
                        <td height="30"><input type="password" name="password" size="30" /></td>
                        <td height="30" class="left_txt">新密码6-20位</td>
                      </tr>
                      <tr>
                        <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">*确认密码：</td>
                        <td bgcolor="#f2f2f2">&nbsp;</td>
                        <td height="30" bgcolor="#f2f2f2"><input type="password" name="password_confirmation" size="30" />{{csrf_field()}}</td>
                        <td height="30" bgcolor="#f2f2f2" class="left_txt">再次输入密码</td>
                      </tr>
                      <tr>
                        <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">&nbsp;</td>
                        <td bgcolor="#f2f2f2">&nbsp;</td>
                        <td height="30" bgcolor="#f2f2f2"><input type="submit" value="提交" size="30" /> <input type="button" value="取消" size="30" /></td>
                        <td height="30" bgcolor="#f2f2f2" class="left_txt">&nbsp;</td>
                      </tr>
                      <tr>
                      	<td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">&nbsp;</td>
                        <td bgcolor="#f2f2f2">&nbsp;</td>
                        <td height="30" bgcolor="#f2f2f2" colspan="2">
                        	@if(count($errors)>0)
                        		@if(is_Object($errors))
                            		@foreach($errors->all() as $error)
                            			{{$error}}
                            		@endforeach
                        		@else
                        		{{$errors}}
                        		@endif
                        	@endif
                        </td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>

          </tr>
        </table>
    </td>
    <td background="{{asset('resources/views/admin/images/mail_rightbg.gif')}}">&nbsp;</td>
  </tr>
  <tr>
    <td valign="bottom" background="{{asset('resources/views/admin/images/mail_leftbg.gif')}}"><img src="{{asset('resources/views/admin/images/buttom_left2.gif')}}" width="17" height="17" /></td>
    <td background="{{asset('resources/views/admin/images/buttom_bgs.gif')}}"><img src="{{asset('resources/views/admin/images/buttom_bgs.gif')}}" width="17" height="17"></td>
    <td valign="bottom" background="{{asset('resources/views/admin/images/mail_rightbg.gif')}}"><img src="{{asset('resources/views/admin/images/buttom_right2.gif')}}" width="16" height="17" /></td>
  </tr>
</table>
@endsection
@extends('layouts.admin')
@section('content')
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #F8F9FA;
}
</style>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" height="29" valign="top" background="{{asset('resources/views/admin/images/mail_leftbg.gif')}}"><img src="{{asset('resources/views/admin/images/left-top-right.gif')}}" width="17" height="29" /></td>
    <td width="935" height="29" valign="top" background="{{asset('resources/views/admin/images/content-bg.gif')}}"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31"><div class="titlebt">修改连接</div></td>
      </tr>
    </table></td>
    <td width="16" valign="top" background="{{asset('resources/views/admin/images/mail_rightbg.gif')}}"><img src="{{asset('resources/views/admin/images/nav-right-bg.gif')}}" width="16" height="29" /></td>
  </tr>
  <tr>
    <td height="71" valign="middle" background="{{asset('resources/views/admin/images/mail_leftbg.gif')}}">&nbsp;</td>
    <td valign="top" bgcolor="#F7F8F9"><table width="100%" height="138" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="13" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td class="left_txt">当前位置：修改连接</td>
          </tr>
          <tr>
            <td height="20"><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
              <tr>
                <td></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<form name="form1" method="POST" action="{{url('admin/links/'.$field->link_id)}}">
              <tr>
                <td width="20%" height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">名称：</td>
                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2"><input name="link_name" type="text" size="30" value="{{$field->link_name}}" /></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt"></td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">说明：</td>
                <td>&nbsp;</td>
                <td height="30"><input type="text" name="link_title" size="30" value="{{$field->link_title}}" /></td>
                <td height="30" class="left_txt"></td>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">连接地址：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2"><input type="text" name="link_url" size="30" value="{{$field->link_url}}" /></td>
                <td height="30" bgcolor="#f2f2f2" class="left_txt"></td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">排序：</td>
                <td>&nbsp;</td>
                <td height="30"><input type="text" name="link_order" size="30" value="{{$field->link_order}}" /></td>
                <td height="30" class="left_txt"></td>
              </tr>
              <tr>
                <td height="17" colspan="4" align="right" >&nbsp;{{csrf_field()}} <input type="hidden" name="_method" value="put" /></td>
              </tr>
              <tr>
              	  <td height="30">&nbsp;</td>
              	  <td>&nbsp;</td>
                  <td height="30"><input type="submit" value="提 交" /></td>
                  <td height="30">&nbsp;</td>
               </tr>
               <tr>
               		<td height="30">&nbsp;</td>
              	  <td>&nbsp;</td>
                  <td height="30">
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
                  <td height="30">&nbsp;</td>
               </tr>
               </form>
            </table>            
            </td>
          </tr>
          </table>
         </td>
      </tr>
    </table>
    </td>
    <td background="{{asset('resources/views/admin/images/mail_rightbg.gif')}}">&nbsp;</td>
  </tr>
  <tr>
    <td valign="middle" background="{{asset('resources/views/admin/images/mail_leftbg.gif')}}"><img src="{{asset('resources/views/admin/images/buttom_left2.gif')}}" width="17" height="17" /></td>
      <td height="17" valign="top" background="{{asset('resources/views/admin/images/buttom_bgs.gif')}}"><img src="{{asset('resources/views/admin/images/buttom_bgs.gif')}}" width="17" height="17" /></td>
    <td background="{{asset('resources/views/admin/images/mail_rightbg.gif')}}"><img src="{{asset('resources/views/admin/images/buttom_right2.gif')}}" width="16" height="17" /></td>
  </tr>
</table>
@endsection

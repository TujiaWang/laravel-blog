@extends('layouts.admin')
@section('content')
<script language=JavaScript>
function logout(url){
	if (confirm("你确定要退出吗？")){
		parent.window.location = url;
	}
	return false;
}
function showsubmenu(sid) {
	var whichEl = eval("submenu" + sid);
	var menuTitle = eval("menuTitle" + sid);
	if (whichEl.style.display == "none"){
		eval("submenu" + sid + ".style.display=\"\";");
	}else{
		eval("submenu" + sid + ".style.display=\"none\";");
	}
}
function showsubmenu(sid) {
	var whichEl = eval("submenu" + sid);
	var menuTitle = eval("menuTitle" + sid);
	if (whichEl.style.display == "none"){
		eval("submenu" + sid + ".style.display=\"\";");
	}else{
		eval("submenu" + sid + ".style.display=\"none\";");
	}
}
</script>
<table width="100%" height="64" border="0" cellpadding="0" cellspacing="0" class="admin_topbg">
  <tr>
    <td width="61%" height="64"><img src="{{asset('resources/views/admin/images/logo.gif')}}" width="262" height="64"></td>
    <td width="39%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="60%" height="38" class="admin_txt">管理员：<b>{{session('user')['user_name']}}</b> 您好,感谢登陆使用！</td>
        <td width="30%"><a href="#" target="_self" onClick="logout('{{url("admin/logout")}}')"><img src="{{asset('resources/views/admin/images/out.gif')}}" alt="" width="46" height="20" border="0"></a></td>
        <td width="10%">&nbsp;</td>
      </tr>
      <tr>
        <td height="19" colspan="3">&nbsp;</td>
        </tr>
    </table></td>
  </tr>
</table>
@endsection
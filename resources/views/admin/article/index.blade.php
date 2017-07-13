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
#cat_list a{
	color:blue;
}
#cat_list a:hover{
	text-decoration:underline;
}
#cat_list input{
	width:30px;
	text-align:center;
}
.pagination{
	list-style:none;
}
.pagination li{
	display:inline-block;
	width:20px;
	height:20px;
	line-height:20px;
	border:1px solid #666;
	background-color:#EEF2FB;
}
.pagination .disabled{
	display:none;
}
</style>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" valign="top" background="{{asset('resources/views/admin/images/mail_leftbg.gif')}}"><img src="{{asset('resources/views/admin/images/left-top-right.gif')}}" width="17" height="29" /></td>
    <td valign="top" background="{{asset('resources/views/admin/images/content-bg.gif')}}"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31"><div class="titlebt">文章列表</div></td>
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
                    <td class="left_txt">当前位置：文章列表</td>
                  </tr>
                  <tr>
                    <td height="20"><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
                      <tr>
                        <td></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" id="cat_list">
        			<tr style="text-align: center;">
                        <th height="30" bgcolor="#f2f2f2" class="left_txt">文章编号</th>
                        <th height="30" bgcolor="#f2f2f2" class="left_txt" align="left">文章标题</th>       
                        <th height="30" bgcolor="#f2f2f2" class="left_txt">查看次数</th>
                        <th height="30" bgcolor="#f2f2f2" class="left_txt">作者</th>
                        <th height="30" bgcolor="#f2f2f2" class="left_txt">发布时间</th>
                        <th height="30" bgcolor="#f2f2f2" class="left_txt">操作</th>
                      </tr>
                      @foreach($data as $k=>$v)
        				@if($k % 2 != 0)
                          <tr style="text-align: center;">
                            <td height="30" bgcolor="#f2f2f2" class="left_txt">{{$v->art_id}}</td>
                            <td height="30" bgcolor="#f2f2f2" class="left_txt" align="left">{{$v->art_title}}</td>                          
                            <td height="30" bgcolor="#f2f2f2" class="left_txt">{{$v->art_view}}</td>
                            <td height="30" bgcolor="#f2f2f2" class="left_txt">{{$v->art_editor}}</td>
                            <td height="30" bgcolor="#f2f2f2" class="left_txt">{{date('Y-m-d',$v->art_time)}}</td>
                            <td height="30" bgcolor="#f2f2f2" class="left_txt"><a href="{{url('admin/article/'.$v->art_id.'/edit')}}">修改</a>&nbsp;&nbsp;<a href="javascript:;" onclick="delArt({{$v->art_id}})">删除</a></td>
                          </tr>
                          @else
                      	<tr style="text-align: center;">
                            <td height="30" class="left_txt">{{$v->art_id}}</td>
                            <td height="30" class="left_txt" align="left">{{$v->art_title}}</td>                          
                            <td height="30" class="left_txt">{{$v->art_view}}</td>
                            <td height="30" class="left_txt">{{$v->art_editor}}</td>
                            <td height="30" class="left_txt">{{date('Y-m-d',$v->art_time)}}</td>
                            <td height="30" class="left_txt"><a href="{{url('admin/article/'.$v->art_id.'/edit')}}">修改</a>&nbsp;&nbsp;<a href="javascript:;" onclick="delArt({{$v->art_id}})">删除</a></td>
                          </tr>
                          @endif
                      @endforeach
                      <tr style="text-align: center;">
                            <td height="30" bgcolor="#f2f2f2" class="left_txt" colspan="6">{{$data->links()}}</td>
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
<script>
	function changeOrder(obj,cat_id){
		var cat_order = $(obj).val();
		$.post("{{url('admin/cat/changeorder')}}",{'_token':'{{csrf_token()}}','cat_id':cat_id,'cat_order':cat_order},function(data){
			if(data.status == 0){
				layer.msg(data.msg,{icon:6});
			}else{
				layer.msg(data.msg,{icon:5});
			}
			
		});
	}
	// 删除分类
	function delArt(id){
		layer.confirm('您确定要删除这篇文章吗？', {
		  	btn: ['确定','取消'] //按钮
		}, function(){
			$.post("{{url('admin/article')}}/"+id,{'_method':'delete','_token':'{{csrf_token()}}'},function(data){
				if(data.status == 0){
					location.href=location.href;
					layer.msg(data.msg,{icon:6});
				}else{
					layer.msg(data.msg,{icon:5});
				}
			});
		}, function(){
		  	
		});
	}
	
	
</script>
@endsection
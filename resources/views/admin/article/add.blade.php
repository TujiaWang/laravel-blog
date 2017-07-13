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
        <td height="31"><div class="titlebt">添加文章</div></td>
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
            <td class="left_txt">当前位置：添加文章</td>
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
            <form name="form1" method="POST" action="{{url('admin/article')}}">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20%" height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">文章标题：</td>
                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2"><input name="art_title" type="text" size="30" /></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt"></td>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#F7F8F9" class="left_txt2">分类：</td>
                <td bgcolor="#F7F8F9">&nbsp;</td>
                <td height="30" bgcolor="#F7F8F9">
                	<select name="cat_id">
                		@foreach($data as $d)
                		<option value="{{$d->cat_id}}">{{$d->_cat_name}}</option>
                		@endforeach
                	</select>
                </td>
                <td height="30" bgcolor="#F7F8F9" class="left_txt"></td>
              </tr>
              <tr>
                <td height="30" align="right"  bgcolor="#f2f2f2" class="left_txt2">作者： </td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2"><input type="text" name="art_editor" size="30" /></td>
                <td height="30" class="left_txt" bgcolor="#f2f2f2"></td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">缩略图：</td>
                <td>&nbsp;</td>
                <script src="{{asset('resources/org/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
				<link rel="stylesheet" type="text/css" href="{{asset('resources/org/uploadify/uploadify.css')}}">
                <td height="30"><input name="art_thumb" type="text" size="30" /><input id="file_upload" name="file_upload" type="file" multiple="true"><img src="" alt="" id="art_thumb_view" style="max-width: 500px;max-height:300px;" /></td>
                <td height="30" class="left_txt"></td>
                <style>
                    .uploadify{display:inline-block;margin-left:1em;margin-bottom:0;}
                </style>
                <script type="text/javascript">
            		<?php $timestamp = time();?>
            		$(function() {
            			$('#file_upload').uploadify({
                			'buttonText' : '选择缩略图...',
            				'formData'     : {
            					'timestamp' : '<?php echo $timestamp;?>',
            					'_token'     : "{{csrf_token()}}"
            				},
            				'swf'      : "{{asset('resources/org/uploadify/uploadify.swf')}}",
            				'uploader' : "{{url('admin/upload')}}",
            				'onUploadSuccess' : function(file, data, response) {
                				$('input[name=art_thumb]').val(data);
                				$('#art_thumb_view').attr('src','/'+data);
            		            // alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
            		        }
            			});
            		});
            	</script>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">文章内容：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2">
                	<script id="editor" name="art_content" type="text/plain" style="width:900px;height:500px;"></script>
                	<script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.config.js')}}"></script>
					<script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.all.min.js')}}"> </script>
					<script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                	<script type="text/javascript">
                        var ue = UE.getEditor('editor');
                    </script>
                	
                </td>
                <td height="30" bgcolor="#f2f2f2" class="left_txt"></td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">文章描述： </td>
                <td>&nbsp;</td>
                <td height="30"><textarea rows="4" cols="50" name="art_description"></textarea></td>
                <td height="30" class="left_txt"></td>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">文章标签：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2"><input type="text" name="art_tag" size="30" /></td>
                <td height="30" bgcolor="#f2f2f2" class="left_txt"></td>
              </tr>
              <tr>
                <td height="17" colspan="4" align="right" >&nbsp;{{csrf_field()}}</td>
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
            </table>   
            </form>         
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

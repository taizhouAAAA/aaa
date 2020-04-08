<?php defined('IN_IA') or exit('Access Denied');?><div class="main">
    <div class="panel panel-default">
        <form id="myForm" method="post" class="form-horizontal form">
        <div class="table-responsive panel-body">
            <table class="table table-hover">
                <thead class="navbar-inner">
                <tr>
					<th style="width:4%;"><input type="checkbox" id="checkItems"></th>
                    <th style="width:9%;">排序</th>
                    <th style="width:18%;">优惠券名称</th>
                    <th style="width:10%;">面值</th>
					<th style="width:18%;">有效期</th>
					<th style="width:20%;">使用条件</th>
					<th style="width:10%;">积分兑换<br/>链接领取</th>
					<th style="width:10%;">已领/总量</th>
                    <th style="width:10%;">状态</th>
                    <th style="text-align:right;">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <tr>
                    <td><input type="checkbox" name="ids[]" value="<?php  echo $item['id'];?>"></td>
					<td><input type="text" class="form-control" name="displayorder[<?php  echo $item['id'];?>]" value="<?php  echo $item['displayorder'];?>"></td>
                    <td><?php  echo $item['name'];?></td>
                    <td><?php  echo $item['amount'];?> 元</td>
                    <td>
						<?php  if($item['validity_type']==1) { ?>
							<?php  echo date('Y-m-d H:i',$item['days1'])?>
						<?php  } else if($item['validity_type']==2) { ?>
							自领取后<?php  echo $item['days2'];?>天内有效
						<?php  } ?>
					</td>
					<td>消费满<?php  echo $item['conditions'];?>元，<?php  echo $item['category_name'];?>可用</td>
					<td>
						<?php  if($item['is_exchange'] == 0) { ?>
							<span class="label label-danger">不支持</span>
						<?php  } else if($item['is_exchange'] == 1) { ?>
							<span class="label label-success">支持</span>
						<?php  } ?>

						<?php  if($item['receive_link'] == 0) { ?>
							<span class="label label-default" style="margin-top:5px;display:inline-block;">不支持</span>
						<?php  } else if($item['receive_link'] == 1) { ?>
							<span class="label label-info" style="margin-top:5px;display:inline-block;">支持</span>
						<?php  } ?>
					</td>
					<td><?php  echo $item['already_exchange'];?>/<?php  echo $item['total_exchange'];?></td>
					<td>
						<?php  if($item['status'] == 0) { ?><span class="label label-default">下架</span><?php  } ?>
						<?php  if($item['status'] == 1) { ?><span class="label label-success">上架</span><?php  } ?>
					</td>
                    <td style="text-align:right;">
						<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('market', array('op' => 'addCoupon', 'coupon_id' => $item['id']))?>" title="编辑优惠券"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>
                <?php  } } ?>
                </tbody>
				<tfoot>
					<tr>
						<td colspan="10">
							<a href="<?php  echo $this->createWebUrl('market',array('op'=>addCoupon));?>" class="btn btn-success"><i class="fa fa-plus"></i> 添加优惠券</a>&nbsp;&nbsp;&nbsp;
							<input name="submitOrder" type="submit" class="btn btn-primary" value="批量修改排序">&nbsp;&nbsp;&nbsp;
							<input name="submit" type="submit" class="btn btn-danger" value="批量删除" onclick="return delAll()">
							<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
						</td>
					</tr>
				</tfoot>
            </table>
            <?php  echo $pager;?>
        </div>
    </div>
    </form>
</div>
<script type="text/javascript">
var ids = document.getElementsByName('ids[]');
$("#checkItems").click(function(){  
	if (this.checked) {
		for(var i=0;i<ids.length;i++){
			var checkElement=ids[i];
			checkElement.checked="checked";
		}
	}else{  
		for(var i=0;i<ids.length;i++){
			var checkElement=ids[i];  
			checkElement.checked=null;  
		}
	}
});
function delAll(){
	var flag = false;
	for(var i=0;i<ids.length;i++){  
		if(ids[i].checked){
			flag = true;
			break;
		}
	}
	if(!flag){  
		alert("未选中任何选项");
		return false ;
	}
	if(!confirm('该操作无法恢复，确定删除?')){
		return false;
	}

	 document.getElementById('myForm').action = "<?php  echo $this->createWebUrl('market', array('op'=>'delAllCoupon'));?>";
     document.getElementById("myForm").submit();
}
</script>
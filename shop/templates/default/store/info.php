<?php defined('InSchoolAssistant') or exit('Access Invalid!');?>
<!--店铺基本信息 S-->

<div class="ncs-info">
  <div class="title">
    <h4><?php echo $output['store_info']['store_name']; ?></h4>
  </div>
  <div class="content">

<?php if (!$output['store_info']['is_own_shop']) { ?>
    <dl class="all-rate">
      <dt>综合评分：</dt>
      <dd>
        <div class="rating"><span style="width: <?php echo $output['store_info']['store_credit_percent'];?>%"></span></div>
        <em><?php echo $output['store_info']['store_credit_average'];?></em>分</dd>
    </dl>
    <div class="ncs-detail-rate">
      <h5><strong><?php echo $lang['nc_dynamic_evaluation'];?></strong>与行业相比</h5>
      <ul>
        <?php  foreach ($output['store_info']['store_credit'] as $value) {?>
        <li> <?php echo $value['text'];?><span class="credit"><?php echo $value['credit'];?> 分</span> <span class="<?php echo $value['percent_class'];?>"><i></i><?php echo $value['percent_text'];?><em><?php echo $value['percent'];?></em></span> </li>
        <?php } ?>
      </ul>
    </div>
<?php } ?>

    <?php if(!empty($output['store_info']['store_qq']) || !empty($output['store_info']['store_ww'])){?>
    <dl class="messenger">
      <dt><?php echo $lang['nc_contact_way'];?>：</dt>
      <dd><span member_id="<?php echo $output['store_info']['member_id'];?>"></span>
        <?php if(!empty($output['store_info']['store_qq'])){?>
        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $output['store_info']['store_qq'];?>&site=qq&menu=yes" title="QQ: <?php echo $output['store_info']['store_qq'];?>"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $output['store_info']['store_qq'];?>:52" style=" vertical-align: middle;"/></a>
        <?php }?>
        <?php if(!empty($output['store_info']['store_ww'])){?>
        <a target="_blank" href="http://amos.im.alisoft.com/msg.aw?v=2&amp;uid=<?php echo $output['store_info']['store_ww'];?>&site=cntaobao&s=1&charset=<?php echo CHARSET;?>" ><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=<?php echo $output['store_info']['store_ww'];?>&site=cntaobao&s=2&charset=<?php echo CHARSET;?>" alt="<?php echo $lang['nc_message_me'];?>" style=" vertical-align: middle;"/></a>
        <?php }?>
      </dd>
    </dl>
    <?php } ?>
    	  	  <!--只有实名认证实体店认证后才显示保障体系 by  -->	  
 <?php if($output['store_info']['store_baozh']){?>
 
    <dl class="messenger">	  
   <dt>商户保障：</dt>
   	   <dd>
               <!--新加的保障-->
  <?php if($output['store_info']['store_shiti']){?>
        <span id="certMatershiti" class="text-hidden fl ml5" title="实体认证"></span>
        <?php }?>
        	
<?php if($output['store_info']['store_qtian']){?>
        <span id="certMaterqtian" class="text-hidden fl ml5" title="实物拍摄"></span>
        <?php }?>
        	
<?php if($output['store_info']['store_zhping']){?>
        <span id="certMaterzhping" class="text-hidden fl ml5" title="正品保障"></span>
        <?php }?>
        	
<?php if($output['store_info']['store_erxiaoshi']){?>
        <span id="certMatererxiaoshi" class="text-hidden fl ml5" title="2小时内发货"></span>
        <?php }?>
        	
<?php if($output['store_info']['store_tuihuo']){?>
        <span id="certMatertuihuo" class="text-hidden fl ml5" title="退货承诺"></span>
        <?php }?>
        	
<?php if($output['store_info']['store_shiyong']){?>
        <span id="certMatershiyong" class="text-hidden fl ml5" title="试用中心"></span>
        <?php }?>
        	
<?php if($output['store_info']['store_xiaoxie']){?>
        <span id="certMaterxiaoxie" class="text-hidden fl ml5" title="消费者保障"></span>
        <?php }?>
        	
<?php if($output['store_info']['store_huodaofk']){?>
        <span id="certMaterhuodaofk" class="text-hidden fl ml5" title="支持货到付款"></span>
        <?php }?>
<!--新加的保障-->    
      </dd>
	  </dl>
      	  <?php }?>  	  
      <!--保证金金额-->
 <?php if($output['store_info']['store_baozhopen']){?>
    <dl class="messenger">	  
      <dt>保证金额：</dt>
      <dd style="width: 100px;"><?php echo $output['store_info']['store_baozhrmb'];?> 
       <?php if(!empty($output['store_info']['store_baozhrmb'])){?>元(已交纳) <?php }?> 
      </dd>
	 </dl> 
<?php }?>	  
	  
	  <!--保障体系 by -->
    <dl class="no-border">
        <dt>公司名称：</dt>
        <dd><?php echo $output['store_info']['store_company_name'];?></dd>
    </dl>
    <?php if(!empty($output['store_info']['store_phone'])){?>
    <dl>
        <dt>电&#12288;&#12288;话：</dt>
        <dd><?php echo $output['store_info']['store_phone'];?></dd>
    </dl>
    <?php } ?>
    <dl>
        <dt><?php echo $lang['nc_srore_location'];?></dt>
        <dd><?php echo $output['store_info']['area_info'];?></dd>
    </dl>

    <div class="goto"><a href="<?php echo urlShop('show_store', 'index', array('store_id' => $output['store_info']['store_id']), $output['store_info']['store_domain']);?>" >进入商家店铺</a><a href="javascript:collect_store('<?php echo $output['store_info']['store_id'];?>','count','store_collect')" >收藏店铺<em nctype="store_collect"><?php echo $output['store_info']['store_collect']?></em></a></div>
  </div>
</div>
<script>
$(function(){
	var store_id = "<?php echo $output['store_info']['store_id']; ?>";
	var goods_id = "<?php echo $_GET['goods_id']; ?>";
	var act = "<?php echo trim($_GET['act']); ?>";
	var op  = "<?php echo trim($_GET['op']) != ''?trim($_GET['op']):'index'; ?>";
	$.getJSON("index.php?act=show_store&op=ajax_flowstat_record",{store_id:store_id,goods_id:goods_id,act_param:act,op_param:op});
});
</script>

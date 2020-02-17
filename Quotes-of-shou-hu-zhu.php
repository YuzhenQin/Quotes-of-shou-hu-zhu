<?php
/**
 * @package 守护煮语录
 * @version 1.0.0
 */
/*
Plugin Name: 守护煮语录
Plugin URI: http://wumouren.xyz
Description: 这不是一个普通的插件，它象征着阿儿法营的希望和热情。在启用后，在您站点后台每个页面的右上角都可以看到一句来自守护煮的语录。
Author: wumouren.xyz
Version: 1.0.0
Author URI: http://wumouren.xyz/?author=1
*/

function hello_dolly_get_lyric() {
	/** These are the lyrics to Hello Dolly */
	$lyrics = "豪华主要在一个“豪”字，土豪的豪
lucky很害羞躲起来了
因为我知道在做的各位都是菜鸡
没钱开发
想象力太丰富了
为了对付你们这群菜鸡，服务器要添加越来越严格的逻辑检测了
挖矿挣1块钱感觉好少，氪金1块钱感觉多好
如果金币可以兑换实物，必须先把某些人加入黑名单
发现自己给自己挖了一个大坑，过年拼命填坑
我要搞事情
有可能有问题的
有些人又在搞事情，我就不点名了。自己给我私信坦白，否则严惩。
删了的话可以说三年
这个我能说一年
金币而已，太容易赚了
这是诚意金，减少水作浑水摸鱼
不然没钱开发新功能呀
哇，挖了个大个的
怼
这是个漏洞
什么意思？
坚持就是胜利
你是不是作弊了
不算
这个确实有可能
去洗把脸
没有
这也是正常的
检查一下
收到
嗯，考虑一下
这个已经不存在了
什么事？
世界上只有两件事是不可避免的，那就是税收和死亡。——本杰明·富兰克林
现在都这样子吸粉么
我需要这个高级的办法吗
我建议你画图说明比较好
注意你说话的方式
啊啊啊啊啊
不用flash就已经不是scratch2了
谁验证一下他有没有作弊
瞬间秒杀全场
感谢赞助商们的支持厚爱
偶尔作死可能不会死，但坚持作死就一定会死";

	// Here we split it into lines.
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line.
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later.
function hello_dolly() {
	$chosen = "守护煮：".hello_dolly_get_lyric();
	$lang = '';
	if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
		$lang = ' lang="en"';
	}

	printf(
		'<p id="dolly"><span class="screen-reader-text">%s </span><span dir="ltr"%s>%s</span></p>',
		__( 'Quote from Hello Dolly song, by Jerry Herman:' ),
		$lang,
		$chosen
	);
}

// Now we set that function up to execute when the admin_notices action is called.
add_action( 'admin_notices', 'hello_dolly' );

// We need some CSS to position the paragraph.
function dolly_css() {
	echo "
	<style type='text/css'>
	#dolly {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		line-height: 1.6666;
	}
	.rtl #dolly {
		float: left;
	}
	.block-editor-page #dolly {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#dolly,
		.rtl #dolly {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}

add_action( 'admin_head', 'dolly_css' );

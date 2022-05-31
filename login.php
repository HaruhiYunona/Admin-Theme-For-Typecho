<?php
include 'common.php';

if ($user->hasLogin()) {
    $response->redirect($options->adminUrl);
}
$rememberName = htmlspecialchars(Typecho_Cookie::get('__typecho_remember_name'));
Typecho_Cookie::delete('__typecho_remember_name');

$bodyClass = 'body-100';

include 'header.php';
?>
<style>
        body {
            color: #fff;
            min-height: 475px;
            background-image: url(https://tva2.sinaimg.cn/large/0088jPZqly1gyd4pepr97j313b0rs4ga.jpg);
            background-repeat: no-repeat;
           background-size: cover;
          }
          
@keyframes bBottom {
    50% {
        border-bottom: 1px solid #a6c1ee;
    }
}

.btn {
    border: hidden;
    height: 40px;
    line-height: 40px;
    /* 字体 */
    color: #fff;
    font-weight: bold;
    letter-spacing: 10px;
    text-align: center;
    /* 鼠标样式 */
    cursor: pointer;
    outline: none;
    /* 边框、背景 */
    border-radius: 40px;
    background: linear-gradient(to right, #fbc2eb, #a6c1ee, #fbc2eb);
    background-size: 200%;
}

.btn:hover {
    animation: btnAnimate 1s infinite;
}

@keyframes btnAnimate {
    50% {
        background-position: 200%;
    }
}

          
</style>
<div class="typecho-login-wrap">
    <div class="typecho-login">
        <div style="padding:40px 15px 30px 15px;background-color:rgba(255,255,255,0.8);border-radius:20px;color:#000;">
            <h2>登录</h2>
        <form action="<?php $options->loginAction(); ?>" method="post" name="login" role="form">
            <p>
                <label for="name" class="sr-only"><?php _e('用户名'); ?></label>
                <input type="text" id="name" name="name" value="<?php echo $rememberName; ?>" placeholder="<?php _e('用户名'); ?>" class="text-l w-100" autofocus />
            </p>
            <p>
                <label for="password" class="sr-only"><?php _e('密码'); ?></label>
                <input type="password" id="password" name="password" class="text-l w-100" placeholder="<?php _e('密码'); ?>" />
            </p>
            <p class="submit">
                <button type="submit" class="btn" style="width:100%;"><?php _e('用户登录'); ?></button>
                <input type="hidden" name="referer" value="<?php echo htmlspecialchars($request->get('referer')); ?>" />
            </p>
            <p>
                <label for="remember"><input type="checkbox" name="remember" class="checkbox" value="1" id="remember" /> <?php _e('自动登录'); ?></label>
            </p>
        </form>
        
        <p class="more-link">
            <a href="<?php $options->siteUrl(); ?>"><?php _e('返回首页'); ?></a>
            <?php if($options->allowRegister): ?>
            &bull;
            <a href="<?php $options->registerUrl(); ?>"><?php _e('注册用户'); ?></a>
            <?php endif; ?>
        </p>
    </div>
    </div>
</div>
<?php 
include 'common-js.php';
?>
<script>
$(document).ready(function () {
    $('#name').focus();
});
</script>
<?php
include 'footer.php';
?>

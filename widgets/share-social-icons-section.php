<?php
global $wp;
?>
<div class="share-text">share</div>
<a rel="nofollow" class="share-icons" href="#" data-count="twi"
   onclick="window.open('//twitter.com/intent/tweet?text=<?php the_title(); ?>&amp;url=<?php
   echo home_url($wp->request); ?>','_blank', 'scrollbars=0, resizable=1, menubar=0, left=100,' +
           ' top=100, width=550, ' +'height=440, toolbar=0, status=0');return false"
   title="Add to Twitter" target="_blank"><img src="<?php echo $path; ?>assets/icons/tw-icon.svg">
</a>
<a rel="nofollow" class="share-icons" href="#" data-count="fb"
   onclick="window.open('//www.facebook.com/sharer.php?m2w&amp;s=100&amp;p[url]=<?php
   echo home_url($wp->request); ?>&amp;[title]=<?php the_title(); ?>&amp;p[summary]=&amp;p[images]'+
           '[0]=undefined', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, ' +
           'width=550, height=440, toolbar=0, status=0');return false"
   title="Share in Facebook" target="_blank"><img src="<?php echo $path; ?>assets/icons/fa-icon.svg">
</a>
<a rel="nofollow" class="share-icons" href="#" data-count="lnkd"
   onclick="window.open('//www.linkedin.com/shareArticle?mini=true&amp;url=<?php
   echo home_url($wp->request); ?>&amp;title=<?php the_title(); ?>', '_blank', 'scrollbars=0, ' +
           'resizable=1, menubar=0, left=100, top=100, width=600, height=400, toolbar=0, status=0');
           return false" title="Add to Linkedin" target="_blank">
    <img src="<?php echo $path; ?>assets/icons/LinkedInLogo.svg">
</a>
<a rel="nofollow" class="share-icons" href="#" data-count="red"
   onclick="window.open('//www.reddit.com/submit?url=<?php
   echo home_url($wp->request); ?>&amp;title=<?php the_title(); ?>', '_blank', 'scrollbars=0, ' +
           'resizable=1, menubar=0, left=100, top=100, width=600, height=400, toolbar=0, status=0');
           return false" title="Share with Reddit" target="_blank">
    <img src="<?php echo $path; ?>assets/icons/reddit.svg">
</a>
<a rel="nofollow" class="share-icons" href="#" data-count="tlgr"
   onclick="window.open('//telegram.me/share/url?url=<?php
   echo home_url($wp->request); ?>&amp;title=<?php the_title(); ?>', '_blank', 'scrollbars=0, ' +
           'resizable=1, menubar=0, left=100, top=100, width=600, height=400, toolbar=0, status=0');
           return false" title="Share with Telegram" target="_blank">
    <img src="<?php echo $path; ?>assets/icons/telegram.svg">
</a>
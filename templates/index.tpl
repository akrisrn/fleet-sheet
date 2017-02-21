{include file="header.tpl" title={$title} type={$type} search={$search} }
<div id="cover" style="background: url({$content[1]}) no-repeat right;"></div>
<div id="primary">
    <div id="des">{$content[0]}</div>
    <div class="ds-thread" data-thread-key="index" data-title="index" data-url="fs.yts.pw"></div>
    {literal}
        <script type="text/javascript">
            var duoshuoQuery = {short_name: "fleet-sheet"};
            (function () {
                var ds = document.createElement('script');
                ds.type = 'text/javascript';
                ds.async = true;
                ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
                ds.charset = 'UTF-8';
                (document.getElementsByTagName('head')[0]
                || document.getElementsByTagName('body')[0]).appendChild(ds);
            })();
        </script>
    {/literal}
</div>
{include file="footer.tpl"}
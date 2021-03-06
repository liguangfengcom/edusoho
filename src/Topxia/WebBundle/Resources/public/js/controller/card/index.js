define(function(require, exports, module) {
  var Notify = require('common/bootstrap-notify');

  exports.run = function (){
    $('a[role=filter-change]').click(function(event){
      window.location.href = $(this).data('url');
    });

    $('.receive-modal').click();
      $('.money-card-use').on('click',function(){
        var url = $(this).data('url');
        var target_url = $(this).data('target-url');
        var coin = $(this).prev().text();

        $.post(url, function(response){
          if (response == true) {
            Notify.success(Translator.trans('学习卡已使用，充值'+ coin +'虚拟币成功，可前往【账户中心】-【我的账户】查看充值情况。'), 2);
            setTimeout("window.location.href = '" + target_url + "'",2000);
          } else {
            Notify.danger(Translator.trans('失败！'), 1);
        }
      });
    });
  };
});

